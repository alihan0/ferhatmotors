<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('layout.main.dashboard');
    }
    public function system(){
        return view('layout.main.system', ['system' => System::first()]);
    }

    public function system_save(Request $request){

        $sys = System::find(1);
        $sys->site_name = trim($request->title);
        $sys->site_url  = trim($request->url);
        $sys->login_cover = trim($request->cover);
        $sys->site_status = $request->status;
        $sys->add_expense = $request->expense;
        
        if($sys->save()){
            return response([
                "type" => "success",
                "message" => "Ayarlar kaydedildi...",
                "status" => true
            ]);
        }else{
            return response([
                "type" => "error",
                "message" => "Ayarlar kaydedilirken bir hata oluştu",
            ]);
        }

    }
}
