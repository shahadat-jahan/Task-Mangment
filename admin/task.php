<?php 
	require("haeder.php");
	
	$isEditTask = false;

	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$isEditTask = true;
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

	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$title = test_input($_POST["title"]);
		$task_description = test_input($_POST["task_description"]);
		$start_date = test_input($_POST["start_date"]);
		$end_date = test_input($_POST["end_date"]);
		
		if (isset($_POST['id'])){
			$id = test_input($_POST["id"]);
				
			UpdateTask($id, $title, $task_description, $start_date, $end_date);
		}
		else{
			AddTask($title, $task_description, $start_date, $end_date);	
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
		
		<form name="myForm" method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" 
		onsubmit="return validateTaskForm()">
		<?php if($isEditTask == true) 
			echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
			?>
		
		<h2><?php echo ($isEditTask == true) ?'Update':'Add'?>Task</h2>
		<br>
		
		<label>Task Title</label>
		<span style="color: red";>*</span>
		<br>
		<input type="text" name="title" placeholder="Enter Task Title" value="<?php echo $title ?>">
		
		<p class="error" id="task_titleErr"></p>
		<br>		
		<label>Task Description</label>
		<span style="color: red";>*</span>
		<br>
		<textarea name="task_description" placeholder="Write description" rows="8" cols="30"><?php echo $task_description ?></textarea>
		
		<p class="error" id="task_descriptionErr"></p>
		<br>
		<label>Start Date</label>
		<span style="color: red";>*</span>
		<br>
		<input type="date" name="start_date" placeholder="Start Date" value="<?php echo $start_date?>">
		
		<p class="error" id="start_dateErr"></p>
		<br>
		<label>End Date</label>
		<span style="color: red";>*</span>
		<br>
		<input type="date" name="end_date" placeholder="End Date" value="<?php echo $end_date?>">
		
		<p class="error" id="end_dateErr"></p>
		<br>
		<input type="submit" name="submit" value="<?php echo ($isEditTask == true) ?'Update':'Add'?>Task"/>
		<input type="button" onclick="location.href='admin_task.php';" value="Cancel" />
		
		</form>

	</div>

<?php require("footer.php"); ?>