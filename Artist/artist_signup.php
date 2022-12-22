<?php include("includes/config.php"); ?>
<?php include('server.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Sign Up</title>
	<style>
	.error{
		color:red;
	}
	</style>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../img/artist.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 py-5" style="margin-top:-100px">
            <h3>Register</h3>
            <!--<p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>-->
            <form action="artist_signup.php" method="post" enctype="multipart/form-data">
			<?php include('errors.php'); ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" placeholder="e.g. John" id="fname" name="fname">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" placeholder="e.g. Smith" id="lname" name="lname">
                  </div>    
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" placeholder="e.g. john@your-domain.com" id="email" name="email">
                  </div>    
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Phone Number</label>
                    <input type="tel" maxlength="10" class="form-control" placeholder="+00 0000 000 0000" id="lname" name="contact">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Portfolio</label>
                    <input type="text" class="form-control" placeholder="e.g. https://google.com" id="lname" name="portfolio">
                  </div>    
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
              
                  <div class="form-group last mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Your Password" id="password" name="password_1">
                  </div>
                </div>
                <div class="col-md-6">
              
                  <div class="form-group last mb-3">
                    <label for="re-password">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Your Password" id="re-password" name="password_2">
                  </div>
                </div>
              </div>
			   <div class="row">
                <div class="col-md-6">
              
                  <div class="form-group last mb-3">
                    <label for="password">Medium</label>
					<select name="medium" id="medium" class="form-control">
			                <option value="">Select Medium</option>
							<?php 
							$sql=mysqli_query($con,"select * from category");
							while ($rw=mysqli_fetch_array($sql)) {
								?>
								<option value="<?php echo htmlentities($rw['category_name']);?>"><?php echo htmlentities($rw['category_name']);?></option>
								<?php
								}
								?>
    						
							</select>
                    
                  </div>
                </div>
                <div class="col-md-6">
              
                  <div class="form-group last mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" placeholder="Your Password" id="image" name="compfile">
                  </div>
                </div>
              </div>
              
             
			  <div style="margin-bottom:20px">
			  Already have an account?<a href="artist_login.php"> Sign In</a>
			  </div>

              <input type="submit" value="Register" name="reg_user" class="btn px-5 btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>