
<?php 
	$id=$_GET['user_id'];
	require_once("config.php");
	//echo
	$delete="DELETE FROM `cb_users` where `id`=$id";
	//die;
	mysqli_query($conn,$delete);
	header("Location:view_users.php?success_msg=2");
?>