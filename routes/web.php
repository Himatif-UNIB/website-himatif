<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::group(['as' => 'admin.', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::group(['as' => 'auth.'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [AuthController::class, 'login'])->name('login');

        Route::group(['middleware' => ['auth:web']], function () {
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        });
    });
});