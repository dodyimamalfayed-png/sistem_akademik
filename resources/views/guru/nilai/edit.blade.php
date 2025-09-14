@extends('layouts.guru')

@section('title', 'Edit Nilai')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Nilai</h1>

    <form action="{{ route('guru.nilai.update', $nilai->id_nilai) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_siswa" class="form-label">Siswa</label>
            <select name="id_siswa" id="id_siswa" class="form-control">
                @foreach($siswa as $s)
                    <option value="{{ $s->id_siswa }}" 
                        {{ $nilai->id_siswa == $s->id_siswa ? 'selected' : '' }}>
                        {{ $s->nama_siswa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_mapel" class="form-label">Mata Pelajaran</label>
            <select name="id_mapel" id="id_mapel" class="form-control">
                @foreach($mapel as $m)
                    <option value="{{ $m->id_mapel }}" 
                        {{ $nilai->id_mapel == $m->id_mapel ? 'selected' : '' }}>
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control" 
                   value="{{ old('nilai', $nilai->nilai) }}" min="0" max="100">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection