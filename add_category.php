<?php  session_start(); ?>
<?php
		//session_start();
		if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
		 require_once('common.php');
 ?>
 <p align="center" class="m-2">Welcome <?php echo $_SESSION['user_email'];?></p>
	<form action="insert.php" method="post" id="submit">
	<div class="col-12 mt-5">
	 <h2 class="header-title">Category name</h2>
      <input class="form-control" type="text" name="category" placeholder="Category" id="text_input" required>
	  <p id="err_msg" class="text-danger"></p>
	   <button type="submit"  value="register" class="btn btn-primary mt-3">Submit</button>
	</div>
	<script src="assets/js/jquery.min"></script>
<script>
	$(document).ready(function(){
		$("#submit").submit(function(){
			var name=$("#text_input").val();
			var flag=true;
			//alert(name);
			$.ajax({
				url:"search_data.php",
				data:"name="+name,/// "key"=+value, pair
				method:"post",
				datatype:"json",
				async:false,
				success:function(response){
					if (response == true) {
						//alert(13);
						$('#err_msg').text("Category exist! Try another");
						$('#text_input').val("");
						flag=false;
						//alert(flag);
					} 
				}
			});
			//alert(flag);
			return flag;
		});
	});
</script>
	</form>
<!-- this closed div are from common.php page-->
<!--</div>  this div is from page-container on common.php-->
</div>
<?php
	require_once('footer.php');
	?>
<?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>
		