<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::as('login.')->prefix('login')->group(function () {
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
    Route::get('/{provider}/callback', [LoginController::class, 'handelProviderCallback'])->name('callback');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Dinamic page route | This route allows define in the end
Route::get('{slug}', [PageController::class, 'index'])->name('page');
