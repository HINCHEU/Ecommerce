<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
// Route::get('/', function () {
//     // return view('admin/index');
//     return view('admin/login');
// });


Route::get('/dashboard', function () {

    return view('admin/main');
});



Route::get('/', function () {
    return view('user/index');
});

Route::get('/product', function () {
    return view('user/product');
});

Route::get('/blog', function () {
    return view('user/blog');
});

Route::get('/about', function () {
    return view('user/about');
});

Route::get('/contact', function () {
    return view('user/contact');
});