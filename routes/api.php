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
use App\Http\Controllers\API\UserController;
// use Illuminate\Http\Request;
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

Route::prefix('v1/user')->middleware(['auth:api', 'api.key'])->group(
    function () {
        Route::get('getall', [UserController::class, 'index'])->middleware('can:getall-users');
        Route::get('search', [UserController::class, 'search'])->middleware('can:search-users');
        Route::post('store', [UserController::class, 'store'])->middleware('can:store-users');
        Route::get('show/{user}', [UserController::class, 'show'])->middleware('can:show-users');
        Route::patch('update/{user}', [UserController::class, 'update'])->middleware('can:update-users');
        Route::post('destroy/{user}', [UserController::class, 'destroy'])->middleware('can:delete-users');
    }
);

Route::prefix('v1/asset')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [AssetController::class, 'index']);
        Route::get('search', [AssetController::class, 'search']);
        Route::post('store', [AssetController::class, 'store'])->middleware(['can:store-assets', 'api.key']);
        Route::get('show/{asset}', [AssetController::class, 'show']);
        Route::post('update/{asset}', [AssetController::class, 'update'])->middleware(['can:update-assets', 'api.key']);
        Route::post('destroy/{asset}', [AssetController::class, 'destroy'])->middleware(['can:delete-assets', 'api.key']);
    }
);

Route::prefix('v1/maintenance')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [MaintenanceController::class, 'index']);
        Route::get('self_get', [MaintenanceController::class, 'self_get']);
        // Route::post('store', [MaintenanceController::class, 'store'])->middleware(['can:store-maintenance', 'api.key']);
        Route::get('show/{maintenance}', [MaintenanceController::class, 'show']);
        // Route::post('update/{maintenance}', [MaintenanceController::class, 'update'])->middleware(['can:update-maintenance', 'api.key']);
        Route::post('destroy/{maintenance}', [MaintenanceController::class, 'destroy'])->middleware(['can:delete-maintenance', 'api.key']);

        Route::prefix("/{maintenance}/history")->middleware('auth:api')->group(
            function () {
                Route::post('update/{pupdate}', [PUpdateController::class, 'update'])->middleware(['can:update-maintenance', 'api.key']);
                Route::post('show/{pupdate}', [PUpdateController::class, 'update'])->middleware(['can:update-maintenance', 'api.key']);
                Route::post('store', [PUpdateController::class, 'update'])->middleware(['can:update-maintenance', 'api.key']);
                Route::post('destroy/{pupdate}', [PUpdateController::class, 'update'])->middleware(['can:update-maintenance', 'api.key']);
            }
        );
    }
);

Route::prefix('v1/inspeksi')->middleware('auth:api')->group(
    function () {
        Route::post('store', [MaintenanceController::class, 'store'])->middleware(['can:store-inspeksi', 'api.key']);
        Route::post('update/{maintenance}', [MaintenanceController::class, 'update'])->middleware(['can:update-inspeksi', 'api.key']);
    }
);

Route::prefix('v1/category')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [CategoryController::class, 'index']);
        Route::post('store', [CategoryController::class, 'store'])->middleware(['can:store-category', 'api.key']);
        Route::get('show/{category}', [CategoryController::class, 'show']);
        Route::get('search', [CategoryController::class, 'search']);
        Route::post('update/{category}', [CategoryController::class, 'update'])->middleware(['can:update-category', 'api.key']);
        Route::post('destroy/{category}', [CategoryController::class, 'destroy'])->middleware(['can:delete-category', 'api.key']);
    }
);

Route::prefix('v1/location')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [LocationController::class, 'index']);
        Route::post('store', [LocationController::class, 'store'])->middleware(['can:store-location', 'api.key']);
        Route::get('show/{location}', [LocationController::class, 'show']);
        Route::post('update/{location}', [LocationController::class, 'update'])->middleware(['can:update-location', 'api.key']);
        Route::post('destroy/{location}', [LocationController::class, 'destroy'])->middleware(['can:delete-location', 'api.key']);
        Route::get('search', [LocationController::class, 'search']);
    }
);

Route::prefix('v1/satker')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [SatkerController::class, 'index']);
        Route::post('store', [SatkerController::class, 'store'])->middleware(['can:store-satker', 'api.key']);
        Route::get('show/{satker}', [SatkerController::class, 'show']);
        Route::post('update/{satker}', [SatkerController::class, 'update'])->middleware(['can:update-satker', 'api.key']);
        Route::post('destroy/{satker}', [SatkerController::class, 'destroy'])->middleware(['can:delete-satker', 'api.key']);
    }
);

Route::prefix('v1/subsatker')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [SubsatkerController::class, 'index']);
        Route::post('store', [SubsatkerController::class, 'store'])->middleware(['can:store-subsatker', 'api.key']);
        Route::get('show/{subsatker}', [SubsatkerController::class, 'show']);
        Route::post('update/{subsatker}', [SubsatkerController::class, 'update'])->middleware(['can:update-subsatker', 'api.key']);
        Route::post('destroy/{subsatker}', [SubsatkerController::class, 'destroy'])->middleware(['can:delete-subsatker', 'api.key']);
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
        Route::post('store', [StatusController::class, 'store'])->middleware(['can:store-statusa', 'api.key']);
        Route::get('show/{statusassets}', [StatusController::class, 'show']);
        Route::post('update/{statusassets}', [StatusController::class, 'update'])->middleware(['can:update-statusa', 'api.key']);
        Route::post('destroy/{statusassets}', [StatusController::class, 'destroy'])->middleware(['can:delete-statusa', 'api.key']);
    }
);

Route::prefix('v1/news')->middleware('auth:api')->group(
    function () {
        Route::get('getall', [NewsController::class, 'index']);
        Route::post('store', [NewsController::class, 'store']);
        Route::get('show/{news}', [NewsController::class, 'show']);
        Route::post('update/{news}', [NewsController::class, 'update'])->middleware(['can:update-statusa', 'api.key']);
        Route::post('destroy/{news}', [NewsController::class, 'destroy'])->middleware(['can:delete-statusa', 'api.key']);
    }
);
