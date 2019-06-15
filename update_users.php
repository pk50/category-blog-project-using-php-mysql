<?php
require_once('config.php');
$fname=$_POST['fname'];
$email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$country=$_POST['country'];
$id=$_POST['user_id'];
//$role = 2;
 //echo 
$update="UPDATE `cb_users` set `name`='".$fname."',`email`='".$email."',`password`='".base64_encode($password)."',`contact`='".$contact."',`counrty`='".$country."' where `id`=$id";;
//die;
mysqli_query($conn,$update);
header('Location:view_users.php?success_msg=3');
?>