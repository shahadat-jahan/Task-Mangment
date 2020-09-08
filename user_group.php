<?php

	require("haeder.php");
	
	$user_id = $group_id ="";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
		$user_id = test_input($_POST["username"]);
		$group_id = test_input($_POST["group_name"]);

		AssignUser($user_id, $group_id);

	 }

	function test_input($data){
			 	$data = trim($data);
			 	$data = stripcslashes($data);
			 	$data = htmlspecialchars($data);
			 	return $data;
			 }

?>

	<div class="body">
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<h2>Assign user to group</h2>
			<br>
			<label>User name</label>
			<br>
			<select name="username">
				<?php writeOptionList("users", $user_id, "username")?>
				<br>
				<br>
			</select>

			<br>
			<br>

			<label>Group name</label>
			<br>
			<select name="group_name">
				<?php writeOptionList("groups", $group_id, "group_name")?>
				<br>
				<br>
			</select>
			
			<br>
			<br>
			
			<input type="submit" name="submit" value="Assign">
		</form>

	</div>
<?php require("footer.php"); ?>