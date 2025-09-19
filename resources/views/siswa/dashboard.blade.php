@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="container py-4">
    <!-- Judul -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-speedometer2"></i> Dashboard Siswa
        </h1>
        <p class="text-muted">Pantau nilai Anda dengan mudah dan cepat 🎯</p>
    </div>

    <!-- Card Selamat Datang -->
    <div class="card shadow-lg border-0 mb-4">
        <div class="card-body p-4 bg-gradient bg-primary text-white rounded-3">
            <h4 class="mb-2">👋 Selamat datang, <b>{{ Auth::user()->name }}</b></h4>
            <p class="mb-0">Semoga hari Anda menyenangkan! Berikut adalah daftar nilai Anda:</p>
        </div>
    </div>

    <!-- Daftar Nilai -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white d-flex align-items-center">
            <h5 class="mb-0"><i class="bi bi-bar-chart-fill"></i> Nilai Mata Pelajaran</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Mata Pelajaran</th>
                            <th style="width: 120px;">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilai as $i => $n)
                            <tr class="table-row-hover">
                                <td class="fw-bold">{{ $i+1 }}</td>
                                <td class="text-start">{{ $n->mapel->nama_mapel ?? '-' }}</td>
                                <td>
                                    <span class="badge px-3 py-2 fs-6
                                        @if($n->nilai >= 80) bg-success 
                                        @elseif($n->nilai >= 60) bg-warning text-dark 
                                        @else bg-danger @endif">
                                        {{ $n->nilai }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    📭 Belum ada nilai yang tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Efek hover pada baris tabel */
    .table-row-hover:hover {
        background-color: #f1f5ff;
        transition: 0.3s;
    }
</style>
@endsection
