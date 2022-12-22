<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
   </head>
<body style="background-color:#f6f7fc">


  <div class="container">
    <!--<input type="checkbox" id="flip">-->
    <div class="cover">
     <div class="front">
        <img src="img/login2.png" alt="">
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="signup-form">
            <div class="title">Signup</div>
            <form action="register.php" method="post">
              <?php include('errors.php'); ?>
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user" style="color:#fb771a"></i>
                  <input type="text" name="username" placeholder="Enter your name" required onfocusout="validateusername()" value="<?php echo $username; ?>">
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope" style="color:#fb771a" ></i>
                  <input type="email" name="email" placeholder="Enter your email" required value="<?php echo $email; ?>">
                </div>
                <div class="input-box">
                  <i class="fas fa-phone" style="color:#fb771a"></i>
                  <input type="tel" maxlength='10' name="contact" placeholder="Enter your mobile number" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock" style="color:#fb771a" ></i>
                  <input type="password" name="password_1" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock" style="color:#fb771a"></i>
                  <input type="password" name="password_2" placeholder="Enter your Confirm password" required>
                </div>
                <div class="button input-box">
                  <input type="submit" name="reg_user" value="Register" style="background-color:#fb771a">
                </div>
                <div class="text sign-up-text">Already have an account?
                  <label for="flip">
                    <a href="login.php">Login now</a>
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
