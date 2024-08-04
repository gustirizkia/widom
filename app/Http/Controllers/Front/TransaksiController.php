<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Cart;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Transaksi::orderBy("id", "desc")
            ->where("user_id", auth()->user()->id)
            ->with("detail")->paginate(12);

        return view("pages.front.user.transaksi.index", [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Session::get("temp_order");

        $produk = Produk::whereIn("id", $data["produk_id"])->with("imageThumbnail", "kategori")->get();

        $totalHarga = 0;
        $totalItem = 0;
        foreach ($produk as $index => $item) {
            $qty = $data["qty"][$index];

            $totalHarga += $item->harga * $qty;
            $totalItem += $qty;

            $item->qty = $qty;
        }

        $bank = Bank::orderBy("nama")->get();

        return view("pages.front.transaksi.create", [
            'produk' => $produk,
            "totalHarga" => $totalHarga,
            "totalItem" => $totalItem,
            "bank" => $bank
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->checkout) {
            $data = $request->except("_token");

            Session::put("temp_order", $data);

            return redirect()->route("transaksi.create");
        }

        DB::beginTransaction();

        try {

            $transaksi = Transaksi::create([
                "user_id" => auth()->user()->id,
                "amount" => $request->amount,
                "bank_id" => $request->bank_id,
            ]);

            foreach ($request->produk_id as $index => $item) {
                $produk = Produk::find($item);

                $detailTransaksi = TransaksiDetail::create([
                    "produk_id" => $produk->id,
                    "harga" => $produk->harga,
                    "qty" => $request->qty[$index],
                    "transaksi_id" => $transaksi->id
                ]);
            }

            Cart::where("user_id", auth()->user()->id)->delete();

            DB::commit();

            return redirect()->route("transaksi.show", $transaksi->id);
        } catch (Exception $th) {
            DB::rollBack();

            return redirect()->back()->with("error", "Terjadi kesalahan server");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view("pages.front.user.transaksi.detail", [
            'transaksi' => $transaksi
        ]);
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
