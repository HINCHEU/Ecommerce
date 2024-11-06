<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;

// Route::get('/users', [UserController::class, 'index']);
Route::get('/users', [\App\Http\Controllers\UserController::class, 'product'])->name('user.index');
// Route::get('/', function () {
//     // return view('admin/index');
//     return view('admin/login');
// });


Route::middleware(['auth', IsAdmin::class])->group(function () {
    // Route::get('/admin', function () {
    //     //This is for admin interface
    //     return view('auth.index');
    // });
    Route::get('/dashboard', function () {

        return view('admin/main');
    });

    Route::get('/add_product', [\App\Http\Controllers\ProductController::class, 'show_category'])->name('admin.show_category');
    Route::get('/product_variant', function () {

        return view('admin/product_variant');
    });

    Route::get('/product_list', [\App\Http\Controllers\ProductController::class, 'index'])->name('admin.show_product');
    Route::get('/product_variant', [\App\Http\Controllers\ProductController::class, 'show'])->name('admin.show');
    Route::post('/product_variant', [\App\Http\Controllers\ProductController::class, 'create_detail'])->name('admin.create_detail');
    Route::post('/add_product', [\App\Http\Controllers\ProductController::class, 'create'])->name('admin.create');

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
});

// Route::get('/setting', function () {

//     return view('admin/setting');
// });
//========================================================
Route::get('/', [\App\Http\Controllers\UserController::class, 'product'])->name('user.index');


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
Route::get('/shoping_cart', function () {
    return view('user/shoping_cart');
});


// web.php
Route::get('/product/{id}', [ProductController::class, 'getProduct'])->name('product.get');
Route::post('/shoping_cart', [\App\Http\Controllers\Shopping_cartController::class, 'addToCart'])->name('shpping_cart.addToCart');
Route::get('/show_shopping cart', [\App\Http\Controllers\Shopping_cartController::class, 'show'])->name('shpping_cart.addToCart');
