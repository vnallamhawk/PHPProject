<?php
if (!defined("true-access"))
{
	die("cannot access");
} 
 //echo constant('true-access');
//include_once("common.php");
//include_once("lib/courses.php");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");
startofPage();
startContent();
//rendering the title,subtitle_users and subtitle_courses
function view()
{
logout();
echo "<h1> ADMIN CUSTOM OPTIONS </h1>";
echo '<form  action="index.php?option=admin&view=admin_entry" method="POST" enctype="multipart/form-data">';
echo '<input type="text" name="title" value="title">';	
echo '<input type="text" name="subtitle" value="subtitle">';
echo '<input type="text" name="subtitle_users" value="subtitle_users">';		
echo '<input type="submit" name="submit" value="submit">';	
}

endContent();
endofPage(); 

?>