<?php
defined("true-access") or die("No script kiddies please!");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");

//function for displayiing the user details
function view($data)
{
		
	startOfPage();
	startContent();	
	$users = $data["users"];
	echo '<table><tr><th>USERNAME</th><th>EMAIL</th></tr>';
	if (!empty($users))
	{
	foreach ($users as $user)
		{
		echo '<tr><td>',$user["username"],'</td>';
		echo '<td>',$user["email"],'</td></tr>';
		}

    }
    echo '</table>';
	endContent();
	endOfPage();

}

echo '<div class="courses_button"><form  action="index.php?option=users&view=course_enrolled" method="POST" enctype="multipart/form-data">';
echo '<input type="submit" name="my_courses" value="My Courses"></div>';


?>