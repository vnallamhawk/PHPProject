<?php
/* if (!defined("true-access"))
{
	die("cannot access");
} */

//include_once("common.php");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/database/common.php");
/**
* Check if a user exists in the database, adds user to session if exists
*/
//selecting all the details from an array if the courseid matches by looping in an array
function course_display()
{
	list($dbc,$error) = connect_to_database();
	 $success = false;
	
	$course_id=$_GET["id"];
	$courses= (array) null; 
	if ($dbc)
	{
		$query = "SELECT * FROM courses where Course_ID='$course_id'";	
		//executing the query
		$result= mysqli_query($dbc,$query);
		if ($result)
		{
			while($course = mysqli_fetch_array($result))
			{
			$courses[] = $course;	
			}				
		}
		//displaying no courses found if the above fails
		else
		{
		echo "No Courses Found";
		}
	} 
	return $courses;
}


?>