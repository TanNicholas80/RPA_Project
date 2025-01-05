<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_portofolio',
        'produk_id'
    ];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
