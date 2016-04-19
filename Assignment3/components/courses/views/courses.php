<?php
defined("true-access")or die("No Script Found");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");
startofPage();
startContent();

function view($data)
{
echo '<table>';
echo '<tr><th>COURSE ID</th><th>COURSE NAME</th><tr/>';
//displaying course id and course name for the user 
$course=$data["courses"];
foreach($course as $content)
		{
		//creating a link for the courseid which will redirect to detailed view
	    echo  '<tr><td><a href="index.php?option=courses&view=detail&id='.$content["Course_ID"].'">	',$content["Course_ID"], ' </a></td>';
		echo '<td>',$content["Course_Name"],'</td></tr>';
			
		} 
echo '</tr></table>';
//creating a form for listing all the users
echo '<div class="all_users"><form  action="index.php?option=users&view=list" method="POST" enctype="multipart/form-data">';
echo '<input type="hidden" value="user">';	
echo '<input type="submit" value="LIST OF ALL USERS"></div>';	
	

endContent();
endofPage();
} 





?>