<?php
define('true-access',true);
define ("special_separator","jsadfljlfjk ");
include("common/layout.php");
include("session.php");
pageheader("CHICAGO BLOGGERS");
ob_start();

//scanning the blog directory	
$scan = scandir('blogs/');
//removing . and .. from the array
$files_blog = array_diff($scan, array('.', '..'));
//getting the count of files
$count_files=count($files_blog);
//if no files displaying error message
if($count_files==0)
{
echo "<h1>No blogs are present in the blog folder</h1>";
}

else
{
for($i=$count_files;$i>$count_files-5;$i--)
{
if($i==0)
{
//exiting the loop
break;
}
else
{
//getting the file path and the contents
$data_file_path="blogs/blog$i/blogEntries$i.blog";
 $dir = "blogs/blog$i/";
      
        $allBlogs = file_get_contents($data_file_path);
		//blog number we are displaying
        echo "<div class='user_content'> BLOG $i </div>";
		$title=explode ("+", $allBlogs);
		//printing title and blog
		echo "<div class='user_content'><a href='second.php?title_path=$data_file_path&count=$i'>$title[0]</a><br/>";
		echo $title[1];
        /* $data = str_replace("+","<br>BlogContent :",$allBlogs);
        echo $data; */
       
	   //getting the root directory for image
		 $www_root = 'http://localhost/assignment2/blogs/blog'.$i;
		 //scaning the dir path
       $dir_contents = scandir( $dir );
       $dir_new = array_diff($dir_contents, array('.', '..'));
	   //storing in a array the image extension
	   $file_display = array('jpg', 'jpeg', 'png', 'gif');
	   //iterating the loop for getting the extension
        foreach ( $dir_new as $file ) 
        {        
		//getting the extension of the image
           $file_type_separator = explode('.', $file );
           $file_type=end($file_type_separator);
               $data_image_path="blogEntries".$i.".$file_type";
			   }
			   //storing the image path
			$image_check=$www_root."/". $data_image_path;
			//storing the final image path
			$data_image_check="blogs/blog$i/".$data_image_path;
			//checking if the path exists with the file_display extention and displaying the image
           if ((file_exists($data_image_check)  ) && in_array( $file_type, $file_display)  )
           {
               echo '<img src="', $www_root, '/', $data_image_path , '" /></div>';
              }
} 
}	
}
//calling the footer
footer($hits);
endOfPage();
ob_end_flush();
?>