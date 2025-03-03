<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Sample Dummy Users Array
        $produks = [
            [
                'kategori_id' => 1,
                'nama_produk' => 'Wedding Packages Gold',
                'durasi_foto' => '1 Hari 8 Jam',
                'edit_foto' => 'Video Cinematic 5 Menit',
                'total_crew' => null,
                'cetak_foto' => 'Story Book 40 Halaman (60 x20), Album Magnetic 10 Sheet, Pembesaran Cetak Ukuran 40 x 60 Frame',
                'total_orang' => null,
                'harga_produk' => '8500000'
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Wedding Paket Magnet 1',
                'durasi_foto' => '1 hari jam kerja',
                'edit_foto' => null,
                'total_crew' => '2',
                'cetak_foto' => '2 Album Magnet Jumbo 10 Sheets (4R), 1 Cetak Laminasi Canvas 12r + frame',
                'total_orang' => null,
                'harga_produk' => '3000000'
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Wedding Paket Magnet 2',
                'durasi_foto' => '1 hari jam kerja',
                'edit_foto' => null,
                'total_crew' => '2',
                'cetak_foto' => '2 Album Magnet Jumbo 25 Sheets (4R), 1 Cetak Laminasi Canvas 12r + frame',
                'total_orang' => null,
                'harga_produk' => '3500000'
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Wedding Paket Magnet 3',
                'durasi_foto' => '1 hari jam kerja',
                'edit_foto' => null,
                'total_crew' => '4',
                'cetak_foto' => '2 Album Magnet Jumbo 10 Sheets (4R), 1 Cetak Laminasi Canvas 12r + frame',
                'total_orang' => null,
                'harga_produk' => '4000000'
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Engangement Silver',
                'durasi_foto' => '1 hari',
                'edit_foto' => 'Free 1 menit Video IG',
                'total_crew' => '2',
                'cetak_foto' => '1 Album Kolase 10 Sheets (20 x 60cm)',
                'total_orang' => null,
                'harga_produk' => '2500000'
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Engangement Gold',
                'durasi_foto' => '1 hari',
                'edit_foto' => 'Video Highlight 3 menit, Free 1 menit Video IG',
                'total_crew' => '2',
                'cetak_foto' => '1 Album Kolase 10 Sheets (20 x 60cm)',
                'total_orang' => null,
                'harga_produk' => '3500000'
            ],
            [
                'kategori_id' => 3,
                'nama_produk' => 'Photobooth A',
                'durasi_foto' => '2 jam',
                'edit_foto' => null,
                'total_crew' => null,
                'cetak_foto' => 'Unlimited Paper',
                'total_orang' => null,
                'harga_produk' => '2750000'
            ],
            [
                'kategori_id' => 3,
                'nama_produk' => 'Photobooth B',
                'durasi_foto' => '3 jam',
                'edit_foto' => null,
                'total_crew' => null,
                'cetak_foto' => 'Unlimited Paper',
                'total_orang' => null,
                'harga_produk' => '3750000'
            ],
            [
                'kategori_id' => 3,
                'nama_produk' => 'Photobooth C',
                'durasi_foto' => '4 jam',
                'edit_foto' => null,
                'total_crew' => null,
                'cetak_foto' => 'Unlimited Paper',
                'total_orang' => null,
                'harga_produk' => '4750000'
            ],
            [
                'kategori_id' => 4,
                'nama_produk' => 'Foto Company Profile',
                'durasi_foto' => '1-2 hari',
                'edit_foto' => null,
                'total_crew' => '3',
                'cetak_foto' => '1 Album Magazine/kolase ukr 20x30 10sheat, 1 Album Magnet',
                'total_orang' => null,
                'harga_produk' => '8000000'
            ],
            [
                'kategori_id' => 4,
                'nama_produk' => 'Video Company Profile',
                'durasi_foto' => '1-2 hari',
                'edit_foto' => null,
                'total_crew' => '3',
                'cetak_foto' => '1 Video Company Profil in Flashdisk',
                'total_orang' => null,
                'harga_produk' => '10000000'
            ],
            [
                'kategori_id' => 5,
                'nama_produk' => 'Advertising Dimensi Kecil',
                'durasi_foto' => null,
                'edit_foto' => null,
                'total_crew' => null,
                'cetak_foto' => null,
                'total_orang' => null,
                'harga_produk' => '75000'
            ],
            [
                'kategori_id' => 5,
                'nama_produk' => 'Advertising Makanan dan Minuman',
                'durasi_foto' => null,
                'edit_foto' => null,
                'total_crew' => null,
                'cetak_foto' => null,
                'total_orang' => null,
                'harga_produk' => '100000'
            ],
            [
                'kategori_id' => 5,
                'nama_produk' => 'Olshop Dimensi Kecil',
                'durasi_foto' => null,
                'edit_foto' => null,
                'total_crew' => null,
                'cetak_foto' => null,
                'total_orang' => null,
                'harga_produk' => null
            ],
            [
                'kategori_id' => 5,
                'nama_produk' => 'Olshop Dimensi Sedang',
                'durasi_foto' => null,
                'edit_foto' => null,
                'total_crew' => null,
                'cetak_foto' => null,
                'total_orang' => null,
                'harga_produk' => null
            ],
            [
                'kategori_id' => 7,
                'nama_produk' => 'Group A',
                'durasi_foto' => '20 Menit',
                'edit_foto' => '5 Edit Foto',
                'total_crew' => null,
                'cetak_foto' => '10 Cetak 4R',
                'total_orang' => '2-5 Orang',
                'harga_produk' => '200000'
            ],
            [
                'kategori_id' => 7,
                'nama_produk' => 'Group B',
                'durasi_foto' => '20 Menit',
                'edit_foto' => '6 Edit Foto',
                'total_crew' => null,
                'cetak_foto' => '5 Cetak 4R',
                'total_orang' => '2-6 Orang',
                'harga_produk' => '250000'
            ],
            [
                'kategori_id' => 7,
                'nama_produk' => 'Group C',
                'durasi_foto' => '30 Menit',
                'edit_foto' => '5 Edit Foto',
                'total_crew' => null,
                'cetak_foto' => '10 Cetak 4R',
                'total_orang' => '2-5 Orang',
                'harga_produk' => '350000'
            ],
            [
                'kategori_id' => 8,
                'nama_produk' => 'Graduation Family',
                'durasi_foto' => '20 Menit',
                'edit_foto' => '5 Edit Foto',
                'total_crew' => null,
                'cetak_foto' => '5 Cetak 4R, 1 Cetak 30x40 (12R) Kolase',
                'total_orang' => '2-7 Orang',
                'harga_produk' => '350000'
            ],
            [
                'kategori_id' => 8,
                'nama_produk' => 'Graduation Exclusive',
                'durasi_foto' => '20 Menit',
                'edit_foto' => '6 Edit Foto',
                'total_crew' => null,
                'cetak_foto' => '5 Cetak 4R, 1 Cetak 40x60 (16R) Plus Frame',
                'total_orang' => '2-9 Orang',
                'harga_produk' => '500000'
            ],
            [
                'kategori_id' => 9,
                'nama_produk' => 'Couple A',
                'durasi_foto' => '20 Menit',
                'edit_foto' => '5 Edit Foto',
                'total_crew' => null,
                'cetak_foto' => '5 Cetak 4R, 1 Cetak 20x30 (8R) Plus Frame',
                'total_orang' => '2 Orang',
                'harga_produk' => '250000'
            ],
            [
                'kategori_id' => 9,
                'nama_produk' => 'Couple B',
                'durasi_foto' => '30 Menit',
                'edit_foto' => '5 Edit Foto',
                'total_crew' => null,
                'cetak_foto' => '5 Cetak 4R, 1 Cetak 30x40 (8R) Plus Frame',
                'total_orang' => '2 Orang',
                'harga_produk' => '500000'
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
