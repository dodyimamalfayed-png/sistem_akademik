@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Mata Pelajaran</h2>

    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
