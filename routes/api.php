<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\StatusAssetsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubsatkerController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('v1/auth')->group(
    function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('profile', [AuthController::class, 'profile']);
    }
);
Route::prefix('v1/asset')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [AssetController::class, 'index']);
        Route::post('store', [AssetController::class, 'store']);
        Route::get('show/{asset}', [AssetController::class, 'show']);
        Route::post('update/{asset}', [AssetController::class, 'update']);
    }
);
Route::prefix('v1/category')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [CategoryController::class, 'index']);
        Route::post('store', [CategoryController::class, 'store']);
        Route::get('show/{category}', [CategoryController::class, 'show']);
        Route::post('update/{category}', [CategoryController::class, 'update']);
        Route::post('destroy/{category}', [CategoryController::class, 'destroy']);
        Route::get('search', [CategoryController::class, 'search']);
    }
);
Route::prefix('v1/location')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [LocationController::class, 'index']);
        Route::post('store', [LocationController::class, 'store']);
        Route::get('show/{location}', [LocationController::class, 'show']);
        Route::post('update/{location}', [LocationController::class, 'update']);
        Route::post('destroy/{location}', [LocationController::class, 'destroy']);
        Route::get('search', [LocationController::class, 'search']);
    }
);
Route::prefix('v1/satker')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [SatkerController::class, 'index']);
        Route::post('store', [SatkerController::class, 'store']);
        Route::get('show/{satker}', [SatkerController::class, 'show']);
        Route::post('update/{satker}', [SatkerController::class, 'update']);
        Route::post('destroy/{satker}', [SatkerController::class, 'destroy']);
        // Route::get('search', [SatkerController::class, 'search']);
    }
);
Route::prefix('v1/subsatker')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [SubsatkerController::class, 'index']);
        Route::post('store', [SubsatkerController::class, 'store']);
        Route::get('show/{subsatker}', [SubsatkerController::class, 'show']);
        Route::post('update/{subsatker}', [SubsatkerController::class, 'update']);
        Route::post('destroy/{subsatker}', [SubsatkerController::class, 'destroy']);
        // Route::get('search', [SubsatkerController::class, 'search']); 
    }
);
Route::prefix('v1/role')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [RoleController::class, 'index']);
        Route::post('store', [RoleController::class, 'store']);
        Route::get('show/{role}', [RoleController::class, 'show']);
        Route::post('update/{role}', [RoleController::class, 'update']);
        Route::post('destroy/{role}', [RoleController::class, 'destroy']);
        // Route::get('search', [SubsatkerController::class, 'search']); 
    }
);
Route::prefix('v1/statusa')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [StatusAssetsController::class, 'index']);
        Route::post('store', [StatusAssetsController::class, 'store']);
        Route::get('show/{statusassets}', [StatusAssetsController::class, 'show']);
        Route::post('update/{statusassets}', [StatusAssetsController::class, 'update']);
        Route::post('destroy/{statusassets}', [StatusAssetsController::class, 'destroy']);
        // Route::get('search', [SubsatkerController::class, 'search']); 
    }
);
