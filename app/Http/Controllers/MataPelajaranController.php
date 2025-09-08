<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::all();
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required'
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    public function show(MataPelajaran $mapel)
    {
        return view('mapel.show', compact('mapel'));
    }

    public function edit(MataPelajaran $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, MataPelajaran $mapel)
    {
        $request->validate([
            'nama_mapel' => 'required'
        ]);

        $mapel->update($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil diupdate');
    }

    public function destroy(MataPelajaran $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil dihapus');
    }
}
