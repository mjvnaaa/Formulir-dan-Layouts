<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa + pencarian + pagination
    public function index(Request $request)
    {
        $search = $request->input('search');
        $mahasiswa = Mahasiswa::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })->paginate(5);

        return view('mahasiswa.index', compact('mahasiswa', 'search'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|numeric|digits_between:8,15|unique:mahasiswa',
            'prodi' => 'required',
            'jurusan' => 'required',
            'telepon' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:mahasiswa',
            'alamat' => 'required|min:5',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    // Form edit data
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Update data mahasiswa
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|numeric|digits_between:8,15|unique:mahasiswa,nim,' . $mahasiswa->nim . ',nim',
            'prodi' => 'required',
            'jurusan' => 'required',
            'telepon' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:mahasiswa,email,' . $mahasiswa->nim . ',nim',
            'alamat' => 'required|min:5',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate!');
    }

    // Hapus data
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}