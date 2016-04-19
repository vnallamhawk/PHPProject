<?php
defined("true-access") or die("no access");
include_once("models/users.php");
include_once("models/admin.php");
/* include_once("models/courses.php");
include_once("models/enroll.php");
include_once("models/course_enroll.php"); */
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../lib/common.php");

//include("Assignment3/components/courses/models/courses.php");  
 
function controller_route($view)
{
if($view=valid_view($view))
{
$view();
}
else
{
die("404-view");
}
}  

function valid_view($view)  
{
if($view=="login")
return "execute_login";
else if($view=="list")
return "execute_list";
else if($view=="logout")
return "execute_logout";
else if($view=="initial")
return "execute_initial";
else if($view=="admin_entry")
return "execute_admin_entry";
else
return false;
}

function execute_initial()
{
include_once("views/login.php");
view();
}

function execute_login()
{
$check=0;
if(!empty($_POST))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$success = admin_checkExists($username,$password);
	if($success)
	{
	$check=1;
	execute_list();
    }	//view books after logging in
	}
	if(!empty($_SESSION['admin'])&&$check==0)
	execute_list();
	/* else
	{
	echo("Your session has expired. Please Login Below");
	execute_initial();
	} */

}
function execute_logout()
{
session_unset();
execute_initial();
}


function execute_list()
{
if(!empty($_SESSION['admin']))
{
    users_renderLoginForm();
	include_once("views/form.php");
	view();
}
else
die("access denied");
}

function execute_admin_entry()
{
if(!empty($_SESSION['admin'])&& !empty($_POST))
{
   users_renderLoginForm();
   include_once("views/admin_entry.php");
   view();
   }
   else{
    users_renderLoginForm();
   die("Your session has expired");
   }
}
?>
