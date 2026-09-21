<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            $table->unsignedInteger('jumlah_siswa')->default(0)->after('youtube');
            $table->unsignedInteger('jumlah_guru')->default(0)->after('jumlah_siswa');
            $table->unsignedInteger('jumlah_alumni')->default(0)->after('jumlah_guru');
            $table->unsignedInteger('jumlah_prestasi')->default(0)->after('jumlah_alumni');
        });
    }

    public function down(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            $table->dropColumn(['jumlah_siswa', 'jumlah_guru', 'jumlah_alumni', 'jumlah_prestasi']);
        });
    }
};