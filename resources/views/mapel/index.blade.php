@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Mata Pelajaran</h2>
    <a href="{{ route('mapel.create') }}" class="btn btn-primary mb-3">Tambah Mata Pelajaran</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataPelajaran as $mapel)
            <tr>
                <td>{{ $mapel->id_mapel }}</td>
                <td>{{ $mapel->nama_mapel }}</td>
                <td>
                    <a href="{{ route('mapel.show', $mapel->id_mapel) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('mapel.edit', $mapel->id_mapel) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('mapel.destroy', $mapel->id_mapel) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
