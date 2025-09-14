@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Mata Pelajaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.mapel.create') }}" class="btn btn-primary mb-3">+ Tambah Mata Pelajaran</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mapel as $m)
                <tr>
                    <td>{{ $m->id_mapel }}</td>
                    <td>{{ $m->nama_mapel }}</td>
                    <td>
                        <a href="{{ route('admin.mapel.show', $m->id_mapel) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.mapel.edit', $m->id_mapel) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.mapel.destroy', $m->id_mapel) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
