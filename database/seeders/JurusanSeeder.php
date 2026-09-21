<?php
// database/seeders/JurusanSeeder.php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $jurusans = [
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'singkatan'    => 'rpl',
                'deskripsi'    => 'Program keahlian yang membekali siswa dengan kemampuan merancang, membangun, dan mengelola perangkat lunak berbasis web maupun mobile.',
                'gambar'       => 'jurusans/rpl.jpg',
            ],
            [
                'nama_jurusan' => 'Agribisnis Pengolahan Hasil Pertanian',
                'singkatan'    => 'aphp',
                'deskripsi'    => 'Program keahlian yang membekali siswa dengan kemampuan mengolah hasil pertanian menjadi produk bernilai tambah.',
                'gambar'       => 'jurusans/aphp.jpg',
            ],
            [
                'nama_jurusan' => 'Bisnis Daring Pemasaran',
                'singkatan'    => 'bdp',
                'deskripsi'    => 'Program keahlian yang membekali siswa dengan kemampuan strategi pemasaran, penjualan, dan pelayanan pelanggan.',
                'gambar'       => 'jurusans/bdp.jpg',
            ],
            [
                'nama_jurusan' => 'Teknik Kendaraan Ringan',
                'singkatan'    => 'tkr',
                'deskripsi'    => 'Program keahlian yang membekali siswa dengan kemampuan perawatan dan perbaikan kendaraan ringan.',
                'gambar'       => 'jurusans/tkr.jpg',
            ],
            [
                'nama_jurusan' => 'Tata Usaha',
                'singkatan'    => 'tu',
                'deskripsi'    => 'Program keahlian yang membekali siswa dengan kemampuan administrasi dan tata kelola perkantoran.',
                'gambar'       => 'jurusans/tu.jpg',
            ],
        ];

        foreach ($jurusans as $item) {
            Jurusan::firstOrCreate(['singkatan' => $item['singkatan']], $item);
        }
    }
}