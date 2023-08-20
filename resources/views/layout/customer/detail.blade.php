@extends('master')

@section('title', 'Müşteri Detayları')

@section('content')
    
<div class="page-content">

  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-md-block col-3 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
            <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">ID:</label>
                <p class="text-muted">{{$customer->id}}</p>
              </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">İsim:</label>
            <p class="text-muted">{{$customer->firstname.' '.$customer->lastname}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Telefon:</label>
            <p class="text-muted">{{$customer->phone}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">E-posta:</label>
            <p class="text-muted">{{$customer->email}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Oluşturan:</label>
            <p class="text-muted">{!!$customer->Creator->firstname .' '.$customer->Creator->lastname  ?? '<span style="text-decoration:line-through">'.$customer->created_by.'</span>'!!}</p>
          </div>
          
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
    <!-- middle wrapper start -->
    <div class="col-9 ">
      <div class="row border">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title border-bottom pb-2">Geçmiş</h5>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
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
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        
      </div>
    </div>
    <!-- middle wrapper end -->
    <!-- right wrapper start -->
    
    <!-- right wrapper end -->
  </div>
</div>

@endsection