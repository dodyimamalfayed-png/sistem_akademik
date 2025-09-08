@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Kelas</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $kelas->id_kelas }}</p>
            <p><strong>Nama Kelas:</strong> {{ $kelas->nama_kelas }}</p>
            <p><strong>Wali Kelas:</strong> {{ $kelas->waliKelas->name ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
