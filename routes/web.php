<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('dashboard.admin'))
        ->name('admin.dashboard');
});

// Guru
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', fn() => view('dashboard.guru'))
        ->name('guru.dashboard');
});

// Siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', fn() => view('dashboard.siswa'))
        ->name('siswa.dashboard');
});



Route::resource('kelas', KelasController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('mapel', MataPelajaranController::class);
Route::resource('nilai', NilaiController::class);

Route::get('/', function () {
    return view('welcome');
});
