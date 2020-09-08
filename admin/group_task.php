<?php

	require("haeder.php");
	
	$task_id = $group_id ="";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
		$task_id = test_input($_POST["title"]);
		$group_id = test_input($_POST["group_name"]);

		AssignTask($task_id, $group_id);

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
			
			<h2>Assign task to group</h2>
			<br>
			<label>Task title</label>
			<br>
			<select name="title">
				<?php writeOptionList("tasks", $task_id, "title")?>
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
			<br>
			<br>

			<div>
				<?php
				$assignTask_info = AssignTaskLists();

				echo '<table border="1" cellpadding="5" cellspacing="0"><thead><tr><th >ID</th><th>Task</th><th>Group</th><th>Action</th></tr></thead><tbody>';

				while ($row = $assignTask_info->fetch_assoc()) {
					$task_title = TaskInfo($row["task_id"]);
    				$group_name = GroupInfo($row["group_id"]);
				echo '<tr><td>'. $row['id'] .'</td><td>'.$task_title .'</td><td>'.$group_name .'</td><td><a href="group.php?id='.$row['id'].'">Edit</a> | <a href="group_delete.php?id='.$row['id'].'">Delete</a> </td></tr>';
				}
				echo '</tbody></table>';

			?>
			</div>

		</form>

	</div>
	<?php require("footer.php"); ?>