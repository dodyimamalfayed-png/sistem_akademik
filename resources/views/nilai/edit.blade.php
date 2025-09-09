@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Nilai</h2>

    <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_siswa" class="form-label">Siswa</label>
            <select name="id_siswa" class="form-control" required>
                @foreach($siswa as $s)
                    <option value="{{ $s->id_siswa }}" {{ $nilai->id_siswa == $s->id_siswa ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_mapel" class="form-label">Mata Pelajaran</label>
            <select name="id_mapel" class="form-control" required>
                @foreach($mapel as $m)
                    <option value="{{ $m->id_mapel }}" {{ $nilai->id_mapel == $m->id_mapel ? 'selected' : '' }}>
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" name="nilai" class="form-control" value="{{ $nilai->nilai }}" min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
