<?php 
	require("haeder.php");
	
	$isDeleteTask = false;

	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$isDeleteTask = true;
		$task_info = fetch_task_info($_GET['id']);
		$task_data = $task_info->fetch_array();
		$title = $task_data['title'];
		$task_description = $task_data['task_description'];
		$start_date = $task_data['start_date'];
		$end_date = $task_data['end_date'];
	}
	else{
		$id = $title = $task_description = $start_date = $end_date = "";
	}
		
		if (isset($_POST['id'])){
			$id = test_input($_POST["id"]);
				
			DeleteTask($id);
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
			<?php if($isDeleteTask == true) 
			echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
			?>
		
			<h2>Task delete</h2>
			<br>
		
			<label><b>Task Title: </b></label><?php echo $title ?><br>
			<br>
			<label><b>Task Description: </b></label><?php echo $task_description ?><br>
			<br>
			<label><b>Start Date: </b></label><?php echo $start_date?><br>
			<br>
			<label><b>End Date: </b></label><?php echo $end_date?><br>
			<br>
			<input type="submit" name="submit" value="Task delete">
			<input type="button" onclick="location.href='admin_task.php';" value="Cancel" />
		</form>

	</div>
<?php require("footer.php"); ?>