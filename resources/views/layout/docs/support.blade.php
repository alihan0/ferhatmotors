@extends('master')

@section('content')
<style>
    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }
      .ttt li{
        list-style: none
      }
</style>
<div class="d-flex justify-content-between">
    <h4 class="page-title">Teknik Destek</h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dokümanlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Teknik Destek</li>
    </ol>
</nav>
</div>

<div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Ücretsiz Teknik Destek</h4>
    <div class="col-lg-6 mx-auto text-start">
      <p class="mb-4">
        Bu sistem, hali hazırda teslim edildikten sonra 1 (bir) yıl süreyle ücretsiz teknik destek hakkı vardır. Bu teknik destek hakkınızı kullanmak için bu sayfanın altında bulunan iletişim numaralarından randevu alabilirsiniz.
      </p>

      <p class="mb-4">
        <ul>
            <li>
                <b>Teslim Tarihi:</b> {{$system->delivery_time}}
            </li>
            <li>
                <b>ÜTD'nin Sonlanacağı Tarih:</b> {{ date('Y-m-d', strtotime('+1 year', strtotime($system->delivery_time))) }}

            </li>
        </ul>
      </p>
    </div>
  </div>
  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Ücretiz Teknik Destek Kapsamı</h4>
    <div class="col-lg-6 mx-auto text-start">
      <p class="mb-4">
        Ücretsiz teknik destek hakkınız şunları kapsar:
      </p>
      <ul>
        <li>Kurulum hataları,</li>
        <li>Veritabanı hataları,</li>
        <li>Kullanmak için yardım,</li>
        <li>Veritabanı kurtarma,</li>
        <li>Veritabanı Yenileme,</li>
        <li>Hatalı veri girişi düzeltme,</li>
        <li>Upload sorunları,</li>
        <li>Sistemin beklendiği gibi çalışmaması,</li>
        <li>Sıfırdan kurulum (Yıl boyunca 2 kez)</li>
        <li>Yedek Alma (Yıl boyunca 2 kez)</li>
        <li>Yedekten Geri Yükleme (Yıl boyunca 2 kez)</li>
      </ul>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Ücretsiz Teknik Destek Koşulları</h4>
    <div class="col-lg-6 mx-auto text-start">
      <p class="mb-4">
        İşbu özel web yazılımı <b>{{$system->site_name}}</b> için özel olarak hazırlanmıştır. Yalnızca 1 (bir) kopya ile sınırlıdır. Yalnızca ilk kurulum için kullanılan hostingde kullanılacaktır. Sistemin birden fazla hosting üzerinde çalıştırılması ve birden fazla kopya halinde kullanılması durumunda ücretsiz teknik destek kapsamı sona erer. Birden fazla kopya ile çalışılaiblir, sistem üzerinde herhangi bir yazılımsal kısıtlama bulunmamaktadır fakat birden fazla kopyanın kullanılması durumunda yaşanan sorunlar kendi sorumluluğunuzdadır, ücretsiz teknik destek alınamaz. Yapılan ek güncellemeler sadece <b>{{$system->delivery_time}}</b> tarihinde teslim edilen ilk kopya için geçerlidir. Diğer kopyalar için güncelleme ve kurulum işlemleri ekstra ücretlendirmeye tabidir.
      </p>
    
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Teknik Servis</h4>
    <div class="col-lg-6 mx-auto ">
      
      <ul class="ttt">
        <li>
            <b>Web Site:</b> www.metatige.com
        </li>
        <li>
            <b>Teknik Uzman:</b> Alihan ÖZTÜRK
        </li>
        <li>
            <b>E-posta:</b> alihan@metatige.com
        </li>
        <li>
            <b>Telefon:</b> 546 497 1229
        </li>
      </ul>
      

      

      
    </div>
  </div>




@endsection