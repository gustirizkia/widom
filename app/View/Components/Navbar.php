<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\JasaKategori;
use App\Models\KategoriBlog;
use App\Models\KategoriProduk;
use App\Models\Pageweb;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            $user_id = null;
        }

        $cart = Cart::where("user_id", $user_id)->get();

        $page = Pageweb::get();
        $kategoriProduk = KategoriProduk::get();
        $kategoriJasa = JasaKategori::limit(5)->get();

        $kategoriBlog = KategoriBlog::orderBy("nama", "asc")->get();

        return view('components.navbar', [
            "cart" => $cart,
            "page" => $page,
            "kategoriProduk" => $kategoriProduk,
            "kategoriJasa" => $kategoriJasa,
            "kategoriBlog" => $kategoriBlog
        ]);
    }
}
