<?php
if (!defined("true-access"))
{
	die("cannot access");
}
//including the common.php function
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");	

//checking if the admin exists
function admin_checkExists($username, $password)
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	if ($dbc)
	{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
		$query = "SELECT * from users where username='$username_safe' AND password='$password_safe' AND isadmin='1'";		
		$result_query = mysqli_query($dbc,$query);
		$result = mysqli_num_rows($result_query);
		//if exists storing the value in session
		if ($result)
		{
			//aha we found you!
			while($user = mysqli_fetch_array($result_query,MYSQLI_BOTH))
			{
			$_SESSION['admin'] = $user;
				$success = true;	
				/* echo $admin_check; */		
			}	
		}
		//if not getting connected we are displaying the message not able to connect to the database
		else
		{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
		echo "not able to connect to the database";
			//bad, wrong username or password
		}
	}
	return $success;
}

?>