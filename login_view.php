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
  		<script src="assets/js/jquery.min.js" type="javascript/text"></script>
		<script src="assets/js/popper.min.js" type="javascript/text"></script>
  		<script src="assets/js/bootstrap.min.js" type="javascript/text"></script>
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
				<a  class="position-absolute welcome_user text-white bg-primary p-2">Welcome  <?php echo strtoupper($_SESSION['my_user_name']);?></a>
				<div class="dropdown">
					<a class="btn btn-info dropdown-toggle position-absolute cat" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Category's
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item text-danger" href="womens_fashion.php">Women's fashion</a>
						<a class="dropdown-item" href="mens_fashion.php">Men's fashion</a>
						<a class="dropdown-item" href="sports_fitness.php">Sports & Fitness</a>
						<a class="dropdown-item" href="electronics.php">Electronics</a>
						<a class="dropdown-item" href="health.php">Health & Household's</a>
						<a class="dropdown-item" href="books.php">Books & Stationary</a>
						<a class="dropdown-item" href="beauty_groom.php">Beauty & Grooming</a>
						<a class="dropdown-item" href="automobile.php">Automobile</a>
						<a class="dropdown-item" href="bags.php">Bags & Luggage</a>
						<a class="dropdown-item" href="computer.php">Computer's</a>
					</div>
				</div>
				
				<a  class="position-absolute out"><button class="btn btn-danger" data-toggle="modal" data-target="#stop">Log out</button></a>
			<div class="carousel-item active">
				<img class="w-100" src="assets/images/laptop.jpg" alt="First slide" height="500" width="400">
				<div class="carousel-caption">
					<h5>Macbook</h5>
					
				</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/mobile.jpg" alt="Second slide" height="500" width="400">
				<div class="carousel-caption">
					<h5>Xiomi </h5>
					
				</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/headphones.jpg" alt="Third slide" height="500" width="400">
					<div class="carousel-caption">
						<h5>Sony</h5>
						
					</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/shop.jpg" alt="Fourth slide" height="500" width="400">
				<div class="carousel-caption">
					<h5>Zara</h5>
					
				</div>
			</div>
			<div class="carousel-item">
				<img class="w-100" src="assets/images/books.jpg" alt="Fifth slide" height="500" width="400">
					<div class="carousel-caption">
						<h5>Marvel </h5>
						
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
  $admin="admin";
  $select ="SELECT * FROM cb_blog WHERE `blog_by`='".$admin."'";			
  $query = mysqli_query($conn,$select);
 ?>
 <!--//PHP -->
		<div class="container-fluid p-5">
			<h3 class="text-center"> Blog's Category</h3>
			<div class="container-fluid pl-md-5 ml-md-4  mt-5 row">
				<?php while($res = mysqli_fetch_assoc($query)){ ?>
					<div class="card col-md-3 mx-md-4 ml-md-1 my-2" >
						<img src="admin/uploads/<?php echo $res['image']; ?>" class="card-img-top" height="170px" width="100%" alt="...">
					<div class="card-body" data-toggle="modal" data-target="#pop">
							<button class="float-right btn-info badge-pill view" uid="<?php echo $res['id']; ?>">view</button>
						</div>
						<div class="card-footer">
							<small class="text-muted">Last updated date <?php echo date("d:m:Y"); ?></small>
						</div>
					</div>
				<?php } ?>
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
				<img src="" class="align-self-center mr-3 " id="img_d" height="250" width="250" alt="...">
				<div class="media-body my-5 ">
					<!--<h3 id="user_d">user</h3>-->
					<h3 id="title_d">title</h3>
					<h3 id="cat_d">Category</h3>
					<h3 id="des_d">description</h3>
				</div>
			</div>
		</div>
    </div>
	</div>
</div>				
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
					
					<!-- ////-->
		<!-------- logout modal ------->
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
				<label for="example-email-input" class="col-form-label">  This action will take you to home screen</label>
			</div>
			
				<div class="modal-footer logout">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" value="register" class="btn btn-primary">LOG OUT</button> 
				</div>
		</form>
	  </div>
    </div>
  </div>
</div>
				<!-- // logout modal -->

				
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			//$("#err").html("dsjflsdf");
			$('.view').click(function(){
				var id = $(this).attr("uid");
				//alert(id);
				$.ajax({
					url:"fetch_data.php",
					data:{id:id},
					method:"post",
					dataType:"json",
					success:function(res){
											
						$.each(res, function(key, value){
							$("#img_d").attr("src","admin/uploads/"+value.image);
							$("#user_d").html(value.user);
							$("#title_d").html(value.title);
							$("#cat_d").html(value.category);
							$("#des_d").html(value.description);
						});
					}
					
				});
				
			});
			
		});	
	</script>
  </body>
</html>
		<?php } 
		else{ 
	header ('Location:index.php');
		}?>