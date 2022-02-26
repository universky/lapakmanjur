<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KartuKuningController;
use App\Http\Controllers\LokerController;
use Illuminate\Support\Facades\Route;

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

// //RouteAuth
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/loker', [LokerController::class, 'index']);
Route::get('/loker/detail/{id}', [LokerController::class, 'detail']);

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard1', [DashboardController::class, 'dashboard1'])->name('dashboard1');
    Route::get('/dashboard2', [DashboardController::class, 'dashboard2'])->name('dashboard2');

    Route::prefix('/kartu_kuning')->group(function () {
        Route::get('/', [KartuKuningController::class, 'index']);
        Route::get('/create', [KartuKuningController::class, 'create']);
        Route::get('/edit/{id}', [KartuKuningController::class, 'edit']);
        Route::post('/', [KartuKuningController::class, 'store']);
        Route::patch('/{id}', [KartuKuningController::class, 'update']);
        Route::delete('/{id}', [KartuKuningController::class, 'destroy']);
    });

    Route::prefix('/loker')->group(function () {

        Route::get('/create', [LokerController::class, 'create']);
        Route::get('/edit/{id}', [LokerController::class, 'edit']);
        Route::post('/', [LokerController::class, 'store']);
        Route::patch('/{id}', [LokerController::class, 'update']);
        Route::delete('/{id}', [LokerController::class, 'destroy']);
    });
});
