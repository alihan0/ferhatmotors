

# Proje Hakkında

İşbu özel web yazılımı Ferhat Motors - Metatige Dijital için özel olarak hazırlanmıştır. Araç satış ilanlarını ve müşterilerini takip eden bir BASIC LEVEL CRM SYSTEM'dir. Bu sistemde kullanılan teknolojiler aşağıdaki gibidir:

- PHP 8.2
- Laravel 10
- HTML 5
- CSS3
- JavaScript
- jQuery3
- Bootstrap 5
- SweetAlert 2
- Toastr
- Axios
- Feather Icons
- DataTable

Bu teknolojilerde hakim olmadan projeyi geliştirmeyi denemeyin.

# Nasıl Kurulur?

Projeyi kurmak çok basittir fakat öncelikle bilgisayarınızda ```Composer``` ve ```Git``` teknolojilerinin kurulu olduğundan emin olun. Bilgisayarınızda hali hazırda kurulu olması gereken yazılımlar aşağıdaki gibidir:

- Composer
- Git
- Apache Server (Xammp ile kolay kurulum)
- Php 8.2 (Xammp ile kolay kurulum)
- Mysql Server (Xammp ile kolay kurulum)
- Xampp (Xammp ile kolay kurulum)

### Adım 1 - Sunucuları Başlatın
İndirdiğiniz apache serveri ya da xampp control panel'i çalıştırın. Burada sırasıyla `Apache` ve `Mysql` sunucularına start vererek localhostu başlatın. 

### Adım 2 - Veritabanını Oluşturun
Taryıcınızı açın ve `http://localhost/phpmyadmin` adresine gidin. Sol menüden yeni bir veritabanı ekleyin. Veritabanı kodlaması `utf8mb4_general_ci` olmalıdır, aksi halde türkçe karakter hatası alabilirsiniz.

### Adım 3 - Projeyi Klonlayın
Terminalinizi açın ve istediğiniz bir dizine gittikten sonra şu komutu çalıştırın:
```
git clone https://github.com/alihan0/ferhatmotors
```
ve ardından klasöre gidin:
```
cd ferhatmotors
```

### Adım 4 - ENV Dosyasını Yapılandırın
Klasörün içerisinde `.env.example` içerisindeki dosyası bulun ve adını değiştirerek `.env` yapıp kaydedin. Ardından herhangi bir editör ile dosyası açın. Şu alanları kendinize göre düzenleyin:
- APP_NAME
- APP_URL
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

### Adım 5 - Bağımlılıkları Yükleyin
Projenin çalışması için gerekli olan kütüphaneleri kurmak için 

```
composer update
```
komutunu çalıştırın ve composerın sizin için paketleri yüklemesini bekleyin. Bu işlem biraz zaman alabilir.

### Adım 6 - Laraveli Generate Edin
Şuan projeyi çalıştırmaya çalışırsanız muhtemlen key code hatası alırsınız. Bunun önüne geçmek için sisteme bunun yeni bir makinedeki bir proje olduğunu tanıtmamız gerekiyor. Aşağıdaki komutu çalıştırın:
```
php artisan key:generate
```

### Adım 7 - Veritabanını Yapılandırın
Veritabanınızın tablolarını ve varsayılan satırlarını oluşturmak için çalıştırın:
```
php artisan migrate --seed
```

Bu komutu çalıştırdıktan sonra sistem veritabanınıza tablolarınızı ekleyecek. Terminal ekranınızda sisteme giriş yapmak için gereken bilgileri göreceksiniz.

### Adım 8 - Projeyi Ayağa Kaldırın
```
php artisan serve
```
komutunu kullanarak projeyi ayağa kaldırın. Sistemi kullanmaya başlamak için `http://localhost:8000` adresini ziyaret edebilirsiniz. 

## Lisans

Bu yazılım kişiye özel olarak üretilmiştir ve 1 kopya ile sınırlıdır. İzinsiz çoğaltılması ya da dağıtılması yasaktır.