<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Social_auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    /**
     * Menghubungkan dengan akun Facebook
     * 
     * Membuat URL dan mengarahkan ke halaman
     * authentikasi Facebook.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     */
    public function connect()
    {
        if (Social_auth::where(['user_id' => auth()->id(), 'driver' => 'facebook'])->exists()) {
            /**
             * Jika sudah terhubung ke Facebook, cegah user melakukan penghubungan ulang.
             * Tindakan ini bisa terjadi jika user menulis URL ${APP_URL}/auth/facebook/connect
             * di address bar secara langsung. ~anak nakal
             */
            return redirect()
                ->route('profile.edit')
                ->withError('Akun HIMATIF kamu sudah terhubung ke Facebook.');
        }

        return Socialite::driver('facebook')
            ->redirect();
    }

    /**
     * Memverifikasi authentikasi akun Facebook
     * 
     * Verifikasi akun Facebook yang digunakan,
     * apakah sudah dihubungkan dengan akun HIMATIF lain
     * atau belum.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     */
    public function callback(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        $userID = $user->getId();

        $isRegistered = Social_auth::where(['driver' => 'facebook', 'social_user_id' => $userID])->exists();

        if (auth()->check()) {
            /**
             * Jika user sudah login, artinya user berusaha
             * menyambungkan akun Facebook dengan akun HIMATIF
             */

            if ($isRegistered) {
                /**
                 * Satu akun Facebook hanya boleh terhubung dengan satu akun HIMATIF.
                 * Jika akun Facebook tersebut sudah dihubungkan dengan akun HIMATIF lain,
                 * cegah user mengubungkannya lagi.
                 */
                return redirect()
                    ->route('profile.edit')
                    ->withError('Akun Facebook tersebut sudah terhubung dengan akun HIMATIF lain. Silahkan gunakan akun Facebook lain.');
            } else {
                $name = $user->getName();
                $data = json_encode($user->user);

                $auth = new Social_auth;
                $auth->user_id = auth()->user()->id;
                $auth->driver = 'facebook';
                $auth->social_user_id = $userID;
                $auth->social_data = $data;
                $auth->save();

                if ($user->avatar_original != '') {
                    $auth->addMediaFromUrl($user->avatar_original)
                        ->toMediaCollection('social_auth_picture');
                }

                return redirect()
                    ->route('profile.edit')
                    ->withSuccess('Berhasil menghubungkan dengan akun ' . $name);
            }
        } else {
            /**
             * Jika user belum login, artinya user berusaha
             * login menggunakan akun Facebook
             */

            if (!$isRegistered) {
                /**
                 * Akun Facebook ini belum terhubung dengan akun HIMATIF manapun.
                 * Gagalkan login.
                 */
                return redirect()
                    ->route('auth.login')
                    ->with('status', 'Akun Facebook tersebut belum terhubung dengan akun HIMATIF.');
            }

            $userData = Social_auth::where(['driver' => 'facebook', 'social_user_id' => $userID])->first();

            Auth::loginUsingId($userData->user_id);

            $user = auth()->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $token->save();

            return redirect()
                ->route('auth.login')
                ->with('status', 'Berhasil login dengan akun Facebook')
                ->with('success', true)
                ->with(
                    'token',
                    [
                        'accessToken' => $tokenResult->accessToken,
                        'expiresAt' => $tokenResult->token->expires_at
                    ]
                );
        }
    }

    /**
     * Memutus sambungan akun Facebook
     * 
     * Memutus sambungan akun Facebook dan
     * akun HIMATIF. Data yang diambil saat
     * menghubungkan akun akan dihapus.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     */
    public function revoke()
    {
        if (!Social_auth::where(['user_id' => auth()->id(), 'driver' => 'facebook'])->exists()) {
            /**
             * Jika user belum menghubungkan akun Facebook,
             * gagalkan tindakan ini. ~anak nakal
             */
            return redirect()
                ->route('profile.edit')
                ->withError('Akun HIMATIF kamu tidak terhubung ke Facebook.');
        }

        $auth = Social_auth::where(['user_id' => auth()->id(), 'driver' => 'facebook'])->first();
        if (isset($auth->media[0])) {
            $auth->media[0]->delete();
        }

        $auth->delete();

        return redirect()
            ->back()
            ->withSuccess('Berhasil memutus sambungan akun Facebook');
    }

    public function login()
    {
        return Socialite::driver('facebook')
            ->with(['auth_type' => 'reauthenticate'])
            ->redirect();
    }
}
