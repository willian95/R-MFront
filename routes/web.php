<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tienda', function () {
    return view('tienda');
});
Route::get('/producto/{slug}', function ($slug) {

    $product = Product::where("slug", $slug)->with("productFormats", "productSecondaryImages", "category")->first();

    if(is_null($product)){
        abort(404);
    }

    return view('product', ["product" => $product]);
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/acerca', function () {
    return view('acerca');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('auth/facebook', [SocialAuthController::class, "redirectToFacebookProvider"])->name('social.auth.facebook');
Route::get('auth/facebook/callback', [SocialAuthController::class, "handleProviderFacebookCallback"]);

Route::get('auth/google', [SocialAuthController::class, "redirectToGoogleProvider"])->name('social.auth.google');
Route::get('auth/google/callback', [SocialAuthController::class, "handleProviderGoogleCallback"]);

Route::get("categories/fetch-all/{animal}", [CategoryController::class, "fetchAll"]);
Route::get("products", [ProductController::class, "fetch"]);

Route::post("send-contact-message", [ContactController::class, "sendMessage"]);

Route::post("register", [RegisterController::class, "register"]);
Route::get("/email/check/{hash}", [RegisterController::class, "check"]);

Route::post("/login", [LoginController::class, "login"]);
Route::get("/logout", [LoginController::class, "logout"]);

Route::get("/product/product-formats/{product_id}", [ProductController::class, "productFormats"]);

Route::post("/cart", [CartController::class, "addToCart"]);
Route::post("/cart/code-verify", [CartController::class, "verifyCode"]);
Route::put("/cart/{cart_id}", [CartController::class, "updateCart"]);
Route::delete("/cart/{cart_id}", [CartController::class, "deleteCart"]);
Route::get("/cart", [CartController::class, "getCart"]);
