<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class UploadController extends Controller
{

    protected $response = ["type" => "warning", "message" => null, "status" => false];
    
    public function profile(Request $request){
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $allowedExtensions = ["png", "jpg", "JPG", "PNG"];
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

    public function photos(Request $request)
{
    $uploadedPaths = [];

    foreach ($request->file('photos') as $photo) {
        $extension = $photo->getClientOriginalExtension();

        if ($extension === 'jpg' || $extension === 'png' || $extension === "JPG" || $extension === "PNG") {
            $path = Storage::disk('public')->put('photos', $photo);
            $uploadedPaths[] = $path;
        }
    }

    return response()->json([
        'message' => 'Fotoğraflar başarıyla yüklendi',
        'status' => true,
        'type' => 'success',
        'paths' => $uploadedPaths  // Dosya yollarını dizi olarak döndür
    ]);
}

    public function get_photos(Request $request){

        if($request->id){
            $find = Advert::find($request->id);
            if($find){
                $photos = AdvertPhoto::where('advert',$request->id)->get();
                return response()->json($photos);
            }
        }
    }

}
