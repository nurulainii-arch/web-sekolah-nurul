<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            $table->string('nilai_akreditasi', 10)->nullable()->after('jumlah_prestasi');
            $table->string('no_sk_akreditasi')->nullable()->after('nilai_akreditasi');
            $table->date('tanggal_akreditasi')->nullable()->after('no_sk_akreditasi');
            $table->string('file_akreditasi')->nullable()->after('tanggal_akreditasi');
        });
    }

    public function down(): void
    {
        Schema::table('school_settings', function (Blueprint $table) {
            $table->dropColumn(['nilai_akreditasi', 'no_sk_akreditasi', 'tanggal_akreditasi', 'file_akreditasi']);
        });
    }
};