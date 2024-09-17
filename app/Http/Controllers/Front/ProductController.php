<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $items = Produk::query();

        $kategoriFilter = $request->kategori;
        if ($kategoriFilter) {
            $items = $items->whereHas("kategori", function ($query) use ($kategoriFilter) {
                return $query->whereIn("slug", $kategoriFilter);
            });
        } else {
            $kategoriFilter = [];
        }

        $search = $request->q;
        if ($search) {
            $items = $items->where("nama", "LIKE", "%$search%");
        }

        $items = $items->with("kategori", "image")->paginate(12);

        foreach ($items as $item) {
            $item->thumbnail = $item->image->where("is_thumbnail", 1)->first();
        }

        $kategori = KategoriProduk::get();

        return view("pages.front.list-produk", compact("items", "kategori", "kategoriFilter"));
    }
    public function show($slug)
    {
        $produk = Produk::where("slug", $slug)->firstOrFail();

        $produkLainnya = Produk::where("kategori_produk_id", $produk->kategori_produk_id)
            ->where("id", "!=", $produk->id)
            ->limit(4)
            ->get();

        return view("pages.front.product-detail", compact("produk", "produkLainnya"));
    }
}
