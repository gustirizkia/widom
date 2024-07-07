<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view("pages.front.list-produk");
    }
    public function show($slug)
    {
        return view("pages.front.product-detail");
    }
}
