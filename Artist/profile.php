 <?php
  session_start();
  if (!isset($_SESSION['artistid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: artist_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['artistid']);
  	header("location: login.php");
  }
?>
<?php include("includes/config.php"); ?>
<?php
if(isset($_POST['submit']))
{

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$contact=$_POST['contact'];
$medium=$_POST['medium'];
$portfolio=$_POST['portfolio'];
$id=$_SESSION['artistid'];
$image=$_FILES["compfile"]["name"];
move_uploaded_file($_FILES["compfile"]["tmp_name"],"img/".$_FILES["compfile"]["name"]);
$query=mysqli_query($con,"update artist set artist_fname='$fname',artist_lname='$lname',artist_contact='$contact',artist_medium='$medium',artist_portfolio='$portfolio',artist_image='$image' where artist_id='$id'");
$_SESSION['msg']="Profile Updated Successfully !!";
}
?>

 <!-- Custom Styling -->
        <link rel="stylesheet" href="./css/profile.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="./css/admin.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
#imageUpload
{
    display: none;

}
</style>
	
		<body>
		<?php include ("header.php"); ?>
		<?php if(isset($_POST['submit'])) {?>
		<div class="alert alert-success" style="margin-left:55px;margin-right:25px;margin-top:20px">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong style="color:green"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></strong>
		</div>
		<?php } ?>
						
              <div class="content1">

                    <h2 class="page-title" style="padding-top:20px;padding-bottom:20px">My Profile</h2>

                    <form action="" method="post" enctype="multipart/form-data" >
					<?php
									$id=$_SESSION['artistid'];
									$query=mysqli_query($con,"select * from artist where artist_id='$id'");
									while($row=mysqli_fetch_array($query))
									{
										?>
                        <div>
                            <label>First Name</label>
                            <input type="text" name="fname"
                                value="<?php echo  htmlentities($row['artist_fname']);?>" class="text-input">
                        </div>
						 <div>
                            <label>Last Name</label>
                            <input type="text" name="lname"
                                value="<?php echo  htmlentities($row['artist_lname']);?>" class="text-input">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo  htmlentities($row['artist_email']);?>" class="text-input" readonly>
                        </div>
                        <div>
                            <label>Contact</label>
                            <input type="tel" maxlength="10" name="contact" value="<?php echo  htmlentities($row['artist_contact']);?>"
                                class="text-input">
                        </div>
                        <div>
                            <label>Medium</label>
							<select name="medium" id="medium" class="text-input">
			                <option value="<?php echo  htmlentities($row['artist_medium']);?>"><?php echo  htmlentities($row['artist_medium']);?></option>
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
						<div>
                            <label>Image</label><br>
                             <image id="profileImage" src="./img/<?php echo  htmlentities($row['artist_image']);?>" width="100px" height="100px" style="margin-left:30px;margin-top:20px;margin-bootom:-40px">
		                     <input id="imageUpload" type="file" name="compfile" capture class="text-input">
                        </div>
						 <div>
                            <label>Portfolio</label>
                            <input type="text" name="portfolio" value="<?php echo  htmlentities($row['artist_portfolio']);?>"
                                class="text-input">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-big"  name="submit" style="background-color:black">Update</button>
                        </div>
									<?php } ?>
                    </form>

                </div>

            </div>
			<body>
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