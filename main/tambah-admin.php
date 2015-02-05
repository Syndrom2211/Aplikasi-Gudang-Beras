<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"]) && ($_SESSION["level"])){
	if($_SESSION['level'] == "admin"){
?>
﻿<?php include "include/headernav.php"; ?>
        <div class="clear">
        </div>
	<script type="text/javascript" src="../js/jquery-1.2.3.min.js"></script>
        <div class="grid_12" style="margin-bottom:270px;">
            <div class="box round first fullpage">
                <h2>Tambah Pengguna</h2>					
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
					<form id="myForm" action="proses/proses-tambah-admin.php" method="POST">
						<table class="form">
							<tr>
								<td class="col1"><label>Username : </label></td>
								<td class="col2"><input style="width:200px;" type="text" name="username" id="username" placeholder="Masukan Username" /></td>
							</tr>
							<tr>
								<td class="col1"><label>Password : </label></td>
								<td class="col2"><input style="width:200px;" type="password" name="password" id="password" placeholder="Masukan Password Baru" /></td>
							</tr>
							<tr>
								<td class="col1"><label>Email : </label></td>
								<td class="col2"><input style="width:200px;" type="text" name="email" id="email" placeholder="Masukan Email" required /></td>
							</tr>
							<tr>
								<td class="col1"><label>No Telepon : </label></td>
								<td class="col2"><input style="width:200px;" type="text" name="no_telp" id="no_telp" placeholder="Masukan No Telepon" /></td>
							</tr>
							<tr>
								<td class="col1"><label>Level : </label></td>
								<td class="col2">
									<input type="radio" name="level" value="admin" /> Admin
									<input type="radio" name="level" value="user" /> User / Pegawai
								</td>
							</tr>
						</table>
						<button class="btn btn-black">Simpan</button>
						<button type="reset" class="btn btn-black" name="Submit">Batal</button>
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
