<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'nama_produk',
        'durasi_foto',
        'edit_foto',
        'total_crew',
        'cetak_foto',
        'harga_produk',
        'total_orang',
        'kategori_id',
    ];

    // Relasi Many-to-One dengan Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    // Relasi One-to-Many dengan AddOn
    public function addons()
    {
        return $this->hasMany(Addon::class, 'produk_id', 'id');
    }

    // Relasi One-to-Many dengan Portofolio
    public function portofolio()
    {
        return $this->hasMany(Portofolio::class, 'produk_id', 'id');
    }
}
