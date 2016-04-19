<?php
defined("true-access") or die("No script kiddies please!");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");

/*
* Main function
*/
//view for rendering the form
function view()
{
		
	startOfPage();
	startContent();
	users_renderLoginForm();
	endContent();
	endOfPage();

}

/*
* books layout helpers
*/


?>