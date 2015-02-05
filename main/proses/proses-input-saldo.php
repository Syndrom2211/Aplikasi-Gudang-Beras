<?php
include "../../connect.php";

$tgl1			= (htmlspecialchars($_POST["tgl1"]));
$kjb_sa			= (htmlspecialchars($_POST["kjb_sa"]));
$kp_sa			= (htmlspecialchars($_POST["kp_sa"]));
$jml_sa			= (htmlspecialchars($_POST["jml_sa"]));
$tgl_stock_sa	= (htmlspecialchars($_POST["tgl_stock_sa"]));
$lp_sa			= (htmlspecialchars($_POST["lp_sa"]));
$ksa_sa			= (htmlspecialchars($_POST["ksa_sa"]));

//validasi
if (trim($_POST['jml_sa']) == '') { $error[] = '- Jumlah Saldo Awal harus diisi'; }
if (trim($_POST['tgl_stock_sa']) == '') { $error[] = '- Tanggal Stock harus diisi'; }
if (trim($_POST['lp_sa']) == '') { $error[] = '- Limit Persediaan harus diisi'; }

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql = "INSERT INTO saldo(id, kd_jenisberas, kd_pemasok, kd_pelanggan, saldo, tgl_stock_opname, tanggal, limit_persediaan, kd_satuan) values  ('','$kjb_sa','$kp_sa','','$jml_sa','$tgl_stock_sa','$tgl1','$lp_sa','$ksa_sa')";
	$kueri = mysql_query($sql);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='input-saldo-awal.php';",2000);</script>
	<?php
}
die();
?>
