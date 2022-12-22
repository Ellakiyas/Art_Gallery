<?php include ("./includes/config.php"); ?>
<?php
if(isset($_POST['submit']))
{

$event_name=$_POST['event_name'];
$event_desc=$_POST['event_desc'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$timing=$_POST['timing'];
$location=$_POST['location'];
$id=intval($_GET['id']);
$query=mysqli_query($con,"update exhibition set event_name='$event_name',event_desc='$event_desc',start_date='$start_date',end_date='$end_date',timing='$timing',location='$location' where exb_id='$id'");
$_SESSION['msg']="Details Updated Successfully !!";
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
	<style>
	.form-horizontal .control-label{
	text-align:left!important;
	
}
.form-horizontal .form-control{
	margin-left:-30px;
}
</style>


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
						<?php if(isset($_POST['submit'])) {?>
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
						
			            <div class="panel panel-default">
                               
                                <div class="panel-body" style="margin-left:30px">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" >
									<?php
									$id=intval($_GET['id']);
									$query=mysqli_query($con,"select * from exhibition where exb_id='$id'");
									while($row=mysqli_fetch_array($query))
									{
										?>	
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label"  style="font-weight:normal;font-size:17px">Event Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3" value="<?php echo  htmlentities($row['event_name']);?>"  name="event_name">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label" style="font-weight:normal;font-size:17px">Event Description</label>
                                            <div class="col-sm-10">
                                                <input type="textarea" rows="5" class="form-control" id="inputEmail3" placeholder="Event Decription" name="event_desc" value="<?php echo  htmlentities($row['event_desc']);?>" style="height:80px">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label"  style="font-weight:normal;font-size:17px">Start Date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="inputEmail3" value="<?php echo  htmlentities($row['start_date']);?>"  name="start_date">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label"  style="font-weight:normal;font-size:17px">End Date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="inputEmail3" value="<?php echo  htmlentities($row['end_date']);?>"  name="end_date">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label"  style="font-weight:normal;font-size:17px">Timing</label>
                                            <div class="col-sm-10">
                                                <input type="time" class="form-control" id="inputEmail3" value="<?php echo  htmlentities($row['timing']);?>"  name="timing">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label"  style="font-weight:normal;font-size:17px">Location</label>
                                            <div class="col-sm-10">
                                                <input type="location" class="form-control" id="inputEmail3" value="<?php echo  htmlentities($row['location']);?>"  name="location">
                                            </div>
                                        </div>
									<?php } ?>
										 <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="submit" onclick="fun()" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
										</div>
										</div>
										</div>
										<div><a href="exhibitiondetails.php">
										<button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/></svg>
										</button>
										</a>
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