<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
﻿<?php include "include/headernav.php"; ?>
        <div class="clear">
        </div>
	<script language="javascript">
	function konfirmasiHapus(kd_jenisberas,nama_jenisberas){
		var kd_jenisberas = kd_jenisberas;
		var nama_jenisberas = nama_jenisberas;
		var konfirmasi = konfirmasi;

		konfirmasi = confirm("Apakah Jenis Beras '"+nama_jenisberas+"' akan di hapus?")
		if(konfirmasi){
			window.location = "lihat-jenis-beras.php?kd_jenisberas="+kd_jenisberas;
			return false;
		}else{
			alert("Batal Menghapus Data");
		}
	}
	</script>
        <div class="grid_12" style="margin-bottom:265px;">
            <div class="box round first fullpage">
                <h2>Semua Data Jenis Beras</h2>
                <div class="block">
			<form method="POST" action="lihat-jenis-beras.php">
			<table class="bordered">
    			<thead>
			<?php
			if(isset($_SESSION['level'])){
				if($_SESSION['level'] == "admin"){
			?>
    				<tr>
					<th width="1%"><center>No</center></th>
					<th><center>Kode Jenis Beras</center></th>        
					<th width="40%"><center>Nama Jenis Beras</center></th>
					<th width="30%" ><center>Proses</center></th>
    				</tr>
			<?php
				}else if($_SESSION['level'] == "user"){
			?>
				<tr>
					<th width="1%"><center>No</center></th>
					<th><center>Kode Jenis Beras</center></th>        
					<th width="40%"><center>Nama Jenis Beras</center></th>
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
			$keula = mysql_query("SELECT * FROM jenis_beras LIMIT $offset, $dataPerPage");
			
			// Nampilin Data
			while($data=mysql_fetch_array($keula)){
				if(isset($_SESSION['level'])){
					if($_SESSION['level'] == "admin"){
						echo "<tr><td><center>".$i."</center></td>
								<td><center>".$data["kd_jenisberas"]."</center></td>
								<td><center>".$data["nama_jenisberas"]."</center></td>
								<td><center><a href=tampil-edit-jenisberas.php?kd_jenisberas=$data[kd_jenisberas]><img src='../images/main/editz.gif' /></a>  &nbsp;&nbsp;
										<a href='#' onClick=\"return konfirmasiHapus('".$data["kd_jenisberas"]."','".$data["nama_jenisberas"]."');\" value='Hapus'><img src='../images/main/del.gif' /></a></center></td>
							</tr>";
							$i++;
					}else if($_SESSION['level'] == "user"){
								echo "<tr><td><center>".$i."</center></td>
										<td><center>".$data["kd_jenisberas"]."</center></td>
										<td><center>".$data["nama_jenisberas"]."</center></td>
									</tr>";
									$i++;
					}
				}
			}if($_SESSION['level'] == "admin"){
				if(isset($_GET["kd_jenisberas"]) != ""){
					$delete = mysql_query("DELETE FROM jenis_beras WHERE kd_jenisberas=".$_GET['kd_jenisberas']."");
					echo "<script language='javascript'>alert('Data berhasil di Hapus');</script>";
					echo '<meta http-equiv="refresh" content="0; url=lihat-jenis-beras.php">';
				}
			}if($_SESSION['level'] == "user"){
				if($_GET["kd_jenisberas"] != ""){	
						echo '<meta http-equiv="refresh" content="0; url=lihat-jenis-beras.php">';
				}
			}

			// mencari jumlah data semua dalam jenis beras
				$hasil = mysql_query("SELECT COUNT(*) AS jumData FROM jenis_beras");
				$data = mysql_fetch_array($hasil);
				$jumData = $data['jumData'];

			// menentukan jumlah halaman yang muncul berdasarkan jumlah data
			$jumPage = ceil($jumData/$dataPerPage);
			?>
    			</thead>
			</table>
			</form>
		<div class="pagi">
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
