@extends('layouts.admin')

@section('content')
    <div class="p-4 bg-light rounded shadow">
        <h1>Selamat Datang, {{ Auth::user()->name }} 👋</h1>
        <p>Pilih menu di atas untuk mengelola data kelas, siswa, mata pelajaran, dan nilai.</p>
    </div>
@endsection
