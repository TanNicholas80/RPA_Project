<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'nama_kategori',
    ];

    // Relasi One-to-Many dengan Produk
    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id', 'id');
    }
}
