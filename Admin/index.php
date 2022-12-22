<?php 
  session_start(); 
  if (!isset($_SESSION['alogin'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: alogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['alogin']);
  	header("location: alogin.php");
  }
?>
<?php include("includes/config.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Art Gallery -Admin </title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- FontAwesome Styles-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Morris Chart Styles-->
  
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><strong> ART- GALLERY</strong></a>
				
		<div id="sideNav" href="">
		<i class="fa fa-bars icon"></i> 
		</div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown" style="margin-right:100px">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="change-password.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="addcategory.php"><i class="fa fa-desktop"></i>Art Category</a>
                    </li> 
					 
					 <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Artworks<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="artdetails.php">Art Details</a>
                            </li>
                            <li>
                                <a href="cartdetails.php">Cart Details</a>
                            </li>
							<li>
                                <a href="orderdetails.php">Order Details</a>
                            </li>
							</ul>
						</li>	
							
                    <li>
                        <a href="artistdetails.php"><i class="fa fa-qrcode"></i>Artist</a>
                    </li>
                    
                    <li>
                        <a href="member.php"><i class="fa fa-table"></i> Art Members</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-sitemap"></i> Exhibition<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addexhibition.php">Add Exhibition</a>
                            </li>
                            <li>
                                <a href="exhibitiondetails.php">Manage Exhibition</a>
                            </li>
                           
                      </ul>

                            </li>

                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
		                          <?php 
									$query=mysqli_query($con,"select admin_name from admin");
									while($row=mysqli_fetch_array($query))
									{
										?>	
                        <h1 class="page-header">
                            Dashboard <small>Welcome <?php echo htmlentities($row['admin_name']);?> !!</small>
                        </h1>
									<?php } ?>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li class="active"><a href="#">Dashboard</a></li>
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
	
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
							<?php
							$rt = mysqli_query($con,"SELECT * FROM member");
							$num1 = mysqli_num_rows($rt);
							{?>
								<h3><?php echo htmlentities($num1); ?></h3>
								<small>Art Members</small>
							<?php } ?>
							</h3> 
						</div>
						<div class="icon">
						   <i class="fa fa-user fa-5x red"></i>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
							<?php
							$rt = mysqli_query($con,"SELECT * FROM art");
							$num1 = mysqli_num_rows($rt);
							{?>
								<h3><?php echo htmlentities($num1); ?></h3>
								<small>Total Artworks</small>
							<?php } ?>
							</h3> 
						</div>
						<div class="icon">
						   <i class="fa fa-opencart fa-5x blue"></i>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
							<?php
							$rt = mysqli_query($con,"SELECT * FROM artist");
							$num1 = mysqli_num_rows($rt);
							{?>
								<h3><?php echo htmlentities($num1); ?></h3>
								<small>Artist</small>
							<?php } ?>
							</h3> 
						</div>
						<div class="icon">
						   <i class="fa fa-users fa-5x green"></i>
						</div>
		 
                        </div>
						</div>
                    </div>
					
					       <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="board">
                        <div class="panel panel-primary">
						<div class="number">
							<h3>
							<?php
							$date=date("Y-m-d");
							$rt = mysqli_query($con,"SELECT * FROM art where uploaded_on='$date'");
							$num1 = mysqli_num_rows($rt);
							{?>
								<h3><?php echo htmlentities($num1); ?></h3>
								<small>New Arts</small>
							<?php } ?>
							</h3> 
						</div>
						<div class="icon">
						   <i class="fa fa-opencart fa-5x yellow"></i>
						</div>
		 
                        </div>
						</div>
                    </div>
				   
                </div>
				     
			
		
				<div class="row" style="display:none">
				<div class="col-md-5">
						<div class="panel panel-default">
						<div class="panel-heading">
							Line Chart
						</div>
						<div class="panel-body">
							<div id="morris-line-chart"></div>
						</div>						
					</div>   
					</div>		
					
						<div class="col-md-7">
					<div class="panel panel-default">
					<div class="panel-heading">
                                Bar Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
						
					</div>  
					</div>
					
				</div> 
			 
				
				
                <div class="row" style="display:none">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">                            
							<div class="panel-heading">
							Area Chart
						</div>
						<div class="panel-body">
							<div id="morris-area-chart"></div>
						</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Donut Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
				
			
		
				
				
        
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="assets/js/chartjs.js"></script> 

</body>

</html>