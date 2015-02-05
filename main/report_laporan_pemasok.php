<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
<?php include "include/headerlaporan.php"; ?>
	<hr size="4" color="000" />
		<center><h2>LAPORAN PEMASOK BERAS</h2>
		<?php
		$sql = "select * from pemasok";
		$query = mysql_query($sql);
		?></center>
		<center>
		<table with="100%" border="0" bgcolor="#000">
			<tr bgcolor="#fff" height="40">
				<th width="5%" scope="col">No</th>
				<th width="12%" scope="col">Kode Pemasok</th>
				<th width="11%" scope="col">Nama Pemasok</th>
				<th width="15%" scope="col">Alamat Pemasok</th>
				<th width="10%" scope="col">Telepon Pemasok</th>
			</tr>
			<?php
			$i = 1;
			while($data = mysql_fetch_array($query)){
				echo "<tr bgcolor='white'>
					<td align='center'>$i</td>
					<td align='center'>$data[kd_pemasok]</td>
					<td align='center'>$data[nama_pemasok]</td>
					<td align='center'>$data[alamat_pemasok]</td>
					<td align='center'>$data[telepon_pemasok]</td>
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
