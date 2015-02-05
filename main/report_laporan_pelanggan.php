<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
<?php include_once("include/headerlaporan.php"); ?>
	<hr size="4" color="000" />
		<center><h2>LAPORAN PELANGGAN BERAS</h2>
		<?php
		$sql = "select * from pelanggan";
		$query = mysql_query($sql);
		?></center>
		<center>
		<table width="100%" bgcolor="#000">
			<tr bgcolor="#fff" height="40">
				<th class="outer" width="5%" scope="col">No</th>
				<th class="inner" width="12%" scope="col">Kode Pelanggan</th>
				<th class="outer" width="11%" scope="col">Nama Pelanggan</th>
				<th class="inner" width="15%" scope="col">Alamat Pelanggan</th>
				<th class="outer" width="10%" scope="col">Telepon Pelanggan</th>
			</tr>
			<?php
			$i = 1;
			while($data = mysql_fetch_array($query)){
				echo "<tr bgcolor='white'>
					<td align='center'>$i</td>
					<td align='center'>$data[kd_pelanggan]</td>
					<td align='center'>$data[nama_pelanggan]</td>
					<td align='center'>$data[alamat_pelanggan]</td>
					<td align='center'>$data[telepon_pelanggan]</td>
					</tr>";
					$i++;
			}
			?>
		</table></center>
</body>
</html>
<?php
}else{
	header("location:../index.php");
}
?>
