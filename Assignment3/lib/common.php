<?php
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."database/common.php");
defined("true-access") or die("No script kiddies please!");
echo '<link rel="stylesheet" href="lib/layout/css/style.css">';

/*
* common layout
*/

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

function siteTitle($content)
{
	echo "<div class='header'><h1>".$content."</h1></div>".PHP_EOL;
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

function users_loggedIn()
{
	return (isset($_SESSION['user']));
}

function title()
{
site_name();
$content=$_SESSION["site_header"];
$title=$content['Sitename'];
siteTitle($title);
}

function subtitle_courses()
{
site_name();
$content=$_SESSION["site_header"];
$subtitle=$content['Subtitle'];
h1($subtitle);
}
function subtitle_users()
{

site_name();
$content=$_SESSION["site_header"];
$subtitle_users=$content['Subtitle_Users'];
h1($subtitle_users);

} 

function users_renderLoginForm()
{
	if (!users_loggedIn()) {
		echo '<div class="form_login"><form action="index.php?option=courses&view=login" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/><BR/>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/><BR/>'.PHP_EOL;
		echo '	<input type="submit" value="Login"/> <BR/>                      '.PHP_EOL;
		echo '</form> </div>                                                     '.PHP_EOL;
	}
	else
	{
		p("Welcome user!");
		echo '<form action="index.php?option=courses&view=logout" method="post">                          '.PHP_EOL;
		echo '<div class="logout">	<input type="submit" value="Logout"/>  </div>                     '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
}

function non_users()
{
	echo  '<div class="non_users"><a href="index.php?option=courses&view=courses">	Users Without Credentials</div> </a>';
	$non_users=1;
	
}

?>