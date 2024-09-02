<?php

namespace Database\Seeders;

use App\Models\JasaKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JasaKategori::create([
            "nama" => "Jasa Design"
        ]);
        JasaKategori::create([
            "nama" => "Jasa Machining"
        ]);
        JasaKategori::create([
            "nama" => "Custom Produk"
        ]);
        JasaKategori::create([
            "nama" => "Jasa 3D Scan"
        ]);
        JasaKategori::create([
            "nama" => "Training"
        ]);
    }
}
