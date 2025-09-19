@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Welcome Section -->
    <div class="p-5 mb-5 rounded shadow-lg text-white text-center welcome-box">
        <h1 class="fw-bold display-5">Selamat Datang, {{ Auth::user()->name }} 👋</h1>
        <p class="lead">Kelola data kelas, siswa, mata pelajaran, dan nilai dengan mudah.</p>
    </div>

    <!-- Quick Access Cards -->
    <div class="row g-4">
        <!-- Data Kelas -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body text-center">
                    <i class="bi bi-building fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Data Kelas</h5>
                    <p class="text-muted small">Kelola daftar kelas yang tersedia.</p>
                </div>
            </div>
        </div>

        <!-- Data Siswa -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-1 text-success mb-3"></i>
                    <h5 class="fw-bold">Data Siswa</h5>
                    <p class="text-muted small">Kelola informasi siswa secara lengkap.</p>
                </div>
            </div>
        </div>

        <!-- Mata Pelajaran -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body text-center">
                    <i class="bi bi-journal-bookmark fs-1 text-warning mb-3"></i>
                    <h5 class="fw-bold">Mata Pelajaran</h5>
                    <p class="text-muted small">Atur mata pelajaran yang tersedia.</p>
                </div>
            </div>
        </div>

        <!-- Nilai -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 card-hover">
                <div class="card-body text-center">
                    <i class="bi bi-bar-chart-line fs-1 text-danger mb-3"></i>
                    <h5 class="fw-bold">Data Nilai</h5>
                    <p class="text-muted small">Lihat dan kelola nilai siswa.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .welcome-box {
        background: linear-gradient(135deg, #007bff, #6610f2);
    }
    .card-hover {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.15);
    }
</style>
@endsection
