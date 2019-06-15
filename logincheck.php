
<?php
require_once('config.php');
$email=$_POST['e_mail'];
$password=$_POST['password']; 
$select = "SELECT * FROM cb_users WHERE `email`='".$email."' AND `password`='".base64_encode($password)."'";
$query = mysqli_query($conn,$select);

if(mysqli_num_rows($query) > 0){
	while($res=mysqli_fetch_assoc($query)){
	session_start();
	$_SESSION['my_user_id'] = $res['id'];
	$_SESSION['my_user_email'] = $res['email'];
	$_SESSION['my_user_name'] = $res['name'];
	//print_r($_SESSION);
	$_SESSION ['my_password'] = $res['password'];
	header('Location:login_view.php?success_msg=11');
 }
}else{
	header('Location:index.php?success_msg=10');
}
?>