<?php
include "../../connect.php";

$kd_jenisberas	= (htmlspecialchars($_POST["kd_jenisberas"]));
$nm_jenisberas	= (htmlspecialchars($_POST["nama_jenisberas"]));

//validasi
if (trim($_POST['nama_jenisberas']) == '') {
	$error[] = '- Nama Jenis Beras harus diisi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = mysql_query("UPDATE jenis_beras SET nama_jenisberas='$nm_jenisberas' WHERE kd_jenisberas='$kd_jenisberas'");

	echo '<b>Data Berhasil di update.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='lihat-jenis-beras.php';",2000);</script>
	<?php
}
die();
?>
