<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"]) && ($_SESSION["level"])){
	if($_SESSION['level'] == "admin"){
?>
﻿<?php 
	include_once("include/headernav.php");
	include_once("../connect.php");
?>
        <div class="clear">	
        </div>
		<script type="text/javascript" src="../js/jquery-1.2.3.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
			// Uuntuk Penambahan Saldo Awal dan Jumlah Pengadaan
			$('#jumlah_pengadaan').keyup(function(){
			var jmlpengadaan2=parseInt($('#jumlah_pengadaan').val());
			var saldoawal=parseInt($('#sa_pengadaan').val());
			
			var saldoakhir=saldoawal + jmlpengadaan2;
			$('#sak_pengadaan').val(saldoakhir);
			});
		});
        </script>
        <div class="grid_12" style="margin-bottom:35px;">
            <div class="box round first fullpage">
                <h2>Pengadaan Beras</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
					<form id="myForm" action="proses/proses-input-pengadaan.php" method="POST">
						<table class="form">
							<tr>
								<td class="col1"><label>Pemasok : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_kdp = "select * from pemasok";
								$exe_kdp =  mysql_query($query_kdp);
								$jsArray = "var nppName = new Array();";
								echo '<select name="kp_pengadaan" id="kp_pengadaan" onchange="document.getElementById(\'np_pengadaan\').value = nppName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_kdp=mysql_fetch_array($exe_kdp)){
									echo "<option value='".$row_kdp[kd_pemasok]."'>".$row_kdp[kd_pemasok]."</option>";
									 $jsArray .= "nppName['".$row_kdp[kd_pemasok]."'] = '".addslashes($row_kdp[nama_pemasok])."';";
								}
								?>
									</select>
									<input type="text" id="np_pengadaan" name="np_pengadaan" class="medium" placeholder="Tampil nama Pemasok" readonly />
								<script type="text/javascript">  
									<?php echo $jsArray; ?>  
								</script>  
								</td>	
							</tr>
							<tr>
								<td class="col1"><label>Jenis Beras : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_kdj = "select * from jenis_beras";
								$exe_kdj =  mysql_query($query_kdj);
								$jsArray2 = "var njbName = new Array();";
								echo '<select name="kjb_pengadaan" id="kjb_pengadaan" onchange="document.getElementById(\'njb_pengadaan\').value = njbName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_kdj=mysql_fetch_array($exe_kdj)){
									echo "<option value='".$row_kdj[kd_jenisberas]."'>".$row_kdj[kd_jenisberas]."</option>";
									 $jsArray2 .= "njbName['".$row_kdj[kd_jenisberas]."'] = '".addslashes($row_kdj[nama_jenisberas])."';";
								}
								?>
									</select>
									<input type="text" style="font-size:12px;" id="njb_pengadaan" name="njb_pengadaan" class="medium" placeholder="Tampil nama Jenis Beras" readonly />
								<script type="text/javascript">  
									<?php echo $jsArray2; ?>  
								</script> 
								</td>	
							</tr>
							<tr>
								<td class="col1"><label>Pengadaan : </label></td>
								<td class="col2" colspan="2">
								<input type="text" id="jumlah_pengadaan" style="font-size:12px;" name="jumlah_pengadaan" class="small" />
									<label>Masukan jumlah Pengadaan </label>
								</td>
							</tr>
							<tr>
								<td class="col1"><label>Satuan : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_sa = "select * from satuan";
								$exe_sa =  mysql_query($query_sa);
								$jsArray3 = "var satName = new Array();";
								echo '<select name="ksa_pengadaan" id="ksa_pengadaan" onchange="document.getElementById(\'sat_pengadaan\').value = satName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_sa=mysql_fetch_array($exe_sa)){
									echo "<option value='".$row_sa[kd_satuan]."'>".$row_sa[kd_satuan]."</option>";
									 $jsArray3 .= "satName['".$row_sa[kd_satuan]."'] = '".addslashes($row_sa[nama_satuan])."';";
								}
								?>
									</select>
									<input type="text" style="font-size:12px;" id="sat_pengadaan" name="sat_pengadaan" class="small" placeholder="Tampil nama Satuan" readonly /> KG
								<script type="text/javascript">  
									<?php echo $jsArray3; ?>  
								</script> 
								</td>	
							</tr>
							<tr>
								<td class="col1"><label></label></td>
								<td class="col2"></td>
							</tr>
							<tr>
								<td class="col1"><label>Saldo Awal : </label></td>
								<td class="col2" colspan="2">
								<?php
								$datakueri		= mysql_query("select saldo from saldo order by id DESC limit 1");
								$data			= mysql_fetch_array($datakueri);
						 		?>
								<input type="text" style="font-size:12px;" id="sa_pengadaan" name="sa_pengadaan" class="small" value="<?php echo $data['saldo']; ?>" readonly/>
									<label> Tampil Saldo Awal </label>
								</td>
							</tr>
							<tr>
								<td class='col1'><label>Limit Persediaan : </label></td>
								<td class='col2' colspan='2'>
								<?php
								$datakueri		= mysql_query("select * from saldo");
								$data			= mysql_fetch_array($datakueri);
						 		?>
								<input type="text" style="font-size:12px;" id="hasillp_pengadaan" name="hasillp_pengadaan" class="small" readonly="readonly" value="<?php echo $data['limit_persediaan']; ?>" />
									<label> Tampil Limit Persediaan </label>
								</td>
							</tr>
							<tr>
								<td class="col1"><label>Saldo Akhir : </label></td>
								<td class="col2" colspan="2">
								<input type="text" style="font-size:12px;" style="font-size:12px;" id="sak_pengadaan" name="sak_pengadaan" class="small" readonly="readonly" />
									<label> Tampil Saldo Awal + Pengadaan</label>
								</td>
							</tr>
							<tr>
								<td class="col1"><label> Gudang : </label></td>
								<td class="col2" colspan="2" ><input type="text" id="pg_pengadaan" name="pg_pengadaan" class="medium" value="<?php echo $_SESSION['user']; ?>" readonly /></td>
							</tr>
							<tr>
								<td class="col1"><label>Tanggal Masuk : </label></td>
								<td class="col2" colspan="2" ><input type="text" id="tgl_masuk" name="tgl_pengadaan" value="<?php $tgl = date('d-m-Y'); echo $tgl; ?>" readonly class="medium" /></td>
							</tr>
							<tr>
								<td class="col1"><label>Yang Menyerahkan : </label></td>
								<td class="col2" colspan="2" ><input type="text" id="ym_pengadaan" name="ym_pengadaan" class="medium" placeholder="Masukan Nama yang Menyerahkan" /></td>
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
