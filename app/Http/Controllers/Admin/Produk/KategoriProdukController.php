<?php

namespace App\Http\Controllers\Admin\Produk;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->q;

        $items = KategoriProduk::orderBy("id", 'desc')
            ->when($search, function ($query) use ($search) {
                return $query->where("nama", "LIKE", "%$search%");
            })
            ->paginate(12);

        return view("pages.admin.produk.kategori.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.produk.kategori.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|string"
        ]);

        $data = $request->except("_token", "_method");

        KategoriProduk::create($data);

        return redirect()->back()->with("success", "berhasil tambah data kategori produk");
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
        $kategori = KategoriProduk::findOrFail($id);

        return view("pages.admin.produk.kategori.edit", compact("kategori"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nama" => "required|string"
        ]);

        $data = $request->except("_token", "_method");

        $kategori = KategoriProduk::findOrFail($id);

        $kategori->update($data);

        return redirect()->back()->with("success", "berhasil tambah data kategori produk");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriProduk::findOrFail($id);
        $nama = $kategori->nama;

        $kategori->delete();

        return redirect()->back()->with("success", "berhasil hapus kategori $nama");
    }
}
