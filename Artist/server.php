<?php
session_start();

// initializing variables
$fname = "";
$email    = "";
$errors=array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'artgallery');

// REGISTER USER
if (isset($_POST['reg_user'])) {
	
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $portfolio = mysqli_real_escape_string($db, $_POST['portfolio']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $medium = mysqli_real_escape_string($db, $_POST['medium']);
  
  $compfile=$_FILES["compfile"]["name"];



move_uploaded_file($_FILES["compfile"]["tmp_name"],"img/".$_FILES["compfile"]["name"]);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ((empty($fname)) && (empty($lname)) && (empty($email)) && (empty($contact)) && (empty($portfolio)) && (empty($password_1)) && (empty($compfile))) {
    array_push($errors, "All fields are required.");

  }
  if ($password_1 != $password_2) {
  array_push($errors, "The Two Passwords do not Match");
  }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM artist WHERE artist_fname='$fname' OR artist_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['artist_fname'] === $fname) {
      array_push($errors, "Username already exists");
    }
    if ($user['artist_email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }


  // Finally, register user if there are no errors in the form
if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO artist (artist_fname,artist_lname,artist_email,artist_contact,artist_password,artist_medium,artist_image,artist_portfolio) VALUES('$fname','$lname', '$email','$contact', '$password','$medium','$compfile','$portfolio')";
    mysqli_query($db, $query);
    $_SESSION['artistname'] = $fname;
    $_SESSION['success'] = "Registration Successful!..Please login to continue.";
    header('location: artist_login.php');
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
    $query = "SELECT * FROM artist WHERE artist_email='$email' AND artist_password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $row=mysqli_fetch_array($results);
      $_SESSION['artistname'] = $row["artist_fname"];
      $_SESSION['artistid']=trim($row["artist_id"]);
      if($_SESSION['success'] ){
        array_push($errors, "Email & Password is required");
      }
      header('location:artist_index.php');
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
  
$query1=mysqli_query($db,"SELECT * FROM artist WHERE artist_email='$email'");
$num=mysqli_fetch_assoc($query1);
if (count($errors) == 0) {
$password = md5($password_1);
$query="update artist set artist_password='$password' WHERE artist_email='$email'";
$result= mysqli_query($db, $query);
    $_SESSION['artistname'] = $username;
    $_SESSION['success'] = "Password changed successfully";
    header('location: artist_login.php');
  }
}
?>