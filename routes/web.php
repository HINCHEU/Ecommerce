<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user1', [UserController::class, 'index']);
Route::get('/', function () {
    // return view('admin/index');
    return view('admin/login');
});


Route::get('/dashboard', function () {

    return view('admin/main');
});
