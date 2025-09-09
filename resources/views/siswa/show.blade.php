@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Detail Siswa</h2>

    <ul class="list-group">
        <li class="list-group-item"><b>ID:</b> {{ $siswa->id_siswa }}</li>
        <li class="list-group-item"><b>NIS:</b> {{ $siswa->nis }}</li>
        <li class="list-group-item"><b>Nama Siswa:</b> {{ $siswa->nama_siswa }}</li>
        <li class="list-group-item"><b>Kelas:</b> {{ $siswa->kelas->nama_kelas }}</li>
    </ul>

    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
