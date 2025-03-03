<?php

namespace Database\Seeders;

use App\Models\AddOn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddOnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $add_ons = [
            [
                'produk_id' => 4,
                'nama_addon' => 'Full Package',
                'keterangan_addon' => 'Fotografer, Fun Property, Light Studio, Frame Karton',
                'harga_addon' => null,
            ],
            [
                'produk_id' => 5,
                'nama_addon' => 'Full Package',
                'keterangan_addon' => 'Fotografer, Fun Property, Light Studio, Frame Karton',
                'harga_addon' => null,
            ],
            [
                'produk_id' => 6,
                'nama_addon' => 'Full Package',
                'keterangan_addon' => 'Fotografer, Fun Property, Light Studio, Frame Karton',
                'harga_addon' => null,
            ],
            [
                'produk_id' => 7,
                'nama_addon' => 'Extra per hari',
                'keterangan_addon' => 'Harga tersebut belum termasuk PPN 10% dan PPH 1%, Akomodasi Luar Kota, dan pengambilan dengan drone',
                'harga_addon' => '2000000',
            ],
            [
                'produk_id' => 8,
                'nama_addon' => 'Extra per hari',
                'keterangan_addon' => 'Harga tersebut belum termasuk PPN 10% dan PPH 1%, Akomodasi Luar Kota, dan pengambilan dengan drone',
                'harga_addon' => '2000000',
            ],
            [
                'produk_id' => 11,
                'nama_addon' => '1-10 item',
                'keterangan_addon' => null,
                'harga_addon' => '30000',
            ],
            [
                'produk_id' => 11,
                'nama_addon' => '11-20 item',
                'keterangan_addon' => null,
                'harga_addon' => '25000',
            ],
            [
                'produk_id' => 11,
                'nama_addon' => '>20 item',
                'keterangan_addon' => null,
                'harga_addon' => '20000',
            ],
            [
                'produk_id' => 12,
                'nama_addon' => '1-10 item',
                'keterangan_addon' => null,
                'harga_addon' => '40000',
            ],
            [
                'produk_id' => 12,
                'nama_addon' => '11-20 item',
                'keterangan_addon' => null,
                'harga_addon' => '35000',
            ],
            [
                'produk_id' => 12,
                'nama_addon' => '>20 item',
                'keterangan_addon' => null,
                'harga_addon' => '30000',
            ],
            [
                'produk_id' => 13,
                'nama_addon' => 'Roll Foto',
                'keterangan_addon' => null,
                'harga_addon' => '300000',
            ],
            [
                'produk_id' => 13,
                'nama_addon' => 'Extra Hari',
                'keterangan_addon' => null,
                'harga_addon' => '750000',
            ],
            [
                'produk_id' => 14,
                'nama_addon' => 'Roll Foto',
                'keterangan_addon' => null,
                'harga_addon' => '300000',
            ],
            [
                'produk_id' => 14,
                'nama_addon' => 'Extra Hari',
                'keterangan_addon' => null,
                'harga_addon' => '750000',
            ],
            [
                'produk_id' => 15,
                'nama_addon' => 'Roll Foto',
                'keterangan_addon' => null,
                'harga_addon' => '300000',
            ],
            [
                'produk_id' => 15,
                'nama_addon' => 'Extra Hari',
                'keterangan_addon' => null,
                'harga_addon' => '750000',
            ],
            [
                'produk_id' => 16,
                'nama_addon' => 'Extra Person',
                'keterangan_addon' => null,
                'harga_addon' => '15000',
            ],
            [
                'produk_id' => 16,
                'nama_addon' => 'Extra Time',
                'keterangan_addon' => 'Setiap 10 Menit',
                'harga_addon' => '25000',
            ],
            [
                'produk_id' => 17,
                'nama_addon' => 'Extra Person',
                'keterangan_addon' => null,
                'harga_addon' => '15000',
            ],
            [
                'produk_id' => 17,
                'nama_addon' => 'Extra Time',
                'keterangan_addon' => 'Setiap 10 Menit',
                'harga_addon' => '25000',
            ],
            [
                'produk_id' => 18,
                'nama_addon' => 'Extra Person',
                'keterangan_addon' => null,
                'harga_addon' => '15000',
            ],
            [
                'produk_id' => 18,
                'nama_addon' => 'Extra Time',
                'keterangan_addon' => 'Setiap 10 Menit',
                'harga_addon' => '25000',
            ],
            [
                'produk_id' => 19,
                'nama_addon' => 'Extra Person',
                'keterangan_addon' => null,
                'harga_addon' => '15000',
            ],
            [
                'produk_id' => 19,
                'nama_addon' => 'File Only',
                'keterangan_addon' => '20+ Pose, Copy on DVD',
                'harga_addon' => '225000',
            ],
            [
                'produk_id' => 20,
                'nama_addon' => 'Extra Person',
                'keterangan_addon' => null,
                'harga_addon' => '15000',
            ],
            [
                'produk_id' => 20,
                'nama_addon' => 'File Only',
                'keterangan_addon' => '20+ Pose, Copy on DVD',
                'harga_addon' => '225000',
            ],
        ];

        foreach ($add_ons as $add_on) {
            AddOn::create($add_on);
        }
    }
}
