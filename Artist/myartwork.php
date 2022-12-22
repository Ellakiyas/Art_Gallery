<?php
  session_start();
  if (!isset($_SESSION['artistid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: artist_login.php');
  }
  else{
?>
<?php include("includes/config.php"); ?>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART GALLERY</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="./css/front-global.51b20904.css">
    <link rel="stylesheet" href="./css/home-default.38b457c5.css">
    <link rel="stylesheet" href="./css/featured-collections.fe18f04e.css">
	<link rel="stylesheet" href="../css/artwork.css">
<link rel="stylesheet" type="text/css" href="./css/c1.css">
<style>
*{
	 font-family: 'Poppins', sans-serif;
}
</style>
<body >
<?php include('header.php');?>
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(./img/art1.jpg);height:240px">
	<h1 style="padding-top:80px">My Artworks</h1>
</section>

	
<div class="row row-cols-5" id="result" style="margin-left:30px;margin-right:30px;">
<?php
$id=$_SESSION['artistid'];

		$sql=mysqli_query($con,"select * from art where artist_id='$id'");
        $check=mysqli_num_rows($sql)>0;
		if($check){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
<div class="col">
  <div class="carousel__slide js-carousel-slide">
    <figure class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="artdetails.php?id=<?php echo htmlentities($row['art_id']);?>" class="carousel__link js-track-artwork-link">
                <picture>
               <img src="./img/<?php echo $row["art_image"]; ?>" style="height:800px;width:px">
                <div class="material artwork-item__material artwork-synthesis">
                  <div class="meta">
                    <div class="artwork-synthesis__title" style="font-size:18px;margin-top:20px">
                      <?php echo $row["art_title"]; ?>
                    </div>
                    Rs. <?php echo $row["art_price"]; ?>               </div><?php echo $row["art_category"]; ?></div>
                </a>
                <div class="art-actions">
				<!--<a href="artworks.php?id=<?php echo htmlentities($row['art_id'])?>&&action=wishlist" title="Wishlist">
								 <i class="fa fa-heart fa-fw"></i>
							</a>-->
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


		

