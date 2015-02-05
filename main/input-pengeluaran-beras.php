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
	<script type="text/javascript">
        $(document).ready(function() {
			$('#jmlp_pb').keyup(function(){
			var jmlpb=parseInt($('#jmlp_pb').val());
			var saldoawal=parseInt($('#sa_pb').val());
			
			var saldoakhir=saldoawal - jmlpb;
			$('#sak_pb').val(saldoakhir);
			});
		});
        </script>
        <div class="grid_12">
            <div class="box round first fullpage">
                <h2>Pengeluaran Beras</h2>
                <div class="block">
		<div id="loading" style="display:none;"><img src="../images/main/loading.gif" alt="loading..." /></div>
		<div id="result" style="display:none;"></div>
					<form id="myForm" action="proses/proses-input-pengeluaran.php" method="POST">
						<table class="form">
							<tr>
								<td class="col1"><label>Pelanggan : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_kdp = "select * from pelanggan";
								$exe_kdp =  mysql_query($query_kdp);
								$jsArray = "var nppName = new Array();";
								echo '<select name="kp_pb" id="kp_pb" onchange="document.getElementById(\'np_pb\').value = nppName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_kdp=mysql_fetch_array($exe_kdp)){
									echo "<option value='".$row_kdp[kd_pelanggan]."' name='kp_pb' id='kp_pb'>".$row_kdp[kd_pelanggan]."</option>";
									 $jsArray .= "nppName['".$row_kdp[kd_pelanggan]."'] = '".addslashes($row_kdp[nama_pelanggan])."';";
								}
								?>
									</select>
									<input type="text" id="np_pb" name="np_pb" class="medium" placeholder="Tampil nama Pelanggan" readonly />
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
								echo '<select name="kjb_pb" id="kjb_pb" onchange="document.getElementById(\'njb_pb\').value = njbName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_kdj=mysql_fetch_array($exe_kdj)){
									echo "<option value='".$row_kdj[kd_jenisberas]."'>".$row_kdj[kd_jenisberas]."</option>";
									 $jsArray2 .= "njbName['".$row_kdj[kd_jenisberas]."'] = '".addslashes($row_kdj[nama_jenisberas])."';";
								}
								?>
									</select>
									<input type="text" id="njb_pb" name="njb_pb" class="medium" placeholder="Tampil nama Jenis Beras" readonly />
								<script type="text/javascript">  
									<?php echo $jsArray2; ?>  
								</script> 
								</td>	
							</tr>
							<tr>
								<td class="col1"><label>Pengeluaran : </label></td>
								<td class="col2" colspan="2">
								<input type="text" style="font-size:12px;" id="jmlp_pb" name="jmlp_pb" class="small" />
									<label>Masukan jumlah Pengeluaran </label>
								</td>
							</tr>
							<tr>
								<td class="col1"><label>Satuan : </label></td>
								<td class="col2" colspan="2">
								<?php
								$query_sa = "select * from satuan";
								$exe_sa =  mysql_query($query_sa);
								$jsArray3 = "var satName = new Array();";
								echo '<select name="ksa_pb" id="ksa_pb" onchange="document.getElementById(\'sat_pb\').value = satName[this.value]">';  
								echo "<option value='Kode' selected>Kode</option>";
								while($row_sa=mysql_fetch_array($exe_sa)){
									echo "<option value='".$row_sa[kd_satuan]."' name='ksa_pb' id='ksa_pb'>".$row_sa[kd_satuan]."</option>";
									 $jsArray3 .= "satName['".$row_sa[kd_satuan]."'] = '".addslashes($row_sa[nama_satuan])."';";
								}
								?>
									</select>
									<input type="text" style="font-size:12px;" id="sat_pb" name="sat_pb" class="small" placeholder="Tampil nama Satuan" readonly /> KG
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
								<input type="text" style="font-size:12px;" id="sa_pb" name="sa_pb" class="small" value="<?php echo $data['saldo']; ?>" readonly/>
									<label> Tampil Saldo Awal </label>
								</td>
							</tr>
							<tr>
							<?php
							$datakueri		= mysql_query("select * from saldo");
							$data			= mysql_fetch_array($datakueri);
						 	?>
								<td class="col1"><label>Limit Persediaan : </label></td>
								<td class="col2" colspan="2">
								<input type="text" style="font-size:12px;"  id="lp_pb" name="lp_pb" class="small" value="<?php echo $data['limit_persediaan']; ?>" readonly />
									<label> Tampil Limit Persediaan </label>
								</td>
							</tr>
							<tr>
								<td class="col1"><label>Saldo Akhir : </label></td>
								<td class="col2" colspan="2">
								<input type="text" style="font-size:12px;"  id="sak_pb" name="sak_pb" class="small" />
									<label> Tampil Saldo Awal - Pengeluaran</label>
								</td>
							</tr>
							<tr>
								<td class="col1"><label>Petugas Gudang : </label></td>
								<td class="col2" colspan="2" ><input type="text" id="pg_pb" name="pg_pb" class="medium" placeholder="Tampil nama Petugas Gudang" value="<?php echo $_SESSION['user']; ?>" readonly /></td>
							</tr>
							<tr>
								<td class="col1"><label>Tanggal Keluar : </label></td>
								<td class="col2" colspan="2" ><input type="text" id="tgl_pb" name="tgl_pb" class="medium" value="<?php $tgl = date('d-m-Y'); echo $tgl; ?>" readonly /></td>
							</tr>
							<tr>
								<td class="col1"><label>Yang Mengambil : </label></td>
								<td class="col2" colspan="2" ><input type="text" id="ym_pb" name="ym_pb" class="medium" placeholder="Masukan Nama yang Mengambil" /></td>
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
