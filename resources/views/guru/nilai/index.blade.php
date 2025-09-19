@extends('layouts.guru')

@section('title', 'Data Nilai')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Nilai</h1>
    <a href="{{ route('guru.nilai.create') }}" class="btn btn-primary mb-3">Tambah Nilai</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Nilai</th>
                <th>Siswa</th>
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
                     {{-- Route resource otomatis pakai parameter model/ID --}}
                    <a href="{{ route('guru.nilai.show', $n) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('guru.nilai.edit', $n) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('guru.nilai.destroy', $n) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada data nilai</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
