<?php 
	require("haeder.php");
	
	if (isset($_GET['id']) && $_GET['id'] > 0) {		
		$task_info = fetch_task_detailes($_GET['id']);
		$task_data = $task_info->fetch_array();
		$title = $task_data['title'];
		$task_description = $task_data['task_description'];
		$start_date = $task_data['start_date'];
		$end_date = $task_data['end_date'];
	}

?>

	<div class="body">
		
		<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
		
			<h2>Task detailes</h2>
			<br>
		
			<label><b>Task Title: </b></label><?php echo $title?><br>
			<br>
			<label><b>Task Description: </b></label><?php echo $task_description?><br>
			<br>
			<label><b>Start Date: </b></label><?php echo $start_date?><br>
			<br>
			<label><b>End Date: </b></label><?php echo $end_date?><br>
			<br>

			<h2>Members</h2>
			<?php
				$assign_info = TaskMember($_GET['id']);

				//echo '<table cellpadding="5" cellspacing="0"><thead><tr><th> </th></tr></thead><tbody>';

				while ($row = $assign_info->fetch_assoc()) {
					$user_name = MemberInfo($row["user_id"]);
					
				echo '<ul><li>'.$user_name .'</li></ul>';
				}
				//echo '</tbody></table>';

			?>
		</form>

	</div>
<?php require("footer.php"); ?>