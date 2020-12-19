<?php

use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\ForceController;
use App\Http\Controllers\Api\PeriodController;
use App\Http\Controllers\Api\PositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
});
