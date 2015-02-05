﻿<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"]) && ($_SESSION["level"])){
	if($_SESSION['level'] == "admin"){
?>
<?php 
	include_once("include/headernav.php");
	include_once("../connect.php"); 
?>
        <div class="clear">
        </div>
		<script type="text/javascript" src="../js/jquery-1.2.3.min.js"></script>
        <div class="grid_12" style="margin-bottom:120px;">
            <div class="box round first fullpage">
                <h2>Stock Opname</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
					<form id="myForm" action="proses/proses-input-saldo.php" method="POST">
						<table class="form">
							<tr>
								<td class="col1"><label></label></td>
								<td class="col1"><label></label></td>
								<td class="col2"><label>Tanggal : &nbsp;</label>
									<input type="text" id="tgl1" name="tgl1" placeholder="Tampil nama Jenis Beras" value="<?php $tgl = date('d-m-Y'); echo $tgl; ?>"  readonly />
								</td>
							</tr>
							<tr>
								<td class="col1"><label>Jenis Beras : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_kdj = "select * from jenis_beras";
								$exe_kdj =  mysql_query($query_kdj);
								$jsArray2 = "var njbName = new Array();";
								echo '<select name="kjb_sa" id="kjb_sa" onchange="document.getElementById(\'njb_sa\').value = njbName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_kdj=mysql_fetch_array($exe_kdj)){
									echo "<option value='".$row_kdj[kd_jenisberas]."' name='kjb_sa' id='kjb_sa'>".$row_kdj[kd_jenisberas]."</option>";
									 $jsArray2 .= "njbName['".$row_kdj[kd_jenisberas]."'] = '".addslashes($row_kdj[nama_jenisberas])."';";
								}
								?>
									</select>
									<input type="text" id="njb_sa" name="njb_sa" class="medium" placeholder="Tampil nama Jenis Beras" readonly />
								<script type="text/javascript">  
									<?php echo $jsArray2; ?>  
								</script> 
								</td>	
							</tr>
							<tr>
								<td class="col1"><label>Pemasok : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_kdp = "select * from pemasok";
								$exe_kdp =  mysql_query($query_kdp);
								$jsArray = "var nppName = new Array();";
								echo '<select name="kp_sa" id="kp_sa" onchange="document.getElementById(\'np_sa\').value = nppName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_kdp=mysql_fetch_array($exe_kdp)){
									echo "<option value='".$row_kdp[kd_pemasok]."' name='kp_sa' id='kp_sa'>".$row_kdp[kd_pemasok]."</option>";
									 $jsArray .= "nppName['".$row_kdp[kd_pemasok]."'] = '".addslashes($row_kdp[nama_pemasok])."';";
								}
								?>
									</select>
									<input type="text" id="np_sa" name="np_sa" class="medium" placeholder="Tampil nama Pemasok" readonly />
								<script type="text/javascript">  
									<?php echo $jsArray; ?>  
								</script>  
								</td>	
							</tr>
							<tr>
								<td class="col1"><label>Saldo Awal : </label></td>
								<td class="col2"><input type="text" id="jml_sa" name="jml_sa" placeholder="Masukan Saldo Awal" /></td>
							</tr>
							<tr>
								<td class="col1"><label>Tanggal Stock Opname : </label></td>
								<td class="col2"><input type="text" name="tgl_stock_sa" value="<?php $tgl = date('d-m-Y'); echo $tgl; ?>" readonly /></td>
							</tr>
							<tr>
								<td class="col1"><label>Limit Persediaan : </label></td>
								<td class="col2"><input type="text" id="lp_sa" name="lp_sa" placeholder="Masukan Limit Persediaan" /></td>
							</tr>
							<tr>
								<td class="col1"><label>Satuan : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_sa = "select * from satuan";
								$exe_sa =  mysql_query($query_sa);
								$jsArray3 = "var satName = new Array();";
								echo '<select name="ksa_sa" id="ksa_sa" onchange="document.getElementById(\'sat_sa\').value = satName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_sa=mysql_fetch_array($exe_sa)){
									echo "<option value='".$row_sa[kd_satuan]."' name='ksa_sa' id='ksa_sa'>".$row_sa[kd_satuan]."</option>";
									 $jsArray3 .= "satName['".$row_sa[kd_satuan]."'] = '".addslashes($row_sa[nama_satuan])."';";
								}
								?>
									</select>
									<input type="text" style="font-size:12px;" id="sat_sa" name="sat_sa" class="small" placeholder="Tampil nama Satuan" readonly /> KG
								<script type="text/javascript">  
									<?php echo $jsArray3; ?>  
								</script> 
								</td>	
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
