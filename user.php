<?php 
	require("haeder.php");	
?>

<div class="body">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<h2>Member list</h2>

			<?php 
			 $user_info = user_lists();
			 echo '<table border="1" cellpadding="5" cellspacing="0"><thead><tr><th >ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th></tr></thead><tbody>';
			while ($row = $user_info->fetch_assoc()) {
				echo '<tr><td>'. $row['id'] .'</td><td>'.$row['username'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td>'.$row['email'].'</td></tr>';
			}
			echo'</tbody></table>';
			 ?>
	
		</form>
	</div>

<?php require("footer.php"); ?>