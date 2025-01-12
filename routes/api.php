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
use App\Http\Controllers\API\UrgencyController;
use App\Http\Controllers\API\UserController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::prefix('v1/client')->middleware('role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [ClientController::class, 'index']);
        Route::get('{client}', [ClientController::class, 'show']);
        Route::post('', [ClientController::class, 'store']);
        Route::delete('{client}', [ClientController::class, 'delete']);
    }
);
Route::prefix('v1/user')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [UserController::class, 'index']);
        Route::get('search', [UserController::class, 'search']);
        Route::get('{user}', [UserController::class, 'show']);
        Route::post('', [UserController::class, 'store']);
        Route::put('{user}', [UserController::class, 'update']);
        Route::delete('{user}', [UserController::class, 'destroy']);
    }
);

Route::prefix('v1/asset')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [AssetController::class, 'index']);
        Route::get('search', [AssetController::class, 'search']);
        Route::get('deleted', [AssetController::class, 'getdeletedrecords']);
        Route::get('{asset}', [AssetController::class, 'show']);
        Route::post('', [AssetController::class, 'store']);
        Route::put('{asset}', [AssetController::class, 'update']);
        Route::delete('{asset}', [AssetController::class, 'destroy']);
        Route::post('restore/{asset}', [AssetController::class, 'restore']);
    }
);

Route::prefix('v1/maintenance')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin|Maintenance')->group(
    function () {
        Route::get('', [MaintenanceController::class, 'index']);
        Route::get('self', [MaintenanceController::class, 'self_get']);
        Route::post('', [MaintenanceController::class, 'store']);
        Route::get('{maintenance}', [MaintenanceController::class, 'show']);
        Route::post('{maintenance}', [MaintenanceController::class, 'update']); //error ValidateRequest when use put
        Route::delete('{maintenance}', [MaintenanceController::class, 'destroy']);
        Route::post('maintenance_aplly/{maintenance}', [MaintenanceController::class, 'maintenance_aplly']);
        Route::post('cancle_maintenance_aplly/{maintenance}', [MaintenanceController::class, 'cancle_maintenance_apply']);


        Route::prefix("{maintenance}/tracker")->group(
            function () {
                Route::get('', [PUpdateController::class, 'track']);
                Route::post('', [PUpdateController::class, 'store']);
                Route::delete('{pupdate}', [PUpdateController::class, 'destroy']);
                Route::post('{pupdate}', [PUpdateController::class, 'update']);
            }
        );
    }
);
Route::get('v1/tracker/explore', [PUpdateController::class, 'explore'])->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin|Maintenance');

// change to cretae maintenance //cancle ❌
// Route::prefix('v1/inspeksi')->middleware('auth:api')->group(
//     function () {
//         Route::post('store', [MaintenanceController::class, 'store']);
//         Route::post('update/{maintenance}', [MaintenanceController::class, 'update'])->middleware(['can:update-inspeksi']);
//     }
// );
Route::prefix('v1/inspeksi')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin|Inspeksi')->group(
    function () {
        Route::get('', [InspeksiController::class, 'index']);
        Route::post('', [InspeksiController::class, 'store']);
        Route::get('{inspeksi}', [InspeksiController::class, 'show']);
        Route::post('{inspeksi}', [InspeksiController::class, 'update']);
        Route::delete('{inspeksi}', [InspeksiController::class, 'destroy']);
    }
);

Route::prefix('v1/category')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::post('', [CategoryController::class, 'store']);
        Route::get('{category}', [CategoryController::class, 'show']);
        Route::post('search', [CategoryController::class, 'search']);
        Route::put('{category}', [CategoryController::class, 'update']);
        Route::delete('{category}', [CategoryController::class, 'destroy']);
    }
);

Route::prefix('v1/location')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [LocationController::class, 'index']);
        Route::post('', [LocationController::class, 'store']);
        Route::get('{location}', [LocationController::class, 'show']);
        Route::put('{location}', [LocationController::class, 'update']);
        Route::delete('{location}', [LocationController::class, 'destroy']);
        // Route::get('search', [LocationController::class, 'search']);
    }
);

Route::prefix('v1/satker')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [SatkerController::class, 'index']);
        Route::post('', [SatkerController::class, 'store']);
        Route::get('{satker}', [SatkerController::class, 'show']);
        Route::put('{satker}', [SatkerController::class, 'update']);
        Route::delete('{satker}', [SatkerController::class, 'destroy']);
    }
);

Route::prefix('v1/subsatker')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [SubsatkerController::class, 'index']);
        Route::post('', [SubsatkerController::class, 'store']);
        Route::get('{subsatker}', [SubsatkerController::class, 'show']);
        Route::put('{subsatker}', [SubsatkerController::class, 'update']);
        Route::delete('{subsatker}', [SubsatkerController::class, 'destroy']);
    }
);
// done
Route::prefix('v1/role')->middleware('jwt.auth', 'api.key', 'role:SuperAdmin|Admin')->group(function () {
    Route::get('', [RoleController::class, 'index']);
    Route::post('', [RoleController::class, 'show']);
    Route::post('assign', [RoleController::class, 'assignrole']);
    Route::post('revoke', [RoleController::class, 'revokerole']);
    Route::get('permissions', [RoleController::class, 'showp']);
    Route::get('{role}', [RoleController::class, 'show']);
});

Route::prefix('v1/status')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [StatusController::class, 'index']);
        Route::post('', [StatusController::class, 'store']);
        Route::get('{status}', [StatusController::class, 'show']);
        Route::put('{status}', [StatusController::class, 'update']);
        Route::delete('{status}', [StatusController::class, 'destroy']);
    }
);
Route::prefix('v1/urgencylevel')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [UrgencyController::class, 'index']);
        Route::post('', [UrgencyController::class, 'store']);
        Route::put('{urgency}', [UrgencyController::class, 'update']);
        Route::delete('{urgency}', [UrgencyController::class, 'destroy']);
    }
);

Route::prefix('v1/news')->middleware('auth:api', 'api.key', 'role:SuperAdmin|Admin')->group(
    function () {
        Route::get('', [NewsController::class, 'index']);
        Route::post('', [NewsController::class, 'store']);
        Route::get('{news}', [NewsController::class, 'show']);
        Route::put('{news}', [NewsController::class, 'update']);
        Route::delete('{news}', [NewsController::class, 'destroy']);
    }
);
