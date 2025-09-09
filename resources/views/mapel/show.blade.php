@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Detail Mata Pelajaran</h2>

    <ul class="list-group">
        <li class="list-group-item"><b>ID:</b> {{ $mapel->id_mapel }}</li>
        <li class="list-group-item"><b>Nama Mata Pelajaran:</b> {{ $mapel->nama_mapel }}</li>
    </ul>

    <a href="{{ route('mapel.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
