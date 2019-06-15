<?php  session_start();
		if(isset($_SESSION['my_user_id']) && $_SESSION['my_user_id']!=""){
		 require_once('common.php'); 
			require_once('config.php');
			$id=$_GET['user_id'];
			$select="SELECT * FROM `cb_blog` where id=$id";
			$query=mysqli_query($conn,$select);
			$res=mysqli_fetch_object($query);
			///// category////
			$select1="SELECT * FROM `cb_categories`";
			$query1=mysqli_query($conn,$select1);
			////users////
			$select2="SELECT * FROM `cb_users`";
			$query2=mysqli_query($conn,$select2);
	    ?>
 <p align="center" class="m-2">Welcome <?php echo $_SESSION['my_user_name'];?></p>
	<form action="updateuser_blog.php" method="post" id="submit" enctype="multipart/form-data">
	<div class="col-12 mt-5">
			<div class="card-body">
				<div class="form-group">
					<label class="col-form-label">Select category</label>
					<select class="form-control" name="category">
					<?php while ($res2=mysqli_fetch_object($query1)){ ?>
						<option <?php if($res2->id==$res->category_id){echo "selected ";} ?> value="<?php echo $res2->id;?>"><?php echo $res2->category;?></option>
					<?php } ?>
					</select>
				</div>
					<div class="form-group">
					<label class="col-form-label">User</label>
					<input class="form-control" type="text" id="input_product" name="user" value="<?php echo $_SESSION['my_user_name'];?>">
					</div>
				
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Title</label>
						<input class="form-control" type="text"  value="<?php echo $res->title;?>" id="input_product" name="title" required>
					</div>
					<div class="form-group">
						<label for="example-text-input" class="col-form-label">Description</label>
						<div class="input-group mb-3">
								<textarea class="form-control" name="description" aria-label="With textarea" Placeholder="Content..(Max 255 words)" required><?php echo $res->description;?></textarea>
							</div>
					</div><br>	
						<div class="form-group mx-1">
						<label>File:</label>
						<input type="file" name="image">
						</div> 
							<div class="form-group">
                              <label for="example-date-input" class="col-form-label">Date</label>
                               <input class="form-control" type="date" name="dmy" value="<?php echo $res->date;?>" id="example-date-input" required>
                            </div><br>
						<div class="text-right">
							<input type="hidden"  value="<?php echo $res->image;?>" name="old_img">
							<input  type="hidden" name="user_id" value="<?php echo $res->id; ?>"><br><br>
							<button type="submit"  value="register"	class="btn btn-primary btn-lg mb-3">SUBMIT</button>
						</div>
			</div>		
	</div>
	</form>
<?php
	require_once('footer.php');
 ?>
 <?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>