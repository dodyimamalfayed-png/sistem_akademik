<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;

// ================== LOGIN ==================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// routes/web.php

// ================== ADMIN ==================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // tahan nama parameter agar konsisten: admin/kelas/{kelas}, admin/mapel/{mapel}, dst.
        Route::resource('kelas', KelasController::class)
            ->parameters(['kelas' => 'kelas']);
        Route::resource('mapel', MataPelajaranController::class)
            ->parameters(['mapel' => 'mapel']);
        Route::resource('siswa', SiswaController::class)
            ->parameters(['siswa' => 'siswa']);
        Route::resource('nilai', NilaiController::class)
            ->parameters(['nilai' => 'nilai']);
    });


// ================== GURU ==================
Route::middleware(['auth', 'role:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        
        Route::get('/dashboard', fn() => view('guru.dashboard'))->name('dashboard');

        // Resource nilai lengkap untuk guru
        Route::resource('nilai', NilaiController::class)->parameters([
            'nilai' => 'nilai' // pakai model Nilai dengan key id_nilai
        ]);
    });


// ================== SISWA ==================
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [NilaiController::class, 'nilaiSiswa'])->name('dashboard');
});

