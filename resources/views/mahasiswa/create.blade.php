@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Tambah Mahasiswa</h2>

<form action="{{ route('mahasiswa.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
    @csrf

    <div class="mb-4">
        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" name="nama" class="border rounded w-full p-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">NIM</label>
        <input type="text" name="nim" class="border rounded w-full p-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Prodi</label>
        <input type="text" name="prodi" class="border rounded w-full p-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Jurusan</label>
        <input type="text" name="jurusan" class="border rounded w-full p-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Telepon</label>
        <input type="text" name="telepon" class="border rounded w-full p-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" class="border rounded w-full p-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Alamat</label>
        <textarea name="alamat" class="border rounded w-full p-2" rows="3" required></textarea>
    </div>

    <div class="flex gap-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded">Kembali</a>
    </div>
</form>
@endsection