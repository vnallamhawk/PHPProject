<?php
/* if (!defined("true-access"))
{
	die("cannot access");
} */

include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/database/common.php");

/**
* Check if a user exists in the database, adds user to session if exists
*/
function course_enroll()
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	 $user=$_SESSION['user'];
	$username=$user["Username"];
	$courses= (array) null; 

	
	if ($dbc)
	{
	    //$query = "INSERT into course_registered (Course_ID,Username,Course_Name) values('$course_ID','$username','$course_Name')";
		//SELECT a.Course_ID, a.Course_Name FROM courses a, course_registered b WHERE b.Course_ID = a.Course_ID and b.Username='$username'
		$query = "SELECT a.Course_ID, a.Course_Name FROM courses a, course_registered b WHERE b.Course_ID = a.Course_ID and b.Username='$username'";
		$result= mysqli_query($dbc,$query);		
			
		if ($result)
		{
			while($course = mysqli_fetch_array($result))
			{
			$courses[] = $course;	
			}				
		}
		else
		{
		echo "No Courses Found";
		}
	} 
	return $courses; 
}


?>