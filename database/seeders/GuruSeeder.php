<?php
// database/seeders/GuruSeeder.php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $rpl = Jurusan::where('singkatan', 'rpl')->firstOrFail();
        $aphp = Jurusan::where('singkatan', 'aphp')->firstOrFail();
        $bdp = Jurusan::where('singkatan', 'bdp')->firstOrFail();
        $tkr = Jurusan::where('singkatan', 'tkr')->firstOrFail();

        $data = [
            // ===== RPL =====
            [
                'nip'       => 'TEMP-RPL-001',
                'nama_guru' => 'Rahmat Setiawan, S.T.',
                'jabatan'   => 'Kaprog RPL',
                'mapel'     => 'Pemrograman Web dan Berbasis Objek',
                'deskripsi' => 'Mengajar Pemrograman Web dan Berbasis Objek. Aktif mendampingi siswa dalam persiapan kompetensi LKS.',
                'foto'      => 'teachers/rahmat-setiawan.jpg',
                'jurusan_id'=> $rpl->id,
            ],
            [
                'nip'       => 'TEMP-RPL-002',
                'nama_guru' => 'Bani Fudoly',
                'jabatan'   => 'Guru RPL',
                'mapel'     => 'Basis Data dan Pemrograman Perangkat Bergerak',
                'deskripsi' => 'Spesialis Basis Data dan Pemrograman Perangkat Bergerak dengan fokus pada praktik aplikasi Flutter.',
                'foto'      => 'teachers/bani-fudoly.jpg',
                'jurusan_id'=> $rpl->id,
            ],
            [
                'nip'       => 'TEMP-RPL-003',
                'nama_guru' => 'Silvi Danu Respita, S.T.',
                'jabatan'   => 'Guru RPL',
                'mapel'     => 'Desain UI/UX dan Analisis Perancangan Sistem',
                'deskripsi' => 'Fokus pada Pembentukan Karakter Siswa, Desain UI/UX, dan Analisis Perancangan Sistem Informasi.',
                'foto'      => 'teachers/silvi-danu.jpg',
                'jurusan_id'=> $rpl->id,
            ],
            [
                'nip'       => 'TEMP-RPL-004',
                'nama_guru' => 'Didi Mei Somatri, S.KOM.',
                'jabatan'   => 'Guru RPL',
                'mapel'     => 'Pemrograman Game 2D/3D',
                'deskripsi' => 'Membimbing materi Pemrograman Game 2D/3D serta logika algoritma dasar untuk tingkat pemula.',
                'foto'      => 'teachers/didi-mei.jpg',
                'jurusan_id'=> $rpl->id,
            ],
            [
                'nip'       => 'TEMP-RPL-005',
                'nama_guru' => 'Wahyudin, S.TR.KOM.',
                'jabatan'   => 'Guru RPL',
                'mapel'     => 'Rekayasa Perangkat Lunak',
                'deskripsi' => 'Mengajar praktik Rekayasa Perangkat Lunak, membimbing siswa dalam pengembangan aplikasi berbasis web dan mobile.',
                'foto'      => 'teachers/wahyudin.jpg',
                'jurusan_id'=> $rpl->id,
            ],

            // ===== APHP =====
            [
                'nip'       => 'TEMP-APHP-001',
                'nama_guru' => 'Budiana Hermawan, S.TP.',
                'jabatan'   => 'Kaprog APHP',
                'mapel'     => 'Pemrograman Web dan Berbasis Objek',
                'deskripsi' => 'Mengajar Pemrograman Web dan Berbasis Objek. Aktif mendampingi siswa dalam persiapan kompetensi LKS.',
                'foto'      => 'teachers/budiana-hermawan.jpg',
                'jurusan_id'=> $aphp->id,
            ],
            [
                'nip'       => 'TEMP-APHP-002',
                'nama_guru' => 'Ende Iskandar, S.TP.',
                'jabatan'   => 'Guru APHP',
                'mapel'     => 'Basis Data dan Pemrograman Perangkat Bergerak',
                'deskripsi' => 'Spesialis Basis Data dan Pemrograman Perangkat Bergerak dengan fokus pada praktik aplikasi Flutter.',
                'foto'      => 'teachers/ende-iskandar.jpg',
                'jurusan_id'=> $aphp->id,
            ],

            //===== BDP =====
            [
                'nip'       => 'TEMP-BDP-001',
                'nama_guru' => 'Indra Murgianto, S.PD.',
                'jabatan'   => 'Kaprog BDP',
                'mapel'     => 'Bisnis Daring Pemasaran',
                'deskripsi' => 'Mengajar praktik Bisnis Daring Pemasaran, membimbing siswa dalam strategi pemasaran digital dan kewirausahaan sesuai kebutuhan dunia usaha.',
                'foto'      => 'teachers/indra-murgianto.jpg',
                'jurusan_id'=> $bdp->id,
            ],
            [
                'nip'       => 'TEMP-BDP-002',
                'nama_guru' => 'Eli Maryamah, S.PD.',
                'jabatan'   => 'Guru BDP',
                'mapel'     => 'Bisnis Daring Pemasaran',
                'deskripsi' => 'Mengajar praktik Bisnis Daring Pemasaran, membimbing siswa dalam strategi pemasaran digital dan kewirausahaan sesuai kebutuhan dunia usaha.',
                'foto'      => 'teachers/eli-maryamah.jpg',
                'jurusan_id'=> $bdp->id,
            ],
            [   
                'nip'       => 'TEMP-BDP-003',
                'nama_guru' => 'Nanang Suryana, S.E., M.M.',
                'jabatan'   => 'Guru BDP',
                'mapel'     => 'Bisnis Daring Pemasaran',
                'deskripsi' => 'Mengajar praktik Bisnis Daring Pemasaran, membimbing siswa dalam strategi pemasaran digital dan kewirausahaan sesuai kebutuhan dunia usaha.',
                'foto'      => 'teachers/nanang-suryana.jpg',
                'jurusan_id'=> $bdp->id,
            ],
            [
                'nip'       => 'TEMP-BDP-004',
                'nama_guru' => 'Setiawan, S.E.',
                'jabatan'   => 'Guru BDP',
                'mapel'     => 'Bisnis Daring Pemasaran',
                'deskripsi' => 'Mengajar praktik Bisnis Daring Pemasaran, membimbing siswa dalam strategi pemasaran digital dan kewirausahaan sesuai kebutuhan dunia usaha.',
                'foto'      => 'teachers/setiawan.jpg',
                'jurusan_id'=> $bdp->id,
            ],
            [
                'nip'       => 'TEMP-BDP-005',
                'nama_guru' => 'Dini Andriani, S.E.',
                'jabatan'   => 'Guru BDP',
                'mapel'     => 'Bisnis Daring Pemasaran',
                'deskripsi' => 'Mengajar praktik Bisnis Daring Pemasaran, membimbing siswa dalam strategi pemasaran digital dan kewirausahaan sesuai kebutuhan dunia usaha.',
                'foto'      => 'teachers/dini-andriani.jpg',
                'jurusan_id'=> $bdp->id,
            ],
            [
                'nip'       => 'TEMP-BDP-006',
                'nama_guru' => 'Kamalia, S.E.',
                'jabatan'   => 'Guru BDP',
                'mapel'     => 'Bisnis Daring Pemasaran',
                'deskripsi' => 'Mengajar praktik Bisnis Daring Pemasaran, membimbing siswa dalam strategi pemasaran digital dan kewirausahaan sesuai kebutuhan dunia usaha.',
                'foto'      => 'teachers/kamalia.jpg',
                'jurusan_id'=> $bdp->id,
            ],

            //===== TKR =====
            [
                'nip'       => 'TEMP-TKR-001',
                'nama_guru' => 'Romi Darmayadi, S.PD., S.T.',
                'jabatan'   => 'Kaprog TKR',
                'mapel'     => 'Teknik Kendaraan Ringan',
                'deskripsi' => 'Mengajar praktik Teknik Kendaraan Ringan, membimbing siswa dalam perawatan dan perbaikan mesin kendaraan sesuai standar industri.',
                'foto'      => 'teachers/romi-darmayadi.jpg',
                'jurusan_id'=> $tkr->id,
            ],
            [
                'nip'       => 'TEMP-TKR-002',
                'nama_guru' => 'Jajang Ridwan, S.T.',
                'jabatan'   => 'Guru TKR',
                'mapel'     => 'Teknik Kendaraan Ringan',
                'deskripsi' => 'Mengajar praktik Teknik Kendaraan Ringan, membimbing siswa dalam perawatan dan perbaikan mesin kendaraan sesuai standar industri.',
                'foto'      => 'teachers/jajang-ridwan.jpg',
                'jurusan_id'=> $tkr->id,
            ],
            [
                'nip'       => 'TEMP-TKR-003',
                'nama_guru' => 'Andri Muhoir, S.T.',
                'jabatan'   => 'Guru TKR',
                'mapel'     => 'Teknik Kendaraan Ringan',
                'deskripsi' => 'Mengajar praktik Teknik Kendaraan Ringan, membimbing siswa dalam perawatan dan perbaikan mesin kendaraan sesuai standar industri.',
                'foto'      => 'teachers/andri-muhoir.jpg',
                'jurusan_id'=> $tkr->id,
            ],

            // ===== GURU MAPEL =====
[
    'nip' => 'TEMP-MAPEL-001', 'nama_guru' => 'Nuraeni, S.PD.', 'jabatan' => 'Guru Matematika',
    'mapel' => 'Matematika', 'deskripsi' => 'Mengajar Matematika dengan pendekatan yang mudah dipahami, membimbing siswa memahami konsep dasar hingga penerapannya dalam kehidupan sehari-hari.',
    'foto' => 'teachers/nuraeni.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-002', 'nama_guru' => 'Ela Haryati, S.PD.', 'jabatan' => 'Guru Pendidikan Pancasila & PKK',
    'mapel' => 'Pendidikan Pancasila & PKK', 'deskripsi' => 'Mengajar Pendidikan Pancasila dan PKK, membina wawasan kebangsaan serta kesejahteraan keluarga bagi siswa.',
    'foto' => 'teachers/ela-haryati.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-003', 'nama_guru' => 'Habib Suhandar, S.PD.', 'jabatan' => 'Guru Pendidikan Pancasila & Sejarah',
    'mapel' => 'Pendidikan Pancasila & Sejarah', 'deskripsi' => 'Mengajar Pendidikan Pancasila dan Sejarah, menanamkan nilai kebangsaan serta wawasan sejarah bangsa kepada siswa.',
    'foto' => 'teachers/habib-suhandar.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-004', 'nama_guru' => 'Nopi Yanti, S.PD.', 'jabatan' => 'Guru Pendidikan Pancasila & Sejarah',
    'mapel' => 'Pendidikan Pancasila & Sejarah', 'deskripsi' => 'Mengajar Pendidikan Pancasila dan Sejarah, menanamkan nilai kebangsaan serta wawasan sejarah bangsa kepada siswa.',
    'foto' => 'teachers/nopi-yanti.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-005', 'nama_guru' => 'Jaya Nur Setiawandi, S.PD.', 'jabatan' => 'Guru Bahasa Sunda & PJOK',
    'mapel' => 'Bahasa Sunda & PJOK', 'deskripsi' => 'Mengajar Bahasa Sunda dan Pendidikan Jasmani, membina kecintaan budaya lokal serta kebugaran jasmani siswa.',
    'foto' => 'teachers/jaya-nur-setiawandi.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-006', 'nama_guru' => 'Emi Resmiyati, S.PD.', 'jabatan' => 'Guru Projek Ilmu Pengetahuan Alam dan Sosial',
    'mapel' => 'Projek IPAS', 'deskripsi' => 'Membimbing Projek Ilmu Pengetahuan Alam dan Sosial, mengasah kemampuan berpikir kritis siswa terhadap isu di sekitarnya.',
    'foto' => 'teachers/emi-resmiyati.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-007', 'nama_guru' => 'Rina Susana, S.PD.', 'jabatan' => 'Guru Bahasa Inggris',
    'mapel' => 'Bahasa Inggris', 'deskripsi' => 'Mengajar Bahasa Inggris, membekali siswa dengan kemampuan komunikasi global untuk dunia kerja maupun studi lanjut.',
    'foto' => 'teachers/rina-susana.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-008', 'nama_guru' => 'Yani Cahyani, S.PD.', 'jabatan' => 'Guru Bahasa Inggris',
    'mapel' => 'Bahasa Inggris', 'deskripsi' => 'Mengajar Bahasa Inggris, membekali siswa dengan kemampuan komunikasi global untuk dunia kerja maupun studi lanjut.',
    'foto' => 'teachers/yani-cahyani.jpg', 'jurusan_id' => null,  'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-009', 'nama_guru' => 'Mega Nurunnisa, S.PD.', 'jabatan' => 'Guru Bahasa Indonesia & Seni Budaya',
    'mapel' => 'Bahasa Indonesia & Seni Budaya', 'deskripsi' => 'Mengajar Bahasa Indonesia dan Seni Budaya, mengembangkan kemampuan berbahasa sekaligus apresiasi seni siswa.',
    'foto' => 'teachers/mega-nurunnisa.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-010', 'nama_guru' => 'Mia Rusmiati, S.PD.', 'jabatan' => 'Guru Matematika & Bahasa Inggris',
    'mapel' => 'Matematika & Bahasa Inggris', 'deskripsi' => 'Mengajar Matematika dan Bahasa Inggris, membekali siswa dengan kemampuan logika sekaligus komunikasi internasional.',
    'foto' => 'teachers/mia-rusmiati.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-011', 'nama_guru' => 'Siti Rahmawati, S.PD.I.', 'jabatan' => 'Guru PAI.BP',
    'mapel' => 'PAI dan Budi Pekerti', 'deskripsi' => 'Mengajar Pendidikan Agama Islam dan Budi Pekerti, membina akhlak dan spiritualitas siswa.',
    'foto' => 'teachers/siti-rahmawati.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-012', 'nama_guru' => 'Ai Nurhasanah, S.PD.', 'jabatan' => 'Guru Matematika & Informatika',
    'mapel' => 'Matematika & Informatika', 'deskripsi' => 'Mengajar Matematika dan Informatika, membekali siswa dengan kemampuan berpikir logis dan literasi digital.',
    'foto' => 'teachers/ai-nurhasanah.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-013', 'nama_guru' => 'Isnan Wiranursyeha, S.PD.', 'jabatan' => 'Guru Bahasa Indonesia',
    'mapel' => 'Bahasa Indonesia', 'deskripsi' => 'Mengajar Bahasa Indonesia, mengembangkan kemampuan berbahasa dan literasi siswa.',
    'foto' => 'teachers/isnan-wiranursyeha.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-014', 'nama_guru' => 'Asep Muhlis Sulaeman, S.PD.I.', 'jabatan' => 'Guru PAI.BP',
    'mapel' => 'PAI dan Budi Pekerti', 'deskripsi' => 'Mengajar Pendidikan Agama Islam dan Budi Pekerti, membina akhlak dan spiritualitas siswa.',
    'foto' => 'teachers/asep-muhlis-sulaeman.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-015', 'nama_guru' => 'Yayup Hindriyani, S.PD.', 'jabatan' => 'Guru Matematika & Informatika',
    'mapel' => 'Matematika & Informatika', 'deskripsi' => 'Mengajar Matematika dan Informatika, membekali siswa dengan kemampuan berpikir logis dan literasi digital.',
    'foto' => 'teachers/yayup-hindriyani.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-016', 'nama_guru' => 'Moch. Yoga Agung N., S.PD., M.PD.', 'jabatan' => 'Guru Bahasa Sunda',
    'mapel' => 'Bahasa Sunda', 'deskripsi' => 'Mengajar Bahasa Sunda, melestarikan dan menumbuhkan kecintaan siswa terhadap budaya lokal.',
    'foto' => 'teachers/moch-yoga-agung-n.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-017', 'nama_guru' => 'Edeh Kurniasih, S.PD.', 'jabatan' => 'Guru Bahasa Indonesia',
    'mapel' => 'Bahasa Indonesia', 'deskripsi' => 'Mengajar Bahasa Indonesia, mengembangkan kemampuan berbahasa dan literasi siswa.',
    'foto' => 'teachers/edeh-kurniasih.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-018', 'nama_guru' => 'Indrab Priatna, S.PD.', 'jabatan' => 'Guru Pendidikan Pancasila & Informatika',
    'mapel' => 'Pendidikan Pancasila & Informatika', 'deskripsi' => 'Mengajar Pendidikan Pancasila dan Informatika, memadukan wawasan kebangsaan dengan literasi digital siswa.',
    'foto' => 'teachers/indrab-priatna.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],
[
    'nip' => 'TEMP-MAPEL-019', 'nama_guru' => 'Dedi Sukardi, S.PD.', 'jabatan' => 'Guru PJOK',
    'mapel' => 'PJOK', 'deskripsi' => 'Mengajar Pendidikan Jasmani, Olahraga, dan Kesehatan, membina kebugaran dan sportivitas siswa.',
    'foto' => 'teachers/dedi-sukardi.jpg', 'jurusan_id' => null, 'kategori' => 'mapel',
],

// ===== STAF TU =====
[
    'nip' => 'TEMP-TU-001', 'nama_guru' => 'Santi Mustika', 'jabatan' => 'Laboran Pemasaran',
    'mapel' => 'Laboran Pemasaran', 'deskripsi' => 'Bertugas sebagai laboran, mendukung kegiatan praktik siswa program keahlian Pemasaran.',
    'foto' => 'teachers/santi-mustika.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-002', 'nama_guru' => 'Moch Najib', 'jabatan' => 'Laboran PPLG',
    'mapel' => 'Laboran PPLG', 'deskripsi' => 'Bertugas sebagai laboran, mendukung kegiatan praktik siswa program keahlian Pengembangan Perangkat Lunak dan Gim.',
    'foto' => 'teachers/moch-najib.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-003', 'nama_guru' => 'Ahmad Suhendra', 'jabatan' => 'Kebersihan & Keindahan Sekolah',
    'mapel' => 'Kebersihan & Keindahan Sekolah', 'deskripsi' => 'Bertanggung jawab menjaga kebersihan dan keindahan lingkungan sekolah.',
    'foto' => 'teachers/ahmad-suhendra.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-004', 'nama_guru' => 'D Jamaludin', 'jabatan' => 'Kebersihan & Keindahan Sekolah',
    'mapel' => 'Kebersihan & Keindahan Sekolah', 'deskripsi' => 'Bertanggung jawab menjaga kebersihan dan keindahan lingkungan sekolah.',
    'foto' => 'teachers/d-jamaludin.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-005', 'nama_guru' => 'Apendi', 'jabatan' => 'Kebersihan & Keindahan Sekolah',
    'mapel' => 'Kebersihan & Keindahan Sekolah', 'deskripsi' => 'Bertanggung jawab menjaga kebersihan dan keindahan lingkungan sekolah.',
    'foto' => 'teachers/apendi.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-006', 'nama_guru' => 'Tatang Rustandi', 'jabatan' => 'Kebersihan & Keindahan Sekolah',
    'mapel' => 'Kebersihan & Keindahan Sekolah', 'deskripsi' => 'Bertanggung jawab menjaga kebersihan dan keindahan lingkungan sekolah.',
    'foto' => 'teachers/tatang-rustandi.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-007', 'nama_guru' => 'Muldiansah', 'jabatan' => 'Keamanan & Ketertiban Sekolah',
    'mapel' => 'Keamanan & Ketertiban Sekolah', 'deskripsi' => 'Bertanggung jawab menjaga keamanan dan ketertiban lingkungan sekolah.',
    'foto' => 'teachers/muldiansah.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-008', 'nama_guru' => 'Yogi Saputra', 'jabatan' => 'Keamanan & Ketertiban Sekolah',
    'mapel' => 'Keamanan & Ketertiban Sekolah', 'deskripsi' => 'Bertanggung jawab menjaga keamanan dan ketertiban lingkungan sekolah.',
    'foto' => 'teachers/yogi-saputra.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-009', 'nama_guru' => 'Nurdiansah, S.IP.', 'jabatan' => 'Adm. Persuratan, Kesiswaan & Kurikulum',
    'mapel' => 'Adm. Persuratan, Kesiswaan & Kurikulum', 'deskripsi' => 'Menangani administrasi persuratan, kesiswaan, dan kurikulum sekolah.',
    'foto' => 'teachers/nurdiansah.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-010', 'nama_guru' => 'Sima Kristina, S.Kom.', 'jabatan' => 'Adm. Keuangan dan Publikasi',
    'mapel' => 'Adm. Keuangan dan Publikasi', 'deskripsi' => 'Menangani administrasi keuangan dan publikasi informasi sekolah.',
    'foto' => 'teachers/sima-kristina.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-011', 'nama_guru' => 'Sakti Alamsyah, S.E.', 'jabatan' => 'Administrasi Sarpras',
    'mapel' => 'Administrasi Sarpras', 'deskripsi' => 'Menangani administrasi sarana dan prasarana sekolah.',
    'foto' => 'teachers/sakti-alamsyah.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-012', 'nama_guru' => 'Ayi Suryati, A.Ma.Pust.', 'jabatan' => 'Administrasi Perpustakaan',
    'mapel' => 'Administrasi Perpustakaan', 'deskripsi' => 'Mengelola administrasi dan layanan perpustakaan sekolah.',
    'foto' => 'teachers/ayi-suryati.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-013', 'nama_guru' => 'Nurah Alwaini, A.Ma.Pust.', 'jabatan' => 'Administrasi Perpustakaan',
    'mapel' => 'Administrasi Perpustakaan', 'deskripsi' => 'Mengelola administrasi dan layanan perpustakaan sekolah.',
    'foto' => 'teachers/nurah-alwaini.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-014', 'nama_guru' => 'Ramdan Bastaman', 'jabatan' => 'Administrasi Sarpras',
    'mapel' => 'Administrasi Sarpras', 'deskripsi' => 'Menangani administrasi sarana dan prasarana sekolah.',
    'foto' => 'teachers/ramdan-bastaman.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-015', 'nama_guru' => 'Saripul Basar', 'jabatan' => 'Laboran APHP',
    'mapel' => 'Laboran APHP', 'deskripsi' => 'Bertugas sebagai laboran, mendukung kegiatan praktik siswa program keahlian Agribisnis Pengolahan Hasil Pertanian.',
    'foto' => 'teachers/saripul-basar.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
[
    'nip' => 'TEMP-TU-016', 'nama_guru' => 'Asep Purnama', 'jabatan' => 'Laboran Teknik Otomotif',
    'mapel' => 'Laboran Teknik Otomotif', 'deskripsi' => 'Bertugas sebagai laboran, mendukung kegiatan praktik siswa program keahlian Teknik Otomotif.',
    'foto' => 'teachers/asep-purnama.jpg', 'jurusan_id' => null, 'kategori' => 'tu',
],
        ];

        foreach ($data as $item) {
            Guru::firstOrCreate(['nip' => $item['nip']], $item);
        }
    }
}