# Invoice APP
Invoice APP ile
- Fatura Ekleme Statu Güncelleme<br>
- Geciken Fatura Uyarıları<br>
- Toplam Fatura Adeti<br>
- Ödenmiş Ödenmemiş Fatura<br>
<br>  
 Veritabanı oluşturulması için terminal ekranına;
 - **create invoice-app database** <br> 
 komutu ile veritabanı oluşturulmalıdır.
 
 database/migrations klasör altında migration create table dosyaları bulunmaktadır.
 
 Kurulum için terminal ekranına<br>
 - **php artisan migrate** <br>
 komutu çalıştırılmalıdır.

 Tablolara örnek veriler girmek için;
 database/seeders klasör altında seeder dosyaları bulunmaktadır.
 
 Kurulum için terminal ekranına<br>
 - **php artisan db:seed** <br>
 komutu çalıştırılmalıdır.
 
 Authentication ve authorization işlemleri için;
 - **composer install** <br>
  komutu çalıştırılmalıdır.

   
   Ortamdaki Bazı Bilgiler Düzenlenmelidir<br><br>
   
 
    **Mail Bilgileri**
    -MAIL_MAILER=smtp
    -MAIL_HOST=sandbox.smtp.mailtrap.io
    -MAIL_PORT=2525
    -MAIL_USERNAME=1498bd87897b51
    -MAIL_PASSWORD=4f1848dd26fa52
    -MAIL_ENCRYPTION=tls
    -MAIL_FROM_ADDRESS="faturaapp@info.com"
    -MAIL_FROM_NAME="${APP_NAME}"
   
   
 
 Kurulumlar bittikten sonra cache temizlenmesi için aşağıdaki komutları çalıştırınız.
 - **php artisan route:cache**
 - **php artisan config:cache**
