<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\JasaKategori;
use Illuminate\Http\Request;

class AdminJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Jasa::orderBy("id", "desc")->paginate(12);

        return view("pages.admin.jasa.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = JasaKategori::get();

        return view("pages.admin.jasa.create", compact("kategori"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => "string|required",
            'deskripsi_singkat' => "string|required",
            'kategori_id' => "string|required",
            'body' => "string|required",
            'image' => "image|required",
        ]);

        $data = $request->except("_token", "_method");
        $data["image"] = $request->image->store("jasa", "public");

        $insertJasa = Jasa::create($data);

        return redirect()->back()->with("success", "Berhasil Simpan Data");
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
