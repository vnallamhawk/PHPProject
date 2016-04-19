<?php
//setting the true access of the page
define("true-access",true);
//including the layout page 
include("common/layout.php");
ob_start();
//displaying the sitename
pageheader("CHICAGO BLOGGERS");

//creating a form for validating the user
echo '<div id="form_login">';
echo "<form action='action.php' method='post'>";
echo 'Username: <Input type="text" name="username" placeholder="Username"><br/>';
echo 'Password: <Input type="password" name="password" placeholder="Password"><br/>';
echo '<input type="submit" name="submit" value="SUBMIT">';
echo "</div>";

//calling the end of page
endOfPage();
//clearing the output buffer
ob_end_flush();
?>