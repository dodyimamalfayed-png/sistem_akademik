<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // Ambil data kelas dengan relasi wali_kelas dan jumlah siswa
        $kelas = Kelas::with(['waliKelas', 'siswa'])->paginate(10);

        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        // Ambil semua guru untuk dropdown wali kelas
        $waliKelas = User::where('role', 'guru')->get();

        return view('admin.kelas.create', compact('waliKelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'     => 'required|string|max:255',
            'wali_kelas_id'  => 'nullable|exists:users,id'
        ]);

        Kelas::create([
            'nama_kelas'    => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
        ]);

        return redirect()->route('admin.kelas.index')
                         ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        // Ambil data wali_kelas + siswa di kelas tsb
        $kelas->load(['waliKelas', 'siswa.user']);

        return view('admin.kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
{
    $wali = User::where('role', 'guru')->get();
    return view('admin.kelas.edit', compact('kelas', 'wali'));
}

public function update(Request $request, Kelas $kelas)
{
    $request->validate([
        'nama_kelas' => 'required',
        'wali_kelas_id' => 'nullable|exists:users,id',
    ]);

    $kelas->update($request->all());

    return redirect()->route('admin.kelas.index')
                     ->with('success', 'Kelas berhasil diupdate');
}



    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('admin.kelas.index')
                         ->with('success', 'Kelas berhasil dihapus');
    }
}
