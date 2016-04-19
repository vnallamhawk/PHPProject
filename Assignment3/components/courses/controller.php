<?php
defined("true-access") or die("no access");
include_once("models/users.php");
include_once("models/courses.php");  
include_once("models/course_display.php"); 
//include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../lib/database/common.php");
//include_once("models/admin.php"); 
 
function controller_route($view)
{
if($view=valid_view($view))
{
$view();
}
else
{
echo "course controller";
die("404-view");
}
}  

function valid_view($view)  
{
if($view=="courses")
return "execute_courses";
else if($view=="login")
return "execute_login";
else if($view=="logout")
return "execute_logout";
else if($view=="initial")
return "execute_initial";
else if($view=="detail")
return "execute_detail";
else
return false;
}
//function for displaying the courses
function execute_courses()
{
if(!empty($_SESSION['user']))
//calling the user login form
users_renderLoginForm();
include("views/courses.php");
//calling the title and subtitle
title();
subtitle_courses();
$data=array();
$data["courses"]=courses();
view($data); 
}
 function execute_detail()
{ 
//checking if session exist and displaying the course details
if(!empty($_SESSION['user']))
users_renderLoginForm();
include("views/courses.php");
title();
include_once("views/course_display.php");
	$data = array();
	$data["courses"] = course_display();
	view_display($data); 
} 
function execute_initial()
{
//redirecting to login page
session_unset();
title();
include_once("views/login.php");
view();
non_users();
}
//checking the post request of login
function execute_login()
{
if(!empty($_POST) ) 
{
$username=$_POST["username"];
$password=$_POST["password"];
$success=users_checkExists($username,$password);
//if values is true executing the function execute_courses
if($success)
execute_courses();
}
else
{
session_unset();
echo "YOUR SESSION HAS EXPIRED";
execute_initial();
}
}
//executing thelogout
function execute_logout()
{
session_unset();
execute_initial();
}

?>
