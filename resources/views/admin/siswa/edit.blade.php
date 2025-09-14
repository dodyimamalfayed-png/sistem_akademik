@extends('layouts.admin')

@section('title', 'Edit Siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Siswa</h1>

    <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" 
                   id="nis" 
                   name="nis" 
                   value="{{ old('nis', $siswa->nis) }}" 
                   class="form-control @error('nis') is-invalid @enderror" 
                   required>
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama Siswa</label>
            <input type="text" 
                   id="nama_siswa" 
                   name="nama_siswa" 
                   value="{{ old('nama_siswa', $siswa->nama_siswa) }}" 
                   class="form-control @error('nama_siswa') is-invalid @enderror" 
                   required>
            @error('nama_siswa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kelas" class="form-label">Kelas</label>
            <select id="id_kelas" 
                    name="id_kelas" 
                    class="form-control @error('id_kelas') is-invalid @enderror" 
                    required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id_kelas }}" 
                        {{ old('id_kelas', $siswa->id_kelas) == $k->id_kelas ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('id_kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
