<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class PortofolioUserController extends Controller
{
    public function index()
    {
        // Ambil kategori unik yang memiliki portofolio
        $kategoris =  Kategori::with(['produk.portofolio'])->get();

        // Kirim data ke view
        return view('user.portofoliouser.index', compact('kategoris'));
        
    }
}
