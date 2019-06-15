<?php 
		session_start();
		require_once('config.php');	
		if(isset($_SESSION['my_user_id']) && $_SESSION['my_user_id']!=""){
		?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Category Blog</title>
	<link href="Assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="Assets/css/style.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  		<script src="Assets/js/jquery.min.js"></script>
  		<script src="Assets/js/bootstrap.min.js"></script>
  </head>
   <body>
   <div class="container-fluid p-0 position-relative">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>       
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner">
				<!--<h3 class="position-absolute wel"> Welcome...<?php// $res echo ['name']; ?></h3>-->
				<a class="position-absolute books"><button class="btn btn-info" data-toggle="modal" data-target="#signup">Book's /Stationary</button></a>
				<a class="position-absolute out"><button class="btn btn-info" data-toggle="modal" data-target="#stop">Log Out</button></a>
			<div class="carousel-item active">
				<img class="w-100" src="assets/images/laptop.jpg" alt="First slide" height="500" width="400">
				<div class="carousel-caption">
					<h5>SLIDE 1</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/mobile.jpg" alt="Second slide" height="500" width="400">
				<div class="carousel-caption">
					<h5>SLIDE 2</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/headphones.jpg" alt="Third slide" height="500" width="400">
					<div class="carousel-caption">
						<h5>SLIDE 3</h5>
						<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/shop.jpg" alt="Fourth slide" height="500" width="400">
				<div class="carousel-caption">
					<h5>SLIDE 4</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/books.jpg" alt="Fifth slide" height="500" width="400">
					<div class="carousel-caption">
						<h5>SLIDE 5</h5>
						<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>	
 <!----- carousel end here -->
 <!-- blog start here-->
			<!--PHP -->
 <?php 
  require_once('config.php');
  $id=$_SESSION['my_user_id'];
  $select ="SELECT * FROM cb_blog WHERE category_id = 40 AND `users_id`='".$id."'";
  $query = mysqli_query($conn,$select);
 ?>
 <!--//PHP -->
		<div class="container-fluid p-5">
			<h3 class="text-center"> Blog's </h3>
			<div class="container-fluid pl-md-5 ml-md-4  mt-5 row">
	<!--			<div class="card-deck"> -->
				<?php while($res = mysqli_fetch_assoc($query)){ ?>
					<div class="card col-md-3 mx-md-4 ml-md-1 my-2" >
						<img src="uploads/<?php echo $res['image']; ?>" class="card-img-top" height="170px" width="100%" alt="...">
					<div class="card-body" data-toggle="modal" data-target="#pop">
							<button class="float-right btn-info badge-pill view" uid="<?php echo $res['id']; ?>">view</button>
						</div>
						<div class="card-footer">
							<small class="text-muted">Last updated date <?php echo date("d:m:Y"); ?></small>
						</div>
					</div>
				<?php } ?>
					<div class="card col-md-3 mx-md-4 ml-md-1 my-2 justify-content-center" >
					<a href="user_index.php">
							<img src="assets/images/add.png" alt="Avatar" class="image" height="250" width="250">
							<div class="overlay">
								<div class="text-right"><strong>Add Blog</strong></div>
					</a>
							</div>
					</div>
				
				<!--------       view of card ---------->
<div class="modal fade" id="pop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<div class="media">
				
				<!--<img src="" class="align-self-center mr-3 " id="img_d" height="250" width="250" alt="...">-->
				<img id="img_d" class="card-img-top col-8" height="250px" width="30px" alt="...">
				<div class="media-body my-5 col-4">
					<h3 id="title_d">title</h3>
					<p id="des_d">description</p>
				</div>
			</div>
		</div>
    </div>
	</div>
</div>
				<!-----       ------>
	<!----- contact --->
			<div class="container-fluid card mt-5 text-center">
				<p class="m-2"><small class="block">© All Rights Reserved.</small> <small class="block">Designed by <a target="_blank" rel="nofollow noopener" href="//freehtml5.co/">dubeypk50@gmail.com</a> Demo Images: Google</small></p>
				<div class="social-icons list-unstyled display-inline-block mb-3">
					<a href="#"><i class="fa fa-twitter mr-4"></i></a>
					<a href="#"><i class="fa fa-facebook mr-4"></i></a>
					<a href="#"><i class="fa fa-linkedin mr-4"></i></a>
					<a href="#"><i class="fa fa-dribbble mr-4"></i></a>
				</div>
			</div>
			<!-----             logout ---->
			<div class="modal fade" id="stop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="logout.php" method="post">                 
			<div class="form-group">
				<label for="example-email-input" class="col-form-label">  This action take you  to home screen</label>
			</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" value="register" class="btn btn-primary">LOG OUT</button> 
					<!--<button type="button" class="btn btn-primary">Save changes</button>-->
				</div>
		</form>
	  </div>
    </div>
  </div>
</div>			<!--------       view of card ---------->
 </body>
</html>
<?php }else{?>
	<h3><a href="index.php"> Login To Access This Page</a></h3>
<?php } ?>	