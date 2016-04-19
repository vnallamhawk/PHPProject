<?php
if (!defined("true-access"))
{
	die("cannot access");
}
/* define("SALT","salt");
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
 */
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../configuration.php");
function connect_to_database()
{
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$error = "";
	
	if ($dbc)
	{
		//good news everyone!
		mysqli_set_charset($dbc,"utf8");
	}
	else
	{
		$error = mysqli_connect_error();
	}
	
	return array($dbc,$error);
}

function site_name()
{
	list($dbc,$error) = connect_to_database();
	$success = false;
	if ($dbc)
	{
		$query = "select * from site_header where ID in(Select max(ID) from site_header)";	
		$result= mysqli_query($dbc,$query);
		$result_row=mysqli_num_rows($result);
		if ($result_row)
		{
		
			while($content = mysqli_fetch_array($result))
			{
			$_SESSION["site_header"]=$content;
			//$contents[] = $content;	
			}
			//$title=$contents['Title'];
			//$_SESSION["Subtitle"]=$contents['Subtitle'];
			//echo $title;
			//print_r($_SESSION);
			//print_r($_SESSION);
			//print_r($contents);		
		}
		/* else
		{
		$_SESSION["site_header"]="IIT BLACKBOARD";
		echo "no data found";
		} */
	}
	//return $contents;
}
?>