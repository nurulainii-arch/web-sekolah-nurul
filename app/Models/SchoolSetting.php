<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    protected $table = 'school_settings';

    protected $fillable = [
        'school_name', 'slogan', 'history', 'vision', 'mission',
        'principal_name', 'principal_photo', 'principal_welcome',
        'address', 'maps_embed_url', 'phone', 'email', 'facebook', 'instagram', 'youtube',
        'jumlah_siswa', 'jumlah_guru', 'jumlah_alumni', 'jumlah_prestasi',
        'nilai_akreditasi', 'no_sk_akreditasi', 'tanggal_akreditasi', 'file_akreditasi',
        'hero_background', 'visimisi_background',
    ];
}