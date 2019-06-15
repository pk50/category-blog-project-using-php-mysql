<?php 
 require_once('config.php');
 $email = $_POST['email'];
 $select = "SELECT * FROM users WHERE `email`='".$email."'";
 $query = mysqli_query($conn,$select);
 if(mysqli_num_rows($query) > 0){
	 echo 1;
 }
 else{
	 echo 0;
 }
?>