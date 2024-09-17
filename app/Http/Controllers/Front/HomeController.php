<?php

namespace App\Http\Controllers\Front;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;
use App\Models\WebConfig;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::query()->with("imageThumbnail", "kategori")->limit(4)->get();
        $webConfig = WebConfig::get();

        return view("pages.front.home", [
            'produk' => $produk,
            "webConfig" => $webConfig
        ]);
    }

    public function dataNavbar()
    {
        $kategoriProduk = KategoriProduk::get();


        return response()->json([
            "kategori_produk" => $kategoriProduk
        ]);
    }
}
