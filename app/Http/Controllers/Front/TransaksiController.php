<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Cart;
use App\Models\Produk;
use App\Models\RegDistrict;
use App\Models\RegProvince;
use App\Models\RegRegency;
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

        $provinsi = RegProvince::orderBy("name", "asc")->get();

        return view("pages.front.transaksi.create", [
            'produk' => $produk,
            "totalHarga" => $totalHarga,
            "totalItem" => $totalItem,
            "bank" => $bank,
            "provinsi" => $provinsi
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

            $provinsi = RegProvince::find($request->provinsi);
            $kota = RegRegency::find($request->kota);
            $kecamatan = RegDistrict::find($request->kecamatan);


            $transaksi = Transaksi::create([
                "user_id" => auth()->user()->id,
                "amount" => $request->amount,
                "bank_id" => $request->bank_id,
                "provinsi" => $provinsi->name,
                "kota" => $kota->name,
                "kecamatan" => $kecamatan->name,
                "alamat_lengkap" => $request->alamat_lengkap,
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
        $transaksi = Transaksi::with("detail.produk")->findOrFail($id);

        $grandTotal = 0;

        foreach ($transaksi->detail as $item) {
            $grandTotal += $item->harga * $item->qty;
        }

        return view("pages.front.user.transaksi.detail", [
            'transaksi' => $transaksi,
            "grandTotal" => $grandTotal
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
        $transaksi = Transaksi::findOrFail($id);
        $data = $request->except("_token", "_method");

        if ($request->bukti_bayar) {
            $data["bukti_bayar"] = $request->bukti_bayar->store("bukti-bayar", "public");
            $data["status"] = "Menunggu Konfirmasi";
        }

        $transaksi->update($data);

        return redirect()->back()->with("success", "Berhasil simpan data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
