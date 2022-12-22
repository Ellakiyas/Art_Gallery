<!DOCTYPE html>
<?php
session_start();
  if (!isset($_SESSION['userid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['userid']);
  	header("location: login.php");
  }
?>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
</head>
<body>
<?php include('header.php')?>
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(img/contact1.jpg); height:300px">
	<h1 style="padding-top:110px">About Us</h1>
</section>

<!------about us contact----->
<section class="about-us">
	<div class="row">
		<div class="about-col">
			<h1>Exclusive Art Gallery</h1>
			<p>Art is emotion. Art inspires. Art is original and imparts its own perspectives to everyday reality. 'Art Gallery' - is becoming a source of inspiration for artists, clients, visitors and employees. The remarkable collection also reflects the gallery social engagement. By collecting, caring for and exhibiting our pieces, irreplaceable works of art may be preserved for future generations. The works are made available and accessible for exhibitions and loans to museums on a regular basis. The abstract art marketplace. Buy wall art, original paintings, sculptures, limited edition prints and gifts directly from best artists of the 21st century.</p>
			<a href="" class="hero-btn red-btn">EXPLORE NOW</a>
		</div>
		<div class="about-col">
			<img src="./img/img/login1.jpg">
		</div>
	</div>
</section>




<!----footer--->

<?php include ("footer1.php"); ?>
</body>

<script>
	var navLinks=document.getElementById('navlinks');
	function showMenu(){
		navLinks.style.right="0";
	}
	function hideMenu(){
		navLinks.style.right="-200px";
	}
</script>
</body>
</html>