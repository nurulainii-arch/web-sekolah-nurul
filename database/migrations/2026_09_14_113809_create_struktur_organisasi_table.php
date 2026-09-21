<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->string('nama')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });

        // Seed 6 jabatan tetap
        $jabatan = [
            'Kepala Sekolah',
            'Wakil Kepala Sekolah Bidang Kurikulum',
            'Wakil Kepala Sekolah Bidang Kesiswaan',
            'Wakil Kepala Sekolah Bidang Sarana & Prasarana',
            'Wakil Kepala Sekolah Bidang Hubungan Industri (Humas)',
            'Kepala Tata Usaha',
        ];

        foreach ($jabatan as $i => $label) {
            DB::table('struktur_organisasi')->insert([
                'jabatan' => $label,
                'nama' => null,
                'foto' => null,
                'urutan' => $i + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi');
    }
};