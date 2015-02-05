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
			$kd_pemasok		= $_GET['kd_pemasok'];
			$datakueri		= mysql_query("select * from pemasok where kd_pemasok='$kd_pemasok'");
			$data			= mysql_fetch_array($datakueri);
		?>
        <div class="grid_12" style="margin-bottom:265px;">
            <div class="box round first fullpage">
                <h2>Semua Data Pemasok</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
			<form id="myForm" method="POST" action="proses/proses-simedit-pemasok.php">
			<table class="form">
				<tr>
					<td class="col1"><label>Kode Pemasok :</label></td>
					<td class="col2"><input type="text" name="kd_pemasok" value="<?php echo $kd_pemasok; ?>" readonly /></td>
				</tr>
				<tr>
					<td class="col1"><label>Nama Pemasok :</label></td>
					<td class="col2"><input type="text" name="nama_pemasok" value="<?php echo $data['nama_pemasok']; ?>" /></td>
				</tr>
				<tr>
					<td class="col1"><label>Alamat Pemasok :</label></td>
					<td class="col2"><input type="text" name="alamat_pemasok" value="<?php echo $data['alamat_pemasok']; ?>" /></td>
				</tr>
				<tr>
					<td class="col1"><label>Telepon Pemasok :</label></td>
					<td class="col2"><input type="text" name="telepon_pemasok" value="<?php echo $data['telepon_pemasok']; ?>" /></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td><button class="btn btn-black" name="Submit" value="Simpan">Simpan</button>
						<button class="btn btn-black" name="Submit" value="Kembali" onClick="window.location.href='lihat-pemasok.php'">Kembali</button>
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
