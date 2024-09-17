<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class FrontBlogController extends Controller
{
    public function index(Request $request)
    {
        $blog = Blog::orderBy("id", "desc")->get();

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
