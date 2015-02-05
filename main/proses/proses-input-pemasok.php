<?php
include "../../connect.php";

$nm_pemasok		= (htmlspecialchars($_POST["nm_pemasok"]));
$alamat_pemasok	= (htmlspecialchars($_POST["alamat_pemasok"]));
$telepon_pemasok	= (htmlspecialchars($_POST["telepon_pemasok"]));

//validasi
if (trim($_POST['nm_pemasok']) == '') {
	$error[] = '- Nama Pemasok harus diisi';
}
if (trim($_POST['alamat_pemasok']) == '') {
	$error[] = '- Alamat Pemasok harus diisi';
}
if (trim($_POST['telepon_pemasok']) == '') {
	$error[] = '- Telepon Pemasok harus diisi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = "INSERT INTO pemasok(kd_pemasok,nama_pemasok,alamat_pemasok,telepon_pemasok) values ('','$nm_pemasok','$alamat_pemasok','$telepon_pemasok')";
	$kueri = mysql_query($sql);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='input-pemasok.php';",2000);</script>
	<?php
}
die();
?>
