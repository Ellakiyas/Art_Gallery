<?php
  session_start();
  if (!isset($_SESSION['userid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  else{
?>
<?php include("includes/config.php"); ?>
<?php 
$check_code="";
if(isset($_GET['id']) && $_GET['action']=="wishlist" ){
$id=$_GET['id'];
$date=date('Y-m-d');
$sql=mysqli_query($con,"select * from favourites where art_id='$id' and member_id='".$_SESSION['userid']."'");
	while($row=mysqli_fetch_array($sql)){
		$check_code=$row["art_id"];
	}
if(!$check_code)
{
mysqli_query($con,"insert into favourites(member_id,art_id,added_on) values ('".$_SESSION['userid']."','$id','$date')");
echo "<script>alert('Added to favourites');</script>";
}
else{
	echo "<script>alert('Already in favourite list');</script>";
}
}
?>
<?php include("includes/config.php"); ?>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="./css/front-global.51b20904.css">
    <link rel="stylesheet" href="./css/home-default.38b457c5.css">
    <link rel="stylesheet" href="./css/featured-collections.fe18f04e.css">
	<link rel="stylesheet" type="text/css" href="css/header.css" />
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="./css/artwork.css">
<style>
*{
	font-family: 'Poppins', sans-serif;
}
</style>
<body >
<?php include('header3.php');?>


	<div class="container">
	
	
	<div class="input-task-name-container row-myTasksNew" style="margin-top:-10px">
                <div class="input-div-myTasksNew">
                    <label for="taskname">Category</label>
                   <select name="category" id="category" onchange="myFunction()" style="background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 1px 3px 10px #00000033;">
              <option value="">Select Category</option>
              <option value="Sculpture">Sculpture</option>
              <option value="Photography">Photography</option>
			  <option value="Painting">Painting</option>
              <option value="Drawing">Drawing</option>
              <option value="Work on Paper">Work on Paper</option>
			   <option value="Other Media">Other Media</option>
            </select>
                    <!--<button class="abs-button"><img src="./img/Icon ionic-ios-arrow-down.svg" alt=""></button>-->
                    
                </div>
                <div class="input-div-myTasksNew">
                <label for="company">Theme</label>
                    		  <select name="theme" id="theme" onchange="myFunction()" style="background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 1px 3px 10px #00000033;">
              <option value="">Select Theme</option>
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
                    <!--<button class="abs-button"><img src="./img/Icon ionic-ios-arrow-down.svg" alt=""></button>-->
                </div>
                <div class="input-div-myTasksNew">
                <label for="Job">Art Style</label>
                   <select name="style" id="style" onchange="myFunction()" style="background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 1px 3px 10px #00000033;">
              <option value="">Select Art Style</option>
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
                    <!--<button class="abs-button"><img src="./img/Icon ionic-ios-arrow-down.svg" alt=""></button>-->
                </div>
                <div class="input-div-myTasksNew" style="margin-right:40px">
                <label for="Sortby">Technique</label>
               <select name="technique" id="technique" onchange="myFunction()" style="background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 1px 3px 10px #00000033;">
              <option value="">Select Technique</option>
              <option value="Engraving">Engraving</option>
              <option value="Lithography">Lithography</option>
			  <option value="Monotype">Monotype</option>
              <option value="Relief Printing">Relief Printing</option>
			   <option value="Screen Printing">Screen Printing</option>
            </select>
                    <!--<button class="abs-button"><img src="./img/Icon ionic-ios-arrow-down.svg" alt=""></button>-->
                </div>
            </div>
			
        </div>
		<div class="container" style="background-color:white;border-bottom:2px solid black">
	
	
	<div class="input-task-name-container row-myTasksNew" style="margin-top:-10px">
                <div class="">
				<h3 style="color:black"><a href="artist.php" style="color:black"><i class="fa fa-user-circle fa-lg" style="color:#00008B"></i> Search by Artists</a></h3>
				</div>
               
                <div class="" style="margin-left:-10px">
               <?php
				$total_rows = mysqli_query($con,"SELECT * FROM art");
				$num = mysqli_num_rows($total_rows);
				?>
                 <h1 style="color:#CD5C5C;font-weight:bold">TOTAL<span style="margin-left:20px">ARTWORKS</span><span>(<?php echo htmlentities($num); ?>)</h1>
                </div>
                <div class="input-div-myTasksNew" style="margin-left:-60px;margin-right:40px">
                <label for="company">Sort By</label>
               <select name="multi_search" id="multi_search" class="sortbySelect" style="background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 1px 3px 10px #00000033;">
    						<option>Select</option>
    						<option value="Recent">Recent</option>
    						<option value="Old">Old</option>
			  
            </select>
                   <!-- <button class="abs-button"><img src="./img/Icon ionic-ios-arrow-down.svg" alt=""></button>-->
                </div>
            </div>
			
        </div>
		<div class="row alert">
		</div>

<div class="row row-cols-5" id="result" style="margin-left:30px;margin-right:30px;">
<?php

		$sql=mysqli_query($con,"select * from art");
        $check=mysqli_num_rows($sql)>0;
		if($check){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
<div class="col" style="display:flex">
  <div class="carousel__slide js-carousel-slide">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="artdetails.php?id=<?php echo htmlentities($row['art_id']);?>" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="./Artist/img/<?php echo $row["art_image"]; ?>" style="height:800px;width:800px">
                <div class="material artwork-item__material artwork-synthesis">
                  <div class="meta">
                    <div class="artwork-synthesis__title" style="font-size:18px;margin-top:20px">
                      <?php echo $row["art_title"]; ?>
                    </div>
                    Rs. <?php echo $row["art_price"]; ?>               </div><?php echo $row["art_category"]; ?></div>
                </a>
                <div class="art-actions">
				<a href="artworks.php?id=<?php echo htmlentities($row['art_id'])?>&&action=wishlist" title="Wishlist">
								 <i class="fa fa-heart fa-fw" style="background-color:black"></i>
							</a>
				</div>
              </div>
            </figure>
  </div>
  </div>

  <?php } } ?>
  </div>
  </div>
  <?php include ("footer1.php"); ?>
  </body>
  </html>
  <?php } ?>
   <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
	  <script type="text/javascript" src="js/materialize.min.js"></script>
  
  <script type="text/javascript">

	function myFunction(){
			
			var category=document.getElementById('category').value;
			var theme=document.getElementById('theme').value;
			var style=document.getElementById('style').value;
			var technique=document.getElementById('technique').value;
		
        
			$.post('includes/action.php', {category1:category,theme1:theme,style1:style,technique1:technique}, function(data){
           $('#result').html(data);
        });      
  }
</script>
<script>
	var searchIcon=document.querySelector('.fa-search');
	var closeIcon=document.querySelector('.fa-times');
	var search=document.getElementById('search');
	searchIcon.onclick=()=>{
		search.classList.add('expand');
	}
	closeIcon.onclick=()=>{
		search.classList.remove('expand');
	}
	var button=document.getElementsByTagName('button');
	var menu=document.querySelector('.menu');
	button.onclick=()=>{
		menu.classList.toggle('expand-mobile');
		button.classList.toggle('expand-icon');
	}
</script>
<script>
	$(document).ready(function(){
		$("#multi_search").change(function(){
			var sort_val=$(this).val();

			$.ajax({
				url:'./includes/action2.php',
				method:'POST',
				data:{sort_val:sort_val},
				success:function(response){
					$("#result").html(response);
				}
			});
		});
	});
</script>


		

