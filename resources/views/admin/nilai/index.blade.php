@extends('layouts.admin')

@section('title', 'Daftar Nilai')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Nilai</h1>

    <a href="{{ route('admin.nilai.create') }}" class="btn btn-primary mb-3">Tambah Nilai</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nilai as $n)
                <tr>
                    <td>{{ $n->id_nilai }}</td>
                    <td>{{ $n->siswa->nama_siswa ?? '-' }}</td>
                    <td>{{ $n->mapel->nama_mapel ?? '-' }}</td>
                    <td>{{ $n->nilai }}</td>
                    <td>
                        <a href="{{ route('admin.nilai.show', $n->id_nilai) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.nilai.edit', $n->id_nilai) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.nilai.destroy', $n->id_nilai) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus nilai ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data nilai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
