<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->renameColumn('nama_fasilitas', 'judul');
            $table->string('kategori')->nullable()->after('judul');
            $table->dropColumn(['deskripsi', 'lokasi', 'kapasitas']);
        });
    }

    public function down(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->renameColumn('judul', 'nama_fasilitas');
            $table->dropColumn('kategori');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('kapasitas')->nullable();
        });
    }
};