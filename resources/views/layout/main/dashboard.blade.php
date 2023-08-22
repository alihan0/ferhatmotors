@extends('master')

@section('title', 'Pano')
    
@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Pano</h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">#</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pano</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="col-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Kullanıcı</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["user"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Müşteri</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["customer"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam İlan</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["advert"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="row">
    <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Satıştaki İlan</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["advert_sell"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Satılan İlan</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["advert_sold"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Harcama</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{currency_format($count["expense"])}} ₺</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Kazanç</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{currency_format($count["gain"])}} ₺</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Son 10 İlan</h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marka/Model</th>
                        <th scope="col">Satış Tipi</th>
                        <th scope="col">Sahibi</th>
                        <th scope="col">Durum</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($lastTenAdverts as $item)
                            <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->brand.'/'.$item->model}}</td>
                            <td>{!! $item->sales_type == 1 ? '<span class="badge bg-primary">Sahiplik</span>': '<span class="badge bg-warning">Komisyon</span>' !!}</td>
                            <td>{!! $item->Owner != "" ? $item->Owner->firstname.' '.$item->Owner->lastname : '<strike class="text-danger">'.$item->ownername.'</strike>' !!}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge bg-warning">Satılık</span>
                                @elseif($item->status == 2)
                                    <span class="badge bg-primary">Kullanımda</span>
                                @elseif($item->status == 3)
                                    <span class="badge bg-info">Sahibinde</span>
                                @elseif($item->status == 4)
                                    <span class="badge bg-danger">Kirada</span>
                                @elseif($item->status == 5)
                                    <span class="badge bg-danger">Onarımda</span>
                                @elseif($item->status == 6)
                                    <span class="badge bg-primary">Hazırlanıyor</span>
                                @elseif($item->status == 7)
                                    <span class="badge bg-success">Satıldı</span>
                                @else
                                    <span class="badge bg-secondary">Bilinmiyor</span>
                                @endif
                            </td>
                          </tr>
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
    <script></script>
@endsection