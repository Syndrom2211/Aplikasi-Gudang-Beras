﻿<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"]) && ($_SESSION["level"])){
	if($_SESSION['level'] == "admin"){
?>
<?php include "include/headernav.php"; ?>
        <div class="clear">
        </div>
	<script type="text/javascript" src="../js/jquery-1.2.3.min.js"></script>
        <div class="grid_12" style="margin-bottom:220px;">
            <div class="box round first fullpage">
                <h2>Satuan</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
					<form id="myForm" action="proses/proses-input-satuan.php" method="POST" name="inputsatuan">
						<table class="form">
							<tr>
								<td class="col1"><label>Nama Satuan : </label></td>
								<td class="col2" colspan="2"><input style="font-size:12px;" type="text" id="nm_satuan" name="nm_satuan" class="small" placeholder="Masukan Nama Satuan" /><label> KG </label>
								</td>
							</tr>
							<tr>
								<td class="col1"><label></label></td>
								<td class="col2" colspan="2"></td>
							</tr>
							<tr>
								<td class="col1"><label></label></td>
								<td class="col2" colspan="2"></td>
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
