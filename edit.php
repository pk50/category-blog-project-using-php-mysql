<?php  session_start(); ?>
<?php
		//session_start();
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	require_once('common.php');
	require_once('config.php');
	$id=$_GET['user_id'];
	$select="SELECT * FROM `cb_categories` where id=$id";
	$query=mysqli_query($conn,$select);
	$res=mysqli_fetch_object($query);
?>
	<p align="center" class="m-2">Welcome <?php echo $_SESSION['user_email'];?></p>
	<form action="update.php" method="post">
	 <div class="col-12 mt-5">
	  <h2 class="header-title">Category name</h2>
       <input class="form-control" type="text" name="category" placeholder="Category"  value="<?php echo $res->category;?>" id="text_input" required>
        <input  type="hidden" name="user_id" value="<?php echo $res->id; ?>">
	    <button href="javascript:void(0)" type="submit" value="register" class="btn btn-primary mt-3">Submit</button>
	 
	 </div>
	 
		
	</form>
	<!-- this closed div are from common.php page-->
</div>
</div>
<?php
	require_once('footer.php');
	?>
<?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>