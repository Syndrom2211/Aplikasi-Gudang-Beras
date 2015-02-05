<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>-= Gudang Beras Bang Firdam =-</title>
	<link rel="shortcut icon" href="../images/icon.png"> 
	<!-- WILAYAH UNTUK CSS -->
    <link rel="stylesheet" type="text/css" href="../css/main/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/main/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/main/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/main/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/main/nav.css" media="screen" />

	<style type="text/css">
	#result { background-color: #F0FFED; border: 1px solid #215800; padding: 10px; width: 400px; margin-bottom: 20px; }
	.pengguna-admin { color:pink; }
	.pengguna-user	{ color:lime; }
	</style>
	<script type="text/javascript" src="../js/jquery-1.2.3.min.js"></script>
	<script type="text/javascript" src="../js/datepicker/jquery.js"></script>
	<script type="text/javascript" src="../js/datepicker/jquery.ui.core.js"></script>
	<script type="text/javascript" src="../js/datepicker/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="../js/datepicker/jquery.ui.widget.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

		$().ajaxStart(function() {
			$('#loading').show();
			$('#result').hide();
		}).ajaxStop(function() {
			$('#loading').hide();
			$('#result').fadeIn('slow');
		});

		$('#myForm').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#result').html(data);
				}
			})
			return false;
		});
	
		function startTime(){
			var ayeuna=new Date(),
				curr_hour=ayeuna.getHours(),
				curr_min=ayeuna.getMinutes(),
				curr_sec=ayeuna.getSeconds();
			curr_hour=checkTime(curr_hour);
				curr_min=checkTime(curr_min);
				curr_sec=checkTime(curr_sec);
				document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
		}

		function checkTime(i){
			if(i<10){
				i="0" + i;
			}
			return i;
		}
		setInterval(startTime, 500);
	})
	</script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="../images/main/logo.png" alt="Logo" /></div>
		<div class="floatright">
			<div class="floatleft">
				<img src="" alt="" /></div>
			<div class="floatleft marginleft10">
				<ul class="inline-ul floatleft">
					<li>Login Sebagai :
						<?php 
						if(isset($_SESSION['level'])){
							if($_SESSION['level'] == "admin"){
								echo "<b><font class='pengguna-admin'>".$_SESSION['level']."</font></b>";
							}
							else if($_SESSION['level'] == "user"){
								echo "<b><font class='pengguna-user'>".$_SESSION['level']."</font></b>";					
							}
						}
						?>
					</li>
					<br/>
					<li><?php $tgl = date('d-m-Y'); echo $tgl; ?> - <label id="clock"></label></li>
				</ul>
			</div>
		</div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
		<?php
		if(isset($_SESSION['level'])){
			if($_SESSION['level'] == "admin"){
		?>
                <li class="ic-dashboard"><a href="index.php"><span>Halaman Depan</span></a> </li>
                <li class="ic-form-style"><a href="javascript:"><span>Admin Data</span></a>
                    <ul>
			<li><a href="tambah-admin.php">Tambah Pengguna</a> </li>
                        <li><a href="lihat-admin.php">Lihat Pengguna</a> </li>
                    </ul>
                </li>
		<li class="ic-typography"><a href="javascript:"><span>Input Data</span></a>
					<ul>			
			<li><a href="input-saldo-awal.php">Stock Opname</a> </li>
                        <li>			<li><a href="input-jenis-beras.php">Jenis Beras</a> </li>

						<li><a href="input-pelanggan.php">Pelanggan</a> </li>
						<li><a href="input-pemasok.php">Pemasok</a> </li>
						<li><a href="input-satuan.php">Satuan</a> </li>						
                    </ul>
				</li>	
		<li class="ic-notifications"><a href="javascript:"><span>Transaksi Data</span></a>
		<ul>
			<li><a href="input-pengadaan-beras.php">Pengadaan Beras</a> </li>
			<li><a href="input-pengeluaran-beras.php">Pengeluaran Beras</a> </li>
		</ul>
		</li>
				<li class="ic-gallery"><a href="javascript:"><span>Lihat Data</span></a>
					<ul>
						<li><a href="lihat-saldo.php">Saldo</a> </li>
                	        		<li><a href="lihat-jenis-beras.php">Jenis Beras</a> </li>
						<li><a href="lihat-pelanggan.php">Pelanggan</a> </li>  
						<li><a href="lihat-pemasok.php">Pemasok</a> </li>			
                    </ul>
				</li>
				<li class="ic-charts"><a href="javascript:"><span>Laporan Data</span></a>
					<ul>				
						<li><a href="laporan-pelanggan.php">Laporan Pelanggan</a> </li>
						<li><a href="laporan-pemasok.php">Laporan Pemasok</a> </li>	
						<li><a href="laporan-pengadaan.php">Laporan Pengadaan</a> </li>
						<li><a href="laporan-pengeluaran.php">Laporan Pengeluaran</a> </li>
						<li><a href="laporan-persediaan.php">Laporan Persediaan</a> </li>			
                    </ul>
				</li>
				<li class="ic-grid-tables"><a href="../main/logout.php"><span>Logout</span></a></li>
		<?php
			}else if($_SESSION['level'] == "user"){
		?>		
               			<li class="ic-dashboard"><a href="index.php"><span>Halaman Depan</span></a> </li>
				<li class="ic-gallery"><a href="javascript:"><span>Lihat Data</span></a>
					<ul>
						<li><a href="lihat-saldo.php">Saldo</a> </li>
                	        		<li><a href="lihat-jenis-beras.php">Jenis Beras</a> </li>
						<li><a href="lihat-pelanggan.php">Pelanggan</a> </li>  
						<li><a href="lihat-pemasok.php">Pemasok</a> </li>			
                    </ul>
				</li>
				<li class="ic-charts"><a href="javascript:"><span>Laporan Data</span></a>
					<ul>				
						<li><a href="laporan-pelanggan.php">Laporan Pelanggan</a> </li>
						<li><a href="laporan-pemasok.php">Laporan Pemasok</a> </li>	
						<li><a href="laporan-pengadaan.php">Laporan Pengadaan</a> </li>
						<li><a href="laporan-pengeluaran.php">Laporan Pengeluaran</a> </li>
						<li><a href="laporan-persediaan.php">Laporan Persediaan</a> </li>			
                    </ul>
				</li>
				<li class="ic-grid-tables"><a href="../main/logout.php"><span>Logout</span></a></li>
		<?php
			}
		}
		?>
		</ul>	
        </div>
