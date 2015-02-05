<?php
include "../../connect.php";

$nm_pelanggan		= (htmlspecialchars($_POST["nm_pelanggan"]));
$alamat_pelanggan		= (htmlspecialchars($_POST["alamat_pelanggan"]));
$telepon_pelanggan	= (htmlspecialchars($_POST["telepon_pelanggan"]));

//validasi
if (trim($_POST['nm_pelanggan']) == '') {
	$error[] = '- Nama Pelanggan harus di isi';
}
if (trim($_POST['alamat_pelanggan']) == '') {
	$error[] = '- Alamat Pelanggan harus di isi';
}
if (trim($_POST['telepon_pelanggan']) == '') {
	$error[] = '- Telepon Pelanggan harus di isi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = "INSERT INTO pelanggan(kd_pelanggan,nama_pelanggan,alamat_pelanggan,telepon_pelanggan) values('','$nm_pelanggan','$alamat_pelanggan','$telepon_pelanggan')";
	$kueri = mysql_query($sql);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='input-pelanggan.php';",2000);</script>
	<?php
}
die();
?>
