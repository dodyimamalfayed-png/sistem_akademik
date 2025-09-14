@extends('layouts.admin')

@section('title', 'Tambah Kelas')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Kelas</h1>

    <form action="{{ route('admin.kelas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas" 
                   class="form-control @error('nama_kelas') is-invalid @enderror" 
                   value="{{ old('nama_kelas') }}" required>
            @error('nama_kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="wali_kelas_id" class="form-label">Wali Kelas (User)</label>
            <input type="number" name="wali_kelas_id" id="wali_kelas_id" 
                   class="form-control @error('wali_kelas_id') is-invalid @enderror" 
                   value="{{ old('wali_kelas_id') }}">
            @error('wali_kelas_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Isi dengan ID user guru yang menjadi wali kelas</small>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
