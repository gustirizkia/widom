<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Informasi;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Informasi::paginate(12);

        return view("pages.admin.informasi.index", [
            "items" => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = Blog::select(
            "slug",
            DB::raw("nama as nama")
        )->get();
        $produk = Produk::select(
            "slug",
            DB::raw("nama as nama"),
        )->get();

        $dataTag = collect([...$blog, ...$produk]);

        return view("pages.admin.informasi.create", [
            'dataTag' => $dataTag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->except("_token", "_method");

        $data["tag"] = implode(" ", $request->tag);
        $data["image"] = $request->image->store("informasi", "public");

        $insertData = Informasi::create($data);

        return redirect()->back()->with("success", "Berhasil simpan data");
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
