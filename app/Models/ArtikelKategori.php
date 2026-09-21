<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ArtikelKategori extends Model
{
    use HasFactory;

    protected $table = 'artikel_kategori';

    protected $fillable = [
        'nama_kategori',
        'slug',
        'deskripsi',
        'ikon',
    ];

    // Otomatis generate slug jika nama_kategori diisi
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->nama_kategori);
            }
        });
    }

    // Relasi ke Model Artikel (opsional)
    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'kategori_id');
    }
}