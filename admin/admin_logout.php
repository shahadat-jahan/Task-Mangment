<?php 
require("database.php");
		$_SESSION["username"] ="";///destroy session
	unset($_SESSION["username"]);
	session_destroy();	
		header('Location:'.$admin_url.'index.php');
	exit;
?>