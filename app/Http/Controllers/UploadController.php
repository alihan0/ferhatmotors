<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    protected $response = ["type" => "warning", "message" => null, "status" => false];
    
    public function profile(Request $request){
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        if(($extension !== "png") && ($extension !== "jpg")){
            $this->response["message"] = "Geçersiz dosya formatı!";
        }else{
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $newFileName = substr(str_shuffle(str_repeat($pool, 5)), 0, 16) . '.'.$extension;
            $path = Storage::disk('local')->put('public/profile/'.$newFileName, 'Contents');
            //$path = $request->file('document')->move(public_path("documents"), $newFileName);
            if($path){
                $this->response["type"] = "success";
                $this->response["message"] = "Dosya başarıyla yüklendi.";
                $this->response["path"] = $newFileName; //'/storage/'.$exp[1];
                $this->response["status"] = true;
            }else{
                $this->response["type"] = "error";
                $this->response["message"] = "Dosya yüklenemedi!";
            }
            // Dosyanın kaydedildiği yolu veritabanına kaydedebilirsiniz
        }
        return $this->response;
    }
}
