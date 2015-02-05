<?php
define("SERVER_NAME", "localhost");
define("SERVER_USER", "theloung_firdam");
define("SERVER_PASS", "d4md4md4m");
define("SERVER_DB", "theloung_firdam");

@mysql_connect(SERVER_NAME,SERVER_USER,SERVER_PASS) or die("Cek file 'connect.php' ! ada yang salah !");
@mysql_select_db(SERVER_DB) or die("Database tidak ada ! cek file 'connect.php'");
?>
