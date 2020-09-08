<?php
	require("haeder.php");
	$has_error = false;
	$isEditUser = false;
	$password = $password_repeat =  $usernameErr = $emailErr = ""; 
	
	if(isset($_GET['id']) && $_GET['id'] > 0){
		$isEditUser = true;
		$user_info = fetch_user_info($_GET['id']);
		$user_data = $user_info->fetch_array();
		$username = $user_data['username']; 
		$first_name = $user_data['first_name']; 
		$last_name = $user_data['last_name']; 
		$email = $user_data['email']; 
	}else{
		 $id = $username = $email = $first_name = $last_name = "";
	}
		
	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$username = test_input($_POST["username"]);
					if (!preg_match("/^[a-z A-Z 0-9]*$/",$username)){
						$usernameErr = "Only letter and number allowed";
						$has_error = true;
					}else{
						if(!IsUserTaken ($username)){							
							$usernameErr = "Username already taken.";
							$has_error = true;
						}
					}	
			$email = test_input($_POST["email"]);
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  echo("$email is a valid email address");
			} else {
				$emailErr = "Invalid email format";
			  	$has_error = true;
			}
				
		$password = test_input($_POST["password"]);
		$first_name = test_input($_POST["first_name"]);
		$last_name = test_input($_POST["last_name"]);
			
		if(isset($_POST["id"])){
			$id = test_input($_POST["id"]);	
			 	
		 	UpdateUser ($id, $username, $email, $password, $first_name, $last_name);
		 }
		 else{
		 	if(!$has_error){
		 	AddUser ($username, $email, $password, $first_name, $last_name);
			}
		}
	}
	
		function test_input($data) {
 			 $data = trim($data);
 			 $data = stripslashes($data);
 			 $data = htmlspecialchars($data);
 			 return $data;
			}

	 ?>
	
	<div class="body">
		<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
			onsubmit="return validateMemberForm()">
			<?php if($isEditUser == true) 
			echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
			?>
		<h2><?php echo ($isEditUser == true) ?'Update':'Add';?> Member</h2>
		<br>
		<label>Username</label>
		<span style="color: red";>*</span>
		<br>
		<input type="text" name="username" placeholder="Username" value="<?php echo $username;?>" >
		<p class="error" id="usernameErr">
			<span class="error"><?php echo $usernameErr; ?></span>
		</p>
		<br>
		<label>Email</label>
		<span style="color: red";>*</span>
		<br>
		<input type="text" name="email" placeholder="Email" value="<?php echo $email;?>" >
		<p class="error" id="emailErr">
			<span class="error"><?php echo $emailErr; ?></span>
		</p>
		<br>
		<label>Password</label>
		<span style="color: red";>*</span>
		<br>
		<input type="password" name="password" placeholder="Password" value="<?php echo $password;?>" >
		<p class="error" id="passwordErr"></p>
		<br>
		<label>Repeat Password</label>
		<span style="color: red";>*</span>
		<br>
		<input type="password" name="password_repeat" placeholder="Repeat Password" value="<?php echo $password_repeat;?>" >
		<p class="error" id="password_repeatErr"></p>
		<br>
		<label>First Name</label>
		<span style="color: red";>*</span>
		<br>
		<input type="text" name="first_name" placeholder="First Name" value="<?php echo $first_name;?>" >
		<p class="error" id="first_nameErr"></p>
		<br>
		<label>Last Name</label>
		<span style="color: red";>*</span>
		<br>
		<input type="text" name="last_name" placeholder="Last Name" value="<?php echo $last_name;?>" >
		<p class="error" id="last_nameErr"></p>
		<br>
		<input type="submit" name="submit" value="<?php echo ($isEditUser == true) ?'Update':' Add';?> Member">
		<input type="button" onclick="location.href='admin_user.php';" value="Cancel" />
	</form>
	</div>
<?php require("footer.php"); ?>