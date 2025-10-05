@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <form action="{{ route('mahasiswa.index') }}" method="GET" class="d-flex">
        <input 
            type="text" 
            name="search" 
            class="form-control me-2" 
            placeholder="Cari nama..." 
            value="{{ old('search', $search) }}"
        >
        <button class="btn btn-outline-primary" type="submit">Cari</button>
    </form>

    <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">
        + Tambah Mahasiswa
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $index => $m)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration + ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage() }}
                    </td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->prodi }}</td>
                    <td>{{ $m->jurusan }}</td>
                    <td>{{ $m->telepon }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->alamat }}</td>
                    <td class="text-center">
                        <a 
                            href="{{ route('mahasiswa.edit', $m->nim) }}" 
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form 
                            action="{{ route('mahasiswa.destroy', $m->nim) }}" 
                            method="POST" 
                            class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">
                        Tidak ada data mahasiswa ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $mahasiswa->links() }}
</div>
@endsection