<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"]) && ($_SESSION["level"])){
	if($_SESSION['level'] == "admin"){
?>
﻿<?php include "include/headernav.php"; ?>
	<script type="text/javascript" src="../js/jquery-1.2.3.min.js"></script>
        <div class="clear">
        </div>
	<?php
			include "../connect.php";
			$kd_pelanggan	= $_GET['kd_pelanggan'];
			$datakueri		= mysql_query("select * from pelanggan where kd_pelanggan='$kd_pelanggan'");
			$data			= mysql_fetch_array($datakueri);
		?>
        <div class="grid_12" style="margin-bottom:265px;">
            <div class="box round first fullpage">
                <h2>Semua Data Pelanggan</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
			<form id="myForm" method="POST" action="proses/proses-simedit-pelanggan.php">
			<table class="form">
				<tr>
					<td class="col1"><label>Kode Pelanggan :</label></td>
					<td class="col2"><input type="text" name="kd_pelanggan" value="<?php echo $kd_pelanggan; ?>" readonly /></td>
				</tr>
				<tr>
					<td class="col1"><label>Nama Pelanggan :</label></td>
					<td class="col2"><input type="text" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan']; ?>" /></td>
				</tr>
				<tr>
					<td class="col1"><label>Alamat Pelanggan :</label></td>
					<td class="col2"><input type="text" name="alamat_pelanggan" value="<?php echo $data['alamat_pelanggan']; ?>" /></td>
				</tr>
				<tr>
					<td class="col1"><label>Telepon Pelanggan :</label></td>
					<td class="col2"><input type="text" name="telepon_pelanggan" value="<?php echo $data['telepon_pelanggan']; ?>" /></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td><button class="btn btn-black" name="Submit" value="Simpan">Simpan</button>
						<button class="btn btn-black" name="Submit" value="Kembali" onClick="window.location.href='lihat-pelanggan.php'">Kembali</button>
					</td>
				</tr>
			</table>
			</form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
<?php include "include/footerinfo.php"; ?>
</body>
</html>
<?php
	}else if($_SESSION['level'] == "user"){
		header("location:index.php");
	}
}else{
	header("location:../index.php");
}
?>
