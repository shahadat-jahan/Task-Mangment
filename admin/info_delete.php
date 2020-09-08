<?php 
	require("haeder.php");
	
	$isDeleteInfo = false;

	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$isDeleteInfo = true;
		$total_info = fetch_total_info($_GET['id']);
		$total_data = $total_info->fetch_array();
		$group_name = $total_data['group_id'];
		$username = $total_data['user_id'];
		$title = $total_data['task_id'];
	}
	else{
		$id = $group_id = $user_id = $task_id = "";
	}

	/*if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$title = test_input($_POST["title"]);
		$task_description = test_input($_POST["task_description"]);
		$start_date = test_input($_POST["start_date"]);
		$end_date = test_input($_POST["end_date"]);*/
		
		if (isset($_POST['id'])){
			$id = test_input($_POST["id"]);
				
			DeleteInfo($id);
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
		<?php if($isDeleteInfo == true) 
			echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
			?>
		
		<h2>Info delete</h2>
		<br>

			<?php

				$assign_info = InfoLists();

				echo '<table border="1" cellpadding="5" cellspacing="0"><thead><tr><th>ID</th><th>Group</th><th>User</th><th>Task</th><th>Action</th></tr></thead><tbody>';

				while ($row = $assign_info->fetch_assoc()) {
					$user_name = UserInfo($row["user_id"]);
					$task_title = TaskInfo($row["task_id"]);
    				$group_name = GroupInfo($row["group_id"]);
				echo '<tr><td>'. $row['id'] .'</td><td>'.$group_name .'</td><td>'.$user_name .'</td><td>'.$task_title .'</td><td><input type="submit" name="submit" value="Delete">  <a href="admin.php"><button>Cancel</button></a></td></tr>';
				}
				echo '</tbody></table>';
			?>

		</form>

	</div>
	
<?php require("footer.php"); ?>