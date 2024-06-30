<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Front\HomeController;
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
Route::get('home', [HomeController::class, "index"]);


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
