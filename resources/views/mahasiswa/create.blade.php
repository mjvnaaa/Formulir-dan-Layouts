@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Tambah Mahasiswa</h2>

    <form action="{{ route('mahasiswa.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="nama" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label>Telepon</label>
            <input type="text" name="telepon" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label>Alamat</label>
            <textarea name="alamat" class="border rounded w-full p-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection