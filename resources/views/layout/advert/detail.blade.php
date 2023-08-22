@extends('master')

@section('title', 'Araç Detayları')

@section('style')
<link rel="stylesheet" href="/static/assets/vendors/owl.carousel/owl.carousel.min.css">
<link rel="stylesheet" href="/static/assets/vendors/owl.carousel/owl.theme.default.min.css">
<link rel="stylesheet" href="/static/assets/vendors/animate.css/animate.min.css">
@endsection

@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">İlan Detayları</h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/advert">İlanlar</a></li>
        <li class="breadcrumb-item" aria-current="page">İlan Detayları</li>
        <li class="breadcrumb-item active" aria-current="page"># {{$advert->id}}</li>
    </ol>
</nav>
</div>


<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-outline-secondary"><b>Marka: </b> {{$advert->brand}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Model: </b> {{$advert->model}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Paket: </b> {{$advert->package ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Motor: </b> {{$advert->motor ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>KM: </b> {{$advert->km}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Yıl: </b> {{$advert->year}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Şanzıman: </b> {{$advert->gear ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Yakıt: </b> {{$advert->fuel ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Renk: </b> {{$advert->color ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Kasa: </b> {{$advert->casetype ?? "-"}}</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4">
        
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            
                            <li class="list-group-item active justify-content-between d-flex
                                    @if ($advert->status == 1)
                                        bg-warning
                                        border-warning
                                    @elseif($advert->status == 2)
                                        bg-primary
                                        border-primary
                                    @elseif($advert->status == 3)
                                        bg-info
                                        border-info
                                    @elseif($advert->status == 4)
                                        bg-danger
                                        border-danger
                                    @elseif($advert->status == 5)
                                        bg-danger
                                        border-danger
                                    @elseif($advert->status == 6)
                                        bg-primary
                                        border-primary
                                    @elseif($advert->status == 7)
                                        bg-success
                                        border-success
                                    @else
                                        bg-secondary
                                        border-secondary
                                    @endif
                            ">
                                <b>Araç Durumu: </b>
                                @if ($advert->status == 1)
                                        Satılık
                                    @elseif($advert->status == 2)
                                        Kullanımda
                                    @elseif($advert->status == 3)
                                        Sahibinde
                                    @elseif($advert->status == 4)
                                        Kirada
                                    @elseif($advert->status == 5)
                                        Onarımda
                                    @elseif($advert->status == 6)
                                        Hazırlanıyor
                                    @elseif($advert->status == 7)
                                        Satıldı
                                    @else
                                        Bilinmiyor
                                    @endif
                            </li>

                            <li class="list-group-item justify-content-between d-flex"><b>Satış Tipi: </b> {!!$advert->sales_type == 1 ? '<span class="badge bg-primary">Sahiplik</span>' : '<b>'.$profit.'</b><span class="badge bg-primary">Komisyon</span>'!!}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Araç Sahibi: </b> {!! $advert->Owner != "" ? $advert->Owner->firstname.' '.$advert->Owner->lastname : '<strike class="text-danger">'.$advert->ownername.'</strike>' !!}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Alım Tarihi: </b> {{$advert->buy_date}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>İlanı Oluşturan: </b> {!! $advert->Creator != "" ? $advert->Creator->firstname.' '.$advert->Creator->lastname : '<strike class="text-danger">'.$advert->username.'</strike>' !!}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>İlan Tarihi: </b> {{$advert->created_at}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Satış Tarihi: </b> {{$advert->sold_date ?? "-"}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Satıcı: </b>@if ($advert->status == 7)
                                {!! $advert->Seller != "" ? $advert->Seller->firstname.' '.$advert->Seller->lastname : '<strike class="text-danger">'.$advert->username.'</strike>' !!}
                                @else
                                -
                            @endif</li>
                            
                          </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between d-flex"><b>Alış Fiyatı: </b> {{currency_format($advert->buy_price)}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Satış Fiyatı: </b> {{currency_format($advert->sell_price) ?? "-"}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Satış Tutarı: </b> {{currency_format($advert->sold_price) ?? "-"}}</li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{$advert->sahibinden_url}}" target="_blank" class="btn text-white btn-warning w-100 mb-2">SAHİBİNDEN.COM</a>
                        <a href="{{$advert->arabam_url}}" target="_blank" class="btn btn-danger w-100">ARABAM.COM</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if ($advert->status == 7)
                        <div class="alert alert-primary" role="alert">
                            Bu ilan <b>{{$advert->sold_date}}</b> tarihinde <u>Satıldı</u> olarak işaretlendiği için değişiklik yapamazsınız.
                        </div>
                        @else
                        <a href="/advert/edit/{{$advert->id}}" class="btn text-white btn-primary w-100 mb-2">İlanı Düzenle</a>
                        

                        @if ($system->add_expense == 0)
                            <a href="javascript:;" class="btn text-white btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addExpense">Masraf Ekle</a>

                        @else
                            @if(Auth::user()->id == $advert->user)
                            <a href="javascript:;" class="btn text-white btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addExpense">Masraf Ekle</a>
                            @endif
                        @endif


                        <a href="javascript:;" class="btn btn-info w-100 mb-2" data-bs-toggle="modal" data-bs-target="#changeStatusModal">İlan Durumunu Değiştir</a>
                        <a href="javascript:;" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addNote">İlana Not Ekle</a>
                        <a href="javascript:;" class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#sell">Satıldı Olarak İşaretle</a>
                        <a href="javascript:;" class="btn btn-danger w-100 mb-2" id="delete" data-id="{{$advert->id}}">İlanı Sil</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-8">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="owl-carousel owl-theme owl-fadeout">
                      @if ($advert->Photos->count() > 0)
                        @foreach ($advert->Photos as $photo)
                        <div class="item">
                            <img src="/storage/{{$photo->file}}" alt="item-image" style="max-height: 50vh; width: 100%; object-fit: cover;">
                        </div>
                        @endforeach
                        @else
                        <div class="item">
                            <img src="/static/assets/images/photo.jpg" alt="item-image" style="max-height: 50vh; width: 100%; object-fit: cover;">
                          </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Harcamalar</h2>
                        @if ($advert->Expense->count() > 0)
                        <ul class="list-group">
                            @foreach ($advert->Expense as $item)
                                <li class="list-group-item text-center d-flex align-items-center justify-content-between align-center">
                                    <p class="px-4 w-50 text-start " >{{$item->type}}</p>
                                    

                                    <span class="text-muted text-center">
                                        {{$item->User->firstname.' '.$item->User->lastname}}
                                        <br>
                                        {{date_format($item->created_at,"d M, Y")}}
                                    </span>
                                    <p class="px-4" >- {{currency_format($item->amount)}} TL</p>
                                </li>
                            @endforeach
                            <li class="list-group-item text-center bg-light d-flex align-items-center justify-content-between align-center">
                                    <p class="px-4 w-50 text-start fw-bold" >Toplam: </p>
                                    

                                    <span class="text-muted text-center">
                                       
                                    </span>
                                    <p class="px-4 fw-bold" >{{ currency_format($totalExpense) }} TL</p>
                                </li>
                          </ul>
                        @else
                        <div class="alert alert-primary" role="alert">
                            Bu araç için henüz bir harcama yapılmamış...
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Notlar</h2>
                        @if ($advert->Note->count() > 0)
                        <ul class="list-group">
                            @foreach ($advert->Note as $item)
                                <li class="list-group-item text-start d-flex align-items-center justify-content-between align-center">
                                    <p class="border-end px-4" style="width:80%">{{$item->note}}</p>
                                    <span class="text-muted text-center">
                                        {{$item->User->firstname.' '.$item->User->lastname}}
                                        <br>
                                        {{date_format($item->created_at,"d M, Y")}}
                                    </span>
                                </li>
                            @endforeach
                          </ul>
                        @else
                        <div class="alert alert-primary" role="alert">
                            Bu araç için henüz bir not eklenmemiş...
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="changeStatusModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Durumu Değiştir</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <select class="form-control" id="new_status" advert-id="{{$advert->id}}">
                <option value="1" {{$advert->status == 1 ? "selected":""}}>Satılık</option>
                <option value="2" {{$advert->status == 2 ? "selected":""}}>Kullanımda</option>
                <option value="3" {{$advert->status == 3 ? "selected":""}}>Sahibinde</option>
                <option value="4" {{$advert->status == 4 ? "selected":""}}>Kirada</option>
                <option value="5" {{$advert->status == 5 ? "selected":""}}>Onarımda</option>
                <option value="6" {{$advert->status == 6 ? "selected":""}}>Hazırlanıyor</option>
            </select>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="addNote" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Not Ekle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <textarea class="form-control" id="note" cols="30" rows="10" placeholder="Notunuzu girin..."></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveNote" advert-id="{{$advert->id}}">Kaydet</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="sell" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Satış Yap</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="amount" class="mb-2">Satış Tutarı:</label>
            <input type="text" class="form-control" id="amount" placeholder="100.000">
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveSell" advert-id="{{$advert->id}}">Satışı Onayla</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addExpense" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Harcama Ekle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="expenseType" class="form-label">Masraf Türü</label>
                <input type="text" class="form-control" id="expenseType" placeholder="Noter, Tamir, Evrak...">
              </div>
              <div class="mb-3">
                <label for="expenseAmount" class="form-label">Masraf Tutarı</label>
                <input type="text" class="form-control" id="expenseAmount" placeholder="5.000, 2.000 ...">
              </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="saveExpense" advert-id="{{$advert->id}}"> Kaydet</button>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="/static/assets/vendors/owl.carousel/owl.carousel.min.js"></script>
<script src="/static/assets/vendors/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/static/assets/js/carousel.js"></script>

    <script>
        $("#new_status").on("change", function(){
        var id = $(this).attr('advert-id');
        var status = $(this).val();

        axios.post('/advert/change-status', {id:id, status:status}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        }); 
    });
    $("#saveNote").on("click", function(){
        var note = $("#note").val();
        var id   = $(this).attr('advert-id');

        axios.post('/advert/add-note', {id:id,note:note}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        }); 
    });
    $("#saveSell").on("click", function(){
        var id   = $(this).attr('advert-id');
        var amount = $("#amount").val();

        axios.post('/advert/sell', {id:id, amount:amount}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        }); 
    });
    $("#saveExpense").on("click", function(){
        var id   = $(this).attr('advert-id');
        var type = $("#expenseType").val();
        var amount = $("#expenseAmount").val();

        axios.post('/advert/add-expense', {id:id, type:type, amount:amount}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        }); 
    });
    $("#delete").on("click", function(){
        var id = $(this).attr('data-id');
        Swal.fire({
        title: 'Silmek istediğine emin misin?',
        text: "Bu ilanı sildiğinizde onunla birlikte ilişkili olan diğer tüm veriler sistemden kalıcı olarak silinecek. Bu işlem geri alınamaz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Evet, Sil!'
        }).then((result) => {
        if (result.isConfirmed) {

            axios.post('/advert/delete', {id:id}).then((res) => {
                Swal.fire(
                    res.data.title,
                    res.data.message,
                    res.data.type
                )
                if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/advert/all');
                    }, 500);
                }
            })
        }
        })
    });
    </script>
@endsection