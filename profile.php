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
<?php include ("./includes/config.php"); ?>
<?php
$errors=array();
$success="";
if(isset($_POST['submit']))
{
  $password= mysqli_real_escape_string($con, $_POST['password']);
  $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
  $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

  if ((empty($password)) && (empty($newpassword)) && (empty($confirmpassword))) {
  array_push($errors, "All fields are required");
  }
  if ($newpassword != $confirmpassword) {
  array_push($errors, "The two passwords do not match");
  }
$query1=mysqli_query($con,"SELECT password FROM member where id='".$_SESSION["userid"]."'");
$user=mysqli_fetch_assoc($query1);
if ($user) {
	$password = md5($password);
    if ($user['password'] != $password) {
      array_push($errors, "Current Password does not match");
    }
}
if (count($errors) == 0) {
$password=md5($newpassword);
$query="update member set password='$password' WHERE  id='".$_SESSION['userid']."'";
$result= mysqli_query($con, $query);
if($result){
$success="Password Changed Successfully!!";
}
}
}
?>
<?php include("includes/config.php"); ?>
 <!-- Custom Styling -->
        <link rel="stylesheet" href="./css/style_head.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="./css/admin.css">
			<link rel="stylesheet" type="text/css" href="css/header.css" />
			<title>ART-GALLERY</title>
	
	
	
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
				<button class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;background-color:black;margin-left:-80px;margin-top:5px"> <i class="fa fa-user"></i>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="profile.php" style="color:black;font-size:18px" >Profile</a><br>
					<a class="dropdown-item" href="logout.php" style="color:black;font-size:18px">Logout</a>
				</div>
			</li>
			<li class="item" style="margin-left:-40px;margin-top:10px">
			<a href="favourites.php">
				<i class="fa fa-heart fa-fw"></i> 
				</a>
				</li>
				<?php
				$total_rows = mysqli_query($con,"SELECT * FROM cart where member_id='".$_SESSION['userid']."'");
				$num = mysqli_num_rows($total_rows);
				?>
				<li class="item" style="margin-left:-10px;margin-top:-40px">
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

 <div class="content">
 <?php include('errors.php'); ?>
<div style="color:green;margin-top:20px;margin-bottom:20px"><?php echo $success;?></div>
                    <h2 class="page-title" style="padding-top:20px;padding-bottom:20px">My Profile</h2>

                    <form action="" method="post">
                        <div>
                            <label>Current Passsword</label>
                            <input type="password" name="password"
                                class="text-input">
                        </div>
                        <div>
                            <label>New Password</label>
                            <input type="password" name="newpassword" class="text-input">
                        </div>
                        <div>
                            <label>Confirm Password</label>
                            <input type="password" name="confirmpassword"
                                class="text-input">
                        </div>
                        <!--<div>
                            <label>Password Confirmation</label>
                            <input type="password" name="passwordConf"
                                class="text-input">
                        </div>
                        <div>
                            <label>Role</label>
                            <select name="role" class="text-input">
                                <option value="Author">Author</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>-->

                        <div>
                            <button type="submit" name="submit" class="btn btn-big" style="background-color:black">Update</button>
                        </div>
                    </form>

                </div>

           
			<?php include("footer1.php"); ?>
			<body>
			