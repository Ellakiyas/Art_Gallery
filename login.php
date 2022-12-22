<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="css/login.css" rel="stylesheet" />
	<title>ART-GALLERY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body style="background-color:#f6f7fc">
  <div class="container" style="height:550px">
   <!-- <input type="checkbox" id="flip">-->
    <div class="cover">
      <div class="front">
        <img src="img/log3.jpg" alt="">
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form action="login.php" method="post">
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
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope" style="color:#fb771a"></i>
                  <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box" style="margin-top:30px">
                  <i class="fas fa-lock" style="color:#fb771a"></i>
                  <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="text">
                  <a href="forgetpassword.php">Forgot password?</a>
                </div>
                <div class="button input-box">
                  <input type="submit" name="login_user"  value="Login" style="background-color:#fb771a">
                </div>
                <div class="text sign-up-text">Don't have an account?
                  <label for="flip">
                    <a href="register.php">Sigup now</a>
                </label>
              </div>
            </div>
          </form>
          <!--<h3>Login with social media</h3>
          <ul class="sci">
            <li><img src="img/facebook.png"></li>
            <li><img src="img/twitter.png"></li>
            <li><img src="img/google.png"></li>
          </ul>-->
        </div>
      </div>
    </div>
  </div>
</body>
</html>
