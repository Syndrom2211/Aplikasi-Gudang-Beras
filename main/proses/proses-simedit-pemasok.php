<?php
include "../../connect.php";

$kd_pemasok			= (htmlspecialchars($_POST["kd_pemasok"]));
$nama_pemasok		= (htmlspecialchars($_POST["nama_pemasok"]));
$alamat_pemasok		= (htmlspecialchars($_POST["alamat_pemasok"]));
$telepon_pemasok		= (htmlspecialchars($_POST["telepon_pemasok"]));

//validasi
if (trim($_POST['nama_pemasok']) == '') {
	$error[] = '- Nama pemasok harus diisi';
}
if (trim($_POST['alamat_pemasok']) == '') {
	$error[] = '- Alamat pemasok harus diisi';
}
if (trim($_POST['telepon_pemasok']) == '') {
	$error[] = '- Telepon harus diisi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = mysql_query("UPDATE pemasok SET nama_pemasok='$nama_pemasok', alamat_pemasok='$alamat_pemasok', telepon_pemasok='$telepon_pemasok' WHERE kd_pemasok='$kd_pemasok'");

	echo '<b>Data Berhasil di update.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='lihat-pemasok.php';",2000);</script>
	<?php
}
die();
?>
