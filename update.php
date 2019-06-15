<?php
	require_once('config.php');
	$category=$_POST['category'];
	$id=$_POST['user_id'];
	$update="UPDATE `cb_categories` set `category`='".$category."' where id=$id";
	mysqli_query($conn, $update);
	header('Location:view_category.php?success_msg=3');
?>