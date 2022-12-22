<?php
  session_start();
  if (!isset($_SESSION['artistid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: artist_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['artistid']);
  	header("location: artist_login.php");
  }
?>
<?php include ("./includes/config.php"); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/c1.css">
<link rel="stylesheet" href="./css/artist.css">
<body style="background-color:#f6f7fc">
<?php
if(isset($_POST['submit']))
{
$artist_id=$_SESSION['artistid'];
$art_title=$_POST['art_title'];
$category=$_POST['category'];
$theme=$_POST['theme'];
$style=$_POST['style'];
$technique=$_POST['technique'];
$orientation=$_POST['orientation'];
$description=$_POST['description'];
$price=$_POST['price'];
$image=$_FILES["image"]["name"];
$date=date("Y-m-d");


move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$_FILES["image"]["name"]);
$query=mysqli_query($con,"insert into art(artist_id,art_title,art_category,art_theme,art_style,art_technique,art_orientation,art_description,art_price,art_image,uploaded_on) values('$artist_id','$art_title','$category','$theme','$style','$technique','$orientation','$description','$price','$image','$date')");
if($query){
	echo '<script>swal("Thank You!", "Artwork Uploaded Successfully!", "success");</script>';
}
}
?>
<?php include ("header.php"); ?>
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(../img/art1.jpg);height:240px">
	<h1 style="padding-top:80px">UPLOAD ART</h1>
</section>
<div class="wrapper" style="margin-top:-20px">

    
    <div class="form">
	<form method="post" enctype="multipart/form-data" >
	<h3 style="margin-top:20px;margin-bottom:20px;color:black">Please fill the details to upload your art.</h3>
       <div class="inputfield">
          <label>Art Title</label>
          <input type="text" class="input" name="art_title">
       </div>  
        <div class="inputfield">
          <label>Art Category</label>
           <div class="custom_select" >
            <select name="category">
              <option value="">---Select---</option>
              <option value="Sculpture">Sculpture</option>
              <option value="Photography">Photography</option>
			  <option value="Painting">Painting</option>
              <option value="Drawing">Drawing</option>
              <option value="Work on Paper">Work on Paper</option>
			   <option value="Other Media">Other Media</option>
            </select>
          </div>
       </div>  
       <div class="inputfield">
          <label>Art Theme</label>
		   <div class="custom_select">
		  <select name="theme">
              <option value="default">---Select---</option>
              <option value="Abstraction">Abstraction</option>
			   <option value="Animals">Animals</option>
			    <option value="Conceptual">Conceptual</option>
				 <option value="Digital Age">Digital Age</option>
				  <option value="Fantasy">Fantasy</option>
              <option value="Fashion">Fashion</option>
			  <option value="Historical and Political">Historical and Political</option>
			  <option value="Landscape">Landscape</option>
			  <option value="Marine">Marine</option>
			   <option value="Nature">Nature</option>
			   <option value="Pop Culture">Pop Culture</option>
			   <option value="Portrait">Portrait</option>
			  <option value="Provocative">Provocative</option>
			   <option value="Religion">Religion</option>
			   <option value="Self Portrait">Self Portrait</option>
			   <option value="Still Life">Still Life</option>
			  <option value="Street Art">Street Art</option>
			   <option value="Urban">Urban</option>
			   <option value="Vanitas">Vanitas</option>
            </select>
			</div>
          
       </div>  
      <div class="inputfield">
          <label>Art Style</label>
		   <div class="custom_select">
		   <select name="style">
              <option value="default">---Select---</option>
              <option value="Aboriginal">Aboriginal</option>
			   <option value="Abstract">Abstract</option>
			    <option value="Comics">Comics</option>
				 <option value="Original">Original</option>
				  <option value="Expressionism">Expressionism</option>
              <option value="Fauvism">Fauvism</option>
			  <option value="Figurative">Figurative</option>
			  <option value="Fine Art">Fine Art</option>
			  <option value="Futuristic">Futuristic</option>
			   <option value="Geometric">Geometric</option>
			   <option value="Impressionism">Impressionism</option>
            </select>
			</div>
          
       </div> 
        <div class="inputfield">
          <label>Art Technique</label>
          <div class="custom_select">
            <select name="technique">
              <option value="">--Select---</option>
              <option value="Engraving">Engraving</option>
              <option value="Lithography">Lithography</option>
			  <option value="Monotype">Monotype</option>
              <option value="Relief Printing">Relief Printing</option>
			   <option value="Screen Printing">Screen Printing</option>
            </select>
          </div>
       </div> 
	    <div class="inputfield">
          <label>Art Orientation</label>
          <div class="custom_select">
            <select name="orientation">
              <option value="">---Select---</option>
              <option value="Landscape">Landscape</option>
              <option value="Portrait">Portrait</option>
			   <option value="Square">Square</option>
            </select>
          </div>
       </div> 
      <div class="inputfield">
          <label>Art Description</label>
          <textarea class="textarea" name="description"></textarea>
       </div> 
      <div class="inputfield">
          <label>Art Price</label>
          <input type="text" class="input" name="price">
       </div>
        <div class="inputfield">
          <label>Upload ArtWork</label>
          <input type="file" class="input" name="image">
       </div>	   
      
      <div class="inputfield">
        <input type="submit" name="submit" value="UPLOAD" class="btn" style="background-color:black;height:50px;padding-bottom:30px">
      </div>
    </div>
	</form>
</div>
<?php include("footer1.php"); ?>