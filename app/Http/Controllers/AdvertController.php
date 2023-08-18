<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertNote;
use App\Models\AdvertPhoto;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AdvertController extends Controller
{

    protected $response = ["type" => "warning", "message" => null, "status" => false];
    public function new(){
        return view('layout.advert.new', ['users' => User::all()]);
    }

    public function save(Request $request){
        if(empty($request->brand) || empty($request->model) || empty($request->km) || empty($request->year) || $request->sales_type == 0|| $request->owner == 0 || empty($request->buy_price)){
            $this->response["message"] = "Yızldız (*) ile işaretlenen alanlar zorunludur.";
        }else{
            $adv = new Advert;
            $adv->user = Auth::user()->id;
            $adv->username = Auth::user()->firstname.' '.Auth::user()->lastname;
            $adv->brand = trim(ucfirst($request->brand));
            $adv->model = trim(ucfirst($request->model));
            $adv->package = trim(ucfirst($request->package)) ?? null;
            $adv->motor = trim(ucfirst($request->motor)) ?? null;
            $adv->km = trim(ucfirst($request->km)) ?? null;
            $adv->year = trim(ucfirst($request->year)) ?? null;
            $adv->gear = trim(ucfirst($request->gear)) ?? null;
            $adv->fuel = trim(ucfirst($request->fuel)) ?? null;
            $adv->color = trim(ucfirst($request->color)) ?? null;
            $adv->casetype = trim(ucfirst($request->case)) ?? null;
            $adv->sales_type = trim(ucfirst($request->sales_type));
            $adv->owner = trim(ucfirst($request->owner));
            $adv->ownername = trim(ucfirst($request->ownername));
            $adv->sahibinden_url = trim(ucfirst($request->sahibinden)) ?? null;
            $adv->arabam_url = trim(ucfirst($request->arabam)) ?? null;
            $adv->status = $request->status;
            $adv->buy_price = $request->buy_price;
            $adv->sell_price = $request->sellprice;
            $adv->buy_date = trim(ucfirst($request->buy_date)) ?? null;
            $adv->damage = $request->damage ?? null;

            if($adv->save()){
                if(!empty($request->photodata)){
                    $photodata = explode(',', $request->photodata);
                    for ($i=0; $i < count($photodata); $i++) { 
                        $pic = new AdvertPhoto;
                        $pic->advert = $adv->id;
                        $pic->file = $photodata[$i];
                        $pic->save();
                    }
                }
                $this->response["type"] = "success";
                $this->response["message"] = "İlan oluşturuldu";
                $this->response["id"] = $adv->id;
                $this->response["status"] = true;
            }else{
                $this->response["type"] = "error";
                $this->response["message"] = "SYSTEM_ERROR";
            }

        }

        return $this->response;
    }

    public function all(){
        return view('layout.advert.all', ['adverts' => Advert::all()]);
    }

    public function change_status(Request $request){

        if($request->id && $request->status){
            $advert = Advert::find($request->id);
            if($advert){
                $advert->status = $request->status;
                if($advert->save()){
                    $this->response["type"] = "success";
                    $this->response["message"] = "Durum Güncellendi!";
                    $this->response["status"] = true;
                }else{
                    $this->response["message"] = "Durum güncellenirken bir hata oluştu!";
                }
            }
        }

        return $this->response;
    }

    public function add_note(Request $request){

        if($request->id){
            if(empty($request->note)){
                $this->response["message"] = "Notunuzu girin...";
            }else{
                $advert = Advert::find($request->id);
                if($advert){
                    $note = new AdvertNote;
                    $note->advert = $request->id;
                    $note->user = Auth::user()->id;
                    $note->note = trim(ucfirst($request->note));

                    if($note->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Not eklendi";
                        $this->response["status"] = true;
                    }else{
                        $this->response["message"] = "Not eklenirken bir hata oluştu!";
                    }
                }
            }
        }

        return $this->response;
    }
}
