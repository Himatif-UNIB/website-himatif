<?php

use App\Events\AnswerCreated;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\FormController as SiteFormController;
use App\Http\Controllers\Site\GalleryController as SiteGalleryController;
use App\Http\Controllers\Site\StaffController as SiteStaffController;
use App\Http\Controllers\StaffController;
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
Route::get('/modal/{divisionId}', [HomeController::class, 'modal'])->name('beranda.modal');

Route::view('/form', 'form')->name('form');
Route::view('/form-submit', 'form-submit')->name('form.submit');

Route::get('/struktur', [SiteStaffController::class, 'index'])->name('struktur');
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/read/{post?}/{slug?}', [BlogController::class, 'post'])->name('post');
    Route::get('/category/{id?}/{slug?}', [BlogController::class, 'category'])->name('category');
    Route::post('/read/{post?}/{slug?}', [BlogController::class, 'post_comment'])->name('post_comment');
});

Route::prefix('galeri')->group(function () {
    Route::get('/', [SiteGalleryController::class, 'index'])->name('galeri');
    Route::get('/{album}/{slug}', [SiteGalleryController::class, 'show'])->name('galeri.detail');
});

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
        Route::group(['as' => 'settings.', 'prefix' => 'settings', 'middleware' => ['permission:read_site_setting|update_site_setting']], function () {
            Route::get('/', [SettingController::class, 'general'])->name('general');
            Route::put('/update', [SettingController::class, 'update'])->name('update');
        });
    });
});

Route::group(['middleware' => ['auth'], 'prefix' => 'himatif-admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['middleware' => ['role:super_admin']], function () {
            Route::get('/users/roles', [PermissionController::class, 'roles'])->name('users.roles');
            Route::get('/users/permissions', [PermissionController::class, 'permissions'])->name('users.permissions');
            Route::get('/users/permissions/{role}', [PermissionController::class, 'edit'])->name('users.permissions.edit');
            Route::put('/users/permissions/{role}', [PermissionController::class, 'update'])->name('users.permissions.update');
            Route::resource('users', UserController::class);
            Route::get('/settings/webmaster', [SettingController::class, 'webmaster'])->name('settings.webmaster');
        });
    });

    Route::group(['as' => 'settings.', 'prefix' => 'settings', 'middleware' => ['permission:read_site_setting|update_site_setting']], function () {
        Route::get('/', [SettingController::class, 'general'])->name('general');
        Route::get('/blog', [SettingController::class, 'blog'])->name('blog');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
        Route::get('/social-media', [SettingController::class, 'socialMedia'])->name('socials');
    });

    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');
    Route::get('/certificates/send', [CertificateController::class, 'send'])->name('certificates.send');
    Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificates.create');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/divisions', [MemberController::class, 'divisions'])->name('divisions');
    Route::get('/periods', [MemberController::class, 'periods'])->name('periods');
    Route::get('/forces', [MemberController::class, 'forces'])->name('forces');
    Route::get('/positions', [MemberController::class, 'positions'])->name('positions');

    Route::get('/members/export', [MemberController::class, 'export'])->name('members.export');
    Route::get('/members', [MemberController::class, 'index'])->name('members');
    Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show');

    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/show', [StaffController::class, 'show'])->name('staff.show');

    Route::get('/forms/{form}/answers', [FormController::class, 'answers'])->name('forms.answers');
    Route::get('/forms/{form}/export', [FormController::class, 'exportAnswer'])->name('forms.answer.export');
    Route::resource('forms', FormController::class);

    Route::get('/auth/facebook/connect', [FacebookAuthController::class, 'connect'])->name('auth.facebook.connect');
    Route::get('/auth/facebook/revoke', [FacebookAuthController::class, 'revoke'])->name('auth.facebook.revoke');

    Route::get('/auth/google/connect', [GoogleAuthController::class, 'connect'])->name('auth.google.connect');
    Route::get('/auth/google/verify', [GoogleAuthController::class, 'verify'])->name('auth.google.verify');
    Route::get('/auth/google/revoke', [GoogleAuthController::class, 'revoke'])->name('auth.google.revoke');

    //Manajemen blog
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::get('/posts/trash', [PostController::class, 'trash'])->name('posts.trash');
        Route::get('/posts/deleted', [PostController::class, 'deleted'])->name('posts.deleted');
        Route::put('/posts/restore', [PostController::class, 'restore'])->name('posts.restore');
        Route::delete('/posts/force-delete', [PostController::class, 'force_delete'])->name('posts.force_delete');
        Route::resource('posts', PostController::class);

        Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
            Route::get('', [CommentController::class, 'index'])->name('index');
            Route::get('/post/{post?}', [CommentController::class, 'post'])->name('post');
            Route::get('/user/{user?}', [CommentController::class, 'user'])->name('user');
        });
    });

    //manajemen galeri
    Route::get('/gallery/category', [GalleryController::class, 'categories'])->name('gallery.categories');
    Route::resource('gallery', GalleryController::class);
});

Route::get('/form/{form}-{slug}', [SiteFormController::class, 'show'])->name('form.show');
Route::post('/form/{form}/submit', [SiteFormController::class, 'store'])->name('form.store');

Route::get('certificate-test', function () {
    return view('certificates.default');
});