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
<?php include("includes/config.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Art</title>
  <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/css/style.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Joti+One" rel="stylesheet">
 <link rel="stylesheet" href="./css/front-global.51b20904.css">
 <link rel="stylesheet" href="./css/home-default.38b457c5.css">
 <link rel="stylesheet" href="./css/featured-collections.fe18f04e.css">
 <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
 .campus{
	width: 80%;
	margin: auto;
	text-align: center;
	padding-top: 50px;
}
.campus-col{
	flex-basis:32%;
	border-radius: 10px;
	margin-bottom: 30px;
	position: relative;
	overflow: hidden;
}

.col img{
	width: 100%;
	display: block;

}
.layer{
	background: transparent;
	height:100%;
	width:100%;
	position: absolute;
	top:0;
	left:0;
	transition: 0.5s;
}
.layer:hover{
	background: rgba(,0,0,0.2);

}
.layer h3{
	width: 100%;
	font-weight: 500;
	color:white;
	font-size:26px;
	padding-left:40px;
	bottom: 0;
	left:50%;
	transform: translate(-50%);
	position: absolute;
	opacity: 0;
	transition: 0.5s
}

.layer:hover h3{
	bottom: 49%;
	opacity:1;
}
</style>
 </head>


<body>
<?php include("header.php"); ?>

<section id="center" class="clearfix">
   <div class="center clearfix">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item">
			    	<img src="../img/img/slides3.jpg" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text">
                        <div class="col-sm-7 center_inner clearfix">
						<div class="center_slide clearfix">
						  <h4>ART</h4>
						  <h2>The whole culture is telling you to hurry. While the art tells you to take your time.</h2>
						  <h3><span class="opening_left">The Object of art is not to reproduce reality, but to create a reality of same intensity.</span></h3>
						  <p><a href="#">See More</a></p>
						</div>
                            <br>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="../img/img/slide2.jpg" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text">
                        <div class="col-sm-7 center_inner clearfix">
						<div class="center_slide clearfix">
						  <h4>ARTIST</h4>
						  <h2>Only an Artist can interprete the meaning of life.</h2>
						  <h3><span class="opening_left">Painting is just another way of keeping a diary.</span></h3>
						  <p><a href="#">See More</a></p>
						</div>
                            <br>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item active">
			    	<img src="../img/img/login2.png" alt="Third slide">
			    	<!-- Static Header -->
                    <div class="header-text">
                        <div class="col-sm-7 center_inner clearfix">
						<div class="center_slide clearfix">
						  <h4>ARTWORK</h4>
						  <h2 style="font-size:20px">Everywhere you wlak, every place you go is full of art,explicit or hidden.</h2>
						  <h3><span class="opening_left">Only an Artist can interprete the meaning of life.</span></h3>
						  <p><a href="#">See More</a></p>
						</div>
                            <br>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			
		</div><!-- /carousel -->
	</div>
</section>

<section class="home feat-artworks section section--grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Buy Original Art Online on our Art Gallery</h1>
                    </div>
                </div>
            </div>
            <div id="yml-container"><div class="">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>A selection of Artworks and Paintings for Sale just for you</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
	<div class="col" style="display:flex">
  <div class="carousel__slide js-carousel-slide" style="margin-left:-60px">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="#" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="../img/painting.jpeg">
                </a>
                <div class="art-actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg></div>
              </div>
            </figure>
  </div>
  <div class="carousel__slide js-carousel-slide">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="#" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="../img/painting1.jpeg">
                </a>
                <div class="art-actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg></div>
              </div>
            </figure>
  </div>
  <div class="carousel__slide js-carousel-slide">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="#" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="../img/painting3.jpeg">
                </a>
                <div class="art-actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg></div>
              </div>
            </figure>
  </div>
  <div class="carousel__slide js-carousel-slide">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="#" class="carousel__link js-track-artwork-link"  >
                <picture>
                  <img src="../img/painting4.jpeg" style="height:800px">
                </a>
                <div class="art-actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg></div>
              </div>
            </figure>
  </div>
   <div class="carousel__slide js-carousel-slide">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="#" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="../img/painting5.jpeg">
                </a>
                <div class="art-actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg></div>
              </div>
            </figure>
  </div>
  </div>
</div>
</div>
</div>
        </section>
		
		<section class="home feat-artworks section section--blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Our Popular Artists</h1>
                    </div>
                </div>
            </div>
            <div id="yml-container"><div class="">
    <header>
        <!--<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>A selection of Artworks and Paintings for Sale just for you</h2>
                </div>
            </div>
        </div>-->
    </header>
 <div class="container">
	<div class="row row-cols-5" id="result">
	<?php

		$sql=mysqli_query($con,"select * from artist limit 5");
        $check=mysqli_num_rows($sql)>0;
		if($check){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
			<div class="col" style="display:flex">
  <div class="carousel__slide js-carousel-slide" >
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="#" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="./img/<?php echo $row["artist_image"]; ?>" style="border-radius:50%;width:230px;height:500px">
				  <h3 style="margin-top:20px;color:black"><?php echo $row["artist_fname"]; ?></h3>
                </a>
              </div>
            </figure>
  </div>
  </div>
		<?php } }?>
		</div>
</div>
</div>
</div>
        </section>
		
		
		
		<section class="home feat-artworks section section--grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>New Sales on Art Gallery</h1>
                    </div>
                </div>
            </div>
            <div id="yml-container"><div class="">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Buy new artworks Online On Our Art Gallery</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
	<div class="row row-cols-5" id="result">
	
<?php

		$sql=mysqli_query($con,"select * from art order by uploaded_on desc limit 5");
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
                  <img src="./img/<?php echo $row["art_image"]; ?>" style="height:800px;">
                <div class="material artwork-item__material artwork-synthesis">
                  <div class="meta">
                    <div class="artwork-synthesis__title" style="font-size:18px;margin-top:20px">
                      <?php echo $row["art_title"]; ?>
                    </div>
                    Rs. <?php echo $row["art_price"]; ?>               </div><?php echo $row["art_category"]; ?></div>
                </a>
                <div class="art-actions">
				<a href="artworks.php?id=<?php echo htmlentities($row['art_id'])?>&&action=wishlist" title="Wishlist">
								 <i class="fa fa-heart fa-fw"></i>
							</a>
				</div>
              </div>
            </figure>
  </div>
  </div>
  

  <?php } } ?>
  </div>
</div>
</div>
</div>
        </section>
		
		<section class="home feat-artworks section section--blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Our Categories of Art</h1>
                    </div>
                </div>
            </div>
            <div id="yml-container"><div class="">
    <header>
        <!--<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>A selection of Artworks and Paintings for Sale just for you</h2>
                </div>
            </div>
        </div>-->
    </header>
	<div class="container" style="margin-top:30px;">
	<div class="row row-cols-5" id="result">
	<div class="col">
			<img src="../img/cat1.jpeg" width="170px" height="250px"; style="padding:5px;outline:4px solid black">	
			<div class="layer">
				<h3>Painting</h3>
			</div>
		</div>
		<div class="col">
		<a href="#">
			<img src="../img/cat2.jpeg" width="170px" height="250px"; style="padding:5px;outline:4px solid black">	
			<div class="layer">
				<h3>Photography</h3>
			</div>
			</a>
		</div>
		<div class="col">
			<img src="../img/cat3.jpeg" width="170px" height="250px"; style="padding:5px;outline:4px solid black">	
			<div class="layer">
				<h3>Drawing</h3>
			</div>
		</div>
		<div class="col">
			<img src="../img/cat4.jpeg" width="170px" height="250px"; style="padding:5px;outline:4px solid black">	
			<div class="layer">
				<h3>Work on Paper</h3>
			</div>
		</div>
		<div class="col">
			<img src="../img/cat5.jpeg" width="170px" height="250px"; style="padding:5px;outline:4px solid black">	
			<div class="layer">
				<h3>Other Media</h3>
			</div>
		</div>
 
</div>
</div>
</div>
</div>
</section>
		
		
	


 <?php include ("footer.php"); ?>
 
<script type="text/javascript">
	$(document).ready(function() {              
    $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){    
        var $this = $(this),
        c = $this.data('count');    
        if (!c) c = 0;
        c++;
        $this.data('count',c);
        $('#'+this.id+'-bs3').html(c);
    });      
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });                                        
}); 

	</script>

<script type="text/javascript">
	$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
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
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


</body>
</html>