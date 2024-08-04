<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\TransaksiController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/dataNavbar', [HomeController::class, "dataNavbar"])->name("dataNavbar");
Route::get('home', [HomeController::class, "index"]);
Route::get('service', [ServiceController::class, "index"]);
Route::get('product', [ProductController::class, "index"])->name("product");
Route::get('product/{slug}', [ProductController::class, "show"])->name("product.show");


Route::middleware("guest")->group(function () {
    Route::get("login", [UserAuthController::class, "login"])->name("login");
    Route::post("prosesLogin", [UserAuthController::class, "prosesLogin"])->name("prosesLogin");
    Route::get("register", [UserAuthController::class, "register"])->name("register");
    Route::post("register/post", [UserAuthController::class, "prosesRegister"])->name("prosesRegister");
});
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout')->middleware('auth');

Route::middleware("auth")->group(function () {
    Route::resource("cart", CartController::class);
    Route::resource("transaksi", TransaksiController::class);
});

Route::get("page/{slug}", [PageController::class, "index"])->name("page-web");
