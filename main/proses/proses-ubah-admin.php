<?php
include "../../connect.php";

$id			= (htmlspecialchars($_POST['id']));
$username 	= (htmlspecialchars($_POST['username']));
$password 	= (htmlspecialchars($_POST['password']));
$email		= (htmlspecialchars($_POST['email']));
$no_telp		= (htmlspecialchars($_POST['no_telp']));
$level		= (htmlspecialchars($_POST['level']));

//validasi
if (trim($_POST['username']) == '') {
	$error[] = '- Username harus diisi';
}
if (trim($_POST['password']) == '') {
	$error[] = '- Password harus diisi';
}
if (trim($_POST['email']) == '') {
	$error[] = '- Email harus diisi';
}
if (trim($_POST['no_telp']) == '') {
	$error[] = '- No Telepon harus diisi';
}
if (trim($_POST['level']) == '') {
	$error[] = '- Level harus dipilih';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$update = "UPDATE user SET username='$username', password='".sha1($password)."', email='$email', no_telepon='$no_telp', level='$level' WHERE id='$id'";
	$hasil = mysql_query($update);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='lihat-admin.php';",2000);</script>
	<?php
}
die();
?>
