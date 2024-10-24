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

Route::get('/add_product', function () {

    return view('admin/add_product');
});

Route::get('/product_list', function () {

    return view('admin/product_list');
});

Route::get('/category_list', function () {

    return view('admin/category_list');
});

Route::get('/new_category', function () {

    return view('admin/new_category');
});

Route::get('/attributes', function () {

    return view('admin/attributes');
});

Route::get('/add_attribute', function () {

    return view('admin/add_attribute');
});

Route::get('/order_list', function () {

    return view('admin/order_list');
});

Route::get('/order_detail', function () {

    return view('admin/order_detail');
});

Route::get('/order_tracking', function () {

    return view('admin/order_tracking');
});

Route::get('/all_user', function () {

    return view('admin/all_user');
});

Route::get('/add_new_user', function () {

    return view('admin/add_new_user');
});

Route::get('/all_roles', function () {

    return view('admin/all_roles');
});

Route::get('/create_role', function () {

    return view('admin/create_role');
});

Route::get('/report', function () {

    return view('admin/report');
});

// Route::get('/setting', function () {

//     return view('admin/setting');
// });
//========================================================
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
