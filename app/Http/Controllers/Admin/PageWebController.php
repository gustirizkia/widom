<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pageweb;
use Illuminate\Http\Request;

class PageWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pageweb::orderBy("id", "desc")->get();

        return view("pages.admin.pageWeb.index", [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.pageWeb.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");
        $data["image"] = $request->image->store("page-web", 'public');


        Pageweb::create($data);

        return redirect()->back()->with("success", "berhasil tambah page web");
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
        $data = Pageweb::findOrFail($id);

        return view("pages.admin.pageWeb.edit", [
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $item = Pageweb::findOrFail($id);

        $data = $request->except("_token", '_method');

        if ($request->image) {
            $data["image"] = $request->image->store("page-web", 'public');
        }

        $item->update($data);

        return redirect()->route("admin.page-web.index")->with("success", "Berhasil update data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Pageweb::findOrFail($id);

        $item->delete();

        return redirect()->route("admin.page-web.index")->with("success", "Berhasil hapus data");
    }
}
