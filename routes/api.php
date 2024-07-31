<?php

use App\Http\Controllers\API\AssetController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\ClientController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\InspeksiController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SatkerController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\SubsatkerController;
use App\Http\Controllers\API\PUpdateController;
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
        Route::middleware(['api.key'])->group(
            function () {
                Route::get('profile', [AuthController::class, 'profile']);
            }
        );
    }
);
Route::prefix('v1/client')->middleware(['admin'])->group(
    // Route::prefix('v1/client')->group(
    function () {
        Route::get('', [ClientController::class, 'index']);
        Route::get('{client}', [ClientController::class, 'show']);
        Route::post('', [ClientController::class, 'store']);
        Route::delete('{client}', [ClientController::class, 'delete']);
    }
);
// Route::prefix('v1/client')->middleware(['admin'])->group(
//     // Route::prefix('v1/client')->group(
//     function () {
//         Route::get('/', [ClientController::class, 'index']);
//     }
// );
Route::prefix('v1/user')->middleware(['auth:api', 'api.key'])->group(
    function () {
        Route::get('', [UserController::class, 'index']);
        Route::get('search', [UserController::class, 'search']);
        Route::get('{user}', [UserController::class, 'show']);
        Route::post('', [UserController::class, 'store']);
        Route::put('{user}', [UserController::class, 'update']);
        Route::delete('{user}', [UserController::class, 'destroy']);
    }
);

Route::prefix('v1/asset')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [AssetController::class, 'index']);
        Route::get('search', [AssetController::class, 'search']);
        Route::get('{asset}', [AssetController::class, 'show']);
        Route::post('', [AssetController::class, 'store']);
        Route::put('{asset}', [AssetController::class, 'update']);
        Route::delete('{asset}', [AssetController::class, 'destroy']);
    }
);

Route::prefix('v1/maintenance')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [MaintenanceController::class, 'index']);
        Route::get('maintenance_aplly/{maintenance}', [MaintenanceController::class, 'maintenance_aplly']);
        Route::get('self_get', [MaintenanceController::class, 'self_get']);
        Route::post('store', [MaintenanceController::class, 'store']);
        Route::get('show/{maintenance}', [MaintenanceController::class, 'show']);
        // Route::post('update/{maintenance}', [MaintenanceController::class, 'update']);
        Route::post('destroy/{maintenance}', [MaintenanceController::class, 'destroy']);

        Route::prefix("/{maintenance}/history")->middleware('auth:api')->group(
            function () {
                Route::post('update/{pupdate}', [PUpdateController::class, 'update']);
                Route::post('show/{pupdate}', [PUpdateController::class, 'update']);
                Route::post('store', [PUpdateController::class, 'update']);
                Route::post('destroy/{pupdate}', [PUpdateController::class, 'update']);
            }
        );
    }
);
// change to cretae maintenance
// Route::prefix('v1/inspeksi')->middleware('auth:api')->group(
//     function () {
//         Route::post('store', [MaintenanceController::class, 'store']);
//         Route::post('update/{maintenance}', [MaintenanceController::class, 'update'])->middleware(['can:update-inspeksi']);
//     }
// );
Route::prefix('v1/inspeksi')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('getall', [InspeksiController::class, 'index']);
        // Route::post('store', [MaintenanceController::class, 'store'])->middleware(['can:store-inspeksi']);
        // Route::post('update/{maintenance}', [MaintenanceController::class, 'update'])->middleware(['can:update-inspeksi']);
    }
);

Route::prefix('v1/category')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::post('', [CategoryController::class, 'store']);
        Route::get('/{category}', [CategoryController::class, 'show']);
        Route::get('search', [CategoryController::class, 'search']);
        Route::put('{category}', [CategoryController::class, 'update']);
        Route::delete('{category}', [CategoryController::class, 'destroy']);
    }
);

Route::prefix('v1/location')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [LocationController::class, 'index']);
        Route::post('', [LocationController::class, 'store']);
        Route::get('{location}', [LocationController::class, 'show']);
        Route::put('{location}', [LocationController::class, 'update']);
        Route::delete('{location}', [LocationController::class, 'destroy']);
        Route::get('search', [LocationController::class, 'search']);
    }
);

Route::prefix('v1/satker')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [SatkerController::class, 'index']);
        Route::post('', [SatkerController::class, 'store']);
        Route::get('{satker}', [SatkerController::class, 'show']);
        Route::put('{satker}', [SatkerController::class, 'update']);
        Route::delete('{satker}', [SatkerController::class, 'destroy']);
    }
);

Route::prefix('v1/subsatker')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [SubsatkerController::class, 'index']);
        Route::post('', [SubsatkerController::class, 'store']);
        Route::get('{subsatker}', [SubsatkerController::class, 'show']);
        Route::put('{subsatker}', [SubsatkerController::class, 'update']);
        Route::delete('{subsatker}', [SubsatkerController::class, 'destroy']);
    }
);

// nunggu refisi
Route::prefix('v1/role')->middleware(['auth:api',])->group(
    function () {
        Route::get('', [RoleController::class, 'index']);
        Route::get('/{role}', [RoleController::class, 'show']);
        // Route::post('assign/{user}', [RoleController::class, 'assign']);
        Route::get('permissions', [RoleController::class, 'showPermissions']);
    }
);

Route::prefix('v1/status')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [StatusController::class, 'index']);
        Route::post('', [StatusController::class, 'store']);
        Route::get('{status}', [StatusController::class, 'show']);
        Route::put('{status}', [StatusController::class, 'update']);
        Route::delete('{status}', [StatusController::class, 'destroy']);
    }
);

Route::prefix('v1/news')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [NewsController::class, 'index']);
        Route::post('', [NewsController::class, 'store']);
        Route::get('{news}', [NewsController::class, 'show']);
        Route::put('{news}', [NewsController::class, 'update']);
        Route::delete('{news}', [NewsController::class, 'destroy']);
    }
);
