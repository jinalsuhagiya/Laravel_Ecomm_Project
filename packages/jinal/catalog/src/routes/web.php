<?php

use jinal\catalog\Http\Controllers\CategoryController;

// Route::get('test', function(){
//     // return config('category.jinal');
//     return view('catalog::index');
// })->name('jignesh');

Route::prefix('catalog')->group(function () {
    Route::resource('category', CategoryController::class);
});

