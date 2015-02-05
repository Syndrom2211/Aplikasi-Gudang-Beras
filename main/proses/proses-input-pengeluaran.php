<?php
include "../../connect.php";

$tgl_pb		= (htmlspecialchars($_POST["tgl_pb"]));
$kp_pb		= (htmlspecialchars($_POST["kp_pb"]));
$kjb_pb		= (htmlspecialchars($_POST["kjb_pb"]));
$jmlp_pb		= (htmlspecialchars($_POST["jmlp_pb"]));
$ksa_pb		= (htmlspecialchars($_POST["ksa_pb"]));
$sak_pb		= (htmlspecialchars($_POST["sak_pb"]));
$pg_pb		= (htmlspecialchars($_POST["pg_pb"]));
$ym_pb		= (htmlspecialchars($_POST["ym_pb"]));
$lp_pb		= (htmlspecialchars($_POST["lp_pb"]));

//validasi
if (trim($_POST['tgl_pb']) == '') { $error[] = '- Tanggal Pengeluaran harus diisi'; }
if (trim($_POST['jmlp_pb']) == '') { $error[] = '- Jumlah Pengeluaran harus diisi'; }
if (trim($_POST['lp_pb']) == '') { $error[] = '- Limit Persediaan harus diisi'; }
if (trim($_POST['pg_pb']) == '') { $error[] = '- Petugas Gudang harus diisi'; }
if (trim($_POST['ym_pb']) == '') { $error[] = '- Yang Mengambil harus diisi'; }

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$sql2 = "INSERT INTO saldo(id, kd_jenisberas, kd_pemasok, kd_pelanggan, saldo, tgl_stock_opname, tanggal, limit_persediaan, kd_satuan) values ('','$kjb_pb','','$kp_pb','$sak_pb','$tgl_pb','$tgl_pb','$lp_pb','$ksa_pb')";
	$sql = "INSERT INTO pengeluaran(no_order, tanggal, kd_pelanggan, kd_jenisberas, jml_pengeluaran, kd_satuan, limit_persediaan, saldo_akhir, petugas, yg_mengambil) values  ('','$tgl_pb','$kp_pb','$kjb_pb','$jmlp_pb','$ksa_pb','$lp_pb','$sak_pb','$pg_pb','$ym_pb')";
	$kueri = mysql_query($sql);
	$kueri2 = mysql_query($sql2);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='input-pengeluaran-beras.php';",2000);</script>
	<?php
}
die();
?>
