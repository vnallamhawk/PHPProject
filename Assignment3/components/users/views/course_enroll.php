<?php

//including common.php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");


startofPage();
startContent();
//displaying the courses which the user registered
echo "<h1> My Courses </h1>";	
function view($data)
{
	 $users = $data["course_enrolled"];
	if (!empty($users))
	{
	echo '<table><th>COURSE ID</th><th>COURSE NAME</th>';
	foreach ($users as $user)
		{
		echo '<tr><td>',$user["Course_ID"], '</td>';
		echo '<td>', $user["Course_Name"] , '<td><tr>';
		}
    echo '<table>';
    } 
	else
	echo "No Courses to Display";

} 
endContent();
endofPage();




?>