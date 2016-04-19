<?php
define("true-access",true);
include("common/layout.php");
//starting the session here
session_start();
ob_start();
pageheader("CHICAGO BLOGGERS");
// creating a link for logout
echo "<a href='logout.php' id='logout'  >LOGOUT </a>";
//getting the post value from the login page
$username=$_POST['username'];
$password=$_POST['password'];
//checking if both username and password are entered
if($username&&$password)
{
if($username=="rakesh" && $password=="india")
{
//creating a session variable username
$_SESSION['admin']=$_POST['username'];
//welcoming the admin if successfully logged in
if(isset($_SESSION['admin']))
{
echo 'Welcome '.$_SESSION['admin'];
}
}
else
{
//if incorrect credentials entered
die("You have entered Wrong User Name and Password");
}
}
else
{
//else we are redirecting to login.php page if submit is clicked directly
header("Location: admin.php");
}

//we are creating a form for blog entry
    echo '<div id="form_login">';
	echo '<form method="POST" enctype="multipart/form-data" action="blogcreation.php">';
	echo '<textarea type="textfield" name="title" placeholder="Title of the Blog"></textarea><br/>';
	echo '<textarea rows="15" cols="40" type="textfield"  name="blog" placeholder="Blog Entry"></textarea><br/>';
	echo 'CHOOSE A FILE: <input type="file" name="file" /><br/>';
	echo '<input type="submit" name="submit" value="submit"/>' ;
	echo '</form>';
	echo '</div>';
endOfPage();	
ob_end_flush();
?>