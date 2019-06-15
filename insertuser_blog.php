<?php
session_start();
require_once('config.php');
$category=$_POST['category'];
$user=$_POST['user'];
$title=$_POST['title'];
$user_sep = $_POST['user_sep'];
$description=$_POST['description'];
$user_id = $_SESSION['my_user_id'];
$file=$_FILES['image']['name'];
$array_ext=explode(".",$file);
$ext=$array_ext[count($array_ext)-1];
$fname=Date('Ymdhis');
$file_name=$fname.".".$ext;
$source=$_FILES['image']['tmp_name'];
$destination="uploads/".$file_name;
move_uploaded_file($source,$destination);
$date=$_POST['dmy'];
 //echo 
 $insert="INSERT INTO `cb_blog` (`category_id`,`user`,`users_id`,`title`,`description`,`image`,`date`,`blog_by`)VALUES('".$category."','".$user."','".$user_id."','".$title."','".$description."','".$file_name."','".$date."','".$user_sep."')";
//die;
 mysqli_query($conn,$insert);
header('Location:viewuser_blog.php?success_msg=1');
?>