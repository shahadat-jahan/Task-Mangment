<?php 
	require("haeder.php");	
?>

<div class="body">
		<p><input type="button" onclick="location.href='user.php';" value="Add Member" /></p>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<?php 
			 $user_info = user_lists();
			 echo '<table class="table-hover" border="1" cellpadding="5" cellspacing="0"><thead><tr><th >ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr></thead><tbody>';
			while ($row = $user_info->fetch_assoc()) {
				echo '<tr><td>'. $row['id'] .'</td><td>'.$row['username'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td>'.$row['email'].'</td><td><button><a href="user.php?id='.$row['id'].'">Edit</a></button> | <button><a onclick="return ConfirmDelete();" href="user_delete.php?id='.$row['id'].'">Delete</a></button></td></tr>';
			}
			echo'</tbody></table>';
			 ?>
	
		</form>
	</div>
<script>
    function ConfirmEdit()
    {
      var x = confirm("Are you sure you want to edit?");
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