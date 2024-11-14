<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Controllers\UnauthenticateController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UnauthenticateController::class, "index"])->name('home');
Route::get('/about-us', [UnauthenticateController::class, "about"])->name('about');
Route::get('/contact-us', [UnauthenticateController::class, "contact"])->name('contact');
Route::get('/store', [UnauthenticateController::class, "product_store"])->name('store');
Route::get('/product-details/{id}', [UnauthenticateController::class, "product_details"])->name('product_details');
Route::get('/cart', [UnauthenticateController::class, "cart"])->name('cart');
Route::get('/cart-clear', [UnauthenticateController::class, "cart_clear"])->name('cart.clear');
// web.php
Route::post('/add-to-cart', [UnauthenticateController::class, 'addToCart'])->name('add.to.cart');

Route::get('/checkout', [UnauthenticateController::class, "checkout"])->name('checkout');
Route::post('/new-order', [UnauthenticateController::class, "create_order"])->name('add.order');
Route::get('/cartitems', [UserController::class, 'getCartCount'])->name('cartitems');







Route::get('/login', [AuthController::class, "login"])->middleware('isGuest')->name('login');
Route::get('/registerAPI', [AuthController::class, "registerTest"])->name('reg');
Route::get('/register', [AuthController::class, "register"])->middleware('isGuest')->name('register');
Route::get('/forget-password', [AuthController::class, "forgetPass"])->name('forget-password');
Route::post('/newUsers', [AuthController::class, "store_user"])->name('add-user');
Route::post('/user-login', [AuthController::class, "user_login"])->name('user_login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');



// ================= admin =============== 
Route::prefix('/admin')->middleware('auth','isAdmin')->group( function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/site-settings', [DashboardController::class, 'site_settings'])->name('admin.seting');  

    Route::get('/products', [ProductsController::class, 'products'])->name('admin.products');
    Route::get('/search_product', [ProductsController::class, 'productsSearch'])->name('search.product');
    Route::post('/add-products', [ProductsController::class, 'new_product'])->name('admin.add-products');
    Route::get('/add-product', [ProductsController::class, 'add_product'])->name('admin.add-product');
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit_product'])->name('admin.add-product');
    Route::post('/update_product', [ProductsController::class, 'update_Product'])->name('admin.update-product');
    Route::delete('/pro_delete/{slug}', [ProductsController::class, 'delete_product'])->name('admin.delete-product');

    Route::get('/orders', [DashboardController::class, 'orders'])->name('admin.orders');
    Route::post('/order_update', [DashboardController::class, 'order_update'])->name('admin.order_update');
    Route::post('/payment_update', [DashboardController::class, 'payment_update'])->name('admin.order_update');
    Route::post('/order_recontact', [DashboardController::class, 'remark'])->name('admin.order_update');
    Route::get('/search_order', [DashboardController::class, 'search_order'])->name('admin.order_update');
    
    Route::get('/banner-settings', [FrontendController::class, 'banner']);
    Route::post('/banner-update', [FrontendController::class, 'banner_update']);
    Route::get('/WhyChooseus-settings', [FrontendController::class, 'WhyChooseus']);
    Route::post('/whychoose-update', [FrontendController::class, 'WhyChooseusUpdate']);
    Route::get('/about-us-settings', [FrontendController::class, 'knowAboutus']);
    Route::post('/know-ab-update', [FrontendController::class, 'knowAboutusUpdate']);
    Route::post('/kn-about-list', [FrontendController::class, 'abListupdate']);
    Route::delete('/benifits-delete', [FrontendController::class, 'deleteBenifits']);
    Route::get('/features', [FrontendController::class, 'features']);
    Route::post('/features-update', [FrontendController::class, 'features_update']);
    Route::post('/add_features', [FrontendController::class, 'store_features']);
    Route::delete('/features-delete', [FrontendController::class, 'deleteFeature']);
});

// ==================  user ====================
Route::middleware('auth')->group( function(){
    Route::get('user-profile', [UserController::class, 'user_profile'])->name('user.profile');
    Route::get('addresses', [UserController::class, 'user_addresses'])->name('user.address');
    Route::put('update_user', [UserController::class, 'update_user'])->name('user.address');
});



