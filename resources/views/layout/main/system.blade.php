@extends('master')

@section('title', 'Sistem Ayarları')
    
@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Sistem Ayarları </h4>
    <p class="text-muted">Son Güncelleme: {{$system->updated_at}}</p>
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Ayarlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sistem Ayarları</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Sistem Başlığı</label>
                    <input type="text" class="form-control" id="title" value="{{$system->site_name}}">
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Sistem URL</label>
                    <input type="text" class="form-control" id="url" value="{{$system->site_url}}">
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Login Kapak</label>
                    <input type="text" class="form-control" id="cover" value="{{$system->login_cover}}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Sistem Durumu</label>
                    <select id="status" class="form-control">
                        <option value="0" {{$system->site_status == 0 ? "selected": ""}}>Kapalı</option>
                        <option value="1" {{$system->site_status == 1 ? "selected": ""}}>Açık</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="add_expense" class="form-label">Harcama Ekleme</label>
                    <select id="add_expense" class="form-control">
                        <option value="0" {{$system->add_expense == 0 ? "selected": ""}}>Herkes</option>
                        <option value="1" {{$system->add_expense == 1 ? "selected": ""}}>Sadece Kendine</option>
                    </select>
                </div>
                <a href="javascript:;" class="btn btn-primary float-end" id="saveBtn">Kaydet</a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                    <div class="mb-3">
                        <p class="text-muted">
                            <b>Sistem Başlığı:</b> sistemin görünen adıdır. Tarayıcının sekmelerinde ve diğer alanlarda bu başlık ile görünecektir.Eğer bu veri girilmezse <code>.ENV</code> dosyası üzerinden çalışır. Bu dosya da bulunmazsa sistem çalışmaz.
                        </p>
                    </div>
                    <div class="mb-3">
                        <p class="text-muted">
                            <b>Sistem URL:</b> sistemin çalışacağı url adresidir. Sistem buradaki adres üzerinde çalışır. Eğer bu veri girilmezse <code>.ENV</code> dosyası üzerinden çalışır. Bu dosya da bulunmazsa sistem çalışmaz.
                        </p>
                    </div>
                    <div class="mb-3">
                        <p class="text-muted">
                            <b>Login Kapak:</b> sistemin oturum açma sayfasına yerleştirilen görseldir. Eğer bu veri girilmezse giriş ekranı bozuk görünür. URL olarak girilmelidir. Eğer kendi hostunuz üzerinden ekleyecekseniz görselinizi <code>public > static > assets > images</code> dizinine ekleyin. Sadece <code>JPG</code> ve <code>PNG</code> formatları desteklenir.
                        </p>
                    </div>
                    <div class="mb-3">
                        <p class="text-muted">
                            <b>Sistem Durumu:</b> varsayılan değeri <code>Açık</code> olarak ayarlanmıştır. Eğer <code>Kapalı</code> duruma getirirseniz sistem çalışmaya devam eder ancak kimse oturum açamaz. Sistemi kapalı duruma getirdikten sonra siz de oturum açamayacaksınız. Sistemi tekrar açık duruma getirmek için veritabanını kullanmanız gereklidir.
                        </p>
                    </div>
                    <div class="mb-3">
                        <p class="text-muted">
                            <b>Harcama Ekleme:</b> varsayılan değeri <code>Herkes</code> olarak ayarlanmıştır. Eğer <code>Kendine</code> olarak ayarlarsanız tüm kullanıcılar yalnızca kendi oluşturdukları araçlara harcama ekleyebilirler. 
                        </p>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <script>
        $("#saveBtn").on("click", function(){
            var title = $("#title").val();
            var url   = $("#url").val();
            var cover = $("#cover").val();
            var status = $("#status").val();
            var expense = $("#add_expense").val();

            axios.post('/system/save', {title:title, url:url, cover:cover, status:status, expense:expense}).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.reload();
                    }, 500);
                }
            });
        });
    </script>
@endsection