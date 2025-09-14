@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Kelas</h1>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="card-title">{{ $kelas->nama_kelas }}</h5>
            <p><strong>Wali Kelas:</strong> {{ $kelas->wali_kelas_id }}</p>

            {{-- jika kamu punya relasi siswa --}}
            @if($kelas->siswa && $kelas->siswa->count() > 0)
                <hr>
                <h6>Daftar Siswa:</h6>
                <ul>
                    @foreach($kelas->siswa as $s)
                        <li>{{ $s->nama_siswa }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Belum ada siswa di kelas ini.</p>
            @endif
        </div>
    </div>

    <div class="mt-3 d-flex gap-2">
        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        {{-- tombol edit kelas --}}
        <a href="{{ route('admin.kelas.edit', $kelas) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>

        {{-- tombol hapus kelas --}}
        <form action="{{ route('admin.kelas.destroy', $kelas) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i> Hapus
            </button>
        </form>
    </div>
</div>
@endsection
