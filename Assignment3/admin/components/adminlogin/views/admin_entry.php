<?php
if (!defined("true-access"))
{
	die("cannot access");
} 
//including common.php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");
startofPage();
startContent();
//displaying if the entries have been updated in the database
function view()
{
site_header();
}
endContent();
endofPage(); 

?>