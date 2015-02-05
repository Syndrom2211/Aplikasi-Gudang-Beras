<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
<?php include "include/headerlaporan.php"; ?>
	<hr size="4" color="000" />
		<center><h2>LAPORAN PERSEDIAAN BERAS</h2>
		<?php
		$sql = "select a.tanggal, a.kd_jenisberas, b.saldo, a.jml_pengadaan, c.jml_pengeluaran, b.saldo, a.kd_satuan from pengadaan a, saldo b left join pengeluaran c using(kd_jenisberas)";
		$query = mysql_query($sql);
		?></center>
		<center>
		<table with="100%" border="0" bgcolor="#000">
			<tr bgcolor="#fff" height="40">
				<th width="5%" scope="col">No</th>
				<th width="12%" scope="col">Tanggal</th>
				<th width="11%" scope="col">Kode Jenis Beras</th>
				<th width="15%" scope="col">Saldo Awal</th>
				<th width="10%" scope="col">Jumlah Pengadaan</th>
				<th width="10%" scope="col">Jumlah Pengeluaran</th>
				<th width="10%" scope="col">Saldo Akhir</th>
				<th width="10%" scope="col">Satuan</th>
			</tr>
			<?php
			$i = 1;
			while($data = mysql_fetch_array($query)){
				echo "<tr bgcolor='white'>
					<td align='center'>$i</td>
					<td align='center'>$data[tanggal]</td>
					<td align='center'>$data[kd_jenisberas]</td>
					<td align='center'>$data[saldo]</td>
					<td align='center'>$data[jml_pengadaan]</td>
					<td align='center'>$data[jml_pengeluaran]</td>
					<td align='center'>$data[saldo]</td>
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
