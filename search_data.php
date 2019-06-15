<?php
	require_once('config.php'); 
	$name=$_POST['name'];
	$select="SELECT * FROM `cb_categories` where `category`='".$name."'";
	$query=mysqli_query($conn,$select);
	/*$response=Array();
	while($res=mysqli_fetch_assoc($query)){
		$response[]=$res;
	}
	echo json_encode($response);*/
	if(mysqli_num_rows($query)>0){
		echo true;
	}else{
		echo false;
	}
?>