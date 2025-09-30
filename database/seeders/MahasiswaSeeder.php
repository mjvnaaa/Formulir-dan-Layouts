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