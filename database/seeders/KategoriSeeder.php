<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Wedding',
            'Engangement',
            'Photobooth',
            'Company Profile',
            'Foto Produk',
            'Pre Wedding',
            'Group',
            'Graduation',
            'Couple'
        ];

        foreach ($categories as $category) {
            DB::table('kategoris')->insert([
                'nama_kategori' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
