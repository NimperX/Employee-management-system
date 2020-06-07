<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //to get the form to add a new user
    public function show()
    {
        return view('auth.register');
    }
}
