
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>Art-Gallery</title>
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<style>
*{
	 font-family: 'Poppins', sans-serif;
}
</style>
</head>

<body>
<?php include('header.php')?>
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(../img/contact1.jpg); height:300px">
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
			<img src="../img/img/login1.jpg">
		</div>
	</div>
</div>
</section>
<?php include ("footer1.php"); ?>
</body>


<!----footer--->

<!--<section class="footer">
	<h4>About Us</h4>
	<p>Art Gallery’s Mission Is To Inspire People To Discover Beauty In Unusual Places And Provide An Extraordinary Space For A Diverse Audience To Be Educated, Challenged, And Amazed By The Unfolding Patterns Of Modern Art. </p>
	<div class="icons">
		<i class="fa fa-facebook"></i>
		<i class="fa fa-twitter"></i>
		<i class="fa fa-instagram"></i>
		<i class="fa fa-linkedin"></i>
	</div>
	<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.</p>

</section>-->

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