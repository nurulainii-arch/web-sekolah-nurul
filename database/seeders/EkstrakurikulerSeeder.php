<?php
// database/seeders/EkstrakurikulerSeeder.php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_ekskul' => 'Marching Band',
                'pembina'     => 'Nurah Alwaini, A.Ma.Pust.',
                'deskripsi'   => 'Kegiatan seni musik baris-berbaris yang melatih kedisiplinan, kekompakan, dan kemampuan bermain alat musik tiup maupun perkusi.',
                'logo'        => null,
                'guru_nama'   => 'Nurah Alwaini, A.Ma.Pust.', // dipakai untuk cari guru_id di bawah
            ],
            [
                'nama_ekskul' => 'Pramuka',
                'pembina'     => 'Nina Hernawati, S.Pd.I., S.T.',
                'deskripsi'   => 'Kegiatan kepramukaan yang membina kemandirian, kedisiplinan, kepemimpinan, dan jiwa sosial siswa sesuai nilai-nilai Dasa Dharma.',
                'logo'        => null,
                'guru_nama'   => null, // pembina dari luar, tidak ada di tabel guru
            ],
            [
                'nama_ekskul' => 'Paskibra',
                'pembina'     => 'Ende Iskandar, S.TP.',
                'deskripsi'   => 'Kegiatan pasukan pengibar bendera yang melatih kedisiplinan, ketegasan sikap, dan kebanggaan terhadap simbol negara.',
                'logo'        => null,
                'guru_nama'   => 'Ende Iskandar, S.TP.',
            ],
            [
                'nama_ekskul' => 'PMR',
                'pembina'     => 'Mega Nurunnisa, S.Pd.',
                'deskripsi'   => 'Pelayanan kesehatan sekolah, pertolongan pertama, dan jiwa kemanusiaan.',
                'logo'        => null,
                'guru_nama'   => 'Mega Nurunnisa, S.Pd.',
            ],
            [
                'nama_ekskul' => 'Rohis',
                'pembina'     => 'Asep Muhlis Sulaeman, S.Pd.I.',
                'deskripsi'   => 'Pembinaan keagamaan Islam, kajian nilai Islami, dan akhlak mulia.',
                'logo'        => null,
                'guru_nama'   => 'Asep Muhlis Sulaeman, S.Pd.I.',
            ],
            [
                'nama_ekskul' => 'Karawitan',
                'pembina'     => 'Moch. Yoga Agung N., S.Pd., M.Pd.',
                'deskripsi'   => 'Pelestarian seni musik tradisional gamelan dan kebudayaan daerah.',
                'logo'        => null,
                'guru_nama'   => 'Moch. Yoga Agung N., S.Pd., M.Pd.',
            ],
            [
                'nama_ekskul' => 'Futsal',
                'pembina'     => 'Jaya Nur Setiawandi, S.Pd.',
                'deskripsi'   => 'Pengembangan stamina, kerja sama tim, dan teknik dasar olah bola.',
                'logo'        => null,
                'guru_nama'   => 'Jaya Nur Setiawandi, S.Pd.',
            ],
            [
                'nama_ekskul' => 'Voly',
                'pembina'     => 'Dedi Sukardi, S.Pd.',
                'deskripsi'   => 'Olahraga bola voli untuk melatih refleks, kekuatan, dan kekompakan tim.',
                'logo'        => null,
                'guru_nama'   => 'Dedi Sukardi, S.Pd.',
            ],
            [
                'nama_ekskul' => 'Jepang Club',
                'pembina'     => 'Saripul Basar',
                'deskripsi'   => 'Pembelajaran bahasa, budaya, kanji, dan kebudayaan pop Negeri Sakura.',
                'logo'        => null,
                'guru_nama'   => 'Saripul Basar',
            ],
            [
                'nama_ekskul' => 'Cinemak',
                'pembina'     => 'Rahmat Setiawan, S.T.',
                'deskripsi'   => 'Wadah videografi, pembuatan film pendek, videografi konten, dan editing.',
                'logo'        => null,
                'guru_nama'   => 'Rahmat Setiawan, S.T.',
            ],
        ];

        foreach ($data as $item) {
            $guruId = $item['guru_nama']
                ? Guru::where('nama_guru', $item['guru_nama'])->value('id')
                : null;

            Ekstrakurikuler::firstOrCreate(
                ['nama_ekskul' => $item['nama_ekskul']],
                [
                    'pembina'   => $item['pembina'],
                    'deskripsi' => $item['deskripsi'],
                    'logo'      => $item['logo'],
                    'guru_id'   => $guruId,
                ]
            );
        }
    }
}