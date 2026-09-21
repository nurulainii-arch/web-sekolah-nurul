<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebSekolahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jurusans')->insert([
            [
                'nama_jurusan' => 'Teknik Komputer dan Jaringan',
                'singkatan'    => 'TKJ',
                'deskripsi'    => 'Salin deskripsi TKJ yang ada di kodingan Blade kamu ke sini...',
                'gambar'       => 'default.jpg', // <--- Tambahkan kolom gambar di sini
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'singkatan'    => 'RPL',
                'deskripsi'    => 'Salin deskripsi RPL yang ada di kodingan Blade kamu ke sini...',
                'gambar'       => 'default.jpg', // <--- Tambahkan kolom gambar di sini
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}