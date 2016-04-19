<?php
if (!defined("true-access"))
{
	die("cannot access");
} 
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");

/*
* Main function
*/
//rendering the login form
function view()
{
		
	startOfPage();
	startContent();
	siteTitle("BlackBoard");
	users_renderLoginForm();
	endContent();
	endOfPage();

}

/*
* books layout helpers
*/


?>