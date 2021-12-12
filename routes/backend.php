<?php

use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\BikeController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuBuilderController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

// Dashboard Route
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Roles and Users
Route::resource('/roles', RoleController::class);
Route::resource('/users', UserController::class);

// Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

// Security
Route::get('profile/security', [ProfileController::class, 'changePassword'])->name('profile.password.change');
Route::put('profile/security', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

// Backups
Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('backups', [BackupController::class, 'clean'])->name('backups.clean');


// Pages
Route::resource('pages', PageController::class);

// Menu
Route::resource('menus', MenuController::class)->except(['show']);
Route::as('menus.')->prefix('menus/{id}')->group(function () {
    Route::post('item/order', [MenuBuilderController::class, 'itemOrder'])->name('item.order');
    Route::get('builder', [MenuBuilderController::class, 'index'])->name('builder');

    Route::get('item/create', [MenuBuilderController::class, 'itemCreate'])->name('item.create');
    Route::post('item/create', [MenuBuilderController::class, 'itemStore']);

    Route::get('item/{itemId}/edit', [MenuBuilderController::class, 'itemEdit'])->name('item.edit');
    Route::put('item/{itemId}/update', [MenuBuilderController::class, 'itemUpdate'])->name('item.update');

    Route::delete('item/{itemId}/destroy', [MenuBuilderController::class, 'itemDestroy'])->name('item.destroy');
});

// Settings
Route::as('settings.')->prefix('settings')->group(function () {
    // General route
    Route::get('general', [SettingController::class, 'general'])->name('general');
    Route::put('general', [SettingController::class, 'generalUpdate'])->name('general.update');

    // Appearance
    Route::get('appearance', [SettingController::class, 'appearance'])->name('appearance');
    Route::put('appearance', [SettingController::class, 'appearanceUpdate'])->name('appearance.update');

    // Mail
    Route::get('mail', [SettingController::class, 'mail'])->name('mail');
    Route::put('mail', [SettingController::class, 'mailUpdate'])->name('mail.update');

    // Socialite
    Route::get('socialite', [SettingController::class, 'socialite'])->name('socialite');
    Route::put('socialite', [SettingController::class, 'socialiteUpdate'])->name('socialite.update');
});

// Categories
Route::resource('categories', CategoryController::class)->except('show');
// Brands
Route::resource('brands', BrandController::class)->except('show');
// Bikes
Route::resource('bikes', BikeController::class);