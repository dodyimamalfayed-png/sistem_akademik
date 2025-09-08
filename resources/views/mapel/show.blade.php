@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Mata Pelajaran</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $mataPelajaran->nama_mapel }}</h5>
            <p><strong>ID:</strong> {{ $mataPelajaran->id_mapel }}</p>
            <a href="{{ route('mata_pelajaran.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
