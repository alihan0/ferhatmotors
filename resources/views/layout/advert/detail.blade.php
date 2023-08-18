@extends('master')

@section('title', 'Araç Detayları')
    
@section('content')
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
        <div class="row">
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

                            <li class="list-group-item justify-content-between d-flex"><b>Satış Tipi: </b> {!!$advert->sales_type == 1 ? '<span class="badge bg-primary">Sahiplik</span>' : '<span class="badge bg-primary">Komisyon</span>'!!}</li>
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
    </div>
</div>




@endsection

@section('script')
    <script></script>
@endsection