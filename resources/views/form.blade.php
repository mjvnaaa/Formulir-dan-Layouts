@extends('layouts.app')

@section('content')

    <h2 class="text-2xl font-bold mb-4">Formulir Input Data</h2>

    {{-- Action diarahkan ke route name form.store --}}
    <form action="{{ route('form.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        {{-- Menampilkan error validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label class="block">Nama:</label>
            <input type="text" name="nama" class="border rounded w-full p-2" value="{{ old('nama') }}">
        </div>

        <div class="mb-4">
            <label class="block">Email:</label>
            <input type="email" name="email" class="border rounded w-full p-2" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="block">Nomor Telepon:</label>
            <input type="text" name="telepon" class="border rounded w-full p-2" value="{{ old('telepon') }}">
        </div>

        <div class="mb-4">
            <label class="block">Alamat:</label>
            <textarea name="alamat" class="border rounded w-full p-2">{{ old('alamat') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Submit
        </button>
    </form>
@endsection