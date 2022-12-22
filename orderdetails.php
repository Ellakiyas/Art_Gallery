<?php
  session_start();
  if (!isset($_SESSION['userid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  else{
?>
<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
	<link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/front-global.51b20904.css">
    <link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/home-default.38b457c5.css">
    <link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/featured-collections.fe18f04e.css">
	<link rel="stylesheet" href="./css/artwork.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="images/icon.png" rel="icon">
   
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
	<link rel="stylesheet" type="text/css" href="css/header.css" />
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 
	 
</head>
<body>
<nav>
	<button></button>
	<div class="logo">
		<p class="logo-text" style="margin-top:10px">Art-<span>Gallery</span></p>
	</div>
	<div class="menu">
		<ul class="list" style="margin-top:-10px">
			<li class="item"><a href="member_index.php">Home</a></li>
			<li class="item"><a href="artworks.php">Art Gallery</a></li>
			<li class="item"><a href="exhibition.php">Art Exhibition</a></li>
			<li class="item"><a href="about.php">About</a></li>
			<li class="item"><a href="contact1.php">Contact us</a></li>
		</ul>
		
		<ul class="list">
			<li class="item">
				<button class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;background-color:black;margin-left:-70px;margin-top:-5px"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="profile.php" style="color:black;font-size:18px" >Profile</a><br>
					<a class="dropdown-item" href="logout.php" style="color:black;font-size:18px">Logout</a>
				</div>
			</li>
			<li class="item" style="margin-left:-30px;margin-top:0px">
			<a href="favourites.php">
				<i class="fa fa-heart fa-fw"></i> 
				</a>
				</li>
				<?php
				$total_rows = mysqli_query($con,"SELECT * FROM cart where member_id='".$_SESSION['userid']."'");
				$num = mysqli_num_rows($total_rows);
				?>
				<li class="item" style="margin-left:0px;margin-top:-0px;">
					<a href="cart.php"><i class="fa fa-shopping-cart"><span id="cart-item" style="font-size:15px;padding-right:5px;padding-left:5px;margin-left:10px;width:30px;border-radius:10%;height:10px;background-color:white;color:black;"><?php echo htmlentities($num); ?></span></i>
					</a>
				</li>
		</ul>
</div>
<!--<form action="">
	<input type="text" id="search" placeholder="Search">
	<i class="fa fa-search"></i>
	<i class="fa fa-times"></i>
</form>-->
</nav>
<div id="page-inner" style="margin-bottom:400px;margin-top:30px"> 

<div class="panel panel-default" style="background-color:white">
				  <div class="panel-heading" style="padding:15px;font-size:28px;margin-left:120px">Order Details</div>
				  <div class="panel-body">
					<table class="table table-bordered table-hover" align="center" style="width:1300px;margin-left:140px;margin-right:40px;background: #FFFFFF 0% 0% no-repeat padding-box;
box-shadow: 1px 2px 6px #00000029;">
					  <tr style="font-weight:bolder;background-color:red;color:white;height:50px;">
						<td>Order Id</td>
						<td>Title</td>
						<td>Amount</td>
						<td>Order Date</td>
						<td>Address</td>
					  </tr>
					  <?php

		$sql=mysqli_query($con,"select * from orders where member_id='".$_SESSION['userid']."'");
        $check=mysqli_num_rows($sql)>0;
		$grand_total=0;
		if($check){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
					  <tr>
						<td>
							<p><?php echo $row["order_id"]; ?></p>
						</td>
						<td>
							<p><?php echo $row["title"]; ?></p>
						</td>
						<td>
						  <p>Rs. <?php echo number_format($row["amount"],2); ?></p>
						</td>
						<td>
							<p><?php echo $row["order_date"]; ?></p>
						</td>
						<td>
							<p><?php echo $row["address"]; ?></p>
						</td>
						
						
					  </tr>
		<?php  } } ?>
					</table>
						
				  </div>
				</div>	
      </div>
			
		
		<?php include ("footer1.php"); ?>
		  </body>
  <?php } ?>


