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

        $allowedExtensions = ["png", "jpg"];
        if (!in_array($extension, $allowedExtensions)) {
            $this->response["message"] = "Geçersiz dosya formatı!";
        }else{
            $path = Storage::disk('public')->put('profile', $file);
            //$path = $request->file('document')->move(public_path("documents"), $newFileName);
            if($path){
                $this->response["type"] = "success";
                $this->response["message"] = "Dosya başarıyla yüklendi.";
                $this->response["path"] = $path; //'/storage/'.$exp[1];
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
