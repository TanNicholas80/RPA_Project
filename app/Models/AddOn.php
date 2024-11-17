<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_addon',
        'keterangan_addon',
        'harga_addon',
        'produk_id'
    ];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
