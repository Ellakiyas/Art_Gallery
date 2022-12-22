<?php include('server.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style2.css">

    <title>ART-GALLERY</title>
  </head>
  <body>
 

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('img/artist_login.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login</h3>
            <!--<p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>-->
            <form action="artist_login.php" method="post">
			<?php include('errors.php'); ?>
              <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                  <h3 style="font-size:18px">
                    <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                    ?>
                  </h3>
                </div>
              <?php endif ?>
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username" name="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <!--<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>-->
                <span class="ml-auto"><a href="forgetpassword.php" class="forgot-pass">Forgot Password</a></span> 
              </div>
			  <div style="margin-bottom:20px">
			  Don't have an account?<a href="artist_signup.php"> Sigup now</a>
			  </div>

              <input type="submit" value="Log In" name="login_user" class="btn btn-block btn-primary">

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