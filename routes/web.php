<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use Illuminate\Http\Request;

Route::get('/form', function () {
    return view('form');
});

Route::post('/submit-form', function (Request $request) {
    return "Data diterima: Nama = " . $request->nama . ", Email = " . $request->email;
});

Route::post('/submit-form', function (Request $request) {
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
    ]);

    return "Data diterima: Nama = " . $request->nama .
           ", Email = " . $request->email .
           ", Telepon = " . $request->telepon .
           ", Alamat = " . $request->alamat;
});
