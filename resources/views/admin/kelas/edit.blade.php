@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Kelas</h1>

    <form action="{{ route('admin.kelas.update', $kelas->id_kelas) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
        </div>
        <div class="mb-3">
            <label for="wali_kelas_id" class="form-label">Wali Kelas</label>
            <input type="text" name="wali_kelas_id" class="form-control" value="{{ old('wali_kelas_id', $kelas->wali_kelas_id) }}">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Update
        </button>
        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
