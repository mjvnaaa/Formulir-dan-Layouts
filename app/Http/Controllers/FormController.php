<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
      public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'telepon' => 'required|digits_between:10,15',
            'alamat' => 'required|min:5',
        ]);

        return view('success', $validated);
    }

}
