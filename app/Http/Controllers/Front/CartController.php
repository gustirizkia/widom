<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myCart = Cart::where("user_id", auth()->user()->id)
            ->with("produk")
            ->get();

        $totalHarga = 0;

        foreach ($myCart as $item) {
            $totalHarga += $item->produk->harga * $item->qty;
        }


        return view("pages.front.cart", compact("myCart", "totalHarga"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $qty = $request->qty;
        $slug = $request->slug;

        $produk = Produk::where("slug", $slug)->first();

        $myCart = Cart::where("user_id", auth()->user()->id)
            ->where("produk_id", $produk->id)->first();

        if ($myCart) {
            $myCart->update([
                "qty" => $myCart->qty + $qty
            ]);
        } else {
            $myCart = Cart::create([
                "user_id" => auth()->user()->id,
                "produk_id" => $produk->id,
                "qty" => $qty
            ]);
        }


        return redirect()->back()->with("success", "Berhasil menambahkan produk kedalam keranjang");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
