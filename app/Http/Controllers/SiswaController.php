<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['user', 'kelas'])->paginate(10); // ambil data siswa dengan user & kelas
        return view('admin.siswa.index', compact('siswa'));
    }

   public function create()
{
    $kelas = Kelas::all();
    $users = User::whereDoesntHave('siswa')->get(); // hanya ambil user yang belum punya siswa

    return view('admin.siswa.create', compact('kelas', 'users'));
}

    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'id_kelas'  => 'required|exists:kelas,id_kelas',
            'nis'       => 'required|unique:siswa,nis',
            'nama'      => 'required|string|max:255',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        $users = User::where('role', 'siswa')->get();
        $kelas = Kelas::all();

        return view('admin.siswa.edit', compact('siswa', 'users', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'id_kelas'  => 'required|exists:kelas,id_kelas',
            'nis'       => 'required|unique:siswa,nis,' . $siswa->id_siswa . ',id_siswa',
            'nama'      => 'required|string|max:255',
        ]);

        $siswa->update($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
