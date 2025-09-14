@extends('layouts.admin')

@section('title', 'Detail Nilai')

@section('content')
<div class="container mt-4">
    <h2>Detail Nilai</h2>

    <ul class="list-group">
        <li class="list-group-item"><b>Nama Siswa:</b> {{ $nilai->siswa->nama_siswa ?? '-' }}</li>
        <li class="list-group-item"><b>Mata Pelajaran:</b> {{ $nilai->mapel->nama_mapel ?? '-' }}</li>
        <li class="list-group-item"><b>Nilai:</b> {{ $nilai->nilai }}</li>
    </ul>

    <a href="{{ route('admin.nilai.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
