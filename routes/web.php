<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobExpectationController;
use App\Http\Controllers\KartuKuningController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\LPKController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RekomController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SkillLanguageController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserController;
use App\Models\Application;
use App\Models\Training;
use App\Models\User;
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
Route::get('/home', [HomeController::class, 'index']);
Route::get('/homepage', [HomeController::class, 'index']);

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login_admin', [AuthController::class, 'showFormLoginAdmin'])->name('login_admin');
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('login_admin', [AuthController::class, 'authenticate_admin'])->name('authenticate_admin');
Route::post('register', [AuthController::class, 'store'])->name('store');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/loker')->group(function () {
    Route::get('/', [LokerController::class, 'index']);
    Route::get('/detail/{id}', [LokerController::class, 'detail']);
});

Route::prefix('/lpk')->group(function () {
    Route::get('/daftar', [LPKController::class, 'daftar']);
    Route::get('/daftar/halaman_cetak', [LPKController::class, 'halaman_cetak']);
    Route::get('/daftar/cetak_pendaftaran/{id}', [LPKController::class, 'cetak_pendaftaran']);
    Route::post('/', [LPKController::class, 'store']);
});

Route::get('/info_pelatihan', [TrainingController::class, 'info_pelatihan']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard1', [DashboardController::class, 'dashboard1'])->name('dashboard1');
    Route::get('/dashboard2', [DashboardController::class, 'dashboard2'])->name('dashboard2');

    Route::prefix('/kartu_kuning')->group(function () {
        Route::get('/', [KartuKuningController::class, 'index']);
        Route::get('/create', [KartuKuningController::class, 'create']);
        Route::get('/edit/{id}', [KartuKuningController::class, 'edit']);
        Route::get('/edit_status/{id}', [KartuKuningController::class, 'edit_status']);
        Route::get('/detail/{id}', [KartuKuningController::class, 'detail']);
        Route::get('/cetak/{id}', [KartuKuningController::class, 'cetak']);
        Route::get('/cetak_permohonan/{id}', [KartuKuningController::class, 'cetak_permohonan']);
        Route::post('/', [KartuKuningController::class, 'store']);
        Route::post('/detail/approval/{id}', [KartuKuningController::class, 'approval']);
        Route::post('/detail/reject/{id}', [KartuKuningController::class, 'reject']);
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

    Route::prefix('/perusahaan')->group(function () {

        Route::get('/', [CompanyController::class, 'index']);
        Route::get('/create', [CompanyController::class, 'create']);
        Route::get('/edit/{id}', [CompanyController::class, 'edit']);
        Route::post('/', [CompanyController::class, 'store']);
        Route::patch('/{id}', [CompanyController::class, 'update']);
        Route::delete('/{id}', [CompanyController::class, 'destroy']);
    });

    Route::prefix('/application')->group(function () {

        Route::get('/', [ApplicationController::class, 'index']);
        Route::get('/apply/{id}', [ApplicationController::class, 'apply']);
        Route::get('/edit/{id}', [ApplicationController::class, 'edit']);
        Route::get('/detail/{id}', [ApplicationController::class, 'detail']);
        Route::get('/detail_pelamar/{id}', [ApplicationController::class, 'detail_pelamar']);
        Route::post('/', [ApplicationController::class, 'store']);
        Route::post('/detail/approval/{id}', [ApplicationController::class, 'approval']);
        Route::post('/detail/reject/{id}', [ApplicationController::class, 'reject']);
        Route::patch('/{id}', [ApplicationController::class, 'update']);
        Route::delete('/{id}', [ApplicationController::class, 'destroy']);
    });

    Route::prefix('/personal')->group(function () {

        Route::get('/create', [PersonalController::class, 'create']);
        Route::get('/edit/{id}', [PersonalController::class, 'edit']);
        Route::post('/', [PersonalController::class, 'store']);
        Route::post('/edit/{id}', [PersonalController::class, 'update']);
        Route::patch('/{id}', [PersonalController::class, 'update']);
    });

    Route::prefix('/education')->group(function () {

        Route::get('/create/{id}', [EducationController::class, 'create']);
        Route::get('/edit/{id}', [EducationController::class, 'edit']);
        Route::post('/', [EducationController::class, 'store']);
        Route::patch('/{id}', [EducationController::class, 'update']);
    });

    Route::prefix('/job_expectation')->group(function () {

        Route::get('/create/{id}', [JobExpectationController::class, 'create']);
        Route::get('/edit/{id}', [JobExpectationController::class, 'edit']);
        Route::post('/', [JobExpectationController::class, 'store']);
        Route::patch('/{id}', [JobExpectationController::class, 'update']);
    });

    Route::prefix('/experience')->group(function () {

        Route::get('/create/{id}', [ExperienceController::class, 'create']);
        Route::get('/edit/{id}', [ExperienceController::class, 'edit']);
        Route::post('/', [ExperienceController::class, 'store']);
        Route::patch('/{id}', [ExperienceController::class, 'update']);
    });

    Route::prefix('/skill_language')->group(function () {

        Route::get('/create/{id}', [SkillLanguageController::class, 'create']);
        Route::get('/edit/{id}', [SkillLanguageController::class, 'edit']);
        Route::post('/', [SkillLanguageController::class, 'store']);
        Route::patch('/{id}', [SkillLanguageController::class, 'update']);
    });

    Route::prefix('/upload_file')->group(function () {

        Route::get('/create/{id}', [UploadFileController::class, 'create']);
        Route::get('/edit/{id}', [UploadFileController::class, 'edit']);
        Route::post('/', [UploadFileController::class, 'store']);
        Route::patch('/{id}', [UploadFileController::class, 'update']);
    });


    Route::prefix('/user')->group(function () {

        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::get('/detail/{id}', [UserController::class, 'detail']);
        Route::patch('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::prefix('/rekom_passport')->group(function () {

        Route::get('/', [RekomController::class, 'index']);
        Route::get('/admin', [RekomController::class, 'index_admin']);
        Route::get('/create', [RekomController::class, 'create']);
        Route::post('/', [RekomController::class, 'store']);
        Route::get('/edit/{id}', [RekomController::class, 'edit']);
        Route::get('/detail/{id}', [RekomController::class, 'detail']);
        Route::post('/detail/approval/{id}', [RekomController::class, 'approval']);
        Route::post('/detail/reject/{id}', [RekomController::class, 'reject']);
        Route::patch('/{id}', [RekomController::class, 'update']);
        Route::delete('/{id}', [RekomController::class, 'destroy']);
    });

    Route::prefix('/lpk')->group(function () {
        Route::get('/', [LPKController::class, 'index']);
        Route::get('/detail/{id}', [LPKController::class, 'detail']);
        Route::post('/detail/approval/{id}', [LPKController::class, 'approval']);
        Route::post('/detail/reject/{id}', [LPKController::class, 'reject']);
    });

    Route::prefix('/training')->group(function () {

        Route::get('/', [TrainingController::class, 'index']);
        Route::get('/create/{id}', [TrainingController::class, 'create']);
        Route::post('/', [TrainingController::class, 'store']);
        Route::get('/edit/{id}', [TrainingController::class, 'edit']);
        Route::get('/detail/{id}', [TrainingController::class, 'detail']);
        Route::get('/detail_pelatihan/{id}', [TrainingController::class, 'detail_pelatihan']);
        Route::post('/detail/approval/{id}', [TrainingController::class, 'approval']);
        Route::post('/detail/reject/{id}', [TrainingController::class, 'reject']);
        Route::patch('/{id}', [TrainingController::class, 'update']);
        Route::delete('/{id}', [TrainingController::class, 'destroy']);
    });

    Route::prefix('/notification')->group(function () {
        Route::get('/{id}', [NotificationController::class, 'edit_status']);
    });

    Route::get('/notif_ak1', [NotificationController::class, 'notif_ak1']);
    Route::get('/notif_rekom', [NotificationController::class, 'notif_rekom']);

    Route::prefix('/report')->group(function () {

        Route::get('/', [ReportController::class, 'index']);
        Route::get('/create/{id}', [ReportController::class, 'create']);
        Route::post('/', [ReportController::class, 'store']);
        Route::get('/edit/{id}', [ReportController::class, 'edit']);
        Route::get('/detail/{id}', [ReportController::class, 'detail']);
        Route::get('/detail_pelatihan/{id}', [ReportController::class, 'detail_pelatihan']);
        Route::post('/detail/approval/{id}', [ReportController::class, 'approval']);
        Route::post('/detail/reject/{id}', [ReportController::class, 'reject']);
        Route::patch('/{id}', [ReportController::class, 'update']);
        Route::delete('/{id}', [ReportController::class, 'destroy']);
    });
});
