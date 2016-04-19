<?php
if (defined("true-access"))
{
	die("cannot access");
} 
//include_once("common.php");
//include_once("lib/courses.php");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");
startofPage();
startContent();
//calling the site_header function
function view()
{
site_header();
}
endContent();
endofPage(); 
} 
?>