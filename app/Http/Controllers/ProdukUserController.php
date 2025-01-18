<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukUserController extends Controller
{
    public function index()
{
    // Ambil kategori beserta produk dan addons
    $kategoris = Kategori::with('produk.addons')->get();

    // Pastikan $kategoris tidak null sebelum dikirim ke view
    if ($kategoris->isEmpty()) {
        return view('user.produkuser.index', ['kategoris' => collect()]); // Kirim koleksi kosong
    }

    return view('user.produkuser.index', ['kategoris' => $kategoris]);
}

public function show($id)
{
    // Temukan produk berdasarkan ID
    $produk = Produk::findOrFail($id);

    // Ambil kategori beserta produk yang memiliki addons
    $kategoris = Kategori::with('produk.addons')->get();

    // Pastikan $kategoris valid
    if ($kategoris->isEmpty()) {
        $kategoris = collect(); // Koleksi kosong untuk menghindari error
    }

    return view('user.produkuser.detail', compact('produk', 'kategoris'));
}

}
