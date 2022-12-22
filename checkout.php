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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="./css/artwork.css">
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="images/icon.png" rel="icon">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/header.css" />
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
				<li class="item" style="margin-left:0px;margin-top:-0px;">
					<a href="cart.php"><i class="fa fa-shopping-cart"><span id="cart-item" style="font-size:15px;padding-right:5px;padding-left:5px;margin-left:10px;width:30px;border-radius:10%;height:10px;background-color:white;color:black;"><?php echo htmlentities($num); ?> </span></i></a>
				</li>
		</ul>
</div>
<!--<form action="">
	<input type="text" id="search" placeholder="Search">
	<i class="fa fa-search"></i>
	<i class="fa fa-times"></i>
</form>-->
</nav>

<?php 
$grand_total=0;
$id=$_SESSION['userid'];
$allItems='';
$items=[];
$query=mysqli_query($con,"select *,CONCAT(art_title, '(', quantity, ')') AS ItemQty,total_price from cart inner join member on cart.member_id=member.id where member_id='$id'");

while ($row = $query->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	  $username = $row['username'];
	  $email = $row['email'];
	   $contact = $row['contact'];
}

	$allItems = implode(', <br>', $items);
	
?>
<div class="container" style="background-color:white;margin-bottom:200px"">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Artwork(s) : </b><?= $allItems; ?></h6>
          <!--<h6 class="lead"><b>Delivery Charge : </b>Free</h6>-->
          <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo htmlentities ($username);?>" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" value="<?php echo htmlentities($email);?>" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" value="<?php echo htmlentities($contact);?>" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <!--<h6 class="text-center lead">Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control" style="apperance:none">
              <option value="" selected disabled>Cash on Delivery</option>
              
            </select>
          </div>-->
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
  <?php } ?>

		<?php include ("footer1.php"); ?>
		  
<!----footer--->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

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
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: './includes/action1.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });
	// Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
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