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
$query=mysqli_query($con,"delete from favourites where art_id='$id' and member_id='".$_SESSION['userid']."'");
$_SESSION['delete_msg']="Item removed from Favourites!!";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
	<link rel="stylesheet" href="./css/front-global.51b20904.css">
    <link rel="stylesheet" href="./css/home-default.38b457c5.css">
    <link rel="stylesheet" href="./css/featured-collections.fe18f04e.css">
	<link rel="stylesheet" href="./css/artwork.css">
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
	<link href="images/icon.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/header.css" />
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
				<button class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;background-color:black;margin-left:-70px;margin-top:-10px"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
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
				<li class="item" style="margin-left:-10px;margin-top:0px">
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
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(img/cart.jpg); height:30vh">
	<h1 style="padding-top:50px">My Favourites</h1>
</section>
<?php if(isset($_GET['id']) && $_GET['action']=='del') {?>
                      <div class="alert alert-success" style="margin-left:70px;margin-right:80px;margin-top:30px">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong></strong>	<?php echo htmlentities($_SESSION['delete_msg']);?><?php echo htmlentities($_SESSION['delete_msg']="");?>
		</div>
<?php } ?>
<div class="row row-cols-5" id="result" style="margin-left:30px;margin-right:30px;">
<?php

		$sql=mysqli_query($con,"select * from favourites left join art on favourites.art_id=art.art_id where favourites.member_id='".$_SESSION['userid']."'");
        //$check=mysqli_num_rows($sql)>0;
		if($sql){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
<div class="col" style="display:flex">
  <div class="carousel__slide js-carousel-slide">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="artdetails.php?id=<?php echo htmlentities($row['art_id']);?>" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="./Artist/img/<?php echo $row["art_image"]; ?>" style="height:800px;width:800px">
                <div class="material artwork-item__material artwork-synthesis">
                  <div class="meta">
                    <div class="artwork-synthesis__title">
                      <?php echo $row["art_title"]; ?>
                    </div>
                    <?php echo $row["art_price"]; ?>               </div><?php echo $row["art_category"]; ?></div>
                </a>
                <div class="art-actions">
				<a href="favourites.php?id=<?php echo htmlentities($row['art_id'])?>&&action=del" title="delete" onClick="return confirm('Do you really want to remove this item from favourite list ?')">
			    <i class="fa fa-remove fa-fw"></i>
							</a>
				</div>
              </div>
            </figure>
  </div>
  </div>

  <?php } }
   ?>
  </div>
  <?php } ?>
<?php include("footer1.php"); ?>
</body>  

	<script type="text/javascript">
		
		function btnClick(x)
		{
			if(x=='+')
			{
				var a=document.getElementById("q_item").innerHTML;
				document.getElementById("q_item").innerHTML=parseInt(a)+1;
			}
			else
			{
				document.getElementById("q_item").innerHTML-=1;
			}
		}
	</script>
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
</body>
</html>