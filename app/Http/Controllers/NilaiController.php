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
        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();
        return view('nilai.create', compact('siswa', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_mapel' => 'required|exists:mata_pelajaran,id_mapel',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        Nilai::create($request->all());

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function show(Nilai $nilai)
    {
        return view('nilai.show', compact('nilai'));
    }

    public function edit(Nilai $nilai)
    {
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();
        return view('nilai.edit', compact('nilai', 'siswa', 'mapel'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'id_mapel' => 'required|exists:mata_pelajaran,id_mapel',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
    }
}
