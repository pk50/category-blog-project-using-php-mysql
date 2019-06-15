<?php  session_start(); ?>
<?php
		//session_start();
		if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
		 require_once('common.php');
 ?>
<p align="center" class="m-5">Welcome <?php echo $_SESSION['user_email'];?></p>
</div>
</div>
<?php
	require_once('footer.php');
	?>
<?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>
	