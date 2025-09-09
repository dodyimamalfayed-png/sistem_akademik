@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Kelas</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ old('nama_kelas') }}" required>
        </div>

        <div class="mb-3">
            <label for="wali_kelas_id" class="form-label">Wali Kelas (User ID)</label>
            <input type="number" name="wali_kelas_id" id="wali_kelas_id" class="form-control" value="{{ old('wali_kelas_id') }}">
            <small class="text-muted">Kosongkan jika belum ada wali kelas</small>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
