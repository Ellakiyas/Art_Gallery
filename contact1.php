<?php include ("./includes/config.php");
session_start();
if(isset($_POST['submit']))
{
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $date=date("Y-m-d");

    $sql=mysqli_query($con,"insert into contact_us (name,email,subject,message,posted_date) values ('$name','$email','$subject','$message','$date')");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include('header.php')?>
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(img/contact1.jpg);">
	<h1 style="padding-top:120px">Contact Us</h1>
</section>

<!----conatct us--->
<section class="location">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62601.060530319985!2d78.20262698858802!3d11.293258944773926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3babc626021290e5%3A0x88a491fdee2d63a1!2sGandhipuram%2C%20Tamil%20Nadu%20637409!5e0!3m2!1sen!2sin!4v1622619114518!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</section>
<section class="contact-us">
	<div class="row">
	<div class="contact-col">
		<div>
			<i class="fa fa-home"></i>
			<span>
				<h5>ABC Road,XYZ Building</h5>
				<p>Namakkal,Tamil Nadu</p>
			</span>
		</div>
		<div>
			<i class="fa fa-phone"></i>
			<span>
				<h5>+1 8890676754</h5>
				<p>Monday to Saturday, 10AM to 6PM</p>
			</span>
		</div>
		<div>
			<i class="fa fa-envelope-o"></i>
			<span>
				<h5>infotech@gmail.com</h5>
				<p>Email Us Your Query</p>
			</span>
		</div>
	</div>
	<div class="contact-col">
		<form action="contact1.php" method="post">
			<input type="text" placeholder="Enter your name" name="name" required>
			<input type="email" placeholder="Enter email address" name="email" required>
			<input type="text" placeholder="Enter your subject" name="subject" required>
			<textarea rows="8" placeholder="Message" name="message" required></textarea>
			<input type="submit" name="submit" value="Send Message" class="hero-btn red-btn">
		</form>

	</div>
</div>
</section>
<?php include("footer1.php"); ?>
</body>


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
</body>
</html>