 <?php 
	require_once('config.php');
	$id = $_POST['id'];
	$select = "SELECT * FROM cb_blog WHERE `id`=".$id;
	$query = mysqli_query($conn,$select);
	$response = [];
	while($res = mysqli_fetch_assoc($query)){
		$response[]=$res;
	}
	echo json_encode($response);
 
 ?>