@extends('master')

@section('title', 'Yeni İlan')
    
@section('content')
<div class="d-flex justify-content-between">
    <h4 class="page-title">Tüm İlanlar </h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/advert">İlanlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tüm İlanlar</li>
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
                                          <li><a class="dropdown-item" href="#">Durumu Değiştir</a></li>
                                          <li><a class="dropdown-item" href="#">Not Ekle</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="#">Satış Yap</a></li>

                                        </ul>
                                      </div>
                                </td>
                            </tr>
                        @endforeach
                      
                      
                    </tbody>
                  </table>
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
        }
    });
        
    </script>
@endsection