<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('Dashboard.index');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa');
});

Route::get('/dosen', function () {
    return view('dosen');
});

// Routes Mahasiswa

Route::resource('mahasiswa', MahasiswaController::class);

// Routes Dosen

Route::resource('dosen', DosenController::class);

// Routes Dashbard

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');