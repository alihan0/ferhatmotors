@extends('master')

@section('title', 'Müşteriler')
    
@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Müşteri Listesi </h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Müşteriler</a></li>
        <li class="breadcrumb-item active" aria-current="page">Müşteri Listesi</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped mb-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">İsim</th>
                        <th scope="col">E-posta</th>
                        <th scope="col">Telefon</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach ($customers as $customer)
                      <tr class="align-middle">
                        <th scope="row">{{$customer->id}}</th>
                        <td>{{$customer->firstname.' '.$customer->lastname}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                        <td class="text-end" id="{{$customer->id}}">
                            <a href="/customer/detail/{{$customer->id}}" class="btn btn-primary btn-xs" data-bs-toggle="tooltip" title="Detay"><i width="10" data-feather="eye"></i></a>
                            <a href="javascript:;" class="btn btn-info btn-xs editInfoBtn" data-bs-toggle="tooltip" title="Bilgileri Güncelle"><i width="10" data-feather="edit"></i></a>
                        </td>
                      </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="editCustomerModal{{$customer->id}}" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editCustomerModalLabel">Bilgileri Değiştir</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm{{$customer->id}}">
                                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                        <div class="row mb-3">
                                          <label for="firstname" class="col-4 col-form-label">İsim</label>
                                          <div class="col-8">
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$customer->firstname}}">
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label for="lastname" class="col-4 col-form-label">Soyisim</label>
                                          <div class="col-8">
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$customer->lastname}}">
                                          </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="email" class="col-4 col-form-label">E-posta</label>
                                            <div class="col-8">
                                              <input type="text" class="form-control" id="email" name="email" value="{{$customer->email}}">
                                            </div>
                                          </div>
                                        <div class="row mb-3">

                                            <label for="phone" class="col-4 col-form-label">Telefon</label>
                                            <div class="col-8">
                                              <input type="text" class="form-control" id="phone" name="phone" value="{{$customer->phone}}">
                                            </div>
                                          </div>

                                          
                                        
                                        
                                      </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                                <button type="button" class="btn btn-primary saveEditBtn" customer-id="{{$customer->id}}">Kaydet</button>
                                </div>
                            </div>
                            </div>
                        </div>
                      @endforeach
                      
                    </tbody>
                  </table>
                  <a href="/customer/new" class="btn btn-outline-primary btn-xs float-end"><i width="10" data-feather="plus"></i> Yeni Müşteri Oluştur</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <script>
    


        $(".editInfoBtn").on("click", function(){
            var id = $(this).parent('td').attr('id');

            $("#editCustomerModal"+id).modal('show');

        });

        $(".saveEditBtn").on("click", function(){
            var id = $(this).attr('customer-id');
            var formData = $("#editForm"+id).serialize();

            axios.post('/customer/update', formData).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.reload();
                    }, 1000);
                }
            });
        });


    </script>
@endsection