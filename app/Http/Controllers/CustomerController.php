<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{

    protected $response = ["type" => "warning", "message" => null, "status" => false];
    public function new(){
        return view('layout.customer.new');
    }

    public function save(Request $request){

        if(empty($request->firstname) || empty($request->lastname) || empty($request->email) || empty($request->phone)){
            $this->response["message"] = "Boş alan bırakmayın!";
        }else{
            $mail = Customer::where('email', $request->email)->first();
            if($mail){
                $this->response["message"] = "E-posta zaten kayıtlı!";
            }else{
                $customer = new Customer;
                $customer->firstname = trim($request->firstname);
                $customer->lastname  = trim($request->lastname);
                $customer->email     = trim($request->email);
                $customer->phone     = trim($request->phone);
                $customer->status    = 1; 
                $customer->created_by = Auth::user()->firstname.' '.Auth::user()->lastname;
                $customer->created_user = Auth::user()->id;

                if($customer->save()){
                    $this->response["type"] = "success";
                    $this->response["message"] = "Müşteri oluşturuldu";
                    $this->response["status"] = true;
                    $this->response["id"] = $customer->id;
                }else{
                    $this->response["type"] = "error";
                    $this->response["message"] = "SYSTEM_ERROR";
                }
            }
        }

        return $this->response;
    }

    public function all(){
        return view('layout.customer.all', ['customers' => Customer::all()]);
    }

    public function update(Request $request){

        if($request->customer_id){
            $customer = Customer::find($request->customer_id);
            if($customer){
                if(empty($request->firstname) || empty($request->lastname) || empty($request->email) || empty($request->phone)){
                    $this->response["message"] = "Boş alan bırakamazsınız!";
                }else{
                    $customer->firstname = trim($request->firstname);
                    $customer->lastname  = trim($request->lastname);
                    $customer->email     = trim($request->email);
                    $customer->phone     = trim($request->phone);
                    
                    if($customer->save()){
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

    public function detail($id){
        return view('layout.customer.detail', ['customer' => Customer::find($id)]);
    }
}
