 <?php 
	require_once('config.php');
	$id = $_POST['id'];
	//$select = "SELECT * FROM cb_blog WHERE `id`=".$id;
	//$select = "SELECT categories.category,blog.* FROM categories INNER JOIN blog ON blog.category_id=categories.id WHERE `id`=".$id;
	//SELECT categories.category,blog.* FROM categories INNER JOIN blog ON blog.category_id=categories.id	
	$select = "SELECT `cb_blog`.*,`cb_categories`.`category` FROM `cb_blog` JOIN `cb_categories` ON `cb_blog`.`category_id`=`cb_categories`.`id` WHERE `cb_blog`.`id`='".$id."'";
	$query = mysqli_query($conn,$select);
	$response = [];
	while($res = mysqli_fetch_assoc($query)){
		$response[]=$res;
	}
	echo json_encode($response);
 
 ?>