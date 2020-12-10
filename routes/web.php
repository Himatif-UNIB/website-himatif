<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', [AdminController::class, 'index'])->middleware('auth')->name('index');

Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:web')->name('logout');
});

Route::group(['prefix' => 'auth', 'as' => 'password.', 'middleware' => 'guest'], function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'verifyEmail'])->name('email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset');
    Route::post('/reset-password', [ForgotPasswordController::class, ])->name('update');
});
