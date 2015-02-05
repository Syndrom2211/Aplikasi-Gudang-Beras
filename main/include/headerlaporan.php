<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Gudang Beras Bang Firdam</title>
<link rel="SHORTCUT ICON" href="../images/icon.png" />
<style type="text/css">
#logo{
	width: 300px;
	height: 200px;
	float:left;
}
#judul{
	margin-left: 205px;
	width: 900px;
	height: 200px;
	text-align:center;
}
#tombolprint{
	margin-left: 990px;
}
table, th, td {
border:1px solid #333;
}
</style>
</head>
<body>
<?php
ini_set("display_errors",1);
include "../connect.php";
?>
<div id="logo">
	<img src="../images/main/face.png" alt="" width="211" height="190" /></div>
	<div id="judul">
		<br/>
		<br/>
		<font size="+3">GUDANG BERAS BANG FIRDAM</font><br/>
 		Kp. Ciherang No.45 40377<br/>
		FAX. (8876) 229876 BANDUNG - JAWA BARAT<br/>
		Email : jenovasystem@ymail.com Website : www.firdam.ml
	</div>
	<div id="tombolprint">
			<input type="submit" onclick="print()" value="Print" />
	</div>
