<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $response = ["type" => "warning", "message"=> null, "status" => false];
    public function all(){
        return view('layout.user.all', ['users' => User::all()]);
    }

    public function change_password(Request $request){

        if($request->user_id){
            $user = User::find($request->user_id);
            if($user){
                if(!empty($request->pass)){
                    $user->password = Hash::make($request->pass);
                    if($user->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Şifre Güncellendi";
                        $this->response["status"] = true;
                    }else{
                        $this->response["type"] = "error";
                        $this->response["message"] = "SYSTEM_ERROR";
                    }
                }else{
                    $this->response["message"] = "Yeni bir şifre girmelisiniz.";
                }
            }else{
                $this->response["type"] = "error";
                $this->response["message"] = "SYSTEM_ERROR";
            }
        }else{
            $this->response["type"] = "error";
            $this->response["message"] = "SYSTEM_ERROR";
        }

        return $this->response;
    }
}
