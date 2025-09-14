@extends('layouts.admin')

@section('title', 'Data Kelas')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Kelas</h1>

    <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary mb-3">+ Tambah Kelas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Jumlah Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kelas as $k)
                        <tr>
                            {{-- nomor urut tetap benar meski pakai paginate --}}
                            <td>{{ ($kelas->currentPage() - 1) * $kelas->perPage() + $loop->iteration }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>{{ $k->waliKelas->name ?? '-' }}</td>
                            <td>{{ $k->siswa->count() }}</td>
                            <td>
                                <a href="{{ route('admin.kelas.show', $k->id_kelas) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('admin.kelas.edit', $k->id_kelas) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.kelas.destroy', $k->id_kelas) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data kelas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- pagination --}}
            <div class="d-flex justify-content-center">
                {{ $kelas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
