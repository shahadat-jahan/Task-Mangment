<?php 
	require("database.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// $user_info = user_info($_SESSION["user_id"] );
		$user_info = login($_POST["username"], $_POST["password"]);
	if(is_array($user_info) && count($user_info)>0){
		$_SESSION["user_id"] = $user_info['id'];
		$_SESSION["is_admin"] = $user_info['is_admin'];
		if($user_info['is_admin'] == 1){
			header('Location: http://localhost/task_management/admin/admin.php');
		}else{
			header('Location: http://localhost/task_management/dashboard.php');	
		}
		
	}
	
	else{
		$error_msg = "Username or passwrod incorrect.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task Management</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scal=1.0">
</head>
<body>

	<header>
		<h1>Task Management</h1>
	</header>


	
	<div class="content">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h2>Log In</h2> 
		<span class="error"><?php if(isset($error_msg))echo $error_msg;?></span>
		<br>
		<label><b>Username</b></label>
		<input type="taxt" name="username" placeholder="Username" required>
		<br>
		<br>
		<label><b>Password</b></label>
		<input type="password" name="password" placeholder="Password" required>
		<br>		
		<br>
		<a href="">Forget Password</a> |
		<input type="submit" name="submit" value="Log In">
		<!-- <button><a href="http://localhost/task_management/admin/index.php">Admin login</a></button> -->
	</form>
	</div>
	

</body>
</html>