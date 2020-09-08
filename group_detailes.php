<?php 
	require("haeder.php");
	
	if (isset($_GET['id']) && $_GET['id'] > 0) {		
		$group_info = fetch_group_detailes($_GET['id']);
		$group_data = $group_info->fetch_array();
		$group_name = $group_data['group_name'];
	}

?>

	<div class="body">
		
		<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
		
			<h2>Group detailes</h2>
			<br>
		
			<label><b>Group name: </b></label><?php echo $group_name?><br>
			<br>

			<h2>Members</h2>
			<?php
				$assign_info = GroupMember($_GET['id']);

				//echo '<table cellpadding="5" cellspacing="0"><thead><tr><th> </th></tr></thead><tbody>';

				while ($row = $assign_info->fetch_assoc()) {
					$user_name = MemberInfo($row["user_id"]);
					
				echo '<ul><li>'.$user_name .'</li></ul>';
				}
				//echo '</tbody></table>';

			?>
		</form>

	</div>
<?php require("footer.php"); ?>