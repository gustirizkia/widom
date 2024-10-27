<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Blog::orderBy("id", "desc")->paginate(12);

        return view("pages.admin.blog.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriBlog = KategoriBlog::orderBy("nama", 'asc')->get();

        return view("pages.admin.blog.create", compact("kategoriBlog"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => "string|required",
            'deskripsi_singkat' => "string|required",
            'image' => "image|required",
            'body' => "required",
        ]);

        $data = $request->except("_token", "_method");

        $data["image"] = $request->image->store("blog", "public");

        $blog = Blog::create($data);

        return redirect()->route("admin.web-configblog.index")->with("success", "Berhasil tambah blog");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::where("id", $id)->firstOrFail();

        return view("pages.admin.blog.edit", compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::where("id", $id)->firstOrFail();

        $data = $request->except("_token", "_method");

        if ($request->image) {
            $data["image"] = $request->image->store("blog", "public");
        }


        $blog->update($data);

        return redirect()->route("admin.web-configblog.index")->with("success", "Berhasil update blog");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();
        return redirect()->route("admin.web-configblog.index")->with("success", "Berhasil hapus blog");
    }
}
