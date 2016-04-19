<?php
define('true-access',true);
include("common/layout.php");
include("session.php");
pageheader("CHICAGO BLOGGERS");
ob_start();
//checking if the title path has been set
if(isset($_GET["title_path"]))
{
$data_file_path=$_GET["title_path"];
//storing the value from get request
 $i=$_GET["count"];
 //calling the methods for displaying the content and image
 content_display($data_file_path);
 image_display($i);
 }

 //for displaying the text content of the blog
function content_display($data_file_path)
{
 $content = file_get_contents($data_file_path);
 //using explode to separate the title and blog
 $blog_content = explode("+", "<br>$content");
 //printing the title and blog
foreach($blog_content as $content)
{
echo "<div>$content</div>";
}
}

//creating a function for displaying the image
function image_display($i)
{
//we are using the same logic used in users page for fetching the content
          $dir = "blogs/blog$i/";
          $www_root = 'http://localhost/assignment2/blogs/blog'.$i;
       $dir_contents = scandir( $dir );
       $dir_new = array_diff($dir_contents, array('.', '..'));
	   $file_display = array('jpg', 'jpeg', 'png', 'gif');
        foreach ( $dir_new as $file ) 
        {        
           $file_type_separator = explode('.', $file );
           $file_type=end($file_type_separator);
               $data_image_path="blogEntries".$i.".$file_type";
			   }
			$image_check=$www_root."/". $data_image_path;
			$data_image_check="blogs/blog$i/".$data_image_path;
           if ((file_exists($data_image_check)  ) && in_array( $file_type, $file_display)  )
           {
               echo '<img class="blog_image" src="', $www_root, '/', $data_image_path , '" />';
              }
			  
}
footer($hits);
endOfPage();	
ob_end_flush();
?>