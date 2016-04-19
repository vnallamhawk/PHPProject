<?php
defined("true-access") or die("No script kiddies please!");
echo '<link rel="stylesheet" href="lib/css/style.css">';

/*
* common layout
*/
//this page include the common layout for all the pages
function startOfPage()
{
	echo '<!doctype html> '.PHP_EOL;
	echo '<html>          '.PHP_EOL;
	echo '</head>         '.PHP_EOL;
	echo '<body>          '.PHP_EOL;
}

function endOfPage()
{
	echo '</body> '.PHP_EOL;
	echo '</html> '.PHP_EOL;
}
//siteTitle displaying function
function siteTitle($content)
{
	echo "<div class='header'><h1><a style='color:red' href='index.php'>".$content."<a></h1></div>".PHP_EOL;
}

function startContent()
{
	echo '<article>'.PHP_EOL;
}

function endContent()
{
	echo '</article>'.PHP_EOL;
}

function startAside()
{
	echo '<aside>'.PHP_EOL;
}

function endAside()
{
	echo '</aside>'.PHP_EOL;
}

function h1($content)
{
	echo "<h1>".$content."</h1>".PHP_EOL;
}

function h3($content)
{
	echo "<h3>".$content."</h3>".PHP_EOL;
}

function h2($content)
{
	echo "<h2>".$content."</h2>".PHP_EOL;
}

function p($content)
{
	echo "<p>".$content."</p>".PHP_EOL;
}
//checking if the user logged in
function users_loggedIn()
{
	return (isset($_SESSION['admin']));
}
//rendering the form in this function depending on the user logged in function
function users_renderLoginForm()
{
if (!users_loggedIn()) {
		echo '<div class="form_login"><form action="index.php?option=admin&view=login" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/><br/>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/><br/>'.PHP_EOL;
		echo '	<input type="submit" value="Login"/>  </div>                     '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	
}
else
	{
		p("Welcome admin!");
		echo '<form action="index.php?option=admin&view=logout" method="post">                          '.PHP_EOL;
		echo '<div class="logout">	<input type="submit" value="Logout"/>  </div>                     '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
}
//button for displaying the logout when the session is deleted
function logout()
{
        echo '<form action="index.php?option=admin&view=logout" method="post">                          '.PHP_EOL;
		echo '	<div class="logout"><input type="submit" value="Logout"/> </div>                      '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
}

?>