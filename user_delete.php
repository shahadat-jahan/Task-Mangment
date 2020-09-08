<?php
	require("haeder.php");
	
	$isDeleteUser = false;
	
	if(isset($_GET['id']) && $_GET['id'] > 0){
		$isDeleteUser = true;
		$user_info = fetch_user_info($_GET['id']);
		$user_data = $user_info->fetch_array();
		$username = $user_data['username']; 
		$first_name = $user_data['first_name']; 
		$last_name = $user_data['last_name']; 
		$email = $user_data['email']; 
	}else{
		 $id = $username = $email = $first_name = $last_name = "";
	}
		
	/*if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$username = test_input($_POST["username"]);
		$email = test_input($_POST["email"]);
		$password = test_input($_POST["password"]);
		$first_name = test_input($_POST["first_name"]);
		$last_name = test_input($_POST["last_name"]);*/
			
		if(isset($_POST["id"])){
			$id = test_input($_POST["id"]);	
			 	
		 	DeleteUser ($id);
		}
	
		function test_input($data) {
 			 $data = trim($data);
 			 $data = stripslashes($data);
 			 $data = htmlspecialchars($data);
 			 return $data;
			}

	 ?>
	
	<div class="body">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<?php if($isDeleteUser == true) 
			echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
			?>
		<h2>Member Delete</h2>
		<br>
		<label><b>Username: </b></label><?php echo $username;?>
		<br>
		<br>
		<label><b>Email: </b></label><?php echo $email;?>
		<br>
		<br>
		<label><b>First Name: </b></label><?php echo $first_name;?>
		<br>
		<br>
		<label><b>Last Name: </b></label><?php echo $last_name;?>
		<br>
		<br>
		<input type="submit" name="submit" value="Member delete">
		<input type="button" onclick="location.href='admin_user.php';" value="Cancel" />
	</form>
	</div>
<?php require("footer.php"); ?>