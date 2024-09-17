<?php

use App\Http\Controllers\Admin\AdminJasaController;
use App\Http\Controllers\Admin\AdminProjekController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageWebController;
use App\Http\Controllers\Admin\Produk\ItemProdukController;
use App\Http\Controllers\Admin\Produk\KategoriProdukController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\WebConfigController;
use Illuminate\Support\Facades\Route;


Route::prefix("admin")->name("admin.")->group(function () {

    Route::prefix("master-data")->name("master-data.")->group(function () {

        Route::prefix("produk")->name("produk.")->group(function () {
            Route::resource("kategori", KategoriProdukController::class);
            Route::resource("item", ItemProdukController::class);
        });

        Route::resource("bank", BankController::class);
    });


    Route::resource("jasa", AdminJasaController::class);

    Route::get("projek", [AdminProjekController::class, "index"])->name("projek.index");
    Route::resource("page-web", PageWebController::class);
    Route::resource("transaksi", TransaksiController::class);

    Route::prefix("web-config")->name("web-config")->group(function () {
        Route::resource("content", WebConfigController::class);
        Route::resource("blog", BlogController::class);
    });
});
