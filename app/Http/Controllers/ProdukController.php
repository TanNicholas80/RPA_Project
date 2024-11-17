<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::with('kategori')->paginate(10);
        $kategoris = Kategori::all();

        return view('produk.index', compact('produk', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produk::create([
            'nama_produk' => $request->input('nama_produk'),
            'durasi_foto' => $request->input('durasi_foto'),
            'edit_foto' => $request->input('edit_foto'),
            'total_crew' => $request->input('total_crew'),
            'cetak_foto' => $request->input('cetak_foto'),
            'total_orang' => $request->input('total_orang'),
            'harga_produk' => $request->input('harga_produk'),
            'kategori_id' => $request->input('kategori'),
        ]);

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::find($id);

        $produk->nama_produk = $request->input('nama_produk');
        $produk->durasi_foto = $request->input('durasi_foto');
        $produk->edit_foto = $request->input('edit_foto');
        $produk->total_crew = $request->input('total_crew');
        $produk->cetak_foto = $request->input('cetak_foto');
        $produk->total_orang = $request->input('total_orang');
        $produk->harga_produk = $request->input('harga_produk');
        $produk->kategori_id = $request->input('kategori');
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
