<?php 
	$id=$_GET['user_id'];
	require_once("config.php");
	$delete="DELETE FROM `cb_categories` where `id`=$id";
	mysqli_query($conn,$delete);
	header("Location:view_category.php?success_msg=2");
?>