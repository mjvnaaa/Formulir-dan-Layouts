<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MahasiswaController;

Route::get('/form', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

Route::get('/form-manual', function () {
    return view('form');
});

Route::post('/submit-form', function (Request $request) {
    $request->validate([
        'nama' => 'required|min:3',
        'email' => 'required|email',
        'telepon' => 'required|digits_between:10,15',
        'alamat' => 'required|min:5',
    ]);

    return "Data diterima: " .
           "Nama = " . $request->nama .
           ", Email = " . $request->email .
           ", Telepon = " . $request->telepon .
           ", Alamat = " . $request->alamat;
});

Route::get('/mahasiswa', function () {
    $mahasiswa = DB::table('mahasiswa')->get();
    return view('mahasiswa.index', compact('mahasiswa'));
});

Route::get('/mahasiswa/prodi/{prodi}', function ($prodi) {
    $mahasiswa = DB::table('mahasiswa')->where('prodi', $prodi)->get();
    return view('mahasiswa.index', compact('mahasiswa'));
});

Route::get('/mahasiswa/add', function () {
    DB::table('mahasiswa')->insert([
        [
            'nama' => 'Heri Herlambang',
            'nim' => '362458302034',
            'prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'jurusan' => 'Bisnis dan Informatika',
            'telepon' => '081234567890',
            'email' => 'heri@example.com',
            'alamat' => 'Situbondo',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    return "Data mahasiswa berhasil ditambahkan!";
});

Route::get('/mahasiswa/update/{nim}', function ($nim) {
    DB::table('mahasiswa')->where('nim', $nim)->update([
        'prodi' => 'Trpl'
    ]);
    return "Data mahasiswa dengan NIM $nim berhasil diupdate!";
});

Route::get('/mahasiswa/delete/{nim}', function ($nim) {
    DB::table('mahasiswa')->where('nim', $nim)->delete();
    return "Data mahasiswa dengan NIM $nim berhasil dihapus!";
});

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::resource('mahasiswa', MahasiswaController::class);