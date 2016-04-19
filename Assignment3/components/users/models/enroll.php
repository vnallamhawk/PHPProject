<?php
/* if (!defined("true-access"))
{
	die("cannot access");
} */

include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/database/common.php");

/**
* function for enrolling the courses
*/
function course_registered()
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	$user=$_SESSION['user'];
	$username=$user["Username"];
	
	$course_ID=empty($_POST["course_ID"])?" ":$_POST["course_ID"];
	
	$courses = (array) null;
	if ($dbc)
	{
	   
		$query = "INSERT into course_registered (Course_ID,Username) values('$course_ID','$username')";
		$result= mysqli_query($dbc,$query);
		if (!$result) {
        die('You have already registered for this course ' . mysql_error());
        }
		else
		echo "the course has been registered";
	}
	
}


?>