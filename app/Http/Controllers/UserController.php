<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('login_and_register.indexuser' , [
            'user' => User::all()
        ]);
    }


    
}
