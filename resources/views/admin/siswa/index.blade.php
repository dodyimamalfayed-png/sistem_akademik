@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Siswa</h1>

    <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
                <tr>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama_siswa }}</td>
                    <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.siswa.show', $s->id_siswa) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.siswa.edit', $s->id_siswa) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.siswa.destroy', $s->id_siswa) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus siswa ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
