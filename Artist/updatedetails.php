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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="./css/artist.css">
<style>
#imageUpload
{
    display: none;

}
</style>
<body style="background-color:#f6f7fc">
<?php
if(isset($_POST['submit']))
{
$id=$_SESSION['artistid'];
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
$art_id=$_GET['id'];

move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$_FILES["image"]["name"]);
$query=mysqli_query($con,"update art set art_title='$art_title',art_category='$category',art_theme='$theme',art_style='$style',art_technique='$technique',art_orientation='$orientation',art_description='$description',art_price='$price',art_image='$image' where art_id='$art_id' and artist_id='$id'");
if($query){
	echo '<script>swal("Artwork Updated Successfully!");</script>';
}
}
?>
<?php include ("header.php"); ?>

<div class="wrapper" style="margin-top:-20px">

    
    <div class="form">
	<form method="post" enctype="multipart/form-data" >
	<?php
									$id=$_SESSION['artistid'];
									$art_id=$_GET['id'];
									$query=mysqli_query($con,"select * from art where artist_id='$id' and art_id='$art_id'");
									while($row=mysqli_fetch_array($query))
									{
										?>
	<h3 style="margin-top:20px;margin-bottom:20px;color:black">Update Art Details</h3>
       <div class="inputfield">
          <label>Art Title</label>
          <input type="text" value="<?php echo  htmlentities($row['art_title']);?>" class="input" name="art_title">
       </div>  
        <div class="inputfield">
          <label>Art Category</label>
           <div class="custom_select" >
            <select name="category">
              <option value="<?php echo  htmlentities($row['art_category']);?>"><?php echo  htmlentities($row['art_category']);?></option>
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
              <option value="<?php echo  htmlentities($row['art_theme']);?>"><?php echo  htmlentities($row['art_theme']);?></option>
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
              <option value="<?php echo  htmlentities($row['art_style']);?>"><?php echo  htmlentities($row['art_style']);?></option>
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
              <option value="<?php echo  htmlentities($row['art_technique']);?>"><?php echo  htmlentities($row['art_technique']);?></option>
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
              <option value="<?php echo  htmlentities($row['art_orientation']);?>"><?php echo  htmlentities($row['art_orientation']);?></option>
              <option value="Landscape">Landscape</option>
              <option value="Portrait">Portrait</option>
			   <option value="Square">Square</option>
            </select>
          </div>
       </div> 
      <div class="inputfield">
          <label>Art Description</label>
          <textarea class="textarea" name="description"><?php echo  htmlentities($row['art_description']);?></textarea>
       </div> 
      <div class="inputfield">
          <label>Art Price</label>
          <input type="text" class="input" name="price" value="<?php echo  htmlentities($row['art_price']);?>" >
       </div>
        <div class="inputfield" style="margin-top:40px">
          <label>Upload ArtWork</label>
		 <image id="profileImage" src="./img/<?php echo  htmlentities($row['art_image']);?>" width="251px" height="251px" style="margin-left:-30px">
		 <input id="imageUpload" type="file" name="image" capture>
		 
       </div>	   
      
      <div class="inputfield">
        <input type="submit" name="submit" value="UPDATE" class="btn" style="background-color:black;height:50px;padding-bottom:30px">
      </div>
    </div>
									<?php } ?>
	</form>
</div>
<?php include("footer1.php"); ?>
<script>
    $("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}
$("#imageUpload").change(function(){
    fasterPreview( this );
});
</script>