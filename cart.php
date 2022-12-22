<?php
  session_start();
  if (!isset($_SESSION['userid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  else{
?>
<?php include("includes/config.php"); ?>
<?php
if(isset($_GET['id']) && $_GET['action']=='del')
{
$id=$_GET['id'];
$query=mysqli_query($con,"delete from cart where id='$id'");
$_SESSION['delete_msg']="Item removed from cart!!";
}
if(isset($_GET['clear'])){
$id=$_GET['clear'];
$query=mysqli_query($con,"delete from cart");
$_SESSION['delete_msg']="All item removed from cart!!";

}
?>
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
		<p class="logo-text" style="margin-top:10px;color:white;font-weight:700">Art-<span style="color:white;font-weight:700">Gallery</span></p>
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
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(img/1.jpg); height:30vh">
	<h1 style="padding-top:40px">MY CART</h1>
</section>
<?php if(isset($_GET['id']) && $_GET['action']=='del') {?>
                      <div class="alert alert-success" style="margin-left:130px;margin-right:90px;margin-top:20px">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong></strong>	<?php echo htmlentities($_SESSION['delete_msg']);?><?php echo htmlentities($_SESSION['delete_msg']="");?>
		</div>
<?php } ?>
<div id="page-inner"> 

<div class="panel panel-default" style="background-color:white">
				  <div class="panel-heading" style="padding:15px;font-size:28px;margin-left:120px">Cart Details</div>
				  <div class="panel-body">
					<table class="table table-bordered" align="center" style="width:1300px;margin-left:140px;margin-right:40px;background: #FFFFFF 0% 0% no-repeat padding-box;
box-shadow: 1px 2px 6px #00000029;">
					  <tr style="font-weight:bolder">
						<td>Action</td>
						<td>Image</td>
						<td>Title</td>
						<td>Added_On</td>
						<td>Quantity</td>
						<td>Price</td>
						<td>Total Price</td>
					  </tr>
					  <?php

		$sql=mysqli_query($con,"select * from cart where member_id='".$_SESSION['userid']."'");
        $check=mysqli_num_rows($sql)>0;
		$grand_total=0;
		if($check){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
					  <tr>
						<td>	
							<a href="cart.php?id=<?php echo htmlentities($row['id']);?>&&action=del" title="Delete" onClick="return confirm('Do you really want to remove this item from cart ?')" style="color:red"><i class="fa fa-remove fa-fw" style="color:red;width:30px;height:30px"></i></a>
						</td>
						<td>
							<img src="./Artist/img/<?php echo $row["art_image"]; ?>" class="my_cart_items" style="width:60px;height:60px"/>
						</td>
						<td>
							<p><?php echo $row["art_title"]; ?></p>
						</td>
						<td>
							<p><?php echo $row["added_on"]; ?></p>
						</td>
						<td>
						<input type="number" class="form-control itemQty" value="<?php echo $row["quantity"]; ?>" style="width:75px">
						
						</td>
						<td>
						  <p>Rs. <?php echo number_format($row["art_price"],2); ?></p>
						</td>
						<td>
						  <p>Rs. <?php echo number_format($row["total_price"],2); ?></p>
						</td>
						<input type="hidden" class="aid" value="<?php echo $row["id"]; ?>">
						<input type="hidden" class="aprice" value="<?php echo $row["art_price"]; ?>">
					  </tr>
					   <?php $grand_total +=$row["total_price"]; ?>
					  <?php } } ?>
					  <tr>
					  <td colspan="2"><a href="cart.php?clear=all" onClick="return confirm('Are you sure to clear your cart?')"> <button class="btn btn-danger" style="width:140px;height:40px;font-size:16px;margin-top:20px;margin-left:80px">Empty Cart</button></a>
					  </td>
					    <td colspan="2"><a href="artworks.php" class="btn btn-light" style="height:40px;font-size:16px;width:200px;margin-left:60px"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a></td>
						<td colspan="1" style="height:60px"></td>
						<td>Total</td>
						<td>Rs .<?php echo number_format($grand_total,2); ?></td>
					  </tr>
		
					</table>
						
				  </div>
				</div>	
      </div>
	  <div class="col mb-2">
	  <div class="row">
	   <div class="col-sm-12 col-md-6 text-right">
	  <a href="checkout.php" class="btn btn-md btn-block btn-success text-uppercase <?=($grand_total>1)?"":"disabled"; ?>" style="height:40px;font-size:16px;width:200px;padding-top:5px;float:right;margin-right:-690px"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
	  </div>
	  </div>
	  </div>
			
		<?php  } ?>
		<?php include ("footer1.php"); ?>
		  
<!----footer--->



<script>
	var navLinks=document.getElementById('navlinks');
	function showMenu(){
		navLinks.style.right="0";
	}
	function hideMenu(){
		navLinks.style.right="-200px";
	}
</script>
<script>
	var searchIcon=document.querySelector('.fa-search');
	var closeIcon=document.querySelector('.fa-times');
	var search=document.getElementById('search');
	searchIcon.onclick=()=>{
		search.classList.add('expand');
	}
	closeIcon.onclick=()=>{
		search.classList.remove('expand');
	}
	var button=document.getElementsByTagName('button');
	var menu=document.querySelector('.menu');
	button.onclick=()=>{
		menu.classList.toggle('expand-mobile');
		button.classList.toggle('expand-icon');
	}
</script>
<script type="text/javascript">
$(document).ready(function(){
		$(".itemQty").on("change",function(){
			var hide=$(this).closest("tr");
		
			var id=hide.find(".aid").val();
			var price=hide.find(".aprice").val();
			var qty=hide.find(".itemQty").val();
			location.reload(true);
			
		    $.ajax({
				url:'./includes/action1.php',
			    method:'POST',
				cache:false,
				data:{aqty:qty,aid:id,aprice:price},
				success:function(response){
					console.log(response);

				}
			});
		});
	});
</script>
 <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>

</body>
</html>