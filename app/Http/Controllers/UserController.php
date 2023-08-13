<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all(){
        return view('layout.user.all', ['users' => User::all()]);
    }
}
