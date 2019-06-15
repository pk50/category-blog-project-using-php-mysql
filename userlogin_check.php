<?php
	require_once('config.php');
	$email=$_POST['email'];
	$password=$_POST['password']; 
	$select="SELECT * FROM `cb_users` WHERE `email`='".$email."' AND `password`='".base64_encode($password)."' AND `role`='1'";
	$query=mysqli_query($conn,$select);                                                                         ////`password`='".base64_encode($password)."'
	//echo mysqli_num_rows($query);
	if(mysqli_num_rows($query)>0){
		while($res=mysqli_fetch_assoc($query)){
			session_start();
			 $_SESSION['user_id']=$res['id'];
			 $_SESSION['user_email']=$res['email'];
			//print_r($_SESSION);
			//$_SESSION['id']=$res['user_id'];
			//$_SESSION['user_name']=$res['e_mail'];
			header("Location:logged_in page.php");
		}
	}else{
		header("Location:login.php?login_error=20");
	}
?>
<?php require_once('footer.php'); ?>
<!-- $select="SELECT * FROM `users` where `e_mail`='".$email."' AND `password`='".base64_encode($password)."'";