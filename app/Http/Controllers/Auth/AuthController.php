<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        if (config('app.ajax_login') == true) {
            return view('auth.login');
        }
        else {
            return view('auth.login-no-ajax');
        }
    }

    /**
     * Login user
     * 
     * Method ini menangani permintaan login user.
     * User mengirimkan email dan password untuk login dan sistem
     * akan memeriksa email dan password tersebut.
     * Jika benar akan membuat token password yang
     * akan digunakan sebagai kredensial untuk mengakses API dan
     * mengembalikan JSON kredensial login (passport Token)
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @method  POST
     * @param   $request
     * 
     * @return  String  status login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'min:10', 'max:128'],
            'password' => ['required'],
            'remember_me' => ['nullable', 'boolean']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Username atau password salah'
                ], 401);
        }

        $user = auth()->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return response()
            ->json([
                'success' => true,
                'token' => [
                    'accessToken' => $tokenResult->accessToken,
                    'expiresAt' => $tokenResult->token->expires_at
                ]
            ]);
    }

    /**
     * Logout user
     * 
     * Method ini menangani permintaan logout user.
     * Method ini akan melakukan pengahapusan authentikasi dan
     * menghapus token passport yang didapatkan saat login.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @method  DELETE
     * 
     * @return  String  Status logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil logout'
            ]);
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'min:10', 'max:128'],
            'password' => ['required'],
            'remember_me' => ['nullable', 'boolean']
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()
                ->back()
                ->withInput();
        }

        $user = auth()->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return redirect()
            ->back()
            ->with('success', true)
            ->with('token', [
                    'accessToken' => $tokenResult->accessToken,
                    'expiresAt' => $tokenResult->token->expires_at
                ]
            );
    }
}
