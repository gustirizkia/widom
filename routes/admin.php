<?php

use App\Http\Controllers\Admin\AdminJasaController;
use App\Http\Controllers\Admin\AdminProjekController;
use App\Http\Controllers\Admin\Akses\AdminController;
use App\Http\Controllers\Admin\Akses\UserController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\KategoriBlogController;
use App\Http\Controllers\Admin\PageWebController;
use App\Http\Controllers\Admin\Produk\ItemProdukController;
use App\Http\Controllers\Admin\Produk\KategoriProdukController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\WebConfigController;
use Illuminate\Support\Facades\Route;


Route::prefix("admin")->middleware("auth", 'admin')->name("admin.")->group(function () {

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
        Route::resource("kategori-blog", KategoriBlogController::class);
        Route::resource("blog", BlogController::class);
        Route::resource("informasi", InformasiController::class);
    });

    Route::prefix("akses")->name("akses.")
        ->group(function () {
            Route::resource("user", UserController::class);
            Route::resource("admin", AdminController::class);
        });
});
