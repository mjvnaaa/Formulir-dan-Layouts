<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

use App\Http\Controllers\MahasiswaController;

Route::resource('mahasiswa', MahasiswaController::class);


Route::get('/form', function () {
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