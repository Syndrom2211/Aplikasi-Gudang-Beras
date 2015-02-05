<?php
include "../../connect.php";

$tgl_pengadaan		= (htmlspecialchars($_POST["tgl_pengadaan"]));
$kp_pengadaan		= (htmlspecialchars($_POST["kp_pengadaan"]));
$kjb_pengadaan		= (htmlspecialchars($_POST["kjb_pengadaan"]));
$jumlah_pengadaan	= (htmlspecialchars($_POST["jumlah_pengadaan"]));
$ksa_pengadaan		= (htmlspecialchars($_POST["ksa_pengadaan"]));
$hasillp_pengadaan		= (htmlspecialchars($_POST["hasillp_pengadaan"]));
$sak_pengadaan		= (htmlspecialchars($_POST["sak_pengadaan"]));
$pg_pengadaan		= (htmlspecialchars($_POST["pg_pengadaan"]));
$ym_pengadaan		= (htmlspecialchars($_POST["ym_pengadaan"]));

//validasi
if (trim($_POST['tgl_pengadaan']) == '') { $error[] = '- Tanggal Pengadaan harus diisi'; }
if (trim($_POST['jumlah_pengadaan']) == '') { $error[] = '- Jumlah Pengadaan harus diisi'; }
if (trim($_POST['hasillp_pengadaan']) == '') { $error[] = '- Limit Persediaan harus diisi'; }
if (trim($_POST['pg_pengadaan']) == '') { $error[] = '- Petugas Gudang harus diisi'; }
if (trim($_POST['ym_pengadaan']) == '') { $error[] = '- Yang Menyerahkan harus diisi'; }

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
$sql2 = "INSERT INTO saldo(id, kd_jenisberas, kd_pemasok, kd_pelanggan, saldo, tgl_stock_opname, tanggal, limit_persediaan, kd_satuan) values ('','$kjb_pengadaan','$kp_pengadaan','','$sak_pengadaan','$tgl_pengadaan','$tgl_pengadaan','$hasillp_pengadaan','$ksa_pengadaan')";
$sql = "INSERT INTO pengadaan(no_order, tanggal, kd_pemasok, kd_jenisberas, jml_pengadaan, kd_satuan, limit_persediaan, saldo_akhir, petugas, yg_menyerahkan) values  ('','$tgl_pengadaan','$kp_pengadaan','$kjb_pengadaan','$jumlah_pengadaan','$ksa_pengadaan','$hasillp_pengadaan','$sak_pengadaan','$pg_pengadaan','$ym_pengadaan')";
	$kueri = mysql_query($sql);
	$kueri2 = mysql_query($sql2);

	echo '<b>Data Berhasil di simpan.</b><br />';?>
	<script type="text/javascript">setTimeout("location.href='input-pengadaan-beras.php';",2000);</script>
	<?php
}
die();
?>
