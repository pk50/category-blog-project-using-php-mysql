<?php 
	$id=$_GET['user_id'];
	$image=$_GET['image'];
	require_once("config.php");
	unlink('uploads/'.$image);
	//echo
	$delete="DELETE FROM `cb_blog` where `id`=$id";
	//die;
	mysqli_query($conn,$delete);
	header("Location:view_blog.php?success_msg=2");
?>