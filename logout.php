<?php 

	session_start();

	$_SESSION = []; session_start();

	if ( !isset($_SESSION["login"]) ) {
		header("location: login.php");
		exit;
	}
	session_unset();
	session_destroy();

	header("location: login.php");
	exit;
 ?>

 