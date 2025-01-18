<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'foto_portofolio',
        'produk_id',
<<<<<<< HEAD
=======
        'status_portofolio'
>>>>>>> 800fb382205e3a4c3f8e56cb22b7cf2b5a29740b
    ];

    // Relasi Many-to-One dengan Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
