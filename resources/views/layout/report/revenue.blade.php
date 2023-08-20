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
                        <th scope="col">Marka / Model</th>
                        <th scope="col">Satış Tarihi</th>
                        <th scope="col" class="text-end">Satış Fiyatı</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($month as $m)
                      <tr>
                        <th scope="row">{{$m->id}}</th>
                        <td>{{$m->brand.'/'.$m->model}}</td>
                        <td>{{$m->sold_date}}</td>
                        <td class="text-end">{{$m->sold_price}} ₺</td>
                      </tr>
                      
                      @endforeach
                      <tr class="fw-bold text-end">
                        <td colspan="3" class="">Toplam:</td>
                        <td class="" style="width:10%">{{$monthprice}} ₺</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-line-tab">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marka / Model</th>
                        <th scope="col">Satış Tarihi</th>
                        <th scope="col" class="text-end">Satış Fiyatı</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($year as $y)
                      <tr>
                        <th scope="row">{{$y->id}}</th>
                        <td>{{$y->brand.'/'.$y->model}}</td>
                        <td>{{$y->sold_date}}</td>
                        <td class="text-end">{{$y->sold_price}} ₺</td>
                      </tr>
                      
                      @endforeach
                      <tr class="fw-bold text-end">
                        <td colspan="3" class="">Toplam:</td>
                        <td class="" style="width:10%">{{$yearprice}} ₺</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-line-tab">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marka / Model</th>
                        <th scope="col">Satış Tarihi</th>
                        <th scope="col" class="text-end">Satış Fiyatı</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($all as $a)
                      <tr>
                        <th scope="row">{{$a->id}}</th>
                        <td>{{$a->brand.'/'.$a->model}}</td>
                        <td>{{$y->sold_date}}</td>
                        <td class="text-end">{{$a->sold_price}} ₺</td>
                      </tr>
                      
                      @endforeach
                      <tr class="fw-bold text-end">
                        <td colspan="3" class="">Toplam:</td>
                        <td class="" style="width:10%">{{$allprice}} ₺</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-line-tab">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <select id="userselect" class="form-control w-25 m-auto">
                            <option value="0">Kullanıcı Seçin...</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->firstname.' '.$user->lastname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row d-none" id="userRow">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Marka / Model</th>
                                <th scope="col">Satış Tarihi</th>
                                <th scope="col" class="text-end">Satış Fiyatı</th>
                              </tr>
                            </thead>
                            <tbody id="userBody"></tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
        $("#userselect").on("change", function(){
            var id = $(this).val();
            $("#userBody").html('');
            axios.post('/report/get-user-report', {id:id}).then((res) => {
                $("#userRow").removeClass('d-none');
                var row = "";
                res.data.useradvert.forEach(element => {
                    row += '<tr>';
                    row += '<td>'+element.id+'</td>';
                    row += '<td>'+element.brand+' '+element.model+'</td>';
                    row += '<td>'+element.sold_date+'</td>';
                    row += '<td class="text-end">'+element.sold_price+' ₺</td>';
                    row += '</td>';
                });
                row += '<tr class="fw-bold text-end">';
                    row += '<td colspan="3" class="">Toplam:</td>';
                    row += '<td class="" style="width:10%">'+res.data.userprice+' ₺</td>';
                    row += '</tr>';
                $("#userBody").append(row);
            });
        });
    </script>
@endsection