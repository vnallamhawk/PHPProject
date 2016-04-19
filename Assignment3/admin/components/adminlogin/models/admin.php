<?php
if (!defined("true-access"))
{
	die("cannot access");
} 
//including the common.php
include_once("common.php");

//function for displaying the siteheader by getting the post request and inserting the values into the database
function site_header()
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	$Sitename=$_POST["title"];
	$Subtitle=$_POST["subtitle"];
	$Subtitle_users=$_POST["subtitle_users"];
	if ($dbc)
	{
		$query = "INSERT into site_header (Sitename,Subtitle,Subtitle_users) values('$Sitename','$Subtitle','$Subtitle_users')";
		$result= mysqli_query($dbc,$query);
		if (!$result) {
        die('Data couldnt be inserted ' . mysql_error());
        }
		else
		echo "Data has been inserted successfully";
	}
}


?>