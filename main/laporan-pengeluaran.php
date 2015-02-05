﻿<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
<?php include "include/headernav.php"; ?>
        <div class="clear">
        </div>
        <div class="grid_12">
            <div class="box round first fullpage">
                <h2>Laporan Data Pengeluaran</h2>
                <div style="width:100%;">
				<iframe style="width:100%;overflow-y:scroll;" scrolling="yes" height="100%" src="report_laporan_pengeluaran.php"></iframe>
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
}else{
	header("location:../index.php");
}
?>
