<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

Route::redirect('/', '/products');


Route::resource('products', ProductController::class);
Route::get('/tags/search', [TagController::class, 'search'])->name('tags.search');
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');



// Quantity funkcionalitāte
Route::post('products/{product}/increase', [ProductController::class, 'increase'])->name('products.increase');
Route::post('products/{product}/decrease', [ProductController::class, 'decrease'])->name('products.decrease');



