<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

// User routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class,'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])
        ->name('admin.dashboard');
//    Route::resource('category', CategoryController::class);
});

require __DIR__.'/auth.php';

// Route::get('test', function(){
//     return config('category.jinal');
// });
