<?php

namespace App\Http\Controllers\Admin\Produk;

use App\Http\Controllers\Controller;
use App\Models\ImageProduk;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Produk::orderBy("id", "desc")->paginate(12);

        return view("pages.admin.produk.item.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriProduk::orderBy("nama", "asc")->get();

        return view("pages.admin.produk.item.create", compact("kategori"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            $dataProduk = $request->except("_token", "_method", "image", "thumbnail", "avatar_remove");
            $harga = str_replace("Rp.", "", $request->harga);
            $harga = str_replace("_", "", $harga);
            $harga = str_replace(".", "", $harga);
            $harga = str_replace(" ", "", $harga);

            $dataProduk["harga"] = $harga;

            $produk = Produk::create($dataProduk);


            foreach ($request->image as $index => $image) {
                $is_thumbnail = $request->thumbnail;
                // $image_path = $request->image[$index]->store("produk", "public");
                $imageProduk = ImageProduk::create([
                    "image" => $image->store("produk", "public"),
                    'is_thumbnail' => (int)$is_thumbnail === (int)$index ? 1 : 0,
                    "produk_id" => $produk->id
                ]);
            }

            DB::commit();

            return redirect()->back()->with("success", "Berhasil tambah item produk");
        } catch (Exception $th) {
            DB::rollBack();

            dd($th);
            return redirect()->back()->with("error", "Terjadi kesalahan server");
        }
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