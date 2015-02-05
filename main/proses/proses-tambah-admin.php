<?php
include "../../connect.php";

$username		= (htmlspecialchars($_POST["username"]));
$password		= (htmlspecialchars($_POST["password"]));
$email			= (htmlspecialchars($_POST["email"]));
$no_telp			= (htmlspecialchars($_POST["no_telp"]));
$level			= $_POST["level"];

//validasi
if (trim($_POST['username']) == '') {
	$error[] = '- Username harus di isi';
}
if (trim($_POST['password']) == '') {
	$error[] = '- Password harus di isi';
}
if (trim($_POST['email']) == '') {
	$error[] = '- Email harus di isi';
}
if (trim($_POST['no_telp']) == '') {
	$error[] = '- No Telepon harus di isi';
}
if (trim($_POST['level']) == '') {
	$error[] = '- Level harus di pilih';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = "INSERT INTO user(id, username, password, email, no_telepon, level) values('','$username','".sha1($password)."','$email','$no_telp','$level')";
	$kueri = mysql_query($sql);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='lihat-admin.php';",2000);</script>
	<?php
}
die();
?>
