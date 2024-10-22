<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('admin/index');
    return view('admin/login');
});

Route::get('/dashboard', function () {

    return view('admin/index');
});
