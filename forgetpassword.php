<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>ART-GALLERY</title>
  <style>
   body{
margin:0;
padding:0;
font-family:Arial,Helvetica,sans-serif;
background:url(img/5.jpg);
background-size:cover;
background-position:center;
background-attachment:fixed;
}
.header h2{
  top:1%;
  color:white;
  padding:1px;
  text-align:center;
}
.header h2:hover{
  color:pink;
}
.header{
background:rgba(0,0,0,.7);
color:#fff;
width:400px;
top:50%;
left:50%;
transform:translate(-50%, -50%);
box-sizing:border-box;
position:absolute;
padding:20px;
}
h4{
margin:0;
padding:0 0 20px;
text-align:center;
}
.input-group{
margin:0;
padding:0;
font-weight:bold;
color:#fff;
}
.input-group input{
width:100%;
margin-bottom:20px;
}
.input-group input[type="text"],
.input-group input[type="email"],
.input-group input[type="text"],
.input-group input[type="password"]
{
border:none;
border-bottom:3px solid #fff;
background:transparent;
outline:none;
height:40px;
color:#fff;
font-size:16px;
}
.input-group input:hover{
  border-bottom:;
  
}
::placeholder{
color:rgba(255,255,255,.5);
}
.input-group input[type="submit"]{
color:none;
border:none;
outline:none;
height:35px;
font-size:15px;
cursor:pointer;
border-radius:40px;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error{
  color:red;

}
.header a{
text-decoration:none;
color:#fff;
}
.header a:hover{
color:skyblue;
border-left-color:#7896;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
} 
 </style> 
</head>
<body>
  <div class="header">
    <h2 align="center">RESET YOUR PASSWORD</h2>
    <form method="post" action="">
    <?php include('errors.php'); ?> 
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" placeholder="Enter email" autocomplete="off">
    </div>
    <div class="input-group">
      <label>New Password</label>
      <input type="password" name="password_1" placeholder="Enter your new password" autocomplete="off">
    </div>
    <div class="input-group">
      <label> Confirm Password</label>
      <input type="password" name="password_2" placeholder="Retype your password" autocomplete="off">
    </div>
    <div class="input-group">
      <input type="submit" name="submit" class="btn signup" value="SUBMIT" align="center">
  </form>
  </div>
</body>
</html>