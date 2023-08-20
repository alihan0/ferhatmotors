<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $response = ["type" => "warning", "message" => "SYSTEM", "status" => false];
    public function showLogin(){
        return view('layout.auth.login');
    }

    public function login(Request $request){
        if(empty($request->email) || empty($request->password)){
            $this->response["message"] = "E-posta ya da şifre girin!";
        }elseif(Auth::attempt(["email"=>$request->email, "password"=>$request->password])){
            $this->response["type"] = "success";
            $this->response["message"] = "Giriş Başarılı!";
            $this->response["status"] = true;
        }else{
            $this->response["message"] = "E-posta ya da şifre hatalı!";
        }
        return $this->response;
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');

    }
}
