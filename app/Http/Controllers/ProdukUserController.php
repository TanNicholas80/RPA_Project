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
    public function index(Request $request)
    {
        // Ambil semua kategori untuk ditampilkan pada tombol filter
        $kategoris = Kategori::all();

        // Ambil kata kunci pencarian dari input
        $search = $request->input('search');

        // Jika ada filter kategori
        if ($request->filled('kategori_id')) {
            $kategoriId = $request->input('kategori_id');
            $filteredKategori = Kategori::with('produk.addons', 'produk.portofolio')
                ->where('id', $kategoriId)
                ->get();
        } else {
            // Jika tidak ada filter, ambil semua data
            $filteredKategori = Kategori::with('produk.addons', 'produk.portofolio')->get();
        }

        // Jika ada pencarian
        if ($search) {
            // Lakukan pencarian pada kategori dan produk
            $searchedProduct = Kategori::where('nama_kategori', 'LIKE', '%' . $search . '%')
                ->orWhereHas('produk', function ($query) use ($search) {
                    $query->where('nama_produk', 'LIKE', '%' . $search . '%');
                })
                ->get();
            // Kirim variabel pencarian ke tampilan
            return view('user.produkuser.index', compact('kategoris', 'searchedProduct'));
        }

        return view('user.produkuser.index', compact('kategoris', 'filteredKategori'));
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
