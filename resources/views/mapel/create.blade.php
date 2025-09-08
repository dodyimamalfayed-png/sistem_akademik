@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Mata Pelajaran</h2>

    <form action="{{ route('mata_pelajaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" name="nama_mapel" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mata_pelajaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
