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
                    <div class="col-md-6">
                      <label for="brand" class="form-label">Marka *</label>
                      <input type="text" class="form-control" id="brand" name="brand" placeholder="Audi, Mercedes, BMW ...">
                    </div>
                    <div class="col-md-6">
                      <label for="model" class="form-label">Model *</label>
                      <input type="text" class="form-control" id="model" name="model" placeholder="Passat, Megane, A6">
                    </div>
                    <div class="col-3">
                      <label for="motor" class="form-label">Motor</label>
                      <input type="text" class="form-control" id="motor" name="motor" placeholder="2.0, 3.2, 1.6">
                    </div>
                    <div class="col-3">
                      <label for="pack" class="form-label">Paket</label>
                      <input type="text" class="form-control" id="pack" name="pack" placeholder="Elegance, Comfortline">
                    </div>
                    <div class="col-3">
                      <label for="km" class="form-label">KM *</label>
                      <input type="text" class="form-control" id="km" name="km" placeholder="300.000, 450.000 ...">
                    </div>
                    <div class="col-3">
                      <label for="year" class="form-label">Yıl *</label>
                      <input type="text" class="form-control" id="year" name="year" placeholder="2000, 2023 ...">
                    </div>
                    <div class="col-3">
                      <label for="gear" class="form-label">Şanzıman</label>
                      <select name="gear" id="gear" class="form-control">
                        <option value="0">Seçin</option>
                        <option value="Manuel">Manuel</option>
                        <option value="Otomatik">Otomatik</option>
                        <option value="Triptonik">Triptonik</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <label for="fuel" class="form-label">Yakıt</label>
                      <select name="fuel" id="fuel" class="form-control">
                        <option value="0">Seçin</option>
                        <option value="Benzin">Benzin</option>
                        <option value="Dizel">Dizel</option>
                        <option value="LPG">LPG</option>
                        <option value="Elektrik">Elektrik</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <label for="color" class="form-label">Renk</label>
                      <input type="text" class="form-control" id="color" name="color" placeholder="Siyah, Kırmızı, Beyaz">
                    </div>
                    <div class="col-3">
                      <label for="case" class="form-label">Kasa Tipi</label>
                      <select name="case" id="case" class="form-control">
                        <option value="0">Seçin</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="Station Wagon">Station Wagon</option>
                        <option value="SUV">SUV</option>
                        <option value="Crossover">Crossover</option>
                        <option value="Coupe">Coupe</option>
                        <option value="Coupe SUV">Coupe SUV</option>
                        <option value="Convertible">Convertible</option>
                        <option value="MPV">MPV</option>
                        <option value="Roadster">Roadster</option>
                      </select>
                    </div>
                    
                    <div class="col-md-6">
                      <label for="sales_type" class="form-label">Satış Türü *</label>
                      <select id="sales_type" name="sales_type" class="form-select">
                        <option value="0" selected>Seçin</option>
                        <option value="1">Sahiplik</option>
                        <option value="2">Komisyon</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                        <label for="owner" class="form-label">Araç Sahibi *</label>
                        <select id="owner" name="owner" class="form-select">
                          <option value="0" selected>Seçin</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->firstname.' '.$user->lastname}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="ownername" id="ownername">
                      </div>
                    
                      <div class="col-4">
                        <label for="sahibinden" class="form-label">Sahibinden.com URL</label>
                        <input type="text" class="form-control" id="sahibinden" name="sahibinden" placeholder="https://www.sahibinden.com/ilan/vasita-otomobil-...">
                      </div>
                      <div class="col-4">
                        <label for="arabam" class="form-label">Arabam.com URL</label>
                        <input type="text" class="form-control" id="arabam" name="arabam" placeholder="https://www.arabam.com/ilan/galeriden-satilik-...">
                      </div>
                      <div class="col-4">
                        <label for="status" class="form-label">Araç Durumu *</label>
                        <select id="status" name="status" class="form-select">
                          <option value="0" selected>Seçin</option>
                          <option value="1">Satılık</option>
                          <option value="2">Kullanımda</option>
                          <option value="3">Sahibinde</option>
                          <option value="4">Kirada</option>
                          <option value="5">Onarımda</option>
                          <option value="6">Hazırlanıyor</option>
                          <option value="7">Satıldı</option>
                        </select>
                      </div>

                      <div class="col-3">
                        <label for="buy_price" class="form-label">Alış Fiyatı *</label>
                        <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="500.000">
                      </div>

                      <div class="col-3">
                        <label for="sell_price" class="form-label">Satış Fiyatı</label>
                        <input type="text" class="form-control" id="sell_price" name="sell_price" placeholder="1.000.000">
                      </div>
                      <div class="col-3">
                        <label for="damage" class="form-label">Hasar Kaydı</label>
                        <input type="text" class="form-control" id="damage" name="damage" placeholder="100.000">
                      </div>

                      <div class="col-3">
                        <label for="buy_date" class="form-label">Alım Tarihi</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date">
                      </div>

                    <div class="col-12">
                      <a href="javascript:;" class="btn btn-primary" id="advertSaveBtn">Kaydet</a>
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
                    <input type="hidden" name="photodata" id="photodata">
                  </div>
            </div>
        </div>
        </div>
        <div class="row mb-3 d-none" id="profitRow">
          <div class="card">
            <div class="card-body">
                <div class="col-12 ">
                    <h2 class="card-title d-flex justify-content-between">Komisyon Oranı</h2>
                    <input type="text" name="profit" id="profit" class="form-control" placeholder="10, 10.000..." value="0">
                    <p class="text-muted mt-2">Yüzdelik kar oranı ya da doğrudan rakam girin.</p>
                  </div>
            </div>
        </div>
        </div>
        <div id="photoLine" class="row d-none">
          <div class="card">
            <div class="card-body" id="photoPreview">
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

        $("#advertSaveBtn").on("click", function(){
            var formData = $("#advertForm").serialize();

            axios.post('/advert/save', formData).then((res)=>{
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/advert/detail/'+res.data.id);
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
      $("#sales_type").on("change", function(){
        if($(this).val() == 2){
          $("#profitRow").removeClass('d-none');
        }else{
          $("#profitRow").addClass('d-none');
        }
      });
    </script>
@endsection