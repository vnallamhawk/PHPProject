<?php
define("true-access",true);
define ("special_separator"," ");
include("common/layout.php");
pageheader("CHICAGO BLOGGERS");
session_start();
//scanning the blogs folder
$dir = scandir('blogs/');
//removing the initial . and .. operators
$files = array_diff($dir, array('.', '..'));
//storing the count of the files 
$count_files=count($files);
//validating whether the user has entered title and blog and clicked on submit
if (!empty($_POST ['submit']) && !empty($_POST ['title']) && !empty($_POST ['blog']))
{
//declaring the count files
$count=$count_files+1;
//we are making the directory here
mkdir("blogs/blog$count/", 0700);
	$data_file_path="blogs\blog$count\blogEntries$count.blog";
	//calling the append_data function
	append_data();
	//if user has uploaded any image we are calling image_append function
	 if(!empty($_FILES['file']['name']))
	{
	//calling the image function
image_append();

}
echo "<h1>Blog Entry has been uploaded</h1>";
}

else
{
die("Please Enter Blog Title or Blog Content");
}
function append_data()
{
//storing the value of title and blog in a new
	$title=$_POST['title'];
	$blog=$_POST['blog'];
	$new=$title."+".$blog;	
	//accessing the global $data_file_path
	global $file_path,$data_file_path;
	$file_path=$data_file_path;
	//putting the file contents in the path
	file_put_contents($file_path,
	//for avoiding injection
	htmlspecialchars($new),
	FILE_APPEND | LOCK_EX);
}

function image_append()
{
//declaring the count as global
global $count;
//getting the pathinfo and the extension
$img=pathinfo($_FILES["file"]["name"]);
$ext=$img['extension'];
//storing the path	
$img_newname= "blogEntries".$count.".".$ext;
//moving the uploaded file to the required location
move_uploaded_file($_FILES["file"]["tmp_name"],"blogs/blog$count/".$img_newname);
}
endOfPage();
?> 