<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SchoolSetting;
use Illuminate\Support\Facades\Hash; // Jangan lupa import Hash jika belum ada

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder lain jika ada
        $this->call([
            GuruSeeder::class,
            EkstrakurikulerSeeder::class,
            JurusanSeeder::class,
        ]);

        // Buat Akun Admin (Harus berada di DALAM method run())
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@smk.sch.id',
            'password' => Hash::make('password123'),
        ]);

        // Buat Data Pengaturan Sekolah
        SchoolSetting::create([
            'school_name'      => 'SMK Negeri 1 Unggul',
            'slogan'           => 'Cerdas, Berkarakter, dan Siap Kerja',
            'history'          => 'Berdiri sejak tahun 2005, sekolah ini berfokus pada keahlian teknologi dan vokasi.',
            'vision'           => 'Menjadi pusat pendidikan kejuruan yang menghasilkan lulusan berdaya saing global.',
            'mission'          => '1. Menyelenggarakan pembelajaran berbasis industri.',
            'principal_name'   => 'Drs. H. Ahmad Wijaya, M.Pd.',
            'principal_welcome'=> 'Selamat datang di portal resmi SMK Negeri 1 Unggul.',
            'address'          => 'Jl. Pendidikan No. 45, Kota Teknologi',
            'phone'            => '(021) 555-0199',
            'email'            => 'info@smknegeriunggul.sch.id',
        ]);
    }
}