<?php

/*function is_login()
{
	if(!isset($_SESSION["user_id"])){
	//user has no session, rediracte to login page
		header('Location: http://localhost/task_management/index.php');
	}	
}
*/
function is_admin()
{
	if(!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] != 1){
	//user has no session, rediracte to admin login page
		header('Location: http://localhost/task_management/admin/index.php');
	}	
}

?>