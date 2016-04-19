<?php
if (!defined("true-access"))
{
	die("cannot access");
}

include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");

/**
* Check if a user exists in the database, adds user to session if exists
*/
function users_checkExists($username, $password)
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	if ($dbc)
	{
	
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
		$query = "SELECT * from users where username='$username_safe' AND password='$password_safe'";	
		$result_query = mysqli_query($dbc,$query);
		$result = mysqli_num_rows($result_query);
		
		if ($result)
		{
			//aha we found you!
			echo "check for wrong password";
			while($user = mysqli_fetch_array($result_query,MYSQLI_BOTH))
			{
				$_SESSION['user'] = $user;
				$success = true;				
			}
			//header("location:../assignment3/courses.php");
					
		}
		else
		{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
		echo $password_safe;	
		echo "not able to connect to the database";
			//bad, wrong username or password
		}
	}
	return $success;
}

function user_info()
{
	$users = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT username,email from users;";
		
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($user = mysqli_fetch_array($result))
			{
				$users[] = $user;
			}
		}
	}
	return $users;
}


?>