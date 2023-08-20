<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\User;
use App\Models\Customer;
use App\Models\Advert;
use App\Models\Expense;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $count = [
            "user" => User::all()->count(),
            "customer" => Customer::all()->count(),
            "advert" => Advert::all()->count(),
            "advert_sell" => Advert::where('status', '!=', 7)->get()->count(),
            "advert_sold" => Advert::where('status', 7)->get()->count(),
            "expense" => Expense::sum('amount'),
            "gain" => Advert::where('status',7)->sum('sold_price')
        ];

        $lastTenAdverts = Advert::orderBy('id', 'desc')->take(10)->get();


        return view('layout.main.dashboard', ['count' => $count, 'lastTenAdverts' => $lastTenAdverts]);
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
