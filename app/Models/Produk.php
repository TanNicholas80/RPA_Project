<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'durasi_foto',
        'edit_foto',
        'total_crew',
        'cetak_foto',
        'harga_produk',
        'total_orang',
        'kategori_id'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function addon() {
        return $this->hasMany(AddOn::class, 'produk_id');
    }

    public function portofolio() {
        return $this->hasMany(Portofolio::class, 'produk_id');
    }
}
