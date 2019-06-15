<?php session_start(); ?>
<?php
		//session_start();
		if(isset($_SESSION['my_user_id']) && $_SESSION['my_user_id']!=""){
		 require_once('common.php'); ?>
		<?php require_once('config.php');
			$select="SELECT * FROM `cb_categories`";
			$query=mysqli_query($conn,$select);
			$select1="SELECT * FROM `cb_users`";
			$query1=mysqli_query($conn,$select1);
	    ?>
 <p align="center" class="m-2">Welcome <?php echo $_SESSION['my_user_name'];?></p>
	<form action="insertuser_blog.php" method="post" id="submit" enctype="multipart/form-data">
	<div class="col-12 mt-5">
			<div class="card-body">
				<div class="form-group">
					<label class="col-form-label">Select category</label>
					<select class="form-control" name="category">
					<?php while ($res=mysqli_fetch_assoc($query)){ ?>
					<option value="<?php echo $res['id'];?>" readonly><?php echo $res['category'];?></option>
					<?php } ?>
					</select>
					<input type="hidden" value="user" name="user_sep">
				</div>
					<div class="form-group">
					<label class="col-form-label">User</label>
					<input class="form-control" type="text" id="input_product" name="user" value="<?php echo $_SESSION['my_user_name'];?>" readonly>
					</div>
				<!--</div>-->
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Title</label>
						<input class="form-control" type="text" id="input_product" name="title" required>
						<p id="error_msg" class="text-danger"></p>
					</div>
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Description</label>
						<div class="input-group mb-3">
								<textarea class="form-control" name="description" aria-label="With textarea" Placeholder="Content..(Max 255 words)" required></textarea>
							</div>
						<!--<input class="form-control col-md-2" type="text" name="price" required>-->
					</div><br>
						<!--<div class="form-group">
							<label for="example-text-input" class="col-form-label">Description </label
							<div class="input-group mb-3">
								<textarea class="form-control" name="description" aria-label="With textarea" Placeholder="Content..(Max 255 words)" required></textarea>
							</div>
						</div>-->	
						<div class="form-group mx-1">
						<label>File:</label>
						<input type="file" name="image" required>
						</div> 
							<div class="form-group">
                              <label for="example-date-input" class="col-form-label">Date</label>
                               <input class="form-control" type="date" name="dmy" value="2018-03-05" id="example-date-input" required>
                            </div><br>
						<div class="text-right">
							<button type="submit"  value="register"	class="btn btn-primary btn-lg mb-3">SUBMIT</button>
						</div>
			</div>		
	</div>
	</form>
<?php
	require_once('footer.php');
 ?>
 <?php }else{?>
	<h3><a href="index.php">Please Login To Access This Page</a></h3>
<?php } ?>