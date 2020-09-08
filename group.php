<?php 
	require("haeder.php");	
?>

	<div class="body">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<h2>Team list</h2>
			<?php 
				$group_info = group_lists();
				echo '<table border="1" cellpadding="5" cellspacing="0"><thead><tr><th >ID</th><th>Team name</th></tr></thead><tbody>';
				while ($row = $group_info->fetch_assoc()) {
				echo '<tr><td>'. $row['id'] .'</td><td>'.$row['group_name'].'</td></tr>';
				}
				echo '</tbody></table>';
				?>
					
		</form>
	</div>
<?php require("footer.php"); ?>