<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    
    protected $table = 'guru';
    protected $fillable = ['nip', 'nama_guru', 'mapel', 'foto', 'deskripsi', 'jurusan_id', 'jabatan', 'kategori'];
    
public function jurusan()
{
    return $this->belongsTo(Jurusan::class);
}
}