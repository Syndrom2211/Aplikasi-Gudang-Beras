/*****************************************************************

03-03-2014 - 06:10:21
Web Aplikasi Gudang Beras Bang Firdam
Ujikom 2014 - XII RPL 2
Smk Angkasa 1 Margahayu - Lanud Sulaiman, Bandung

*****************************************************************/

1. Buka Folder MIsc -> File Pendukung 
2. Disana terdapat xampp versi terbaru, jika anda memiliki versi xampp yang sudah ada tapi versi lama,
    di harapkan untuk mengupgrade ke versi baru.
3. Jika sudah terdapat xampp, copykan seluruh folder ini ke folder xampp -> htdocs
4. Selanjutnya, jika xampp sudah menyala, buka browser anda kemudian ketik link berikut ini :
	http://localhost/phpmyadmin
5. Buat database baru dengan nama gudangberas , kemudian klik Import -> Browse 
6. Pilih file .sql gudangberas nya di folder misc -> SQL File
7. Buka Folder js -> login -> login.js
8. Pada bagian "var url_auth = 'http://localhost/new/main/index.php';" ubah menjadi lokasi web anda.
9. Jika selesai, buka file connect.php yang ada di folder webnya, bisa buka menggunakan notepad atau aplikasi yang lainnya.
10. Di bagian SERVER_NAME isi saja localhost, jika kita menjalankan nya di xampp, 
	SERVER_USER pada defaultnya adalah root jadi tidak usah di ubah lagi
	SERVER_PASS ubah password jika phpmyadmin nya memakai password jika tidak kosongkan saja
	SERVER_DB pilih nama databse yang sudah di buat, misalnya kita disini membuat database gudangberas yang sudah saya terangkan tadi.
11. Semua selsai, sekarang coba buka link nya : http://localhost/lokasiwebanda/
	Untuk Administrator :
	default username : admin
	default password : admin

	Untuk User / Pegawai Biasa :
	username : firdam
	password : firdam
=============================================================

Contact :
E-mail : jenovasystem@ymail.com
FB : http://facebook.com/Ravnui.Embassy.us
Twitter : @Syndrom2211

visit juga ya channel youtube saya :
http://youtube.com/user/bangfirdam

visit juga ya soundcloud nya :
http://soundcloud.com/firdammitulz
