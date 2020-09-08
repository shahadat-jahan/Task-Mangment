<?php 
	require("haeder.php");
	
	if (isset($_GET['id']) && $_GET['id'] > 0) {		
		$user_info = fetch_member_detailes($_GET['id']);
		$user_data = $user_info->fetch_array();
		$first_name = $user_data['first_name'];
		$last_name = $user_data['last_name'];
		$email = $user_data['email'];
	}

?>

	<div class="body">
		
		<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
		
			<h2>Member detailes</h2>
			<br>
		
			<label><b>Name: </b></label><?php echo $first_name .' '.$last_name?><br>
			<br>
			<label><b>Email: </b></label><?php echo $email?><br>
			<br>

			<h2>Teams & Tasks</h2>
			<?php
				$assign_info = MemberTaskGroup($_GET['id']);

				//echo '<table cellpadding="5" cellspacing="0"><thead><tr><th>Team</th><th>Task</th></tr></thead><tbody>';

				while ($row = $assign_info->fetch_assoc()) {
					$group_name = GroupInfo($row["group_id"]);
					$task_title = TaskInfo($row["task_id"]);
					
				echo '<ul><li><b>Team: </b>'.$group_name .'<br><b>Task </b>'.$task_title .'</li></ul>';
					
				}
				//echo '</tbody></table>';

			?>
		</form>

	</div>
<?php require("footer.php"); ?>