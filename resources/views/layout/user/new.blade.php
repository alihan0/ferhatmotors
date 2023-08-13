@extends('master')

@section('title', 'Yeni Kullanıcı')
    
@section('content')
<div class="d-flex justify-content-between">
    <h4 class="page-title">Yeni Kullanıcı</h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/user/all">Kullanıcılar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Yeni Kullanıcı</li>
    </ol>
</nav>
</div>

<form id="newUserForm">
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
                      </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                                <div class="row mb-3">
                                    <label for="password" class="col-sm-2 col-form-label">Şifre</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Giriş şifresi">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="lastname" class="col-sm-2 col-form-label">Fotoğraf</label>
                                    <div class="col-sm-10">
                                      <input type="file" class="form-control" id="file">
                                      <input type="hidden" name="fileData" id="fileData">
                                    </div>
                                  </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="javascript:;" class="btn btn-primary float-end" id="saveNewUserBtn">Oluştur</a>
                </div>
            </div>
        </div>
        
    </div>
</form>
@endsection

@section('script')
    <script>
        $("#file").on("change", function(e){
            var file = e.target.files[0];
            var formData = new FormData();

            formData.append('file', file);

            axios.post('/upload/profile', formData, {
                headers: {
                    "Content-Type" : "multipart/form-data"
                }
            }).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    $("#fileData").val(res.data.path);
                }
            })
        });

        $("#saveNewUserBtn").on("click", function(){
            var formData = $("#newUserForm").serialize();

            axios.post('/user/new', formData).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/user/all');
                    }, 1000);
                }
            });
        })
    </script>
@endsection