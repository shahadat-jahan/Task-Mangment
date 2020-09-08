<?php 
	require("haeder.php");	
?>

	<div class="body">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["POST_SELF"]);?>">

			<h2>Task list</h2>
			
			<?php
				$task_info = task_list();
				echo '<table border="1" cellpadding="5" cellspacing="0"><thead><tr><th>ID</th><th>Task name</th><th>Task description</th><th>Start date</th><th>End date</th></tr></thead><tbody>';
				while ($row = $task_info->fetch_assoc()) {
					echo '<tr><td>'. $row['id'] .'</td><td>'.$row['title'].'</td><td>'.$row['task_description'].'</td><td>'.$row['start_date'].'</td><td>'.$row['end_date'].'</td></tr>';
				}
				echo '</tbody></table>';
			?>
			
		</form>
	</div>
<?php require("footer.php"); ?>