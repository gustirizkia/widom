<?php

use App\Http\Controllers\Admin\PageWebController;
use App\Http\Controllers\Admin\Produk\ItemProdukController;
use App\Http\Controllers\Admin\Produk\KategoriProdukController;
use Illuminate\Support\Facades\Route;


Route::prefix("admin")->name("admin.")->group(function () {
    Route::prefix("produk")->name("produk.")->group(function () {
        Route::resource("kategori", KategoriProdukController::class);
        Route::resource("item", ItemProdukController::class);
    });

    Route::resource("page-web", PageWebController::class);
});
