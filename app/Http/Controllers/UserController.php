<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    public function index(){

        $users = Auth::user();
        return view('user.index', compact('users'));
    }
    //
}
