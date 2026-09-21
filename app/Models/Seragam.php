<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seragam extends Model
{
    protected $table = 'seragam';
    protected $fillable = ['nama', 'hari', 'gambar', 'keterangan'];
}