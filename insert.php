<?php
require_once('config.php');
$category=$_POST['category'];
$insert='INSERT INTO `cb_categories` (`category`) VALUES("'.$category.'")';
$run= mysqli_query($conn,$insert);
header('Location:view_category.php?success_msg=1');
?>
