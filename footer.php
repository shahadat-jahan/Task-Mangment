<script>

	function ConfirmEdit(){
      	var x = confirm("Are you sure you want to delete?");
      	if (x)
      		return true;
      	else
        	return false;
    }

    function ConfirmDelete(){
      	var x = confirm("Are you sure you want to delete?");
      	if (x)
        	return true;
      	else
        	return false;
    }

	function validateTeamForm() {
  		document.getElementById("group_nameErr").innerHTML = "";
  		team = document.forms["myForm"]["group_name"].value;
  		if (team == "") {
   			team_error_msg = "Team name must be filled out!";
    	    document.getElementById("group_nameErr").innerHTML = team_error_msg;	
    		return false;
    	}
	}

	function validateTaskForm() {
		document.getElementById("task_titleErr").innerHTML = "";
		document.getElementById("task_descriptionErr").innerHTML = "";
		document.getElementById("start_dateErr").innerHTML = "";
		document.getElementById("end_dateErr").innerHTML = "";
		title = document.forms["myForm"]["title"].value;
		description = document.forms["myForm"]["task_description"].value;
		start_date = document.forms["myForm"]["start_date"].value;
		end_date = document.forms["myForm"]["end_date"].value;
		if (title == "") {
			title_error_msg = "Title must be filled out!";
	    	document.getElementById("task_titleErr").innerHTML = title_error_msg;
	    	return false;	
    	}
  		if (description == ""){
  			description_error_msg = "Description must be filled out!";
    		document.getElementById("task_descriptionErr").innerHTML = description_error_msg;
    		return false;	
    	}
    	if (start_date == ""){
  			start_date_error_msg = "Start date must be filled out!";
    		document.getElementById("start_dateErr").innerHTML = start_date_error_msg;
    		return false;
    	}
    	if (end_date == ""){
  			end_date_error_msg = "End date must be filled out!";
    		document.getElementById("end_dateErr").innerHTML = end_date_error_msg;
    		return false;
    	}
  		return true;
	}

	function validateMemberForm() {
		var valid = true;
		document.getElementById("usernameErr").innerHTML = "";
		document.getElementById("emailErr").innerHTML = "";
		document.getElementById("passwordErr").innerHTML = "";
		document.getElementById("password_repeatErr").innerHTML = "";
		document.getElementById("first_nameErr").innerHTML = "";
		document.getElementById("last_nameErr").innerHTML = "";
		username = document.forms["myForm"]["username"].value;
		email = document.forms["myForm"]["email"].value;
		password = document.forms["myForm"]["password"].value;
		password_repeat = document.forms["myForm"]["password_repeat"].value;
		first_name = document.forms["myForm"]["first_name"].value;
		last_name = document.forms["myForm"]["last_name"].value;
		if (username == "") {
			username_error_msg = "Username must be filled out!";
	    	document.getElementById("usernameErr").innerHTML = username_error_msg;
	   		valid = false;	
    	}
  		if (email == ""){
  			email_error_msg = "Email must be filled out!";
    		document.getElementById("emailErr").innerHTML = email_error_msg;
    		valid = false;	
    	}
    	if (password == ""){
  			password_error_msg = "Password must be filled out!";
    		document.getElementById("passwordErr").innerHTML = password_error_msg;
    		valid = false;
    	}
    	if (password_repeat == ""){
  			password_repeat_error_msg = "Repeat password must be filled out!";
    		document.getElementById("password_repeatErr").innerHTML = password_repeat_error_msg;
    		valid = false;
    	}
    	if (first_name == ""){
  			first_name_error_msg = "First name must be filled out!";
    		document.getElementById("first_nameErr").innerHTML = first_name_error_msg;
    		valid = false;
    	}
    	if (last_name == ""){
  			last_name_error_msg = "Last name must be filled out!";
    		document.getElementById("last_nameErr").innerHTML = last_name_error_msg;
    		valid = false;
    	}
    	console.log(valid);
  		
  		if (valid == true) {
  			return true;
  		}
  		else{
  			return false;
		}
	}
	
</script>
</body>
</html>