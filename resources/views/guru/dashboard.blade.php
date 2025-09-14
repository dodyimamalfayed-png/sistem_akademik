@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Selamat Datang, {{ Auth::user()->name }}</h1>
        <p class="lead text-muted">Anda login sebagai <strong>Guru</strong></p>
    </div>

    <div class="row g-4">
        <!-- Kelola Nilai -->
        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-journal-check fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Kelola Nilai</h5>
                    <p class="card-text">Input dan kelola nilai siswa yang Anda ajar.</p>
                    <a href="{{ route('guru.nilai.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-right-circle"></i> Lihat Nilai
                    </a>
                </div>
            </div>
        </div>

        <!-- Profil Guru -->
        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-person-badge fs-1 text-success mb-3"></i>
                    <h5 class="card-title">Profil Guru</h5>
                    <p class="card-text">Lihat dan kelola data pribadi Anda.</p>
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-person-lines-fill"></i> Lihat Profil
                    </a>
                </div>
            </div>
        </div>

        <!-- Wali Kelas -->
        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-1 text-warning mb-3"></i>
                    <h5 class="card-title">Wali Kelas</h5>
                    <p class="card-text">Kelola siswa dalam kelas Anda.</p>
                    <a href="#" class="btn btn-warning text-white">
                        <i class="bi bi-clipboard-check"></i> Kelola Kelas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
