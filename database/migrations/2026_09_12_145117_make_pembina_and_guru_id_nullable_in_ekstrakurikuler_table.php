<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
        });

        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->string('pembina', 100)->nullable()->change();
            $table->foreignId('guru_id')->nullable()->change();
            $table->foreign('guru_id')->references('id')->on('guru')
                  ->cascadeOnUpdate()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->string('pembina', 100)->nullable(false)->change();
            $table->foreignId('guru_id')->nullable(false)->change();
            $table->foreign('guru_id')->references('id')->on('guru')
                  ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }
};