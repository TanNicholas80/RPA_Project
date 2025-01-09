<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukUserController extends Controller
{
    public function index()
    {
        // Ambil kategori unik yang memiliki portofolio
        $kategoris = Kategori::with(['produk.portofolio'])->get();

        // Kirim data ke view
        return view('user.produkuser.index', compact('kategoris'));
    }
}
