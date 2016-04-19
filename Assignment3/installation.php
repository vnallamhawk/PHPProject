<?php
echo '<link rel="stylesheet" href="lib/layout/css/style.css">';
//CHECKING FOR POST REQUEST AND STORING ALL THE VALUES IN A VARIABLE
if(isset($_POST['submit']))
{
$Username=$_POST['name'];
$Password=$_POST['password'];
$hostname=$_POST['host'];
$database=$_POST['database'];
connect_to_database($hostname,$Username,$Password,$database);
create($hostname,$Username,$Password,$database);
header('Location: index.php');
}
else
{
form_display();
} 
//CONNECTING TO DATABASE
function connect_to_database($hostname,$Username,$Password,$database)
{

	//FETCHING ALL THE QUERIES AND EXECUTING IT
	$dbc = @mysqli_connect($hostname,$Username,$Password);
	if ($dbc)
	{
	  $database=$_POST['database'];
	$query0="create database ".$database."";
	$result0=mysqli_query($dbc,$query0);
  
		mysqli_select_db($dbc,$database);
		$error = "";
	$query1="CREATE TABLE IF NOT EXISTS `courses` (
  `ID` int(100) NOT NULL,
  `Course_ID` varchar(100) NOT NULL,
  `Course_Name` varchar(100) NOT NULL,
  `Credit_Hours` varchar(100) NOT NULL,
  `Availability` varchar(100) NOT NULL,
  PRIMARY KEY (`Course_ID`))";
  
  $result1= mysqli_query($dbc,$query1);
   
   $query2="CREATE TABLE IF NOT EXISTS `courses` (
  `ID` int(100) NOT NULL,
  `Course_ID` varchar(100) NOT NULL,
  `Course_Name` varchar(100) NOT NULL,
  `Credit_Hours` varchar(100) NOT NULL,
  `Availability` varchar(100) NOT NULL,
  PRIMARY KEY (`Course_ID`))";
  
  $result2= mysqli_query($dbc,$query2);
  
  
$query3="INSERT INTO `courses` (`ID`, `Course_ID`, `Course_Name`, `Credit_Hours`, `Availability`) VALUES
(1, 'ITMD411', 'Intermediate Software Development', '3', 'Fall and Spring '),
(4, 'ITMD422', 'Advanced Database', '3', 'Fall'),
(5, 'ITMD461', 'Internet Technology and Web Design', '3', 'Fall,Spring'),
(2, 'ITMD562', 'Web Application Development', '3', 'Fall '),
(6, 'ITMD563', 'Intermediate Web Application Devpt', '3', 'Fall'),
(3, 'ITMM586', 'IT AUDITING', '3', 'Spring')";

$result3= mysqli_query($dbc,$query3);

$database= mysqli_query($dbc,$query3);
$query4="CREATE TABLE IF NOT EXISTS `course_registered` (
  `Course_ID` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  UNIQUE KEY `Course_ID` (`Course_ID`,`Username`)
)";

$result4= mysqli_query($dbc,$query4);

$query5="INSERT INTO `course_registered` (`Course_ID`, `Username`) VALUES
('', 'praveen'),
('ITMD411', 'rakesh'),
('ITMD422', 'praveen'),
('ITMD422', 'rakesh'),
('ITMD461', 'praveen'),
('ITMD461', 'rakesh'),
('ITMD562', 'praveen'),
('ITMD563', 'praveen'),
('ITMD563', 'rakesh');";

$result5= mysqli_query($dbc,$query5);

$query6="CREATE TABLE IF NOT EXISTS `site_header` (
  `Sitename` varchar(100) NOT NULL,
  `Subtitle` varchar(100) NOT NULL,
  `Subtitle_Users` varchar(100) NOT NULL,
  `ID` int(200) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
)";

$result6= mysqli_query($dbc,$query6);

$query7="CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(100) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
)";


$result7= mysqli_query($dbc,$query7);


$query8="INSERT INTO `users` (`ID`, `Username`, `Password`, `email`, `isadmin`) VALUES
(1, 'rakesh', 'c1faba51ee82059490f6ccd85858ca917d452711', 'rakesh.iitc@gmail.com', 1),
(2, 'praveen', '1132d90cd140c31d9001aaee5ca9412d50b927ad', 'praveen.santhanam@gmail.com', 0),
(3, 'karthick', '8cfaee2c98e7399a708ac8bfb21beddb9aa32406', 'karthick.selvaraj@gmail.com', 0),
(4, 'joe', '72c08b604de0331046ce1bfa63e1d8632397e37a', 'joe.valentine@gmail.com', 0),
(5, 'sanjeev', '5193917e9a181f42598dc3d7b5b53c2b0ce8c19d', 'sanjeev.sam@gmail.com', 0);";
	
	
	
	
	
	$result8= mysqli_query($dbc,$query8);
	
	$query9="INSERT INTO `site_header` (`Sitename`, `Subtitle`, `Subtitle_Users`, `ID`) VALUES('IIT BLACKBOARD', 'LIST OF COURSES', 'LIST OF USERS', 1);";
	$result9= mysqli_query($dbc,$query9);

	
	
		//good news everyone!
	  mysqli_set_charset($dbc,"utf8");
	}
	else
	{
		$error = mysqli_connect_error();
		die("NOT ABLE TO CONNECT TO DATABASE DUE TO THE FOLLOWING REASON".$error);
		//echo $error;	
	}
	
} 


function create($hostname,$Username,$Password,$database)
{
//GIVING THE DEFAULT FILE NAME
 $newfile = "configuration.php";
 
 //creating the file if it doesnt exist
 if (!file_exists($newfile)) {
 
$myfile = fopen($newfile, "w") ;

}
//storing the values in a variable
$data='<?php
        if (!defined("true-access"))
		{
		die("cannot access");
		}
		define("DB_USER","'.$Username.'");
		define("DB_PASSWORD","'.$Password.'");
		define("DB_HOST","'.$hostname.'");
		define("DB_NAME","'.$database.'");
		define("SALT","salt");
		?>';

//putting the contents in configuration.php file		
echo file_put_contents("configuration.php",$data);

}

//displaying the form
function form_display()
{

echo '<div class="form_login"><form action="" method="post">';
echo 'Username: <input type="text" name="name"><br>';
echo 'Password: <input type="password" name="password"><br>';
echo 'Host Name: <input type="text" name="host"><br>';
echo 'Database Name: <input type="text" name="database"><br>';
echo '<input type="submit" name="submit">';
echo '</form></div>';
}




?>