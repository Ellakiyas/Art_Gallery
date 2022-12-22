<?php include ("./includes/config.php"); ?>
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
                        <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="addcategory.php"><i class="fa fa-desktop"></i>Art Category</a>
                    </li> 
					 
					 <li>
                        <a href="#" class="active-menu"><i class="fa fa-sitemap"></i> Artworks<span class="fa arrow"></span></a>
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
      

        <div id="page-wrapper" >
		<div class="header"> 
                        <h1 class="page-header">
                            Artwork Details
                        </h1>
						</div>
		<div id="page-inner" style="margin-top:-15px"> 
		<div class="row">
                <div class="col-md-12">
				<div class="panel panel-default">
                    <!-- Advanced Tables -->
                        <div class="panel-body">
						  <div class="card-title">
                                        <div class="title" style="color:#1b93e1;font-size:28px;line-height:1.5;font-weight:normal;margin-bottom:20px;">Art Details</div>
                                    </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="dataTables-example" cellpadding="0" cellspacing="0" border="0">
                                   <?php 
								    $id=$_GET['id'];
									$query=mysqli_query($con,"select * from art where art_id='$id'");
									while($row=mysqli_fetch_array($query))
									{
										?>	
                                        <tr style="height:60px">
                                            <td>Art Id</td>
                                            <td ><?php echo htmlentities($row['art_id']);?></td>
											<td>Artist Id</td>
                                            <td><?php echo htmlentities($row['artist_id']);?></td>
									    </tr>
										<tr style="height:60px">
                                            <td>Art Title</td>
                                            <td><?php echo htmlentities($row['art_title']);?></td>
											 <td>Art Category</td>
                                            <td><?php echo htmlentities($row['art_category']);?></td>
									    </tr>
										<tr style="height:60px">
                                            <td>Art Theme</td>
                                            <td><?php echo htmlentities($row['art_theme']);?></td>
											 <td>Art Style</td>
                                            <td><?php echo htmlentities($row['art_style']);?></td>
									    </tr>
										<tr style="height:60px">
                                            <td>Art Technique</td>
                                            <td><?php echo htmlentities($row['art_technique']);?></td>
											 <td>Art Orientation</td>
                                            <td><?php echo htmlentities($row['art_orientation']);?></td>
									    </tr>
										<tr style="height:80px">
                                            <td >Art Description</td>
                                            <td colspan="4"><?php echo htmlentities($row['art_description']);?></td>
											</tr>
										<tr style="height:60px">
                                            <td>Art Price</td>
                                            <td><?php echo htmlentities($row['art_price']);?></td>
											 <td>Art Orientation</td>
                                            <td><a href="../Artist/img/<?php echo $row["art_image"]; ?>" target="_blank">View</a></td>
									    </tr>
										<tr style="height:60px">
                                            <td>Status</td>
                                            <td><?php if($row['status']=="" or $row['status']=="NULL")
											{
												?>
												<p style="color:green">Available for sale</p>
											<?php } 
											else { ?>
											<p style="color:red"><?php echo htmlentities($row['status']);?></p>
											<?php } ?></td>
											 <td>Uploaded On</td>
                                            <td><?php echo htmlentities($row['uploaded_on']);?></td>
									    </tr>
										<tr style="height:60px">
										<td>Action</td>
										<td><a href="artdetails.php?mid=<?php echo htmlentities($row['art_id']);?>&&action=del" title="Delete" onClick="return confirm('Do you really want to delete this artwork ?')" style="color:red">
										<button type="button" class="btn btn-danger">Delete</button></a>
										
										
										
										</td>
										
									<?php } ?>
                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
				
			
		
				<footer>
				
        
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    
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