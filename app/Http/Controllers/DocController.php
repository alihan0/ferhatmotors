<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends Controller
{
    public function htu(){
        return view('layout.docs.how-to-use');
    }

    public function support(){
        return view('layout.docs.support');
    }
}
