<?php
session_start();
$server = "localhost";
$db_name = "task management";
$db_user = "root";
$db_pass = "123456";

//create connection
$conn = new mysqli($server, $db_user, $db_pass, $db_name);
//check connection
if ($conn->connect_error) {
	die("connection failed:" . $conn->connect_error);
}

function AddUser($username, $email, $password, $first_name, $last_name)
{
	global $conn;

	$sql = "INSERT INTO users (username, email, password, first_name, last_name)
	VALUES ('$username', '$email', md5($password), '$first_name', '$last_name')";

	if ($conn->query($sql) === TRUE) {
		header('Location: http://localhost/task_management/admin_user.php');

		exit();
	} else {
		echo "Data added failed";
	}
	$conn->close();
}
function UpdateUser($id, $username, $email, $password, $first_name, $last_name)
{
	global $conn;

	$sql = "UPDATE users SET username='$username', email='$email', first_name='$first_name', last_name='$last_name' WHERE id=" . $id;


	if ($conn->query($sql) === TRUE) {
		if ($password != "") {
			$sql = "UPDATE users SET password='" . md5($password) . "' WHERE id=" . $id;
			$conn->query($sql);
		}
		header('Location: http://localhost/task_management/admin_user.php');

		exit();
	} else {
		echo "User update failed";
	}
	$conn->close();
}

function AddTask($title, $task_description, $start_date, $end_date)
{
	global $conn;

	$sql = "INSERT INTO tasks (title, task_description, start_date, end_date)
	VALUES ('$title', '$task_description', '$start_date', '$end_date')";

	if ($conn->query($sql) === TRUE) {
		header('Location: http://localhost/task_management/admin_task.php');
		//echo "Task added succesful!";
		exit();
	} else {
		echo "Data added failed!";
	}
	$conn->close();
}

function UpdateTask($id, $title, $task_description, $start_date, $end_date)
{
	global $conn;

	$sql = "UPDATE tasks SET title='$title', task_description='$task_description', start_date='$start_date', end_date='$end_date' WHERE id=" . $id;

	if ($conn->query($sql) === TRUE) {

		header('Location: http://localhost/task_management/admin_task.php');

		exit();
	} else {
		echo "Task update failed";
	}
	$conn->close();
}

function AddGroup($group_name)
{
	global $conn;

	$sql = "INSERT INTO groups (group_name)
	VALUES ('$group_name')";
	//echo $conn->query($sql);
	if ($conn->query($sql) == TRUE) {
		//	echo "abc";
		header('location: http://localhost/task_management/admin_group.php');
		exit();
		//echo "Group craete succesful!";
	} else {
		//header('location: http://localhost/task_management/group.php');
		echo "Group craete failed!";
	}
	$conn->close();
}

function UpdateGroup($id, $group_name)
{
	global $conn;

	$sql = "UPDATE groups SET group_name='$group_name' WHERE id=" . $id;

	if ($conn->query($sql) === TRUE) {

		header('Location: http://localhost/task_management/admin_group.php');

		exit();
	} else {
		echo "Group update failed";
	}
	$conn->close();
}

function DeleteInfo($id)
{
	global $conn;

	$sql = "DELETE FROM total_info WHERE id=" . $id;

	if ($conn->query($sql) === TRUE) {

		header('Location: http://localhost/task_management/admin.php');

		exit();
	} else {
		echo "Info delete failed";
	}
	$conn->close();
}

function DeleteTask($id)
{
	global $conn;

	$sql = "DELETE FROM tasks WHERE id=" . $id;

	if ($conn->query($sql) === TRUE) {

		header('Location: http://localhost/task_management/admin_task.php');

		exit();
	} else {
		echo "Task delete failed";
	}
	$conn->close();
}

function DeleteGroup($id)
{
	global $conn;

	$sql = "DELETE FROM groups WHERE id=" . $id;

	if ($conn->query($sql) === TRUE) {

		header('Location: http://localhost/task_management/admin_group.php');

		exit();
	} else {
		echo "Group delete failed";
	}
	$conn->close();
}
function DeleteUser($id)
{
	global $conn;

	$sql = "DELETE FROM users WHERE id=" . $id;

	if ($conn->query($sql) === TRUE) {

		header('Location: http://localhost/task_management/admin_user.php');

		exit();
	} else {
		echo "Group delete failed";
	}
	$conn->close();
}

function login($username, $password)
{
	global $conn;

	$sql = "SELECT id,username,password,is_admin FROM users WHERE username='" . $username . "' AND password='" . md5($password) . "' limit 1";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_array();
	} else {
		return false;
	}
}

function task_list()
{
	global $conn;
	$sql = "SELECT * FROM tasks ";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function group_lists()
{
	global $conn;

	$sql = "SELECT * FROM groups ";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function user_lists()
{
	global $conn;

	$sql = "SELECT * FROM users ";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function task_detailes()
{
	global $conn;

	$sql = "SELECT task_id FROM total_info ";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function fetch_user_info($id)
{
	global $conn;

	$sql = "SELECT * FROM users WHERE id=" . $id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function fetch_group_info($id)
{
	global $conn;

	$sql = "SELECT * FROM groups WHERE id=" . $id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function fetch_task_info($id)
{
	global $conn;

	$sql = "SELECT * FROM tasks WHERE id=" . $id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function fetch_task_detailes($id)
{
	global $conn;

	$sql = "SELECT * FROM tasks WHERE id=" . $id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function fetch_group_detailes($id)
{
	global $conn;

	$sql = "SELECT * FROM groups WHERE id=" . $id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function fetch_member_detailes($id)
{
	global $conn;

	$sql = "SELECT * FROM users WHERE id=" . $id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function fetch_total_info($id)
{
	global $conn;

	$sql = "SELECT * FROM total_info WHERE id=" . $id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function writeOptionList($table, $id, $fld)
{
	global $conn;
	$sql = "SELECT * FROM $table ORDER BY $fld asc";
	$result = $conn->query($sql);
	if (!$result) {
		echo "failed to open $table<p>";
		return false;
	}
	//If data exist
	while ($a_row = $result->fetch_assoc()) {
		if ($id == $a_row["id"])
			$selected = "SELECTED";
		else
			$selected = "";
		echo "<option $selected value='" . $a_row["id"] . "'>" . $a_row[$fld] . "</option>";
	}
}

function AssignUser($user_id, $group_id)
{
	global $conn;
	$sql = "INSERT INTO user_group (user_id, group_id)
	VALUES ('$user_id','$group_id')";

	if ($conn->query($sql) === TRUE) {
		header('Location: http://localhost/task_management/admin_group.php');
		//echo "USer assign succesful!";
		exit;
	} else {
		echo "User assign failed!";
		exit;
	}

	$conn->close();
}

function AssignTask($task_id, $group_id)
{
	global $conn;
	$sql = "INSERT INTO group_task (task_id, group_id)
	VALUES ('$task_id','$group_id')";

	if ($conn->query($sql) === TRUE) {
		header('Location: http://localhost/task_management/group_task.php');
		//echo "USer assign succesful!";
		exit;
	} else {
		echo "Task assign failed!";
		exit;
	}

	$conn->close();
}

function Assign($user_id, $task_id, $group_id)
{
	global $conn;
	$sql = "INSERT INTO total_info (user_id, task_id, group_id)
	VALUES ('$user_id','$task_id','$group_id')";

	if ($conn->query($sql) === TRUE) {
		header('Location: http://localhost/task_management/admin.php');
		exit;
	} else {
		echo "Assign failed!";
		exit;
	}

	$conn->close();
}

function AssignUserLists()
{
	global $conn;
	$sql = "SELECT * FROM user_group";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function AssignTaskLists()
{
	global $conn;
	$sql = "SELECT * FROM group_task";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function AssignLists()
{
	global $conn;
	$sql = "SELECT * FROM total_info";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function TaskMember($task_id)
{
	global $conn;
	$sql = "SELECT user_id FROM total_info WHERE task_id =" . $task_id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function GroupMember($group_id)
{
	global $conn;
	$sql = "SELECT user_id FROM total_info WHERE group_id =" . $group_id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function MemberTaskGroup($user_id)
{
	global $conn;
	$sql = "SELECT task_id,group_id FROM total_info WHERE user_id =" . $user_id;

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function InfoLists()
{
	global $conn;
	$sql = "SELECT * FROM total_info WHERE id =" . $_GET['id'];

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return false;
	}
	$conn->close();
}

function UserInfo($user_id)
{
	global $conn;
	$sql = "SELECT * FROM users WHERE id =" . $user_id;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$user_info = "<b>Username:</b><a href='member_detailes.php?id=" . $user_id . "'> " . $row['username'] . "</a><br> <b>Fullname:</b> " . $row['first_name'] . " " . $row['last_name'] . "<br> <b>Email:</b> " . $row['email'];
			return $user_info;
		}
	} else {
		return "";
	}
	$conn->close();
}


function TaskInfo($task_id)
{
	global $conn;
	$sql = "SELECT * FROM tasks WHERE id =" . $task_id;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$task_info = "<b>Title:</b><a href='task_detailes.php?id=" . $task_id . "'> " . $row['title'] . "</a><br> <b>Start date:</b> " . $row['start_date'] . "<br> <b>End date:</b> " . $row['end_date'];
			return $task_info;
		}
	} else {
		return "";
	}
	$conn->close();
}

function GroupInfo($group_id)
{
	global $conn;
	$sql = "SELECT * FROM groups WHERE id =" . $group_id;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$grp_info = "<a href='group_detailes.php?id=" . $group_id . "'>" . $row['group_name'] . "</a>";
			return $grp_info;
		}
	} else {
		return "";
	}
	$conn->close();
}

function MemberInfo($user_id)
{
	global $conn;
	$sql = "SELECT * FROM users WHERE id =" . $user_id;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$user_info = "<b>Name:</b><a href='member_detailes.php?id=" . $user_id . "'> " . $row['first_name'] . " " . $row['last_name'] . "</a>&nbsp;&nbsp;&nbsp; <b>Email:</b> " . $row['email'];
			return $user_info;
		}
	} else {
		return "";
	}
	$conn->close();
}
