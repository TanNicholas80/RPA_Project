<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::paginate(10);

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Display Listing Kategori From Searchbar 
     */
    public function search(Request $req)
    {
        // Ambil query pencarian dari input
        $query = $req->input('search');

        // Cari kategori berdasarkan nama
        $kategori = Kategori::where('nama_kategori', 'LIKE', "%{$query}%")->paginate(10);

        return view('kategori.index', compact('kategori', 'query'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kategori::create([
            'nama_kategori' => $request->input('name_kategori'),
        ]);

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->input('name_kategori');
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
