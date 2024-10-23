<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class KategoriBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = KategoriBlog::orderBy("id", "desc")->paginate(12);

        return view("pages.admin.blog-kategori.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.blog-kategori.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except("_token", "_method");

        $insertData = KategoriBlog::create($data);

        return redirect()->back()->with("success", "Berhasil simpan kategori blog");
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
        $item = KategoriBlog::findOrFail($id);

        return view("pages.admin.blog-kategori.edit", compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except("_token", "_method");

        $insertData = KategoriBlog::findOrFail($id);

        $insertData->update($data);

        return redirect()->back()->with("success", "Berhasil update kategori blog");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $insertData = KategoriBlog::findOrFail($id);

        $insertData->delete();

        return redirect()->back()->with("success", "Berhasil hapus kategori blog");
    }
}
