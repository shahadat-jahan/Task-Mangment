<?php
error_reporting(E_ALL);
    ini_set('display_errors', 1); 
    $admin_url="http://localhost/task_management/admin/";
    require("database.php");
	require("functions.php");
	is_admin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task Management-Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.2.1-dist/css/bootstrap.css">
	<meta charset="utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scal=1.0">

	
</head>
<body>
	<header>
	<h1>Task Management</h1>
	</header>
<?php require_once("sidebar.php");?>