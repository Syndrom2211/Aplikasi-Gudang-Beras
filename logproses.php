<?php
session_start();
include "connect.php";
$lemparpostnya = (htmlspecialchars($_POST['lemparpostnya']));
if(isset($lemparpostnya) && $lemparpostnya){
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);
	$ngecek = mysql_query("SELECT * FROM user WHERE username='$username' && password='".sha1($password)."'");
	$num = mysql_num_rows($ngecek);
	$num1 = mysql_fetch_array($ngecek);
	if($num==1){
		$_SESSION['level'] = $num1['level'];
		$_SESSION['user'] = $username;
		$_SESSION['passwd'] = $password;
		echo "success";
	}
}
?>
