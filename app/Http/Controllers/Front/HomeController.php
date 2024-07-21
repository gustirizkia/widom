<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view("pages.front.home");
    }

    public function dataNavbar()
    {
        $kategoriProduk = KategoriProduk::get();


        return response()->json([
            "kategori_produk" => $kategoriProduk
        ]);
    }
}
