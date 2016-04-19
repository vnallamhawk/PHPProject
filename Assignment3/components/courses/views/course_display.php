<?php
defined("true-access")or die("No Script Found");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");
startofPage();
startContent();
echo "<h1> DETAILED VIEW OF A COURSE </h1>";	
//creating the detailed view of the courses 
function view_display($data)
{
$course=$data["courses"];
echo '<table border="0" cellpadding="0" cellspacing="0" height="200" width="500">';
echo '<tr><th width="100">COURSE ID</th><th width="700">COURSE NAME </th><th width="250">Availability</th><th width="250">CREDIT HOURS</th></tr>';
foreach($course as $content)
		{
		echo '<tr><td width="250">', $content["Course_ID"] ,'</td>';
		echo '<td width="30">', $content["Course_Name"], '</td>';
		echo '<td width="250">', $content["Availability"], '</td>';
		echo '<td width="250">', $content["Credit_Hours"], '</td>';
		} 	
echo '</tr>';
echo '</table>';	
//enabling the enroll button for the logged in users
if(!empty($_SESSION["user"]))
{	
echo '<form  action="index.php?option=users&view=enroll" method="POST" enctype="multipart/form-data">';
echo '<input type="hidden" name="course_ID" value='.$content["Course_ID"].'>';
echo '<input type="submit" value="ENROLL">';
}
endContent();
endofPage();
} 










?>