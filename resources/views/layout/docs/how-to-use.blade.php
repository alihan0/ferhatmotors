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
    <div class="col-lg-6 mx-auto text-start">
      <p class="mb-4">
        İlan yönetimi satılık olan araçlarınızı yönetebileceğiniz alandır. Burada öncelikle yeni bir ilan ekleyerek başlayın. Yeni bir ilan eklemek için <code>/advert/new</code> sayfasını ziyaret edin. Bu sayfadaki doldurulmak zorunda olan alanlar yıldız (*) ile işaretlenmiştir bu alanları doldurmak zorundasınız. Ardından fotoğraflarınızı yükleyin ve kaydet butonuna basın. <code>İlan başarılı bir şekilde oluşturuldu</code> uyarısını aldıktan sonra sistem sizi otomatik olarak ilan detay sayfasına yönlendirecek.
      </p>
      <p class="mb-4">
        İlan oluştururken fiyat kısmına dikkat etmeniz gerekiyor. Fiyatlar <code>Decimal 9,2</code> formatında oluşturulmuştur. Herhangi bir binlik ayırıcı girmenize izin verilmemektedir. Ondalık ayırıcı olarak nokta (.) kullanılmaktadır. Herhangi bir fiyat alanına maksimum <code>999999999.99</code> değeri girebilirsiniz. Eğer binlik ayırıcı kullanırsanız sistem ilanınızı kaydetmeyecek, kaydetse bile fiyat bilgisini tutmayacaktır. Örnek hatalı girişler:
      </p>
      <ul>
        <li>100.000</li>
        <li>1.000.000</li>
        <li>1,000.000</li>
        <li>100,000</li>
      </ul>
      <p class="mb-4">
        Fotoğraf yükleme alanı <code>multiple file</code> türündendir. Dosya seç butonuna bastıktan sonra <code>CMD (MacOS) ya da CTRL (WIN)</code> tuşuna basılı tutarak birden fazla fotoğraf seçebilirsiniz. Seçtiğiniz fotoğraflar sadece <code>PNG</code> yada <code>JPG</code> formatında olmalıdır. Farklı formatlarda fotoğraf yüklemenize sistem izin vermeyecektir.
      </p>
      <p class="mb-4">
        Eklediğiniz ilanları görüntülemek için <code>/advert/all</code> sayfasını ziyaret edin. Bu sayfa <code>DataTable()</code> eklentisi kullanarak otomatik olarak sayfalama yapar. Burada istediğiniz ilanın detaylarına gidebilir ya da hızlı aksiyon menülerini kullanabilirsiniz.
      </p>

      <p class="mb-4">
        İlan detaylarını görüntülediğinizde ilan için detay bilgisini görüntüleyebilirsiniz. Bu sayfada ilana şu aksiyonları yapabilirsiniz:
      </p>
      <ul>
        <li>Not Ekleme</li>
        <li>Masraf Ekleme</li>
        <li>İlanı Düzenleme</li>
        <li>Satıldı Olarak İşaretleme</li>
        <li>İlanı Silme</li>
      </ul>
      <p class="mb4">
        <b>Not:</b> <code>Satıldı</code> olarak işaretlenen ilanlar üzerinde aksiyon menülerini kullanamazsınız.
      </p>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <h4 class="display-7 fw-bold text-body-emphasis mb-4">Rapor Yönetimi</h4>
    <div class="col-lg-6 mx-auto text-start">
      <p class="mb-4">
        Sistem üzerinde tüm gelir ve giderlerinizi raporlar aracılığı ile görüntüleyebilirsiniz. Gelirlerinizi görüntülemek için <code>/report/revenue</code> sayfasını ziyaret edin. Bu sayfa 4 sekmeye ayrılmıştır:
      </p>
      <ul>
        <li>
            <b>Aylık Raporlar:</b> İçinde bulunduğumuz ay boyuna yapılan tüm satışların gelirlerini hesaplar.
        </li>
        <li>
            <b>Yıllık Raporlar:</b> İçinde bulunduğumuz yıl boyunca yapılan tüm satışların gelirlerini hesaplar.
        </li>
        <li>
            <b>Tüm Zamanlar:</b> Tüm satışların gelirlerini hesaplar.
        </li>
        <li>
            <b>Kullanıcıya Göre Filtreleme:</b> Seçilen kullanıcının tüm zamanlardaki kazançlarını hesaplar.
        </li>
      </ul>
      <p class="mb-4">
        Giderlerinizi görüntülemek için <code>/report/expense</code> sayfasını ziyaret edin. Bu sayfa 4 sekmeye ayrılmıştır:
      </p>

      <ul>
        <li>
            <b>Aylık Raporlar:</b> İçinde bulunduğumuz ay boyuna yapılan tüm harcamaları hesaplar.
        </li>
        <li>
            <b>Yıllık Raporlar:</b> İçinde bulunduğumuz yıl boyunca yapılan tüm harcamaları hesaplar.
        </li>
        <li>
            <b>Tüm Zamanlar:</b> Tüm harcamaları hesaplar.
        </li>
        <li>
            <b>Kullanıcıya Göre Filtreleme:</b> Seçilen kullanıcının tüm zamanlardaki haramalarını hesaplar.
        </li>
      </ul>

      <p class="mb-4">
        İstediğiniz bir raporun çıktısını sağ altta bulunan <code>Yazdır</code> butonundan alabilirsiniz. Sisteminizde bağlı bir varsayılan tarayıcı varsa otomatik olarak belge yazıcıya gönderilir. Eğer bağlı bir yazıcı yoksa belge <code>PDF</code> formatında kaydedilecektir. Eğer bir yazıcı bağlı fakat yine de görüntüleyemiyorsanız  yazdır butonuna bastıktan sonra açılan pençereden <code>Hedef</code> seçim kutusunu tıklayın ve açılan listeden yazıcınızı seçin. Bağlı olan yazıcınızı burada görüntüleyemiyorsanız yazıcı yapılandırmanızda bir sorun var demektir.
      </p>
    </div>
  </div>




@endsection