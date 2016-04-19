<?php

//include_once("lib/courses.php");
include_once(dirname(__FILE__) .DIRECTORY_SEPARATOR ."../../../lib/common.php");


startofPage();
startContent();
echo "<h1> My Courses </h1>";	
//registered courses list
function view()
{
course_registered();
endContent();
endofPage();
} 





?>