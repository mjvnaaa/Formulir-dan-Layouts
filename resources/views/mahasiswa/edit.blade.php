@extends('layouts.app')

@section('content')
<h4 class="mb-4">Edit Data Mahasiswa</h4>

<form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ $mahasiswa->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" id="nim" name="nim" value="{{ $mahasiswa->nim }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="prodi" class="form-label">Prodi</label>
        <input type="text" id="prodi" name="prodi" value="{{ $mahasiswa->prodi }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" id="telepon" name="telepon" value="{{ $mahasiswa->telepon }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ $mahasiswa->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" class="form-control" rows="3" required>{{ $mahasiswa->alamat }}</textarea>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection