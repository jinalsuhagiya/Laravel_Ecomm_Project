<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Admin
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController;

// Frontend
use App\Http\Controllers\Frontend\ShopController;

Route::get('/', function () {
    return view('index');
})->name('index');


// ================= USER =================
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class,'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ================= ADMIN =================
Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])
        ->name('admin.dashboard');

    Route::resource('category', AdminCategoryController::class);
    Route::resource('products', ProductController::class);
});


// ================= FRONTEND =================

// ✅ All Products
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// ✅ Category Wise Products
Route::get('/shop/{id}', [ShopController::class, 'category'])->name('shop.category');


require __DIR__.'/auth.php';

