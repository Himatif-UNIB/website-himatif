<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ForceController;
use App\Http\Controllers\FormController;
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

Route::get('/', function () {
    return view('frontend.beranda');
})->name('beranda');

Route::get('/struktur', function () {
    return view('frontend.struktur');
})->name('struktur');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/post', function () {
    return view('frontend.post');
})->name('blog.post');

Route::get('/modal', function () {
    return view('frontend.modal');
})->name('modal');

Route::get('/galeri', function () {
    return view('frontend.galeri');
})->name('galeri');

Route::get('/home', [AdminController::class, 'index'])->middleware('auth')->name('index');

Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth/do-login', [AuthController::class, 'loginPost'])->name('login-post');

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
});

Route::get('/form/{form}-{slug}', [UserFormController::class, 'show'])->name('form.show');
Route::post('/form/{form}/submit', [UserFormController::class, 'store'])->name('form.store');
