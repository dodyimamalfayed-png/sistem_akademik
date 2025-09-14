@extends('layouts.guru')

@section('title', 'Tambah Nilai')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Nilai</h1>

    <form action="{{ route('guru.nilai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_siswa" class="form-label">Siswa</label>
            <select name="id_siswa" id="id_siswa" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswa as $s)
                    <option value="{{ $s->id_siswa }}">{{ $s->nama_siswa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_mapel" class="form-label">Mata Pelajaran</label>
            <select name="id_mapel" id="id_mapel" class="form-control" required>
                <option value="">-- Pilih Mapel --</option>
                @foreach($mapel as $m)
                    <option value="{{ $m->id_mapel }}">{{ $m->nama_mapel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
