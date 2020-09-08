<?php 
	require("haeder.php");
	
	$isDeleteGroup = false;

	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$isDeleteGroup = true;
		$group_info = fetch_group_info($_GET['id']);
		$group_data = $group_info->fetch_array();
		$group_name = $group_data['group_name'];
	}
	else{
		$id = $group_name = "";
	}

	/*if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$title = test_input($_POST["title"]);
		$task_description = test_input($_POST["task_description"]);
		$start_date = test_input($_POST["start_date"]);
		$end_date = test_input($_POST["end_date"]);*/
		
			if (isset($_POST['id'])){
			$id = test_input($_POST["id"]);
				
			DeleteGroup($id);
		}
		
	function test_input($data) {
		$data = trim($data);
 		$data = stripslashes($data);
 		$data = htmlspecialchars($data);
 		return $data;
	}
?>

	<div class="body">
		
		<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
			<?php if($isDeleteGroup == true) 
			echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
			?>
		
			<h2>Team delete</h2>
			<br>
		
			<label><b>Team Name: </b></label><?php echo $group_name ?><br>
			<br>
			<br>
			<input type="submit" name="submit" value="Team delete">
			<input type="button" onclick="location.href='admin_group.php';" value="Cancel" />
		</form>

	</div>
<?php require("footer.php"); ?>