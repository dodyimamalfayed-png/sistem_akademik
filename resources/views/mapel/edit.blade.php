@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Mata Pelajaran</h2>

    <form action="{{ route('mapel.update', $mapel->id_mapel) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control" value="{{ $mapel->nama_mapel }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
