<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION["user"]) && ($_SESSION["passwd"]) && ($_SESSION["level"])){
	if($_SESSION['level'] == "admin"){
?>
﻿<?php include "include/headernav.php"; ?>
        <div class="clear">
        </div>
	<script language="javascript">
	function konfirmasiHapus(id,username,password,email,no_telp,level){
		var id = id;
		var username = username;
		var password = password;
		var email = email;
		var no_telp = no_telp;
		var level = level;

		konfirmasi = confirm("Apakah Admin '"+username+"' akan di hapus?")
		if(konfirmasi){
			window.location = "lihat-admin.php?id="+id;
			return false;
		}else{
			alert("Batal Menghapus Data");
		}
	}
	</script>
        <div class="grid_12" style="margin-bottom:265px;">
            <div class="box round first fullpage">
                <h2>Daftar Admin Gudang</h2>
                <div class="block">
			<form method="POST" action="lihat-admin.php">
			<table class="bordered">
    			<thead>	
    				<tr>
					<th width="1%"><center>No</center></th>
					<th><center>ID</center></th>        
					<th width="19%"><center>Username</center></th>
					<th width="17%" ><center>Password</center></th>
					<th width="17%" ><center>Email</center></th>
					<th width="20%" ><center>No Telepon</center></th>
					<th width="7%" ><center>Level</center></th>
					<th width="20%" ><center>Proses</center></th>
    				</tr>
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
			$keula = mysql_query("SELECT * FROM user LIMIT $offset, $dataPerPage");
			
			// Nampilin Data
			while($data=mysql_fetch_array($keula)){
				echo "<tr><td><center>".$i."</center></td>
						<td><center>".$data["id"]."</center></td>
						<td><center>".$data["username"]."</center></td>
						<td><center>".$data["password"]."</center></td>
						<td><center>".$data["email"]."</center></td>
						<td><center>".$data["no_telepon"]."</center></td>
						<td><center>".$data["level"]."</center></td>
						<td><center><a href=ubah-admin.php?id=$data[id]><img src='../images/main/editz.gif' /></a>&nbsp;&nbsp;
<a href='#' onClick=\"return konfirmasiHapus('".$data["id"]."','".$data["username"]."','".$data["password"]."','".$data["email"]."','".$data["no_telepon"]."','".$data["level"]."');\" value='Hapus'><img src='../images/main/del.gif' /></a></center></td>
					</tr>";
					$i++;
			}if(isset($_GET["id"]) != ""){
				$delete = mysql_query("DELETE FROM user WHERE id=".$_GET['id']."");
				if($delete){
					echo "<script language='javascript'>alert('Data berhasil di Hapus');</script>";
					echo '<meta http-equiv="refresh" content="0; url=lihat-admin.php">';		
					}
				}

			// mencari jumlah data semua dalam jenis beras
			$hasil = mysql_query("SELECT COUNT(*) AS jumData FROM user");
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
	}else if($_SESSION['level'] == "user"){
		header("location:index.php");
	}
}else{
	header("location:../index.php");
}
?>
