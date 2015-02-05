<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
<?php include "include/headerlaporan.php"; ?>
	<hr size="4" color="000" />
		<center><h2>LAPORAN PENGELUARAN BERAS</h2>
		<?php
		$sql = "select a.tanggal, a.no_order, b.nama_pelanggan, a.jml_pengeluaran, a.kd_satuan from pengeluaran a inner join pelanggan b using(kd_pelanggan)";
		$query = mysql_query($sql);
		?></center>
		<center>
		<table with="100%" border="0" bgcolor="#000">
			<tr bgcolor="#fff" height="40">
				<th width="5%" scope="col">No</th>
				<th width="12%" scope="col">Tanggal Order</th>
				<th width="11%" scope="col">No Order</th>
				<th width="15%" scope="col">Nama Pelanggan</th>
				<th width="10%" scope="col">Jumlah Pengeluaran</th>
				<th width="11%" scope="col">Kode Satuan</th>
			</tr>
			<?php
			$i = 1;
			while($data = mysql_fetch_array($query)){
				echo "<tr bgcolor='white'>
					<td align='center'>$i</td>
					<td align='center'>$data[tanggal]</td>
					<td align='center'>$data[no_order]</td>
					<td align='center'>$data[nama_pelanggan]</td>
					<td align='center'>$data[jml_pengeluaran]</td>
					<td align='center'>$data[kd_satuan]</td>
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
