<?php
if (!defined("true-access"))
{
	die("cannot access");
}
//including the common file
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
			//executing the query repeatedly
			while($user = mysqli_fetch_array($result_query,MYSQLI_BOTH))
			{
				$_SESSION['user'] = $user;
				$success = true;		
			}
		}
		else
		{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
			
		echo "not able to connect to the database";
		}
	}
	//returning if it got succeeded by true or false
	return $success;
}

?>