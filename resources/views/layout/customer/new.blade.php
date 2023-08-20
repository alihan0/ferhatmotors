@extends('master')

@section('title', 'Yeni Müşteri')
    
@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Yeni Müşteri</h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/customer/all">Müşteriler</a></li>
        <li class="breadcrumb-item active" aria-current="page">Yeni Müşteri</li>
    </ol>
</nav>
</div>

<form id="newCustomerForm">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">İsim</label>
                            <div class="col-sm-10">
                                <div class="row g-3">
                                    <div class="col">
                                      <input type="text" class="form-control" placeholder="İsim" id="firstname" name="firstname">
                                    </div>
                                    <div class="col">
                                      <input type="text" class="form-control" placeholder="Soyisim" id="lastname" name="lastname">
                                    </div>
                                  </div>
                            </div>
                          </div>
                          
                        <div class="row mb-3">
                          <label for="email" class="col-sm-2 col-form-label">E-posta</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-posta adresi">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="phone" class="col-sm-2 col-form-label">Telefon</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon numarası">
                          </div>
                        </div>
                        <a href="javascript:;" class="btn btn-primary float-end" id="saveNewCustomerBtn">Oluştur</a>
                      </form>
                    </div>
                </div>
            </div>
            
        </div>
      </div>
@endsection

@section('script')
    <script>
        $("#saveNewCustomerBtn").on("click", function(){
            var formData = $("#newCustomerForm").serialize();

            axios.post('/customer/save', formData).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/customer/detail/'+res.data.id);
                    }, 1000);
                }
            })
        })
    </script>
@endsection