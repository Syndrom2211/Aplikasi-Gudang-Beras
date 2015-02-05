<?php
session_start();
if(isset($_SESSION["user"]) && ($_SESSION["passwd"])){
?>
<?php include "include/headernav.php";  ?>
        <div class="clear">
        </div>
        <div class="grid_12" style="margin-bottom:360px;">
            <div class="box round first fullpage">
			<h2>Notifications</h2>
                <div class="block">
				<div class="message info">
                    <h5>Selamat Datang <?php echo $_SESSION["user"];?> !</h5>
                        <p>
                           Di Halaman Pengelolaan Beras Bang Firdam.
                        </p>
                    </div>
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
