<?php

use App\Http\Controllers\API\AssetController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SatkerController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\SubsatkerController;
use App\Http\Controllers\Api\PUpdateController;
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
        Route::get('search', [AssetController::class, 'search']);
        Route::post('store', [AssetController::class, 'store'])->middleware('can:store-assets');
        Route::get('show/{asset}', [AssetController::class, 'show']);
        Route::post('update/{asset}', [AssetController::class, 'update'])->middleware('can:update-assets');
        Route::post('destroy/{asset}', [AssetController::class, 'destroy'])->middleware('can:delete-assets');
    }
);
Route::prefix('v1/maintenance')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [MaintenanceController::class, 'index']);
        Route::post('store', [MaintenanceController::class, 'store'])->middleware('can:store-maintenance');
        Route::get('show/{maintenance}', [MaintenanceController::class, 'show']);
        Route::post('update/{maintenance}', [MaintenanceController::class, 'update'])->middleware('can:update-maintenance');
        Route::post('destroy/{maintenance}', [MaintenanceController::class, 'destroy'])->middleware('can:delete-maintenance');

        Route::prefix("/{maintenance}/updates")->middleware('auth:api')->group(
            function () {
                Route::post('/{pupdate}', [PUpdateController::class, 'update'])->middleware('can:update-maintenance');
            }
        );
    }
);


Route::prefix('v1/category')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [CategoryController::class, 'index']);
        Route::post('store', [CategoryController::class, 'store'])->middleware('can:store-category');
        Route::get('show/{category}', [CategoryController::class, 'show']);
        Route::get('search', [CategoryController::class, 'search']);
        Route::post('update/{category}', [CategoryController::class, 'update'])->middleware('can:update-category');
        Route::post('destroy/{category}', [CategoryController::class, 'destroy'])->middleware('can:delete-category');
    }
);
Route::prefix('v1/location')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [LocationController::class, 'index']);
        Route::post('store', [LocationController::class, 'store'])->middleware('can:store-location');
        Route::get('show/{location}', [LocationController::class, 'show']);
        Route::post('update/{location}', [LocationController::class, 'update'])->middleware('can:update-location');
        Route::post('destroy/{location}', [LocationController::class, 'destroy'])->middleware('can:delete-location');
        Route::get('search', [LocationController::class, 'search']);
    }
);
Route::prefix('v1/satker')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [SatkerController::class, 'index']);
        Route::post('store', [SatkerController::class, 'store'])->middleware('can:store-satker');
        Route::get('show/{satker}', [SatkerController::class, 'show']);
        Route::post('update/{satker}', [SatkerController::class, 'update'])->middleware('can:update-satker');
        Route::post('destroy/{satker}', [SatkerController::class, 'destroy'])->middleware('can:delete-satker');
    }
);
Route::prefix('v1/subsatker')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [SubsatkerController::class, 'index']);
        Route::post('store', [SubsatkerController::class, 'store'])->middleware('can:store-subsatker');
        Route::get('show/{subsatker}', [SubsatkerController::class, 'show']);
        Route::post('update/{subsatker}', [SubsatkerController::class, 'update'])->middleware('can:update-subsatker');
        Route::post('destroy/{subsatker}', [SubsatkerController::class, 'destroy'])->middleware('can:delete-subsatker');
    }
);

// nunggu refisi
Route::prefix('v1/role')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [RoleController::class, 'index']);
        Route::post('store', [RoleController::class, 'store']);
        Route::get('show/{role}', [RoleController::class, 'show']);
        Route::post('update/{role}', [RoleController::class, 'update']);
        Route::post('destroy/{role}', [RoleController::class, 'destroy']);
    }
);

Route::prefix('v1/statusa')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [StatusController::class, 'index']);
        Route::post('store', [StatusController::class, 'store'])->middleware('can:store-statusa');
        Route::get('show/{statusassets}', [StatusController::class, 'show']);
        Route::post('update/{statusassets}', [StatusController::class, 'update'])->middleware('can:update-statusa');
        Route::post('destroy/{statusassets}', [StatusController::class, 'destroy'])->middleware('can:delete-statusa');
    }
);

Route::prefix('v1/news')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [NewsController::class, 'index']);
        Route::post('store', [NewsController::class, 'store']);
        Route::get('show/{news}', [NewsController::class, 'show']);
        Route::post('update/{news}', [NewsController::class, 'update'])->middleware('can:update-statusa');
        Route::post('destroy/{news}', [NewsController::class, 'destroy'])->middleware('can:delete-statusa');
    }
);
