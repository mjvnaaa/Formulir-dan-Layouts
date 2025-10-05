<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nama' => 'Moh. Jevon Attaillah',
                'nim' => '362458302035',
                'prodi' => 'Teknologi Rekayasa Perangkat Lunak',
                'jurusan' => 'Bisnis dan Informatika',
                'telepon' => '081238678123',
                'email' => 'dilan271594@gmail.com',
                'alamat' => 'Singotrunan, Banyuwangi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Salam Rizqi Mulia',
                'nim' => '362458302041',
                'prodi' => 'Teknologi Rekayasa Perangkat Lunak',
                'jurusan' => 'Bisnis dan Informatika',
                'telepon' => '085815429154',
                'email' => 'salambaee@gmail.com',
                'alamat' => 'Tukang Kayu, Banyuwangi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Achmad Alfarizy Satria Gautama',
                'nim' => '362458302147',
                'prodi' => 'Teknologi Rekayasa Perangkat Lunak',
                'jurusan' => 'Bisnis dan Informatika',
                'telepon' => '083897883889',
                'email' => 'fariz@gmail.com',
                'alamat' => 'Sobo, Banyuwangi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}