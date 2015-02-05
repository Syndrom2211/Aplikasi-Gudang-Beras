<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
﻿<?php include_once("include/headernav.php"); ?>
        <div class="clear">
        </div>
	<script language="javascript">
	function konfirmasiHapus(id,kd_jenisberas,kd_pemasok,kd_pelanggan,saldo,tgl_stock_opname,tanggal,limit_persediaan,kd_satuan){
		var id = id;
		var kd_jenisberas = kd_jenisberas;
		var kd_pemasok = kd_pemasok;
		var kd_pelanggan = kd_pelanggan;
		var saldo = saldo;
		var tgl_stock_opname = tgl_stock_opname;
		var tanggal = tanggal;
		var limit_persediaan = limit_persediaan;
		var kd_satuan = kd_satuan;
		var konfirmasi = konfirmasi;

		konfirmasi = confirm("Apakah Saldo dengan id '"+id+"' akan di hapus?")
		if(konfirmasi){
			window.location = "lihat-saldo.php?id="+id;
			return false;
		}else{
			alert("Batal Menghapus Data");
		}
	}
	</script>
        <div class="grid_12" style="margin-bottom:265px;">
            <div class="box round first fullpage">
                <h2>Semua Data Pelanggan</h2>
                <div class="block">
			<form method="POST" action="lihat-pelanggan.php">
			<table class="bordered">
    			<thead>	
				<?php
					if(isset($_SESSION['level'])){
						if($_SESSION['level'] == "admin"){
				?>
    				<tr>
					<th width="1%"><center>No</center></th>
					<th width="1%"><center>ID</center></th>
					<th width="20%"><center>Kode Jenis Beras</center></th>        
					<th width="10%"><center>Kode Pemasok</center></th>
					<th width="10%"><center>Kode Pelanggan</center></th>
					<th width="10%" ><center>Jumlah Saldo Awal</center></th>
					<th width="20%" ><center>Tanggal Stock Opname</center></th>
					<th width="20%" ><center>Limit Persediaan</center></th>
					<th width="20%" ><center>Kode Satuan</center></th>
					<th width="20%" ><center>Proses</center></th>
    				</tr>
				<?php
						}else if($_SESSION['level'] == "user"){
				?>
				<tr>
					<th width="1%"><center>No</center></th>
					<th width="1%"><center>ID</center></th>
					<th width="20%"><center>Kode Jenis Beras</center></th>        
					<th width="10%"><center>Kode Pemasok</center></th>
					<th width="10%"><center>Kode Pelanggan</center></th>
					<th width="10%" ><center>Jumlah Saldo Awal</center></th>
					<th width="20%" ><center>Tanggal Stock Opname</center></th>
					<th width="20%" ><center>Limit Persediaan</center></th>
					<th width="20%" ><center>Kode Satuan</center></th>
    				</tr>
				<?php
						}
				}
				?>
			<?php
			include "../connect.php";
			$i = 1;

			// Jumlah data yang akan di tampilkan per hal;aman
			$dataPerPage = 5;
				
			// apabila $_GET_['page'] sudah di definiskan , maka gunakan halaman tersebut
			// sedangkan apabila belum, nomor halamannya 1.
			if(isset($_GET['page'])){
				$noPage = $_GET['page'];
			}else{
				$noPage = 1;
			}
				
			// perhitungan offset
			$offset = ($noPage - 1) * $dataPerPage;

			// Memanggil perhitungan offset sesuai halaman
			$keula = mysql_query("SELECT * FROM saldo LIMIT $offset, $dataPerPage");

			// Nampilin Data
			while($data=mysql_fetch_array($keula)){
				if(isset($_SESSION['level'])){
					if($_SESSION['level'] == "admin"){
						echo "<tr><td><center>".$i."</center></td>
								<td><center>".$data["id"]."</center></td>
								<td><center>".$data["kd_jenisberas"]."</center></td>
								<td><center>".$data["kd_pemasok"]."</center></td>
								<td><center>".$data["kd_pelanggan"]."</center></td>
								<td><center>".$data["saldo"]."</center></td>
								<td><center>".$data["tgl_stock_opname"]."</center></td>
								<td><center>".$data["limit_persediaan"]."</center></td>
								<td><center>".$data["kd_satuan"]."</center></td>
								<td><center><a href='#' onClick=\"return konfirmasiHapus('".$data["id"]."','".$data["kd_jenisberas"]."','".$data["kd_pemasok"]."','".$data["kd_pelanggan"]."','".$data["saldo"]."','".$data["tgl_stock_opname"]."','".$data["tanggal"]."','".$data["limit_persediaan"]."','".$data["kd_satuan"]."');\" value='Hapus'><img src='../images/main/del.gif' /></a></center></td></tr>";
							$i++;
					}else if($_SESSION['level'] == "user"){
						echo "<tr><td><center>".$i."</center></td>
								<td><center>".$data["id"]."</center></td>
								<td><center>".$data["kd_jenisberas"]."</center></td>
								<td><center>".$data["kd_pemasok"]."</center></td>
								<td><center>".$data["kd_pelanggan"]."</center></td>
								<td><center>".$data["saldo"]."</center></td>
								<td><center>".$data["tgl_stock_opname"]."</center></td>
								<td><center>".$data["limit_persediaan"]."</center></td>
								<td><center>".$data["kd_satuan"]."</center></td>";
							$i++;
					}
				}
			}if($_SESSION['level'] == "admin"){
				if(isset($_GET["id"]) != ""){
					$delete = mysql_query("DELETE FROM saldo WHERE id=".$_GET['id']."");
						echo "<script language='javascript'>alert('Data berhasil di Hapus');</script>";
						echo '<meta http-equiv="refresh" content="0; url=lihat-saldo.php">';
				}
			}if($_SESSION['level'] == "user"){
				if($_GET["id"] != ""){	
						echo '<meta http-equiv="refresh" content="0; url=lihat-saldo.php">';
				}
			}

			// mencari jumlah data semua dalam jenis beras
				$hasil = mysql_query("SELECT COUNT(*) AS jumData FROM saldo");
				$data = mysql_fetch_array($hasil);
				$jumData = $data['jumData'];

			// menentukan jumlah halaman yang muncul berdasarkan jumlah data
			$jumPage = ceil($jumData/$dataPerPage);
			?>
    			</thead>
			</table>
			</form>
		<?php
			// menampilkan nomor halaman menggunakan loop
			for($page = 1; $page <= $jumPage; $page++){
				if((($page >= $noPage - 3) && ($page <= +3)) || ($page ==1) || ($page == $jumPage)){
					if(($showPage == 1) && ($page != 2)) echo "...";
						if(($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "...";
						if(($page == $noPage)) echo "<b>".$page."</b>";
						else echo "<a href='".$_SERVER['PHP_SELF']."?page=".$page."'> ".$page." </a>";
						$showPage = $page;
					}
				}
				?>
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
}else{
	header("location:../index.php");
}
?>
