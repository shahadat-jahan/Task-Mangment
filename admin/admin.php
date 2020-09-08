<?php

require("haeder.php");
is_admin();
$user_id = $task_id = $group_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	$user_id = test_input($_POST["username"]);
	$task_id = test_input($_POST["title"]);
	$group_id = test_input($_POST["group_name"]);

	Assign($user_id, $task_id, $group_id);
}

function test_input($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<div class="body">

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

		<h2>Admin Dashboard</h2>
		<br>
		<br>

		<table class="table-hover" border="0" cellpadding="15">
			<tr>
				<td><label>Team name:-</label>
					<select name="group_name">
						<?php writeOptionList("groups", $group_id, "group_name") ?>
					</select>
				</td>

				<td><label>Member name:-</label>
					<select name="username">
						<?php writeOptionList("users", $user_id, "username") ?>
					</select>
				</td>

				<td><label>Task title:-</label>
					<select name="title">
						<?php writeOptionList("tasks", $task_id, "title") ?>
					</select>
				</td>

				<td><input type="submit" name="submit" value="Assign"></td>
			</tr>
		</table>

		<br>

		<div>
			<?php
			$assign_info = AssignLists();

			echo '<table class="table-hover" border="1" cellpadding="5" cellspacing="0"><thead><tr><th>ID</th><th>Team</th><th>Member</th><th>Task</th><th>Action</th></tr></thead><tbody>';

			while ($row = $assign_info->fetch_assoc()) {
				$user_name = UserInfo($row["user_id"]);
				$task_title = TaskInfo($row["task_id"]);
				$group_name = GroupInfo($row["group_id"]);
				echo '<tr><td>' . $row['id'] . '</td><td>' . $group_name . '</td><td>' . $user_name . '</td><td>' . $task_title . '</td><td><button><a onclick="return ConfirmDelete();" href="info_delete.php?id=' . $row['id'] . '">Delete</a></button></td></tr>';
			}
			echo '</tbody></table>';

			?>
		</div>

	</form>

</div>

<script>
	function ConfirmDelete() {
		var x = confirm("Are you sure you want to delete?");
		if (x)
			return true;
		else
			return false;
	}
</script>


<?php require("footer.php"); ?>