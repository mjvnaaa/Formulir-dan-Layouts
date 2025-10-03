# Praktikum Laravel - Manajemen Data Mahasiswa
**Nama** : Moh. Jevon Attaillah  
**Kelas** : Trpl 2D  
**NIM** : 362458302035  
**Mata Kuliah** : Pemrograman Web Lanjut  
---
## 1. Tujuan
- Menambahkan field `email` pada tabel `mahasiswa` melalui migration baru.  
- Mengupdate Seeder agar menyertakan data `email`.  
- Menampilkan field `email` di view tabel mahasiswa.  
- (Nilai tambah) Membuat Model, Controller, View, dan Formulir input menggunakan Eloquent.  
---
## 2. Langkah Praktikum 
### 2.1. Migration
Perintah:
```
php artisan make:migration create_mahasiswa
```
Perintah ini digunakan untuk membuat file migration baru.
File tersebut berfungsi mendefinisikan struktur tabel mahasiswa di database.
Pada file `database/migrations/2025_09_30_035925_create_mahasiswa.php` ditambahkan kode berikut:
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
```
Kemudian jalankan perintah berikut untuk mengeksekusi migration:
```
php artisan migrate
```
### 2.2. Seeder
Perintah:
```
php artisan make:seeder MahasiswaSeeder
```
Perintah ini digunakan untuk membuat file Seeder baru.
Seeder berfungsi untuk mengisi data awal ke tabel mahasiswa, misalnya nama, email, telepon, dan alamat.
Isi file `database/seeders/MahasiswaSeeder.php`:
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('mahasiswa')->insert([
            [
                'nama' => 'Moh. Jevon Attaillah',
                'email' => 'dilan271594@gmail.com',
                'telepon' => '081238678123',
                'alamat' => 'Singotrunan, Banyuwammgi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Salam Rizqi Mulia',
                'email' => 'salambaee@gmail.com',
                'telepon' => '085815429154',
                'alamat' => 'Tukang Kayu, Banyuwammgi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Achmad Alfarizy Satria Gautama',
                'email' => 'fariz@gmail.com',
                'telepon' => '083897883889',
                'alamat' => 'Sobo, Banyuwammgi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
```
Tambahkan ke `sedeers/DatabaseSeeder.php`:
```php
$this->call(MahasiswaSeeder::class);
```
Kode ini digunakan agar MahasiswaSeeder dijalankan saat proses seeding.
Jalankan perintah:
```
php artisan migrate:fresh --seed
```
Perintah ini akan mengulang migration dari awal (membuat ulang tabel) lalu langsung mengisi tabel mahasiswa dengan data awal dari seeder.
Hasilnya, tabel mahasiswa sudah terisi otomatis tanpa input manual.
### 2.3. Model
```
php artisan make:model Mahasiswa
```
Perintah ini digunakan untuk membuat model baru bernama Mahasiswa agar bisa berhubungan langsung dengan tabel mahasiswa.

Isi `app/Models/Mahasiswa.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = ['nama', 'email', 'telepon', 'alamat'];
}
```
### 2.4. Controller
```
php artisan make:controller MahasiswaController --resource
```
Perintah ini membuat controller dengan method dasar CRUD (index, create, store, dll).
Tambahkan kode ini pada app\Http\Controllers\MahasiswaController.php:
```php
<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:mahasiswa',
            'telepon' => 'required|digits_between:10,15',
            'alamat' => 'required|min:5',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }
}
```
Kode di atas mengatur alur logika: menampilkan data, menampilkan form, serta menyimpan data baru setelah divalidasi.
### 2.5. View
**Index (`resources/views/mahasiswa/index.blade.php`):**
```php
@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Daftar Mahasiswa</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto border-collapse border w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Telepon</th>
                <th class="border px-4 py-2">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $m)
                <tr>
                    <td class="border px-4 py-2">{{ $m->id }}</td>
                    <td class="border px-4 py-2">{{ $m->nama }}</td>
                    <td class="border px-4 py-2">{{ $m->email }}</td>
                    <td class="border px-4 py-2">{{ $m->telepon }}</td>
                    <td class="border px-4 py-2">{{ $m->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
```
View ini menampilkan daftar mahasiswa dalam bentuk tabel.
**Create (`resources/views/mahasiswa/create.blade.php`):**
```
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
```
View ini menampilkan form input untuk menambahkan data mahasiswa baru.
### 2.6. Routing
`routes/web.php`:
```
use App\Http\Controllers\MahasiswaController;
Route::resource('mahasiswa', MahasiswaController::class);
```
Routing ini otomatis membuat endpoint CRUD untuk mahasiswa, misalnya `/mahasiswa` untuk index, dan `/mahasiswa/create` untuk form input.
## 3. Hasil Uji Coba
- **Halaman `/mahasiswa`** menampilkan tabel daftar mahasiswa lengkap dengan kolom **Nama, Email, Telepon, Alamat**.
![Screenshot](dokumetasi/1.png)
- **Seeder** berhasil menambahkan 3 data mahasiswa.  
![Screenshot](dokumetasi/1.png)
- **Formulir `/mahasiswa/create`** dapat menyimpan data baru ke database. 
![Screenshot](dokumetasi/2.png)
![Screenshot](dokumetasi/3.png)
Data berhasil ditambahkan