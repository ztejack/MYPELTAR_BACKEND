<?php

use App\Http\Controllers\API\AssetController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\ClientController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DivisiController;
use App\Http\Controllers\API\InspeksiController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SatkerController;
use App\Http\Controllers\API\StatusController;
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
        Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
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
Route::prefix('v1/user')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [UserController::class, 'index']);
        Route::get('search', [UserController::class, 'search']);
        Route::get('{user}', [UserController::class, 'show']);
        Route::post('', [UserController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::put('{user}', [UserController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{user}', [UserController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
        Route::post('resetpassword/{user}', [UserController::class, 'reset_password'])->middleware('role:SuperAdmin|Admin');
    }
);

Route::prefix('v1/asset')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [AssetController::class, 'index']);
        Route::get('search', [AssetController::class, 'search']);
        Route::get('deleted', [AssetController::class, 'getdeletedrecords'])->middleware('role:SuperAdmin|Admin');;
        Route::get('{asset}', [AssetController::class, 'show']);
        Route::post('', [AssetController::class, 'store'])->middleware('role:SuperAdmin|Admin');;
        Route::put('{asset}', [AssetController::class, 'update'])->middleware('role:SuperAdmin|Admin');;
        Route::delete('{asset}', [AssetController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');;
        Route::post('restore/{asset}', [AssetController::class, 'restore'])->middleware('role:SuperAdmin|Admin');;
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
        Route::post('cancel_maintenance_aplly/{maintenance}', [MaintenanceController::class, 'cancel_maintenance_apply']);


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
Route::prefix('v1/inspeksi')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [InspeksiController::class, 'index']);
        Route::post('', [InspeksiController::class, 'store'])->middleware('role:SuperAdmin|Admin|Inspeksi');
        Route::get('{inspeksi}', [InspeksiController::class, 'show']);
        Route::post('{inspeksi}', [InspeksiController::class, 'update'])->middleware('role:SuperAdmin|Admin|Inspeksi');
        Route::delete('{inspeksi}', [InspeksiController::class, 'destroy'])->middleware('role:SuperAdmin|Admin|Inspeksi');
    }
);

Route::prefix('v1/category')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::post('', [CategoryController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::get('{category}', [CategoryController::class, 'show']);
        Route::post('search', [CategoryController::class, 'search']);
        Route::put('{category}', [CategoryController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{category}', [CategoryController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
    }
);

Route::prefix('v1/location')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [LocationController::class, 'index']);
        Route::post('', [LocationController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::get('{location}', [LocationController::class, 'show']);
        Route::put('{location}', [LocationController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{location}', [LocationController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
        // Route::get('search', [LocationController::class, 'search']);
    }
);

Route::prefix('v1/satker')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [SatkerController::class, 'index']);
        Route::post('', [SatkerController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::get('{satker}', [SatkerController::class, 'show']);
        Route::put('{satker}', [SatkerController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{satker}', [SatkerController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
    }
);

Route::prefix('v1/divisi')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [DivisiController::class, 'index']);
        Route::post('', [DivisiController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::get('{divisi}', [DivisiController::class, 'show']);
        Route::put('{divisi}', [DivisiController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{divisi}', [DivisiController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
    }
);
// done
Route::prefix('v1/role')->middleware('auth:api', 'api.key')->group(function () {
    Route::get('', [RoleController::class, 'index']);
    Route::post('', [RoleController::class, 'show']);
    Route::post('assign', [RoleController::class, 'assignrole'])->middleware('role:SuperAdmin|Admin');
    Route::post('revoke', [RoleController::class, 'revokerole'])->middleware('role:SuperAdmin|Admin');
    Route::get('permissions', [RoleController::class, 'showpermissions'])->middleware('role:SuperAdmin|Admin');
    Route::get('{role}', [RoleController::class, 'show']);
});

Route::prefix('v1/status')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [StatusController::class, 'index']);
        Route::post('', [StatusController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::get('{status}', [StatusController::class, 'show']);
        Route::put('{status}', [StatusController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{status}', [StatusController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
    }
);
Route::prefix('v1/urgencylevel')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [UrgencyController::class, 'index']);
        Route::post('', [UrgencyController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::put('{urgency}', [UrgencyController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{urgency}', [UrgencyController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
    }
);

Route::prefix('v1/news')->middleware('auth:api', 'api.key')->group(
    function () {
        Route::get('', [NewsController::class, 'index']);
        Route::post('', [NewsController::class, 'store'])->middleware('role:SuperAdmin|Admin');
        Route::get('{news}', [NewsController::class, 'show']);
        Route::put('{news}', [NewsController::class, 'update'])->middleware('role:SuperAdmin|Admin');
        Route::delete('{news}', [NewsController::class, 'destroy'])->middleware('role:SuperAdmin|Admin');
    }
);
