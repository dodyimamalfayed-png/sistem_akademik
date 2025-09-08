@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kelas</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
        </div>

        <div class="mb-3">
            <label for="wali_kelas_id" class="form-label">Wali Kelas (User ID)</label>
            <input type="number" name="wali_kelas_id" id="wali_kelas_id" class="form-control" value="{{ old('wali_kelas_id', $kelas->wali_kelas_id) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
