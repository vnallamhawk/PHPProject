<?php
echo '<link rel="stylesheet" href="css/style.css">';
//defining the true access function
if(!defined('true-access')) {
    die('Direct access not permitted');
}

//creating a pageheader for displaying the pageheader
function pageheader($header) {
	echo "<!doctype html>".PHP_EOL;
	echo "<html>".PHP_EOL;
	echo "<head>".PHP_EOL;
	if (isset($header))
	{
		echo "<div class='header'>$header</div>". PHP_EOL;
	}
	echo "</head>".PHP_EOL;
	echo "<body>".PHP_EOL;
}
//creating a footer layout
function footer($footer)
{	
	
	echo "<div class='footer'>Number of Hits:".$footer;
	echo '<form method="POST" action="#">';
	echo "<input type='hidden' name='reset' value='reset'>";	
	echo '<input id="reset" type="submit" name="submit" value="RESET">';
	echo '</form></div>';
	
}
//creating an endofpage layout
function endOfPage() {
	echo "</body>".PHP_EOL;
	echo "</html>".PHP_EOL;
}

?>