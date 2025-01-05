<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Tes\LaravelGoogleDriveStorage\GoogleDriveService;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portofolio = Portofolio::with('produk')->paginate(9);
        $produks = Produk::all();

        return view('portofolio.index', compact('portofolio', 'produks'));
    }

    /**
     * Display Listing Portofolio From Searchbar 
     */
    public function search(Request $req)
    {
        // Ambil query pencarian dari input
        $query = $req->input('search');
        $produks = Produk::all();

        // Cari Portofolio berdasarkan nama produk
        $portofolio = Portofolio::whereHas('produk', function ($q) use ($query) {
            $q->where('nama_produk', 'LIKE', "%{$query}%");
        })->paginate(9);

        return view('portofolio.index', compact('portofolio', 'produks', 'query'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('foto_portofolio');
        $folderId = "1Chxs7GTIjBETBE5YmiofuBR5ZBTr-v1M";
        $response = GoogleDriveService::uploadFile($file, $folderId);

        // Simpan informasi ke database
        Portofolio::create([
            'foto_portofolio' => $response->id,
            'produk_id' => $request->input('produk'),
        ]);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portofolio = Portofolio::find($id);

        // Periksa apakah user memberikan input 'foto_portofolio'
        if ($request->hasFile('foto_portofolio')) {
            $fileId = $portofolio->foto_portofolio;

            // Cek metadata dari file yang ada di Google Drive
            $metadata = GoogleDriveService::getFileMetadata($fileId);
            if (!$metadata) {
                return redirect()->route('portofolio.index')->with('error', 'File tidak ditemukan di Google Drive.');
            }

            // Hapus file lama dari Google Drive
            $fileName = $metadata['name'];
            $path = "RPA_Photo/$fileName";
            $response = GoogleDriveService::delete($path);

            if (!$response) {
                return redirect()->route('portofolio.index')->with('error', 'Gagal menghapus file dari Google Drive.');
            }

            // Upload file baru ke Google Drive
            $folderId = "1Chxs7GTIjBETBE5YmiofuBR5ZBTr-v1M";
            $file = $request->file('foto_portofolio');
            $response = GoogleDriveService::uploadFile($file, $folderId);
            $portofolio->foto_portofolio = $response->id; // Update ID file baru
        }

        // Update data lainnya
        $portofolio->produk_id = $request->input('produk');
        $portofolio->save();

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portofolio = Portofolio::findOrFail($id);

        $fileId = $portofolio->foto_portofolio;
        $metadata = GoogleDriveService::getFileMetadata($fileId);
        if (!$metadata) {
            return redirect()->route('portofolio.index')->with('error', 'File tidak ditemukan di Google Drive.');
        }

        $fileName = $metadata['name'];
        $path = "RPA_Photo/$fileName";
        $response = Storage::disk('google')->delete($path);

        if (!$response) {
            return redirect()->route('portofolio.index')->with('error', 'Gagal menghapus file dari Google Drive.');
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')->with('success', 'Portfolio berhasil dihapus.');
    }
}
