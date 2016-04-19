<?php
defined("true-access") or die("no access");
include_once("models/users.php");
include_once("models/enroll.php");
include_once("models/course_enroll.php");
 
function controller_route($view)
{
if($view=valid_view($view))
{
$view();
}
else
{
echo "user controller";
die("404-view");
}
}  

function valid_view($view)  
{
if($view=="courses")
return "execute_courses";
else if($view=="login")
return "execute_login";
else if($view=="list")
return "execute_list";
else if($view=="logout")
return "execute_logout";
else if($view=="initial")
return "execute_initial";
else if($view=="enroll")
return "execute_enroll";
else if($view=="course_enrolled")
return "execute_course_enroll";
else
return false;
}
//initial login function
function execute_initial()
{
include_once("views/login.php");
view();
}
function execute_courses()
{
course_display();
}
//function for login
function execute_login()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$success = users_checkExists($username,$password);
	if($success)
	execute_list(); //view books after logging in
}
//function for logout
function execute_logout()
{
session_unset();
execute_initial();
}
function execute_enroll()
{
if(!empty($_SESSION['user']))
  users_renderLoginForm();
include_once("views/enroll.php");
view();
}
//function for checking the enrolled course of the user
function execute_course_enroll()
{
if(!empty($_SESSION['user']))
{
    users_renderLoginForm();
    include_once("views/course_enroll.php");
	$data = array();
	$data["course_enrolled"] = course_enroll();
	view($data);  
	}
	else
	echo "<h1> NO COURSE TO DISPLAY AS YOU HAVE NOT LOGGED IN</h1>";
}
//function for displaying the list of users
function execute_list()
{
if(!empty($_SESSION['user']))
users_renderLoginForm();
title();
subtitle_users();
	include_once("views/list.php");
	$data = array();
	$data["users"] = user_info();
	view($data);

}
?>
