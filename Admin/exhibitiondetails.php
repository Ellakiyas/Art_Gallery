<?php include ("./includes/config.php"); ?>
<?php
if(isset($_GET['id']) && $_GET['action']=='del')
{
$id=$_GET['id'];
$query=mysqli_query($con,"delete from exhibition where exb_id='$id'");
$_SESSION['msg']="Event Deleted Successfully !!";
}
?>
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
                        <a href="#" class="active-menu"><i class="fa fa-sitemap"></i> Exhibition<span class="fa arrow"></span></a>
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
                        <h1 class="page-header">
                            Exhibition Details
                        </h1>
						</div>
						<?php if(isset($_GET['id']) && $_GET['action']=='del') {?>
		<div class="alert alert-success" style="margin-left:35px;margin-right:25px">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong></strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
		</div>
		<?php } ?>
						
						<div id="page-inner" style="margin-top:-15px">  
               
		
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:lightgray;border-bottom:1px solid black;height:60px;font-size:18px;padding-top:15px">
                             Exhibition Details
                        </div>
						 <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" cellpadding="0" cellspacing="0" border="0">
                                    <thead style="height:45px;">
                                        <tr>
                                            <th>#</th>
                                            <th>Event Id</th>
                                            <th>Event Name</th>
											<th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Timing</th>
											<th>Location</th>
											<th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$query=mysqli_query($con,"select * from exhibition");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{
										?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['exb_id']);?></td>
                                            <td><?php echo htmlentities($row['event_name']);?></td>
											 <td><?php echo htmlentities($row['start_date']);?></td>
											<td><?php echo htmlentities($row['end_date']);?></td>
                                            <td><?php echo htmlentities($row['timing']);?></td>
											<td><?php echo htmlentities($row['location']);?></td>
											<td><a href="exhibitiondetails.php?id=<?php echo htmlentities($row['exb_id']);?>&&action=del" title="Delete" onClick="return confirm('Do you really want to delete this event ?')" style="color:red">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
											</a>

										<a href="edit-exhibition.php?id=<?php echo htmlentities($row['exb_id']);?>" style="margin-left:30px">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
										</a>
										</td>
											
											
										</td>
											<?php $cnt=$cnt+1; } ?>
                                            
                                        </tr>

                                    </tbody>
                                </table>
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
				
			
		
				<footer>
				
        
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
                            