<?php
	require_once('config.php');
	$file=$_FILES['image']['name'];
	if($file.strlen()>0){
	$array_ext=explode(".",$file);
	//print_r($array_ext);
	$ext=$array_ext[count($array_ext)-1];
	$fname=Date('Ymdhis');
	$file_name=$fname.".".$ext;
	$source=$_FILES['image']['tmp_name'];
	$destination="uploads/".$file_name;
	move_uploaded_file($source,$destination);
}
	else{
	$file_name=$_POST['old_img'];
		}
	$category=$_POST['category'];
	$user=$_POST['user'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$date=$_POST['dmy'];
	//$file=$_FILES['image']['name'];
	$id=$_POST['user_id'];
	
	$update="UPDATE `cb_blog` set `category_id`='".$category."',`user`='".$user."',`title`='".$title."',`description`='".$description."',`image`='".$file_name."',`date`='".$date."' where id=$id";
	mysqli_query($conn, $update);
	header('Location:viewuser_blog.php?success_msg=3');
?>