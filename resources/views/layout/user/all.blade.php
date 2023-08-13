@extends('master')

@section('title', 'Kullanıcılar')
    
@section('content')
<div class="d-flex justify-content-between">
    <h4 class="page-title">Kullanıcı Listesi </h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Kullanıcılar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Listesi</li>
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
                        <th scope="col">Fotoğraf</th>
                        <th scope="col">İsim</th>
                        <th scope="col">E-posta</th>
                        <th scope="col">Telefon</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach ($users as $user)
                      <tr class="align-middle">
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->photo}}</td>
                        <td>{{$user->firstname.' '.$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td class="text-end" id="{{$user->id}}">
                            <a href="javascript:;" class="btn btn-info btn-xs" data-bs-toggle="tooltip" title="Bilgileri Güncelle"><i width="10" data-feather="edit"></i></a>
                            <a href="javascript:;" class="btn btn-warning btn-xs changePassBtn" data-bs-toggle="tooltip" title="Şifre Değiştir"><i width="10" data-feather="key"></i></a>
                            <a href="javascript:;" class="btn btn-danger btn-xs" data-bs-toggle="tooltip" title="Sil"><i width="10" data-feather="trash-2"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                  <a href="/user/new" class="btn btn-outline-primary btn-xs float-end" data-bs-toggle="tooltip" title="Bilgileri Güncelle"><i width="10" data-feather="plus"></i> Yeni Kullanıcı Oluştur</a>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="changePassModalLabel">Şifre Değiştir</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="user_id">

          <div class="mb-3">
            <label for="password" class="form-label">Yeni Şifre:</label>
            <input type="password" class="form-control" id="password" placeholder="Kullanıcının yeni şifresi">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
          <button type="button" class="btn btn-primary" id="savePassBtn">Kaydet</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
    <script>
        $(".changePassBtn").on("click", function(){
            var id = $(this).parent('td').attr('id');

            $("#changePassModal").modal('show');
            $("#user_id").val(id);
        });

        $("#savePassBtn").on("click", function(){
            let user_id = $("#user_id").val();
            let pass = $("#password").val();

            axios.post('/user/change-password', {user_id:user_id, pass:pass}).then((res)=>{
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    $("#changePassModal").modal('hide')
                }
            })
        })
    </script>
@endsection