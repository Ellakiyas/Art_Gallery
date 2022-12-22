<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$id="";
$errors=array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'artgallery');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ((empty($username)) && (empty($email)) && (empty($password_1)) && (empty($contact))) {
    array_push($errors, "Username,Email,Contact & Password is required");

  }
  if ($password_1 != $password_2) {
  array_push($errors, "The Two Passwords do not Match");
  }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM member WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }


  // Finally, register user if there are no errors in the form
if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO member (username, email, password,contact) VALUES('$username', '$email', '$password','$contact')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Registration Successful..Please login to continue";
    header('location: login.php');
  }
}
//LOGIN

if (isset($_POST['login_user'])) {
  $email= mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if ((empty($email)) && (empty($password)) ){
    array_push($errors, "Username & Password is Required");
  }
if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM member WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
		$row=mysqli_fetch_array($results);
      $_SESSION['username'] = $row["username"];
      $_SESSION['userid']=trim($row["id"]);
      if($_SESSION['success'] ){
        array_push($errors, "Email & Password is required");
      }
      header('location:member_index.php');
    }else {
      array_push($errors, "Wrong Username/Password Combination");
    }
  }
}
#forgetpassword

if(isset($_POST['submit']))
{
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  if ((empty($email)) && (empty($password_1))) {
  array_push($errors, "Email & Password is required");
  }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  
$query1=mysqli_query($db,"SELECT * FROM member WHERE email='$email'");
$num=mysqli_fetch_assoc($query1);
if (count($errors) == 0) {
$password = md5($password_1);
$query="update member set password='$password' WHERE email='$email'";
$result= mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Password changed successfully";
    header('location: login.php');
  }
}
?>