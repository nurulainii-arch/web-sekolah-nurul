<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikuler';

    protected $fillable = [
    'nama_ekskul',
    'pembina',
    'deskripsi',
    'logo',
    'gambar_sampul',
    'guru_id',
];

    // Relasi ke tabel guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}