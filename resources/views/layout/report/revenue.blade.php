@extends('master')

@section('title', 'Gelirler')


@section('content')
<div class="d-flex justify-content-between">
    <h4 class="page-title">Gelir Raporları </h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Raporlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gelir Raporları</li>
    </ol>
</nav>
</div>

<ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="month-line-tab" data-bs-toggle="tab" href="#month" role="tab" aria-controls="month" aria-selected="true">Aylık Raporlar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="year-line-tab" data-bs-toggle="tab" href="#year" role="tab" aria-controls="year" aria-selected="false">Yıllık Raporlar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="all-line-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">Tüm Zamanlar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="user-line-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">Kullanıcıya Göre</a>
      </li>
  </ul>
  <div class="tab-content" id="lineTabContent">
    <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="month-line-tab">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">İlan</th>
                        <th scope="col">Satış Fiyatı</th>
                        <th scope="col">Satış Tarihi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-line-tab">
        {{$year}}
    </div>
    <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-line-tab">
        {{$all}}
    </div>

    <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-line-tab">
        {{$all}}
    </div>
  </div>
@endsection