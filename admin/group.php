<?php 
	require("haeder.php");
	
	$isEditGroup = false;

	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$isEditGroup = true;
		$group_info = fetch_group_info($_GET['id']);
		$group_data = $group_info->fetch_array();
		$group_name = $group_data['group_name'];
	}
	else{
		$id = $group_name = "";
	}
		
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
		$group_name = test_input($_POST["group_name"]);
		
		if (isset($_POST['id'])){
			$id = test_input($_POST["id"]);

			UpdateGroup ($id, $group_name);
		}
		else{	
			AddGroup ($group_name);
		}
	}

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;

}
?><div class="body">
		<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateTeamForm()">
		<?php if($isEditGroup == true) 
			echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
			?>
		<h2><?php echo ($isEditGroup == true) ?'Update':' Create';?> Team</h2>
		<br>
		<label>Team Name</label>
		<span style="color: red";>*</span>
		<br>
		<input type="text" name="group_name" placeholder="Team Name" value="<?php echo $group_name ?>">
		<br>
		<p class="error" id="group_nameErr"></p>
		<br>
		<input type="submit" name="submit" value="<?php echo ($isEditGroup == true) ?'Update':' Create';?> Team">
		<input type="button" onclick="location.href='admin_group.php';" value="Cancel">
	</div>
	</form>
<?php require("footer.php"); ?>