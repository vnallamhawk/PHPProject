<?php
define("true-access","true");
session_start();
//ROUTING AND SETTING THE DEFAULT COMPONENTS AND VIEWS
function route()
{
$component=empty($_GET["option"])?"courses":$_GET["option"];
$view=empty($_GET["view"])?"initial":$_GET["view"];
if($file=component_enabled($component))
{
include_once("components/".$file);
controller_route($view);
}
//SHOWING ERROR MESSAGE 
else
{
echo "index page";
die("404 ERROR");
}
}
//REDIRECTING TO USER AND COURSE CONTROLLER.PHP FILE
function component_enabled($component)
{
if($component=="courses")
return "courses/controller.php";
else if($component=="users")
return "users/controller.php";
else
return false;
}
route();	
?>