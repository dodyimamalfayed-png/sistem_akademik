<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['siswa', 'mapel'])->get();

        if (auth()->user()->role === 'guru') {
            return view('guru.nilai.index', compact('nilai'));
        }

        return view('admin.nilai.index', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();

        if (auth()->user()->role === 'guru') {
            return view('guru.nilai.create', compact('siswa', 'mapel'));
        }

        return view('admin.nilai.create', compact('siswa', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_mapel' => 'required|exists:mata_pelajaran,id_mapel',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        // Simpan data
        Nilai::create([
            'id_siswa' => $request->id_siswa,
            'id_mapel' => $request->id_mapel,
            'nilai'    => $request->nilai,
        ]);

        // Redirect langsung ke index, jangan ke show
        return redirect()->route(
            auth()->user()->role === 'guru' ? 'guru.nilai.index' : 'admin.nilai.index'
        )->with('success', 'Nilai berhasil ditambahkan');
    }

    public function show(Nilai $nilai)
    {
        if (auth()->user()->role === 'guru') {
            return view('guru.nilai.show', compact('nilai'));
        }

        return view('admin.nilai.show', compact('nilai'));
    }

    public function edit(Nilai $nilai)
    {
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();

        if (auth()->user()->role === 'guru') {
            return view('guru.nilai.edit', compact('nilai', 'siswa', 'mapel'));
        }

        return view('admin.nilai.edit', compact('nilai', 'siswa', 'mapel'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_mapel' => 'required|exists:mata_pelajaran,id_mapel',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        $nilai->update([
            'id_siswa' => $request->id_siswa,
            'id_mapel' => $request->id_mapel,
            'nilai'    => $request->nilai,
        ]);

        return redirect()->route(
            auth()->user()->role === 'guru' ? 'guru.nilai.index' : 'admin.nilai.index'
        )->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route(
            auth()->user()->role === 'guru' ? 'guru.nilai.index' : 'admin.nilai.index'
        )->with('success', 'Nilai berhasil dihapus');
    }

    // Khusus siswa (lihat nilai sendiri)
   public function nilaiSiswa()
{
    // cari siswa berdasarkan user yang login
    $siswa = \App\Models\Siswa::where('user_id', auth()->id())->first();

    if (!$siswa) {
        return redirect()->back()->with('error', 'Data siswa tidak ditemukan');
    }

    // ambil nilai berdasarkan id_siswa
    $nilai = Nilai::with(['siswa', 'mapel'])
        ->where('id_siswa', $siswa->id_siswa)
        ->get();

    return view('siswa.dashboard', compact('nilai'));
}

}
