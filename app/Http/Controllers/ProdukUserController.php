<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Portofolio; // Pastikan model Portofolio di-import
use Illuminate\Http\Request;

class ProdukUserController extends Controller
{
    /**
     * Tampilkan daftar kategori beserta produk, addons, dan portofolio
     */
    public function index()
    {
        // Ambil kategori beserta produk dan addons
        $kategoris = Kategori::with('produk.addons', 'produk.portofolio')->get();

        // Ambil portofolio yang memiliki status 'foto'
        $portofolio = Portofolio::where('status_portofolio', 'foto')->get();

        // Pastikan $kategoris dan $portofolios tidak null sebelum dikirim ke view
        if ($kategoris->isEmpty()) {
            $kategoris = collect(); // Koleksi kosong untuk menghindari error
        }

        if ($portofolio->isEmpty()) {
            $portofolio = collect(); // Koleksi kosong untuk menghindari error
        }

        return view('user.produkuser.index', compact('kategoris', 'portofolio'));
    }

    /**
     * Tampilkan detail produk berdasarkan ID beserta portofolio
     */
    public function show($id)
    {
        // Temukan produk berdasarkan ID
        $produk = Produk::with(['kategori', 'portofolio', 'addons'])->findOrFail($id);

        // Ambil kategori beserta produk yang memiliki addons
        $kategoris = Kategori::with('produk.addons')->get();

        // Ambil portofolio yang memiliki status 'foto'
        $portofolio = Portofolio::where('status_portofolio', 'foto')->get();

        // Pastikan $kategoris dan $portofolios valid
        if ($kategoris->isEmpty()) {
            $kategoris = collect(); // Koleksi kosong untuk menghindari error
        }

        if ($portofolio->isEmpty()) {
            $portofolio = collect(); // Koleksi kosong untuk menghindari error
        }

        return view('user.produkuser.detail', compact('produk', 'kategoris', 'portofolio'));
    }
}
