<?php 
	require("haeder.php");	
?>

	<div class="body">
		<p><input type="button" onclick="location.href='group.php';" value="Add Team" /></p>
		

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<?php 
				$group_info = group_lists();
				echo '<table class="table-hover" border="1" cellpadding="5" cellspacing="0"><thead><tr><th >ID</th><th>Team name</th><th>	Action</th></tr></thead><tbody>';
				while ($row = $group_info->fetch_assoc()) {
				echo '<tr><td>'. $row['id'] .'</td><td>'.$row['group_name'].'</td><td><button><a href="group.php?id='.$row['id'].'">Edit</a></button> | <button><a onclick="return ConfirmDelete();" href="group_delete.php?id='.$row['id'].'">Delete</a></button></td></tr>';
				}
				echo '</tbody></table>';
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