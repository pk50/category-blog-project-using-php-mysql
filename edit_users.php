	<?php session_start(); ?>
	<?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
		require_once('common.php'); 
		require_once('config.php');
		$id=$_GET['user_id'];
		$select="SELECT * FROM `cb_users` where id=$id";
		$query=mysqli_query($conn,$select);
		$res=mysqli_fetch_object($query);
	?>
	 
	<p align="center" class="m-2">Welcome <?php echo $_SESSION['user_email'];?></p>
	<form action="update_users.php" method="post" id="submit" enctype="multipart/form-data">
	<div class="col-12 mt-5">
        <div class="card-body">
         <!--<h3 class="header-title"><code> USERS </code> </h3>-->
         <div class="form-group">
         <label for="example-text-input" class="col-form-label">Name</label>
         <input class="form-control" type="text" name="fname" value="<?php echo $res->name;?>" id="example-text-input" placeholder="Ex:Pawan Dubey" required>
         </div>
                          
        <div class="form-group">
        <label for="example-email-input" class="col-form-label">Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo $res->email;?>" id="example-email-input" placeholder="Ex:xyz@gmail.com" required>
        </div>
                                        
        <div class="form-group">
        <label for="inputPassword" class="">Password</label>
        <input type="password" class="form-control" name="password" id="inputPassword" value="<?php echo $res->password;?>" placeholder="Password">
        </div>
        <div class="form-group">
         <label for="example-number-input" class="col-form-label">Contact</label>
        <input class="form-control" type="number" name="contact" value="<?php echo $res->contact;?>" id="example-number-input" placeholder="Ex:9876543210" required>
        </div>
		<div class="form-group">
        <label for="example-text-input" class="col-form-label">Country</label>
		<input class="form-control" type="text" name="country" value="<?php echo $res->counrty;?>" id="example-text-input" placeholder="Ex:India" required>
        </div>
		<div>
		<!--<input type="hidden">-->
		</div>			
		<input  type="hidden" name="user_id" value="<?php echo $res->id; ?>">				
		<button type="submit" value="register" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>                        
		</div>
			</div>					
				</form>
					</div>
					
	<?php
	require_once('footer.php');
	?>
	<?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
	<?php } ?>