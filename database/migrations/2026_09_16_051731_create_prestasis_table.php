<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');       // contoh: "JUARA 1 - TINGKAT KABUPATEN"
            $table->string('judul');          // contoh: "LKS Web Technologies 2026"
            $table->text('deskripsi');
            $table->date('tanggal');          // dipakai untuk tampilkan "Mei 2026"
            $table->string('gambar_sampul')->nullable();
            $table->string('icon')->default('fa-trophy'); // nama icon FontAwesome
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};