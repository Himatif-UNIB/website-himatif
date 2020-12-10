<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Halaman lupa password
     * 
     * Menampilkan halaman lupa password dengan route
     * [auth.password.request]
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * @return  View\Factory@auth.forgot-password
     */
    public function index()
    {
        return view('auth.forgot-password');
    }

    /**
     * Validasi email
     * 
     * Memvalidasi email yang diberikan terdaftar atau
     * tidak. Jika iya, sistem akan mengirim email berisi link
     * reset password. Jika tida, sistem akan mengembalikan
     * pesan kesalahan.
     * 
     * @param Request $request
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * @return  void
     */
    public function verifyEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);

    }

    /**
     * Halaman reset password
     * 
     * Menampilkan halaman reset password yang diakses melalui
     * URL yang dikirimkan melalui email
     * 
     * @param mixed $token
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * @return View\Factory@auth.reset-password
     */
    public function resetPassword($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    /**
     * Membuat password baru
     * 
     * Membuat password baru untuk user berdasarkan
     * email dan token yang diberikan.
     * Password hanya akan dibuat jika email dan token
     * terverifikasi.
     * 
     * @param Request $request
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * @return void
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|min:10|max:128',
            'password' => 'required|min:6|max:128|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                $user->setRememberToken(Str::random(60));
    
                event(new PasswordReset($user));
            }
        );
    
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
