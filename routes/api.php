<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ForceController;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\PeriodController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\Blog\CommentController;
use App\Http\Controllers\Api\FormQuestionController;
use App\Http\Controllers\Api\Blog\CategoryController;
use App\Http\Controllers\Api\Gallery\GalleryController;
use App\Http\Controllers\Api\ShowcaseCategoryController;
use App\Http\Controllers\Api\Gallery\CategoryController as GalleryCategoryController;
use App\Http\Controllers\Api\ShowcaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api'], 'as' => 'api.'], function () {
    Route::apiResource('divisions', DivisionController::class);
    Route::apiResource('periods', PeriodController::class);
    Route::apiResource('forces', ForceController::class);

    Route::get('positions/parents', [PositionController::class, 'parents'])->name('positions.parents');
    Route::apiResource('positions', PositionController::class);

    Route::post('/members/import', [MemberController::class, 'import'])->name('members.import');
    Route::apiResource('/members', MemberController::class);

    Route::apiResource('/staffs', StaffController::class);
    Route::apiResource('/users', UserController::class)->only(['index', 'store', 'destroy']);

    Route::group(['as' => 'blog.', 'prefix' => 'blog'], function() {
        Route::apiResource('/blog_category', CategoryController::class);
        Route::apiResource('/comments', CommentController::class);
    });

    Route::group(['as' => 'gallery.'], function () {
        Route::apiResource('/gallery/categories', GalleryCategoryController::class);
        Route::apiResource('/gallery', GalleryController::class);
    });

    Route::apiResource('/certificates', CertificateController::class)->only('store', 'show');
    Route::apiResource('/form_questions', FormQuestionController::class)->only('show');

    Route::apiResource('/showcase_categories', ShowcaseCategoryController::class);
    Route::apiResource('/showcases', ShowcaseController::class)->only(['update', 'destroy']);
});

Route::group(['prefix' => 'showcases', 'as' => 'api.'], function () {
    Route::get('/', [ShowcaseController::class, 'index'])->name('showcases.index');
    Route::get('/{showcase}', [ShowcaseController::class, 'show'])->name('showcases.show');
});