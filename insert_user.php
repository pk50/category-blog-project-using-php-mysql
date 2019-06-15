<?php
require_once('config.php');
$fname=$_POST['fname'];
$e_mail=$_POST['e_mail'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$country=$_POST['country'];
$role = 2;
$insert="INSERT INTO `cb_users` (`name`,`email`,`password`,`contact`,`counrty`,`role`)VALUES('".$fname."','".$e_mail."','".base64_encode($password)."','".$contact."','".$country."','".$role."')";
//die;
	mysqli_query($conn,$insert);
	if(isset($_POST['sign']))
	{
	header('Location:../index.php?success_msg=5');
}
else
{
header('Location:view_users.php?success_msg=6');
}
?>
