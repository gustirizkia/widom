<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            "Interior",
            "Gift",
            "Material",
            "Dekorasi",
            "Software",
            "Plakat",
            "Tools",
            "Elektronik",
            "Machine",
            "Exterior",
        ];

        foreach ($kategori as $item) {
            KategoriProduk::create([
                "nama" => $item
            ]);
        }
    }
}
