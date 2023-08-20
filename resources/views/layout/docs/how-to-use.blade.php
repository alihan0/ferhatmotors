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

</style>
<div class="d-flex justify-content-between">
    <h4 class="page-title">Nasıl Kullanılır?</h4>
    
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dokümanlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nasıl Kullanılır?</li>
    </ol>
</nav>
</div>

<div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Kullanıcı Yönetimi</h4>
    <div class="col-lg-6 mx-auto text-start">
      <p class="mb-4">
        Sistem, <code>Kullanıcı</code> hesapları üzerinden yürütülür. Kullanıcılar, bu sistem üzerinde oturum açma ve işlem yapma yetkisine sahip olan kişilerdir.
      </p>

      <p class="mb-4">
        Sistemi kullanmak için bir kullanıcı hesabına ihtiyacınız var. Sistem size vir adet varsayılan kullanıcı ile teslim edildi. Bu varsayılan kullanıcı ile oturum açtıktan sonra yapmanız gereken ilk kiş kendiniz için bir kullanıcı oluşturmak ve varsayılan demo kullanıcısını silmektir. Silme işlemi ardından oturumunuzu kapatın ve yeni oluşturduğunuz kullanıcı ile giriş yapın. Bu sayede oturumunuz yenilenmiş olacak ve yaptığınız değişiklikler yeni kullanıcı adına kaydedilecek.
      </p>

      <p class="mb-4">
        Sistem, kullanıcı aksiyonlarını kayıt altına almaktadır. Bir ilan oluşturduğunuzda ya da ilan üzerinde bir değişiklik yaptığınızda bu işlemi kimin yaptığını bu kullanıcı aksiyonları aracılığı ile görüntüleyebilirsiniz. Sistemde oturum acabilecek tüm kullanıcıları görüntülemek için <code>/user/all</code> sayfasını ziyaret edin. Bu sayfada şu işlemleri yapabilirsiniz:
      </p>
      <ul>
        <li>Kullanıcı Bilgilerini Görme</li>
        <li>Kullanıcı Silme</li>
        <li>Kullanıcının şifresini değiştirme</li>
      </ul>

      <p class="mb-4">Sistemde oturum açabileceke yeni bir kullanıcı oluşturmak için <code>/user/add</code> sayfasını ziyaret edin. Burada oluşturduğunuz bilgiler ile yeni kullanıcı girişi yapılabilir.</p>

      <p class="mb-4">
        <b>Not:</b> Kullanıcı şifreleri <code>Laravel Hash</code> yöntemi ile saklanmaktadır. Bu yöntem sayesinde şifreler özel olarak kriptolanır. Şifreyi sadece oluştururken siz göreceksiniz ve sadece sizin paylaştığınız kanallarda kalacak. Şifreyi daha sonra değiştirebilirsiniz fakat şifreyi görüntüleyebilmeniz mümkün değildir. Şifre güvenliğini sağlamak sizin sorumluluğunuzdadır.
      </p>


    </div>
  </div>
  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Müşteri Yönetimi</h4>
    <div class="col-lg-6 mx-auto text-start">
      <p class="mb-4">
        Müşteriler rehber oluşturmak için kullanılır. Tüm müşteri datasını burada bulabilirsiniz. Telefon ve e-postaları ile iletişime geçebilmeniz için tasarlanmıştır. Buradan <code>Düzenle</code> butonuna tıklayarak açılan modaldan müşteri bilgilerini düzenleyebilirsiniz. Müşteri listenize ulaşmak için <code>/customer/all</code> sayfasına gidin. Yeni bir müşteri eklemek istiyorsanız <code>/customer/new</code> sayfasını ziyaret edin.
      </p>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">İlan Yönetimi</h4>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Rapor Yönetimi</h4>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Sistem Ayarları</h4>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
    </div>
  </div>


@endsection