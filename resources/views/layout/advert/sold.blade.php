@extends('master')

@section('title', 'Yeni İlan')
    
@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Satılan İlanlar </h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/advert">İlanlar</a></li>
        <li class="breadcrumb-item" aria-current="page">Tüm İlanlar</li>
        <li class="breadcrumb-item active" aria-current="page">Satılan İlanlar</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table" id="adverTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Yıl</th>
                        <th scope="col">Satış Tipi</th>
                        <th scope="col">Sahibi</th>
                        <th scope="col">Durumu</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($adverts as $advert)
                            <tr>
                                <td><a class="text-decoration-underline" href="/advert/detail/{{$advert->id}}">{{$advert->id}}</a></td>
                                <td>{{$advert->brand}}</td>
                                <td>{{$advert->model}}</td>
                                <td>{{$advert->package ?? "-"}}</td>
                                <td>{{$advert->year}}</td>
                                <td>{!! $advert->sales_type == 1 ? '<span class="badge bg-primary">Sahiplik</span>': '<span class="badge bg-warning">Komisyon</span>' !!}</td>
                                <td>{!! $advert->Owner != "" ? $advert->Owner->firstname.' '.$advert->Owner->lastname : '<strike class="text-danger">'.$advert->ownername.'</strike>' !!}</td>
                                <td>
                                    @if ($advert->status == 1)
                                        <span class="badge bg-warning">Satılık</span>
                                    @elseif($advert->status == 2)
                                        <span class="badge bg-primary">Kullanımda</span>
                                    @elseif($advert->status == 3)
                                        <span class="badge bg-info">Sahibinde</span>
                                    @elseif($advert->status == 4)
                                        <span class="badge bg-danger">Kirada</span>
                                    @elseif($advert->status == 5)
                                        <span class="badge bg-danger">Onarımda</span>
                                    @elseif($advert->status == 6)
                                        <span class="badge bg-primary">Hazırlanıyor</span>
                                    @elseif($advert->status == 7)
                                        <span class="badge bg-success">Satıldı</span>
                                    @else
                                        <span class="badge bg-secondary">Bilinmiyor</span>
                                    @endif
                                </td>
                                <td>
                   
                                    <div class="dropdown">
            
                                        <button type="button" class=" btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                                            style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                            İşlem
                                    </button>
                                      
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="/advert/detail/{{$advert->id}}">Görüntüle</a></li>
                                          <li><a class="dropdown-item" href="/advert/edit/{{$advert->id}}">Düzenle</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changeStatusModal{{$advert->id}}" href="javascript:;">Durumu Değiştir</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addNote{{$advert->id}}" href="javascript:;">Not Ekle</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sell{{$advert->id}}" href="javascript:;">Satış Yap</a></li>

                                        </ul>
                                      </div>
                                </td>
                            </tr>


                            <div class="modal fade" id="changeStatusModal{{$advert->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Durumu Değiştir</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <select class="form-control new_status" advert-id="{{$advert->id}}">
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

                              <div class="modal fade" id="addNote{{$advert->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Not Ekle</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      
                                        <textarea class="form-control" id="note{{$advert->id}}" cols="30" rows="10" placeholder="Notunuzu girin..."></textarea>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary saveNote" advert-id="{{$advert->id}}">Kaydet</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="modal fade" id="sell{{$advert->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Satış Yap</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="amount{{$advert->id}}" class="mb-2">Satış Tutarı:</label>
                                        <input type="text" class="form-control" id="amount{{$advert->id}}" placeholder="100.000">
                                        
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary saveSell" advert-id="{{$advert->id}}">Satışı Onayla</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                      
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <script>
        $("#adverTable").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json"
        },
        order: [[0, 'desc']]
    });
        
    $(".new_status").on("change", function(){
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

    $(".saveNote").on("click", function(){
        var note = $("#note"+$(this).attr('advert-id')).val();
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

    $(".saveSell").on("click", function(){
        var id   = $(this).attr('advert-id');
        var amount = $("#amount"+$(this).attr('advert-id')).val();

        axios.post('/advert/sell', {id:id, amount:amount}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        }); 
    });
    </script>
@endsection