<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
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
    }
);
