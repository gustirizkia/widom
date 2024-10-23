<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class FrontBlogController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->kategori;

        $katgeori_id = null;
        if ($slug) {
            $katgeori_id = KategoriBlog::where("slug", $slug)->first()->id ?? null;
        }


        $blog = Blog::orderBy("id", "desc")
            ->when($katgeori_id, function ($query) use ($katgeori_id) {
                return $query->where("kategori_id", $katgeori_id);
            })
            ->get();

        return view("pages.front.blog.list-blog", [
            'blog' => $blog
        ]);
    }

    public function show($id)
    {
        $blog = Blog::where("slug", $id)->firstOrFail();

        return view("pages.front.blog.detail-blog", [
            'blog' => $blog
        ]);
    }
}
