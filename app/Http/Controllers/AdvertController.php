<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdvertController extends Controller
{

    protected $response = ["type" => "warning", "message" => null, "status" => false];
    public function new(){
        return view('layout.advert.new', ['users' => User::all()]);
    }

    public function save(Request $request){
        if(empty($request->brand)){
            $this->response["message"] = "Araç markası girin!";
        }elseif(empty($request->model)){
            $this->response["message"] = "Araç modeli girin!";
        }elseif(empty($request->motor)){
            $this->response["message"] = "Motor hacmini girin!";
        }elseif(empty($request->km)){
            $this->response["message"] = "KM bilgisi girin!";
        }elseif($request->sales_type == 0){
            $this->response["message"] = "Satış türünü seçin!";
        }elseif($request->owner == 0){
            $this->response["message"] = "Araç sahibini seçin!";
        }elseif($request->status == 0){
            $this->response["message"] = "Araç durumunu seçin!";
        }elseif(empty($request->buy_price)){
            $this->response["message"] = "Alış fiyatını girin!";
        }elseif(empty($request->sell_price)){
            $this->response["message"] = "Satış fiyatını girin!";
        }elseif(empty($request->buy_date)){
            $this->response["message"] = "Alım tarihini girin!";
        }

        return $this->response;
    }
}
