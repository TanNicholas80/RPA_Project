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
        // Ambil semua kategori untuk ditampilkan pada tombol filter
        $kategoris = Kategori::all();

        // Ambil kata kunci pencarian dari input
        $search = $request->input('search');

        // Jika ada filter kategori
        if ($request->filled('kategori_id')) {
            $kategoriId = $request->input('kategori_id');
            $filteredKategori = Kategori::with(['produk.portofolio'])
                ->where('id', $kategoriId)
                ->get();
        } else {
            $filteredKategori = Kategori::with(['produk.portofolio'])->get();
        }

        // Query untuk pencarian
        if ($search) {
            $searchedPorto = Kategori::with(['produk.portofolio'])
                ->where('nama_kategori', 'LIKE', '%' . $search . '%') // Pencarian pada kategori
                ->orWhereHas('produk', function ($query) use ($search) {
                    $query->where('nama_produk', 'LIKE', '%' . $search . '%') // Pencarian pada produk
                        ->orWhereHas('portofolio', function ($query) use ($search) {
                            $query->where('nama_portofolio', 'LIKE', '%' . $search . '%'); // Pencarian pada portofolio
                        });
                })
                ->get();

            // Kirim hasil pencarian ke view
            return view('user.portofoliouser.index', compact('kategoris', 'searchedPorto'));
        }

        // Kirim data ke view
        return view('user.portofoliouser.index', compact('kategoris', 'filteredKategori'));
    }
}
