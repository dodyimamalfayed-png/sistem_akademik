@extends('layouts.guru')

@section('title', 'Detail Nilai')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Nilai</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Siswa:</strong> {{ $nilai->siswa->nama_siswa ?? '-' }}</p>
            <p><strong>Mata Pelajaran:</strong> {{ $nilai->mapel->nama_mapel ?? '-' }}</p>
            <p><strong>Nilai:</strong> {{ $nilai->nilai }}</p>
        </div>
    </div>

    <a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection