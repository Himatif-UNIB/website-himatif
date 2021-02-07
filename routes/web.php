<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ForceController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserFormController;
use Illuminate\Support\Facades\Auth;
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

/*
    Frontend Route
*/

Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/struktur', function () {
    return view('frontend.struktur');
})->name('struktur');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/post', function () {
    return view('frontend.post');
})->name('blog.post');

Route::get('/home', [AdminController::class, 'index'])->middleware('auth')->name('index');

Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth/do-login', [AuthController::class, 'loginPost'])->name('login-post');

Route::get('/auth/login/facebook', [FacebookAuthController::class, 'login'])->name('login.facebook');
Route::get('/auth/callback/facebook', [FacebookAuthController::class, 'callback'])->name('auth.facebook.callback');
Route::get('/auth/login/google', [GoogleAuthController::class, 'login'])->name('login.google');
Route::get('/auth/callback/google', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:web')->name('logout');
});

Route::group(['prefix' => 'auth', 'as' => 'password.', 'middleware' => 'guest'], function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'verifyEmail'])->name('email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset');
    Route::post('/reset-password', [ForgotPasswordController::class,])->name('update');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
            Route::get('/', [SettingController::class, 'general'])->name('general');
            Route::put('/update', [SettingController::class, 'update'])->name('update');
        });

        Route::group(['middleware' => ['role:super_admin']], function () {
            Route::get('/users/roles', [PermissionController::class, 'roles'])->name('users.roles');
            Route::get('/users/permissions', [PermissionController::class, 'permissions'])->name('users.permissions');
            Route::get('/users/permissions/{role}', [PermissionController::class, 'edit'])->name('users.permissions.edit');
            Route::put('/users/permissions/{role}', [PermissionController::class, 'update'])->name('users.permissions.update');
            Route::resource('users', UserController::class);
        });
    });
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/divisions', [DivisionController::class, 'index'])->name('divisions');
    Route::get('/periods', [PeriodController::class, 'index'])->name('periods');
    Route::get('/forces', [ForceController::class, 'index'])->name('forces');
    Route::get('/positions', [PositionController::class, 'index'])->name('positions');

    Route::get('/members', [MemberController::class, 'index'])->name('members');
    Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show');
    Route::get('/members/export', [MemberController::class, 'export'])->name('members.export');

    Route::get('/administrators', [AdministratorController::class, 'index'])->name('administrators');

    Route::get('/forms/{form}/answers', [FormController::class, 'answers'])->name('forms.answers');
    Route::get('/forms/{form}/export', [FormController::class, 'exportAnswer'])->name('forms.answer.export');
    Route::resource('forms', FormController::class);

    Route::get('/auth/facebook/connect', [FacebookAuthController::class, 'connect'])->name('auth.facebook.connect');
    Route::get('/auth/facebook/revoke', [FacebookAuthController::class, 'revoke'])->name('auth.facebook.revoke');

    Route::get('/auth/google/connect', [GoogleAuthController::class, 'connect'])->name('auth.google.connect');
    Route::get('/auth/google/verify', [GoogleAuthController::class, 'verify'])->name('auth.google.verify');
    Route::get('/auth/google/revoke', [GoogleAuthController::class, 'revoke'])->name('auth.google.revoke');
});

Route::get('/form/{form}-{slug}', [UserFormController::class, 'show'])->name('form.show');
Route::post('/form/{form}/submit', [UserFormController::class, 'store'])->name('form.store');
