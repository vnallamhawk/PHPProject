<?php
defined("true-access") or die("No script kiddies please!");

/*
* common layout used in all pages
*/

function startOfPage()
{
	echo '<!doctype html> '.PHP_EOL;
	echo '<html>          '.PHP_EOL;
	echo '<head>         '.PHP_EOL;
	echo '<body>          '.PHP_EOL;
}

function endOfPage()
{
	echo '</body> '.PHP_EOL;
	echo '</html> '.PHP_EOL;
}

function siteTitle($content)
{
	echo "<h1><a style='color:red' href='index.php'>".$content."<a></h1>".PHP_EOL;
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

function users_renderLoginForm()
{
	if (!users_loggedIn()) {
		echo '<form action="index.php?option=courses&view=login" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/>'.PHP_EOL;
		echo '	<input type="submit" value="Login"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
	else
	{
		p("Welcome user!");
		echo "check Rakesh";
		echo '<form action="index.php?option=courses&view=logout" method="post">                          '.PHP_EOL;
		echo '	<input type="submit" value="Logout"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
}


?>