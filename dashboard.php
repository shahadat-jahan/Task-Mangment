<?php

	require("haeder.php");
	
	$user_id = $task_id = $group_id ="";

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
		$user_id = test_input($_POST["username"]);
		$task_id = test_input($_POST["title"]);
		$group_id = test_input($_POST["group_name"]);

		Assign($user_id, $task_id, $group_id);

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
			
			<h2>Dashboard</h2>

			<div>
				<?php
				$assign_info = AssignLists();

				echo '<table border="1" cellpadding="5" cellspacing="0"><thead><tr><th>ID</th><th>Team</th><th>Member</th><th>Task</th></tr></thead><tbody>';

				while ($row = $assign_info->fetch_assoc()) {
					$user_name = UserInfo($row["user_id"]);
					$task_title = TaskInfo($row["task_id"]);
    				$group_name = GroupInfo($row["group_id"]);
				echo '<tr><td>'. $row['id'] .'</td><td>'.$group_name .'</td><td>'.$user_name .'</td><td>'.$task_title .'</td></tr>';
				}
				echo '</tbody></table>';

			?>
			</div>

		</form>

	</div>

<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>    


<?php require("footer.php"); ?>