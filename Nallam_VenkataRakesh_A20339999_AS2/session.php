<?php

ob_start();
session_start();
$check=0;
//checking if the button has been clicked
if(isset($_POST['reset']))
{
session_destroy();
$_SESSION ['hitsFromUser'] = 0;
$check=1;
}
//increasing the hits from user value 
else if(isset($_SESSION ['hitsFromUser'])&& $check==0)
{
	$_SESSION ['hitsFromUser'] = $_SESSION ['hitsFromUser'] + 1;
}
//setting the value to 1 if hit from user is not set
else 
{
	$_SESSION ['hitsFromUser'] = 1;
}

//assigning session value of hitsfromuser to $hits
$hits = $_SESSION ['hitsFromUser'];
//clearing the flush
ob_end_flush(); 

?>