@extends('layouts.guru')

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5 text-gradient">👋 Selamat Datang, {{ Auth::user()->name }}</h1>
        <p class="lead text-muted">Anda login sebagai <span class="fw-semibold text-primary">Guru</span></p>
    </div>

    <!-- Dashboard Cards -->
    <div class="row g-4">
        <!-- Kelola Nilai -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-wrapper bg-primary bg-opacity-10 text-primary mx-auto mb-3">
                        <i class="bi bi-journal-check fs-1"></i>
                    </div>
                    <h5 class="card-title fw-bold">Kelola Nilai</h5>
                    <p class="card-text text-muted">Input dan kelola nilai siswa yang Anda ajar.</p>
                    <a href="{{ route('guru.nilai.index') }}" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-arrow-right-circle"></i> Lihat Nilai
                    </a>
                </div>
            </div>
        </div>

        <!-- Profil Guru -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-wrapper bg-success bg-opacity-10 text-success mx-auto mb-3">
                        <i class="bi bi-person-badge fs-1"></i>
                    </div>
                    <h5 class="card-title fw-bold">Profil Guru</h5>
                    <p class="card-text text-muted">Lihat dan kelola data pribadi Anda.</p>
                    <a href="#" class="btn btn-success rounded-pill px-4">
                        <i class="bi bi-person-lines-fill"></i> Lihat Profil
                    </a>
                </div>
            </div>
        </div>

        <!-- Wali Kelas -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 card-hover">
                <div class="card-body text-center">
                    <div class="icon-wrapper bg-warning bg-opacity-10 text-warning mx-auto mb-3">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                    <h5 class="card-title fw-bold">Wali Kelas</h5>
                    <p class="card-text text-muted">Kelola siswa dalam kelas Anda.</p>
                    <a href="#" class="btn btn-warning text-white rounded-pill px-4">
                        <i class="bi bi-clipboard-check"></i> Kelola Kelas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Style -->
<style>
    .text-gradient {
        background: linear-gradient(45deg, #007bff, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .icon-wrapper {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 2rem;
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
