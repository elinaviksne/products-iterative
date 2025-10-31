<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::redirect('/', '/products');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);


