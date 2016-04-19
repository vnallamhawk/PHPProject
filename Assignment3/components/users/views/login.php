<?php
defined("true-access") or die("No script kiddies please!");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");

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

?>