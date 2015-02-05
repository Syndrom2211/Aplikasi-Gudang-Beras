<?php
include "../../connect.php";

$kd_pelanggan	= (htmlspecialchars($_POST["kd_pelanggan"]));
$nama_pelanggan	= (htmlspecialchars($_POST["nama_pelanggan"]));
$alamat_pelanggan	= (htmlspecialchars($_POST["alamat_pelanggan"]));
$telepon_pelanggan = (htmlspecialchars($_POST["telepon_pelanggan"]));

//validasi
if (trim($_POST['nama_pelanggan']) == '') {
	$error[] = '- Nama Pelanggan harus diisi';
}
if (trim($_POST['alamat_pelanggan']) == '') {
	$error[] = '- Alamat Pelanggan harus diisi';
}
if (trim($_POST['telepon_pelanggan']) == '') {
	$error[] = '- Telepon harus diisi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = mysql_query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', telepon_pelanggan='$telepon_pelanggan' WHERE kd_pelanggan='$kd_pelanggan'");

	echo '<b>Data Berhasil di update.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='lihat-pelanggan.php';",2000);</script>
	<?php
}
die();
?>
