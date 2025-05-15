<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('dashboard');
});

// Routes Mahasiswa

Route::resource('mahasiswa', MahasiswaController::class);

// Routes Staff
Route::resource('staff', StaffController::class);

// Routes Dashbard

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Routes Jurusan
Route::resource('jurusan', JurusanController::class);

// Routes Prodi

Route::resource('prodi', ProdiController::class);

// Routes PEngajuan

Route::resource('pengajuan', PengajuanController::class);