<?php
define("true-access","true");
session_start();
//setting the default component and view and routing it
function route()
{
$component=empty($_GET["option"])?"admin":$_GET["option"];
$view=empty($_GET["view"])?"initial":$_GET["view"];
if($file=component_enabled($component))
{
include_once("components/".$file);
controller_route($view);
}
//if no match is found we are returning the error
else
{
echo "index page";
die("404 ERROR");
}
}

//redirecting to the admin controller
function component_enabled($component)
{
if($component=="admin")
return "adminlogin/controller.php";
else
return false;
}
route();	
?>