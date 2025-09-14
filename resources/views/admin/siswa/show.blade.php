@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Siswa</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $siswa->id }}</td>
        </tr>
        <tr>
            <th>NIS</th>
            <td>{{ $siswa->nis }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $siswa->nama_siswa }}</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
