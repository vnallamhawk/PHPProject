<?php
if (!defined("true-access"))
{
	die("cannot access");
} 

include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/database/common.php");
/**
* Selecting all the courses from the database and displaying it to the user
*/
function courses()
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	if ($dbc)
	{
		$query = "SELECT * from courses";	
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
		echo "no data found";
		}
	}
	return $courses;
}

?>