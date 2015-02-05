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
			$id				= $_GET['id'];
			$datakueri		= mysql_query("select * from user where id='$id'");
			$data			= mysql_fetch_array($datakueri);
		?>
        <div class="grid_12" style="margin-bottom:265px;">
            <div class="box round first fullpage">
                <h2>Ubah Admin Gudang</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
			<form id="myForm" method="POST" action="proses/proses-ubah-admin.php">
			<table class="form">
				<tr>
					<td class="col1"><label>ID :</label></td>
					<td class="col2"><input type="text" name="id" value="<?php echo $id; ?>" readonly /></td>
				</tr>
				<tr>
					<td class="col1"><label>Username :</label></td>
					<td class="col2"><input type="text" name="username" value="<?php echo $data['username']; ?>" /></td>
				</tr>
				<tr>
					<td class="col1"><label>Password :</label></td>
					<td class="col2"><input type="password" name="password" placeholder="Masukan Password Baru" /></td>
				</tr>
				<tr>
					<td class="col1"><label>Email :</label></td>
					<td class="col2"><input type="text" name="email" value="<?php echo $data['email']; ?>" /></td>
				</tr>
				<tr>
					<td class="col1"><label>No Telepon :</label></td>
					<td class="col2"><input type="text" name="no_telp" value="<?php echo $data['no_telepon']; ?>" /></td>
				</tr>
				<tr>
					<td class="col1"><label>Level :</label></td>
					<td class="col2">
							<input type="radio" name="level" value="admin" /> Admin
							<input type="radio" name="level" value="user" /> User / Pegawai
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td><button class="btn btn-black" name="Submit" value="Simpan">Simpan</button>
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
