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


    public function update(Request $request){

        if($request->user_id){
            $user = User::find($request->user_id);
            if($user){
                if(empty($request->firstname) || empty($request->lastname) || empty($request->email) || empty($request->phone) || empty($request->fileData)){
                    $this->response["message"] = "Boş alan bırakamazsınız!";
                }else{
                    $user->firstname = trim($request->firstname);
                    $user->lastname  = trim($request->lastname);
                    $user->email     = trim($request->email);
                    $user->phone     = trim($request->phone);
                    $user->photo     = trim($request->fileData);
                    
                    if($user->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Bilgiler Güncellendi!";
                        $this->response["status"] = true;
                    }else{
                        $this->response["type"] = "error";
                        $this->response["message"] = "SYSTEM_ERROR";
                    }
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


    public function new(){
        return view('layout.user.new');
    }

    public function newUser(Request $request){
        
        if(empty($request->firstname) || empty($request->lastname) || empty($request->email) || empty($request->phone) || empty($request->password) || empty($request->fileData)){
            $this->response["message"] = "Boş alan bırakmayın!";
        }elseif(strlen($request->password) < 6){
            $this->response["message"] = "Şifre en az 6 karakter uzunluğunda olmalı!";
        }else{
            $mail = User::where('email', $request->email)->first();
            if($mail){
                $this->response["message"] = "E-posta daha önce kaydedilmiş!";
            }else{
                $user = new User;
                $user->firstname = trim($request->firstname);
                $user->lastname  = trim($request->lastname);
                $user->email     = trim($request->email);
                $user->phone     = trim($request->phone);
                $user->password  = Hash::make(trim($request->password));
                $user->photo     = trim($request->fileData);

                if($user->save()){
                    $this->response["type"] = "success";
                    $this->response["message"] = "Kullanıcı oluşturuldu.";
                    $this->response["status"] = true;
                }else{
                    $this->response["type"] = "error";
                    $this->response["message"] = "SYSTEM_ERROR";
                }
            }
        }

        return $this->response;
    }

    public function remove(Request $request){
        

        if($request->id){
            $user = User::find($request->id);
            if($user){
                if($user->delete()){
                    $this->response["type"] = "success";
                    $this->response["title"] = "İşlem Başarılı";
                    $this->response["message"] = "Kullanıcıyı başarıyla sildiniz.";
                    $this->response["status"] = true;
                }else{
                    $this->response["type"] = "error";
                    $this->response["title"] = "SYSTEM_ERROR";
                }
            }else{
                $this->response["type"] = "error";
                $this->response["title"] = "SYSTEM_ERROR";
            }
        }else{
            $this->response["type"] = "error";
            $this->response["title"] = "SYSTEM_ERROR";
        }

        return $this->response;
    }
}

