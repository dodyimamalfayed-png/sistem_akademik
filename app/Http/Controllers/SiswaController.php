<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required|unique:siswa',
            'id_kelas' => 'required|exists:kelas,id_kelas'
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa','kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required|unique:siswa,nis,'.$siswa->id_siswa.',id_siswa',
            'id_kelas' => 'required|exists:kelas,id_kelas'
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
