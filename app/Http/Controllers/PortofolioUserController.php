<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioUserController extends Controller
{
    /**
     * Menampilkan halaman utama portofolio dengan daftar kategori dan portofolio.
     */
    public function index(Request $request)
    {
        // Ambil kategori beserta relasi produk dan portofolio
        $kategoris = Kategori::with(['produk.portofolio'])->get();

        // Ambil kategori_id dari query string untuk filter
        $kategoriId = $request->input('kategori_id');

        // Filter portofolio berdasarkan kategori_id atau ambil semua jika kategori_id kosong
        $portofolios = $kategoriId
            ? Portofolio::whereHas('produk', function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })->get()
            : Portofolio::all();

        // Kirim data ke view
        return view('user.portofoliouser.index', compact('kategoris', 'portofolios', 'kategoriId'));
    }
}
