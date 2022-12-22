<?php 
session_start();

// initializing variables
$username = "";
$email    = "";
$errors=array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'artgallery');
#admin login
if (isset($_POST['admin_login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if ((empty($email)) && (empty($password)) ){
    array_push($errors, "Email & Password is required");
  }

  if (count($errors) == 0) {
    
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      
      $_SESSION['alogin'] = $email;
      if($_SESSION['success'] ){
        array_push($errors, "Email & Password is required");
      }
      header('location:index.php');
    }else {
      array_push($errors, "Wrong Email/Password combination");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/main.css" />
	<section id="One" class="wrapper style3"  style="
    margin-top: -2%;
">
				<div class="inner">
					<header class="align-center">
						<p>Admin Login</p>
						<h2 style="color:#f36a54">ART GALLERY</h2>
						
					</header>
				</div>
</section>
<!-- Visit : www.mayurik.com -->

		<!-- Two -->
			<section id="two" style="
    margin-top: -5%;
" >
				<div class="inner">
					<div class="box">
						<div class="content">
<section>
<div>
<div class="container divform" style="margin-top: 3em;">
	<h2><span class="glyphicon glyphicon-log-in"></span> Admin Login</h2>
	<form method="post" name="alogin" action="">
  	<?php include('errors.php'); ?>
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
		<div class="form-group">
			<label for="id">Username:</label>
			<input type="email" class="form-control" name="email" placeholder="Enter username">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="password" placeholder="Enter password">
		</div>
		<br>
		<button type="submit" name="admin_login" class="button special" name="sub" style="background-color:#f36a54">Login</button>
	</form>
	</div>
	</div></div>
</div>

</section>
</body>
</html>