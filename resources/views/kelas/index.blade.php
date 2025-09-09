@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Kelas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">+ Tambah Kelas</a>

    <table class="table table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
                <tr>
                    <td>{{ $k->id_kelas }}</td>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->waliKelas->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('kelas.show', $k->id_kelas) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('kelas.edit', $k->id_kelas) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->id_kelas) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
