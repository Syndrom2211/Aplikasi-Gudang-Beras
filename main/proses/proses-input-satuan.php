<?php
include "../../connect.php";

$nm_satuan		= (htmlspecialchars($_POST["nm_satuan"]));

//validasi
if (trim($_POST['nm_satuan']) == '') {
	$error[] = '- Nama Satuan harus diisi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = "INSERT INTO satuan(kd_satuan,nama_satuan) values ('','$nm_satuan')";
	$kueri = mysql_query($sql);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='input-satuan.php';",2000);</script>
	<?php
}
die();
?>
