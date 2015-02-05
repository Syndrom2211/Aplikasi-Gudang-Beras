<?php
include "../../connect.php";

$nm_jenisberas	= (htmlspecialchars($_POST["nm_jenisberas"]));

//validasi
if (trim($_POST['nm_jenisberas']) == '') {
	$error[] = '- Nama Jenis Beras harus diisi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = "INSERT INTO jenis_beras(kd_jenisberas,nama_jenisberas) values ('','$nm_jenisberas')";
	$kueri = mysql_query($sql);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='input-jenis-beras.php';",2000);</script>
	<?php
}
die();
?>
