<style>
	.success{
		color:blue;
	}
</style>
<?php  session_start(); ?>
<?php
		//session_start();
		if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
		 //require_once('common.php');
		 require_once('config.php');
		// $select="SELECT * FROM `blog`";
		$admin = "admin";
		$select="SELECT cb_blog.*,cb_categories.category FROM cb_blog JOIN cb_categories ON cb_categories.id=cb_blog.category_id WHERE `blog_by`='".$admin."'";
		 //" AND "SELECT cb_blog.*,cb_users.name FROM cb_blog JOIN cb_users ON cb_users.id=cb_blog.user
		 $query=mysqli_query($conn,$select);
		 //this query is for user display in table
		 $select1="SELECT cb_blog.*,cb_users.name FROM cb_blog JOIN cb_users ON cb_users.id=cb_blog.user";
		 $query1=mysqli_query($conn,$select1);
		 $res1=mysqli_fetch_assoc($query1);
 ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Datatable - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="assets/js/sweetalert.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="login.php"><strong style="font-size:32px;"> ADMIN </strong></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Category
                                       
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="add_category.php">Add</a></li>
                                    <li><a href="view_category.php">View</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Blog</span></a>
                                <ul class="collapse">
                                    <li><a href="add_blog.php">Add</a></li>
                                    <li><a href="view_blog.php">View</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>User</span></a>
                                <ul class="collapse">
                                    <li><a href="add_users.php">Add</a></li>
                                    <li><a href="view_users.php">View</a></li>
                                 </ul>
                            <li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
									<li class="settings-btn">
									<i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <!--<a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>-->
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<!-- </div>-->
	    <!--div>-->	
		<!-- main content area end -->
			 <?php if(isset($_GET['success_msg']) && $_GET['success_msg']==2 ){?>
		<!--<p class="success">User Deleted Successfully!!</p>-->
		<script>
		swal({
			text: "Blog Deleted Successfully!",
			icon: "warning",
			buttons: true,
				})
		</script>
		<?php }
		if(isset($_GET['success_msg']) && $_GET['success_msg']==1 ){?>
		<!--<p class="success">User Inserted Successfully!!</p>-->
		<script>
		swal({
			text: "Inserted Category Successfully!",
			icon: "success",
			buttons: true,
				})
		</script>
		<?php }
		if(isset($_GET['success_msg']) && $_GET['success_msg']==3 ){?>
		<!--<p class="success">User Updated Successfully!!</p>-->
		<script>
		swal({
			text: "Blog Updated Successfully!",
				})
		</script>
		<?php } ?>
            <!--<div class="main-content-inner">
                <div class="row">
                    data table start -->
					<p align="center" class="m-2">Welcome <?php echo $_SESSION['user_email'];?></p>
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Blog's Table</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>ID</th>
                                                <th>Category List</th>
												<th>User</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>image</th>
                                                <th>date</th>
												<th>Delete</th>
												<th>Edit</th>
                                            </tr>
                                        </thead>
										
                                        <tbody>
                                            
                                            <?php
						$i=1;
						while($res=mysqli_fetch_assoc($query)) { ?>
						<tr>
							<td><?php  echo $i++ ;?></td>
							<td><?php  echo ucwords($res['category']); ?></td>
							<td><?php  echo $res1['name']; ?></td>
							<td><?php  echo $res['title']; ?></td>
							<td><?php  echo $res['description']; ?></td>
							<td><img src="uploads/<?php echo $res['image'];?>" height="200" width="200" alt="img"></td>
							<td><?php  echo $res['date']; ?></td>
							<td><a href="delete_blog.php?user_id=<?php echo $res['id'];?>&&image=<?php echo $res['image'];?>"><i class="ti-trash"></i></a> </td>
							<td><a href="edit_blog.php?user_id=<?php echo $res['id'];?>"><i class="fa fa-edit"></i></a></td>
						</tr>	
					<?php }
					?> 
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end 
                </div>
            </div>-->
        </div>
		<!-- footer area start-->
       <!-- <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>-->
        <!-- footer area end-->
    <!-- page container area end -->
	</div>	
        <!-- main content area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
<?php }else{?>
	<h3><a href="login.php">Please Login To Access This Page</a></h3>
<?php } ?>	


