<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"]) && ($_SESSION["level"])){
	if($_SESSION['level'] == "admin"){
?>
﻿<?php include "include/headernav.php"; ?>
        <div class="clear">
        </div>
	<script type="text/javascript" src="../js/jquery-1.2.3.min.js"></script>
        <div class="grid_12" style="margin-bottom:170px;">
            <div class="box round first fullpage">
                <h2>Pemasok</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
					<form id="myForm" action="proses/proses-input-pemasok.php" method="POST" name="inputpemasok">
						<table class="form">
							<tr>
								<td class="col1"><label>Nama Pemasok : </label></td>
								<td class="col2" colspan="2"><input type="text" id="nm_pemasok" name="nm_pemasok" class="medium" placeholder="Masukan Nama Pemasok" />
								</td>
							</tr>
							<tr>
								<td class="col1"><label>Alamat Pemasok :</label></td>
								<td class="col2" colspan="2"><input type="text" id="alamat_pemasok" name="alamat_pemasok" class="medium" placeholder="Masukan Alamat Pemasok" /></td>
							</tr>
							<tr>
								<td class="col1"><label>Telepon Pemasok : </label></td>
								<td class="col2" colspan="2"><input type="text" id="telepon_pemasok" name="telepon_pemasok" class="medium" placeholder="Masukan Telepon Pemasok" /></td>
							</tr>
							<tr>
								<td class="col1"><label></label></td>
								<td class="col2"></td>
							</tr>
							<tr>
								<td class="col1"><label></label></td>
								<td class="col2"></td>
							</tr>
						</table>
						<button class="btn btn-black" name="Submit">Simpan</button>
						<button type="reset" class="btn btn-black">Batal</button>
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
