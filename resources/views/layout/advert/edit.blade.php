@extends('master')

@section('title', 'Yeni İlan')
    
@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Yeni İlan </h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/advert">İlanlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Yeni İlan</li>
    </ol>
</nav>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" id="advertForm">
                  <input type="hidden" name="id" id="id" value="{{$advert->id}}">
                    <div class="col-md-6">
                      <label for="brand" class="form-label">Marka *</label>
                      <input type="text" class="form-control" id="brand" name="brand" value="{{$advert->brand}}">
                    </div>
                    <div class="col-md-6">
                      <label for="model" class="form-label">Model *</label>
                      <input type="text" class="form-control" id="model" name="model" value="{{$advert->model}}">
                    </div>
                    <div class="col-3">
                      <label for="motor" class="form-label">Motor</label>
                      <input type="text" class="form-control" id="motor" name="motor" value="{{$advert->motor}}">
                    </div>
                    <div class="col-3">
                      <label for="pack" class="form-label">Paket</label>
                      <input type="text" class="form-control" id="pack" name="pack" value="{{$advert->package}}">
                    </div>
                    <div class="col-3">
                      <label for="km" class="form-label">KM *</label>
                      <input type="text" class="form-control" id="km" name="km" value="{{$advert->km}}">
                    </div>
                    <div class="col-3">
                      <label for="year" class="form-label">Yıl *</label>
                      <input type="text" class="form-control" id="year" name="year" value="{{$advert->year}}">
                    </div>
                    <div class="col-3">
                      <label for="gear" class="form-label">Şanzıman</label>
                      <select name="gear" id="gear" class="form-control">
                        <option value="0">Seçin</option>
                        <option value="Manuel" {{$advert->gear == "Manuel" ? "selected":""}}>Manuel</option>
                        <option value="Otomatik" {{$advert->gear == "Otomatik" ? "selected":""}}>Otomatik</option>
                        <option value="Triptonik" {{$advert->gear == "Triptonik" ? "selected":""}}>Triptonik</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <label for="fuel" class="form-label">Yakıt</label>
                      <select name="fuel" id="fuel" class="form-control">
                        <option value="0">Seçin</option>
                        <option value="Benzin" {{$advert->fuel == "Benzin" ? "selected":""}}>Benzin</option>
                        <option value="Dizel" {{$advert->fuel == "Dizel" ? "selected":""}}>Dizel</option>
                        <option value="LPG" {{$advert->fuel == "LPG" ? "selected":""}}>LPG</option>
                        <option value="Elektrik" {{$advert->fuel == "Elektrik" ? "selected":""}}>Elektrik</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <label for="color" class="form-label">Renk</label>
                      <input type="text" class="form-control" id="color" name="color" value="{{$advert->color}}">
                    </div>
                    <div class="col-3">
                      <label for="case" class="form-label">Kasa Tipi</label>
                      <select name="case" id="case" class="form-control">
                        <option value="0">Seçin</option>
                        <option value="Sedan" {{$advert->casetype == "Sedan" ? "selected":""}}>Sedan</option>
                        <option value="Hatchback" {{$advert->casetype == "Hatchback" ? "selected":""}}>Hatchback</option>
                        <option value="Station Wagon" {{$advert->casetype == "Station Wagon" ? "selected":""}}>Station Wagon</option>
                        <option value="SUV" {{$advert->casetype == "SUV" ? "selected":""}}>SUV</option>
                        <option value="Crossover" {{$advert->casetype == "Crossover" ? "selected":""}}>Crossover</option>
                        <option value="Coupe" {{$advert->casetype == "Coupe" ? "selected":""}}>Coupe</option>
                        <option value="Coupe SUV" {{$advert->casetype == "Coupe SUV" ? "selected":""}}>Coupe SUV</option>
                        <option value="Convertible" {{$advert->casetype == "Convertible" ? "selected":""}}>Convertible</option>
                        <option value="MPV" {{$advert->casetype == "MPV" ? "selected":""}}>MPV</option>
                        <option value="Roadster" {{$advert->casetype == "Roadster" ? "selected":""}}>Roadster</option>
                      </select>
                    </div>
                    
                    
                    
                    
                      <div class="col-4">
                        <label for="sahibinden" class="form-label">Sahibinden.com URL</label>
                        <input type="text" class="form-control" id="sahibinden" name="sahibinden" value="{{$advert->sahibinden_url}}">
                      </div>
                      <div class="col-4">
                        <label for="arabam" class="form-label">Arabam.com URL</label>
                        <input type="text" class="form-control" id="arabam" name="arabam" value="{{$advert->arabam_url}}">
                      </div>
                      <div class="col-4">
                        <label for="status" class="form-label">Araç Durumu *</label>
                        <select id="status" name="status" class="form-select">
                          <option value="1" {{$advert->status == 1 ? "selected":""}}>Satılık</option>
                          <option value="2" {{$advert->status == 2 ? "selected":""}}>Kullanımda</option>
                          <option value="3" {{$advert->status == 3 ? "selected":""}}>Sahibinde</option>
                          <option value="4" {{$advert->status == 4 ? "selected":""}}>Kirada</option>
                          <option value="5" {{$advert->status == 5 ? "selected":""}}>Onarımda</option>
                          <option value="6" {{$advert->status == 6 ? "selected":""}}>Hazırlanıyor</option>
                        </select>
                      </div>

                      <div class="col-3">
                        <label for="buy_price" class="form-label">Alış Fiyatı *</label>
                        <input type="text" class="form-control" id="buy_price" name="buy_price" value="{{$advert->buy_price}}">
                      </div>

                      <div class="col-3">
                        <label for="sell_price" class="form-label">Satış Fiyatı</label>
                        <input type="text" class="form-control" id="sell_price" name="sell_price" value="{{$advert->sell_price}}">
                      </div>
                      <div class="col-3">
                        <label for="damage" class="form-label">Hasar Kaydı</label>
                        <input type="text" class="form-control" id="damage" name="damage" value="{{$advert->damage}}">
                      </div>

                      <div class="col-3">
                        <label for="buy_date" class="form-label">Alım Tarihi</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{$advert->buy_date}}">
                      </div>

                    <div class="col-12">
                      <a href="javascript:;" class="btn btn-primary" id="advertSaveBtn">Güncelle</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row mb-3">
          <div class="card">
            <div class="card-body">
                <div class="col-12 ">
                    <h2 class="card-title d-flex justify-content-between">Fotoğraf
                      <a href="#" class="btn btn-primary btn-sm"><i style="width:12px" data-feather="plus"></i></a>
                        
                    </h2>
                    <input type="file" name="photos[]" id="photo" multiple>
                    <input type="hidden" name="photodata" id="photodata" value="{{$advert->photo}}">
                  </div>
            </div>
        </div>
        </div>
        <div id="photoLine" class="row">
          <div class="card">
            <div class="card-body" id="photoPreview">
              @foreach($photos as $img)
              <div>
              <img src="/storage/{{$img->file}}" class="wd-50 border-5 m-2" alt="...">
              <a href="javascript:;" class="btn btn-danger btn-sm py-0 px-1 delImg" id="{{$img->id}}"><i data-feather="trash" style="width:12px"></i></a>
              </div>
              @endforeach
            </div>
        </div>
        </div>
    </div>
</div>
</form>
</div>
@endsection

@section('script')
    <script>

$(document).ready(function(){
    id = $("#id").val();
    axios.post('/upload/get-photos/', {id:id}).then((res) => {
       
        var photoArray = res.data.map(item => item.file);
        
        // Diziyi virgül ile ayırıp tek bir string haline getir
        var photoDataString = photoArray.join(',');

        // Elde edilen string'i #photodata inputuna yazdır
        $("#photodata").val(photoDataString);

        // Dizideki resim yollarını önizleme olarak eklemek için döngü
        for (let i = 0; i < res.data.length; i++) {
           // $("#photoPreview").append('<img src="/storage/'+res.data[i].file+'" class="wd-50 border-5 m-2" alt="...">');
        }
    });
});


        $("#advertSaveBtn").on("click", function(){
            var formData = $("#advertForm").serialize();

            axios.post('/advert/update', formData).then((res)=>{
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.reload();
                    }, 1000);
                }
            });
        });

        $("#photo").on("change", function(e) {
          var files = e.target.files;

          console.log(files);
          
          var formData = new FormData();

          for (var i = 0; i < files.length; i++) {
              formData.append('photos[]', files[i]);
          }

          axios.post('/upload/photos', formData, {
              headers: {
                  'Content-Type': 'multipart/form-data'
              }
          }).then((res) => {
              toastr[res.data.type](res.data.message);
              if (res.data.status) {
                  $("#photodata").val(res.data.paths);
                  $("#photoLine").removeClass('d-none');
                  for (let i = 0; i < res.data.paths.length; i++) {
                    $("#photoPreview").append('<img src="/storage/'+res.data.paths[i]+'" class="wd-50 border-5 m-2" alt="...">');
                  }
              }
          }).catch((error) => {
              console.error(error);
          });
      });
      $("#owner").on("change", function(){
        if($(this).val() != 0){
          $("#ownername").val($("#owner :selected").html());
        }
      });

      $(".delImg").on("click", function(){
        var id = $(this).attr('id');
        axios.post('/advert/delete/photo', {id:id}).then((res) => {
          if(res.data.status){
            window.location.reload();
          }
        })
      })
    </script>
@endsection