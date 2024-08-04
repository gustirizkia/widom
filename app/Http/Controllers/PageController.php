<?php

namespace App\Http\Controllers;

use App\Models\Pageweb;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug)
    {
        $data = Pageweb::where("slug", $slug)->firstOrFail();

        return view("pages.front.page-web", compact("data"));
    }
}
