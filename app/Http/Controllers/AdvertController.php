<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertNote;
use App\Models\AdvertPhoto;
use App\Models\Expense;
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
            $adv->profit = $request->profit;
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

    public function sold(){
        return view('layout.advert.sold', ['adverts' => Advert::where('status', 7)->get()]);
    }

    public function on_sale(){
        return view('layout.advert.onSale', ['adverts' => Advert::where('status', '!=', 7)->get()]);
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

    public function sell(Request $request){

        if($request->id){
            $advert = Advert::find($request->id);
            if($advert){
                if(empty($request->amount)){
                    $this->response["message"] = "Tutar girin...";
                }else{
                    $advert->sold_price = $request->amount;
                    $advert->sold_date  = date('Y-m-d');
                    $advert->status = 7;
                    $advert->seller = Auth::user()->id;
                    $advert->sellername = Auth::user()->firstname.' '.Auth::user()->lastname;

                    if($advert->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Araç Satıldı!";
                        $this->response["status"] = true;
                    }else{
                        $this->response["message"] = "Araç satılırken bir hata oluştu!";
                    }
                }
            }
        }

        return $this->response;
    }

    public function detail($id){
        $advert = Advert::find($id);

        if($advert->profit < 100){
            $profit = '%'.$advert->profit;
        }else{
            $profit = $advert->profit.'TL';
        }
        return view('layout.advert.detail', ['advert' => $advert, 'profit' => $profit]);
    }

    public function add_expense(Request $request){

        if($request->id){
            $advert = Advert::find($request->id);
            if($advert){
                if(empty($request->type) || empty($request->amount)){
                    $this->response["message"] = "Boş alan bırakmayın!";
                }else{
                    $exp = new Expense;
                    $exp->advert = $request->id;
                    $exp->user = Auth::user()->id;
                    $exp->type = trim(ucfirst($request->type));
                    $exp->amount = $request->amount;
                    if($exp->save()){
                        $this->response["type"] = "success";
                        $this->response["message"] = "Harcama eklendi.";
                        $this->response["status"] = true;
                    }else{
                        $this->response["message"] = "Harcama eklenirken bir hata oluştu!";
                    }
                }
            }
        }

        return $this->response;
    } 

    public function delete(Request $request){
        if($request->id){
            $find = Advert::find($request->id);
            if($find){
                // AdvertNote modelindeki ilgili satırları sil
                AdvertNote::where('advert', $find->id)->delete();
                
                // AdvertPhoto modelindeki ilgili satırları sil
                AdvertPhoto::where('advert', $find->id)->delete();
                
                if($find->delete()){
                    return response(["title" => "Başarılı!", "message" => "İlan başarıyla silindi!", "type" => "success", "status" => true]);
                }else{
                    return response(["title" => "Hata!", "message" => "İlan silinirken bir hata oluştu!", "type" => "error"]);
                }
            }else{  
                return response(["title" => "Hata!", "message" => "İlan bulunamadı!", "type" => "error"]);
            }
        }
    }

    public function edit($id){
        return view('layout.advert.edit', ['advert' => Advert::find($id), 'users' => User::all()]);
    }
    
}
