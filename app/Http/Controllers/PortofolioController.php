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
        // Cek apakah ada file yang diupload dengan nama 'foto_portofolio'
        if ($request->hasFile('foto_portofolio')) {
            // Ambil file yang diupload
            $files = $request->file('foto_portofolio');
    
            // Pastikan $files adalah array, karena bisa jadi hanya ada satu file
            if (!is_array($files)) {
                $files = [$files]; // Jadikan array jika hanya satu file
            }
    
            // Proses setiap file dalam array $files
            foreach ($files as $file) {
                // Panggil metode uploadFile untuk mengupload file ke Google Drive
                $response = GoogleDriveService::uploadFile($file);
    
                // Simpan informasi file yang telah diupload ke database
                Portofolio::create([
                    'nama_portofolio' => $request->input('nama_portofolio'),
                    'foto_portofolio' => $response->id, // ID file yang diupload ke Google Drive
                    'status_portofolio' => $request->input('status_portofolio'), // Status portofolio
                    'produk_id' => $request->input('produk'), // ID produk yang terkait
                ]);
            }
        }
    
        // Redirect ke halaman portofolio dengan pesan sukses
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
            $path = "RPA_Photo_Video/$fileName";
            $response = GoogleDriveService::delete($path);

            if (!$response) {
                return redirect()->route('portofolio.index')->with('error', 'Gagal menghapus file dari Google Drive.');
            }

            // Upload file baru ke Google Drive
            $file = $request->file('foto_portofolio');
            $response = GoogleDriveService::uploadFile($file);
            $portofolio->foto_portofolio = $response->id; // Update ID file baru
        }

        // Update data lainnya
        $portofolio->nama_portofolio = $request->input('nama_portofolio');
        $portofolio->status_portofolio = $request->input('status_portofolio');
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
        $path = "RPA_Photo_Video/$fileName";
        $response = Storage::disk('google')->delete($path);

        if (!$response) {
            return redirect()->route('portofolio.index')->with('error', 'Gagal menghapus file dari Google Drive.');
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')->with('success', 'Portfolio berhasil dihapus.');
    }
}
