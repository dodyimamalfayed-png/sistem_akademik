@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Siswa</h1>

    <!-- Card Selamat Datang -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body bg-light">
            <h5 class="mb-2">👋 Selamat datang, <b>{{ Auth::user()->name }}</b></h5>
            <p class="mb-0">Berikut adalah daftar nilai Anda:</p>
        </div>
    </div>

    <!-- Daftar Nilai -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">📊 Nilai Mata Pelajaran</h5>
        </div>
        <div class="card-body d-flex justify-content-center">
            <div class="table-responsive" style="max-width: 600px;">
                <table class="table table-hover table-bordered mb-0 text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Mata Pelajaran</th>
                            <th style="width: 120px;">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilai as $i => $n)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td class="text-start">{{ $n->mapel->nama_mapel ?? '-' }}</td>
                                <td>
                                    <span class="badge 
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
                                    Belum ada nilai yang tersedia 📭
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
