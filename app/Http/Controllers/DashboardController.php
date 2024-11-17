<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use App\Models\Kategori;
use App\Models\Portofolio;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index() {
        $totalProduk = Produk::count();
        $totalPortofolio = Portofolio::count();
        $totalAddOn = AddOn::count();
        $totalKategori = Kategori::count();

        return view('dashboard', compact('totalProduk', 'totalPortofolio', 'totalAddOn', 'totalKategori'));
    }
}
