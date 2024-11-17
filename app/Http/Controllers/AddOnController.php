<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use App\Models\Produk;
use Illuminate\Http\Request;

class AddOnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addon = AddOn::with('produk')->paginate(10);
        $produks = Produk::all();

        return view('addon.index', compact('addon', 'produks'));
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
        AddOn::create([
            'nama_addon' => $request->input('nama_addon'),
            'keterangan_addon' => $request->input('keterangan_addon'),
            'harga_addon' => $request->input('harga_addon'),
            'produk_id' => $request->input('produk'),
        ]);

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('addon.index')->with('success', 'AddOn berhasil ditambahkan!');
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
        $addon = AddOn::find($id);

        $addon->nama_addon = $request->input('nama_addon');
        $addon->keterangan_addon = $request->input('keterangan_addon');
        $addon->produk_id = $request->input('produk');
        $addon->harga_addon = $request->input('harga_addon');
        $addon->save();

        return redirect()->route('addon.index')->with('success', 'AddOn berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $addon = AddOn::findOrFail($id);

        $addon->delete();

        return redirect()->route('addon.index')->with('success', 'AddOn berhasil dihapus.');
    }
}
