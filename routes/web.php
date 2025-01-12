<?php

use App\Http\Controllers\WEB\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('auth.login_view');
});

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('log', [AuthController::class, 'login_view'])->name('login_view')->middleware('permission:getall-users');
});
//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/images/{folder}/{filename}', function ($folder, $filename) {
    $path = "images/{$folder}/{$filename}";

    if (!Storage::disk('public')->exists($path)) {
        abort(404, "Image not found.");
    }

    return response()->file(storage_path("app/public/{$path}"));
});
