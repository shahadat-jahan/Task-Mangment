<?php 
	require("haeder.php");
?>

	<div class="body">
		<p><input type="button" onclick="location.href='task.php';" value="Add Task" /></p>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["POST_SELF"]);?>">

			<?php
				$task_info = task_list();
				echo '<table class="table-hover" border="1" cellpadding="5" cellspacing="0"><thead><tr><th>ID</th><th>Task name</th><th>Task description</th><th>Start date</th><th>End date</th><th>Action</th></tr></thead><tbody>';
				while ($row = $task_info->fetch_assoc()) {
					echo '<tr><td>'. $row['id'] .'</td><td>'.$row['title'].'</td><td>'.$row['task_description'].'</td><td>'.$row['start_date'].'</td><td>'.$row['end_date'].'</td><td><button><a href="task.php?id='.$row['id'].'">Edit</a></button> | <button><a onclick="return ConfirmDelete();" href="task_delete.php?id='.$row['id'].'">Delete</a></button> </td></tr>';
				}
				echo '</tbody></table>';
			?>
			
		</form>
	</div>
<script>
    function ConfirmEdit()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>
<?php require("footer.php"); ?>