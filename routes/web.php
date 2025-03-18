<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Product;

Route::get('/', function () {
    return view('welcome');
});

