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
                        <td><img src="{{asset('storage/'.$user->photo)}}" class="wd-100 wd-sm-200 me-3">
                        </td>
                        <td>{{$user->firstname.' '.$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td class="text-end" id="{{$user->id}}">
                            <a href="javascript:;" class="btn btn-info btn-xs editInfoBtn" data-bs-toggle="tooltip" title="Bilgileri Güncelle"><i width="10" data-feather="edit"></i></a>
                            <a href="javascript:;" class="btn btn-warning btn-xs changePassBtn" data-bs-toggle="tooltip" title="Şifre Değiştir"><i width="10" data-feather="key"></i></a>
                            <a href="javascript:;" class="btn btn-danger btn-xs removeUserBtn" data-bs-toggle="tooltip" title="Sil"><i width="10" data-feather="trash-2"></i></a>
                        </td>
                      </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editUserModalLabel">Bilgileri Değiştir</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm{{$user->id}}">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <div class="row mb-3">
                                          <label for="firstname" class="col-4 col-form-label">İsim</label>
                                          <div class="col-8">
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$user->firstname}}">
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label for="lastname" class="col-4 col-form-label">Soyisim</label>
                                          <div class="col-8">
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}">
                                          </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="email" class="col-4 col-form-label">E-posta</label>
                                            <div class="col-8">
                                              <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                                            </div>
                                          </div>
                                        <div class="row mb-3">

                                            <label for="phone" class="col-4 col-form-label">Telefon</label>
                                            <div class="col-8">
                                              <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                                            </div>
                                          </div>

                                          <div class="row mb-3">

                                            <label for="photo" class="col-4 col-form-label">Fotoğraf</label>
                                            <div class="col-8">
                                              <input type="file" user-id="{{$user->id}}" class="form-control changePhoto" id="photo" name="photo">
                                              <input type="hidden" name="fileData" id="fileData{{$user->id}}" value="{{$user->photo}}">
                                            </div>
                                          </div>
                                        
                                        
                                      </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                                <button type="button" class="btn btn-primary saveEditBtn" user-id="{{$user->id}}">Kaydet</button>
                                </div>
                            </div>
                            </div>
                        </div>
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
        });



        $(".changePhoto").on("change", function(e){
            var file = e.target.files[0];
            var id = $(this).attr('user-id');

            console.log(file);
            var formData = new FormData();
            formData.append('file', file);
            
            axios.post('/upload/profile', formData, {
                headers: {
                    "Content-Type" : "multipart/form-data"
                }
            }).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    $("#fileData"+id).val(res.data.path);
                }
            });
        })


        $(".editInfoBtn").on("click", function(){
            var id = $(this).parent('td').attr('id');

            $("#editUserModal"+id).modal('show');

        });

        $(".saveEditBtn").on("click", function(){
            var id = $(this).attr('user-id');
            var formData = $("#editForm"+id).serialize();

            axios.post('/user/update', formData).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.reload();
                    }, 1000);
                }
            });
        });

        $(".removeUserBtn").on("click", function(){
          var id = $(this).parent('td').attr('id');

          Swal.fire({
            title: 'Emin misin?',
            text: "Kullanıcıyı silersen, bütün veriyle birlikte kullanıcı hesabı silinecektir. Hesaba tekrar giriş yapılamayacak ve onun oluşturduğu hiçbir veriye ulaşamayacaksınız. Dikkat: Bu işlem geri alınamaz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Vazgeç",
            confirmButtonText: 'Evet, Sil!'
          }).then((result) => {
            if (result.isConfirmed) {

              axios.post('/user/remove', {id:id}).then((res)=>{
                Swal.fire(
                  res.data.title,
                  res.data.message,
                  res.data.type
                )
                if(res.data.status){
                  setInterval(() => {
                    window.location.reload();
                  }, 1500);
                }
              })


              
            }
          })
        })

    </script>
@endsection