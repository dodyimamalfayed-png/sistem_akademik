@extends('layouts.admin')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Siswa</h1>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.siswa.store') }}" method="POST">
                @csrf

                <!-- NIS -->
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" id="nis" 
                           class="form-control @error('nis') is-invalid @enderror"
                           value="{{ old('nis') }}" required>
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" 
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pilih Kelas -->
                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas</label>
                    <select name="id_kelas" id="id_kelas" 
                            class="form-select @error('id_kelas') is-invalid @enderror" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}" {{ old('id_kelas') == $k->id_kelas ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pilih User -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">Akun User</label>
                    <select name="user_id" id="user_id" 
                            class="form-select @error('user_id') is-invalid @enderror" required>
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                                {{ $u->name }} ({{ $u->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection