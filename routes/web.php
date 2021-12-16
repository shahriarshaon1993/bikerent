<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\UserProfileController;

Auth::routes();

Route::as('login.')->prefix('login')->group(function () {
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
    Route::get('/{provider}/callback', [LoginController::class, 'handelProviderCallback'])->name('callback');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Add To Cart
Route::post('/add/cart/{id}', [CartController::class, 'addToCart'])->name('add.cart');
Route::get('/show/carts', [CartController::class, 'showCart'])->name('show.cart');
Route::put('/update/cart/day', [CartController::class, 'updateCartDay'])->name('update.cart.day');
Route::delete('/remove/cart/{rowId}', [CartController::class, 'removeCart'])->name('remove.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/payment/proccess', [PaymentController::class, 'payment'])->name('proccess.payment');

// Frontend product
Route::get('/product/bike/{slug}', [ProductController::class, 'showSingleProduct'])->name('single.product');

// User Profile
Route::as('user.')->middleware('auth')->prefix('profile')->group(function() {
    Route::get('/', [UserProfileController::class, 'profile'])->name('profile');
    Route::get('/edit', [UserProfileController::class, 'editProfile'])->name('profile.edit');
    Route::put('/edit', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/user/security', [UserProfileController::class, 'editSecurity'])->name('profile.password');
    Route::put('/user/security', [UserProfileController::class, 'passwordUpdate'])->name('profile.password.update');

    Route::post('bikes/{slug}/available', [UserProfileController::class, 'available'])->name('profile.bikes.available');
    Route::post('bikes/{slug}/booked', [UserProfileController::class, 'booked'])->name('profile.bikes.booked');
    Route::get('/bikes', [UserProfileController::class, 'product'])->name('profile.bike');
    Route::get('/bikes/create', [UserProfileController::class, 'productCreate'])->name('profile.bike.create');
    Route::post('/bikes/create', [UserProfileController::class, 'productStore'])->name('profile.bike.store');
    Route::delete('/bikes/{slug}/destroy', [UserProfileController::class, 'productDestroy'])->name('profile.bike.destroy');

    // Orders
    Route::get('/bikes/orders', [UserOrderController::class, 'index'])->name('profile.orders');
    Route::get('/bikes/orders/delivery', [UserOrderController::class, 'delivery'])->name('profile.orders.delivery');
    Route::get('/bikes/orders/view/{id}', [UserOrderController::class, 'orderView'])->name('profile.order.view');
    Route::post('/bikes/order/accept/{id}', [UserOrderController::class, 'orderAccept'])->name('profile.order.accept');
    Route::post('/bikes/order/cancel/{id}', [UserOrderController::class, 'orderCancel'])->name('profile.order.cancel');
});

// Product Search
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/search/categories/{slug}', [HomeController::class, 'searchByCategories'])->name('search.categories');

// Dinamic page route | This route allows define in the end
Route::get('{slug}', [PageController::class, 'index'])->name('page');