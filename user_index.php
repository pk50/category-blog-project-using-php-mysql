<?php  session_start(); ?>
<?php
		if(isset($_SESSION['my_user_id']) && $_SESSION['my_user_id']!=""){
		 require_once('common.php');
 ?>
<p align="center" class="m-5">Welcome <?php echo $_SESSION['my_user_name']?></p>
</div>
</div>
<?php
	require_once('footer.php');
	?>
<?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>
	