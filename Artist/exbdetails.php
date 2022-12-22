<?php
  session_start();
  if (!isset($_SESSION['artistid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: artist_login.php');
  }
  else{
?>
<?php include("includes/config.php"); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Art</title>
   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/css/animate.css" rel="stylesheet" type="text/css" media="all">
     <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css" />
	 <link rel="stylesheet" type="text/css" href="css/css/style.css" media="all">
	 <link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css" />
      <link href="https://fonts.googleapis.com/css?family=Joti+One" rel="stylesheet">
	  
     <script type="text/javascript"  src="js/jquery-2.1.1.min.js"></script>
     <script  type="text/javascript" src="js/bootstrap.min.js"></script>
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="./css/c1.css">
	<script src="js/ekko-lightbox.js"></script>
	<style>
	body{
	font-family: Verdana, sans-serif;
	}
	</style>
</head>
<body>
<?php include('header.php');?>
<div class="alert-message">

</div>
<section id="details_2" class="clearfix" >
 <div class="container">
  <div class="row">
   <div class="details_2 clearfix">
    <div class="col-sm-6 details_2_left clearfix">
	 <div class="details_2_left clearfix">
	  <div class="carousel slide article-slide" id="article-photo-carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner cont-slider">
  <?php
$id=$_GET['id'];
$query=mysqli_query($con,"select * from exhibition where exb_id='$id'");
while($row=mysqli_fetch_array($query)){
	?>

    <div class="item active">
      <img alt="" title="" src="../Admin/img/<?php echo $row["image"]; ?>" style="border:4px solid lightgrey">
    </div>
  </div>
</div>
	 </div>
	</div>
	<div class="col-sm-6 details_2_right clearfix">
	 <div class="details_2_right_inner clearfix">
	  <h2><?php echo $row["event_name"]; ?></h2>
	  <!--<h4><span class="classic_1" style="font-size:18px">Artist Name <span class="classic_2"><a href="#"> <?php //echo $row["artist_fname"]; ?> </a></span></h4>
	  <h3>  <span class="classic_3">Rs. <?php //echo $row["art_price"]; ?></span> </h3>-->
	  <span style="font-size:28px;color:#b11d85;margin-top:20px;margin-bottom:10px;color:#173e43">Event Description</span><hr>
	  <h1><?php echo $row["event_desc"]; ?></h1><hr>
	  <div class="col-sm-8 pager_left_1 clearfix">
	    <ul class="locker">
		   <li><p class="sizzler" style="width:150px;color:#173e43">Start Date</p></li>
		   <li><?php echo $row["start_date"]; ?></li>
              </ul>
 <ul class="locker">
		   <li><p class="sizzler" style="width:150px;color:#173e43">End Date</p></li>
		  <li><?php echo $row["end_date"]; ?></li>
              </ul>   			  
        <ul class="locker">
		   <li><p class="sizzler" style="width:150px;color:#173e43">Timing</p></li>
		  <li><?php echo $row["timing"]; ?></li>
              </ul>   
			   <ul class="locker">
		   <li><p class="sizzler" style="width:150px;color:#173e43">Location</p></li>
		  <li><?php echo $row["location"]; ?></li>
		  </ul>
		  <ul>
              </ul>   
	   </div>
	 </div>
	</div>
   </div>
  </div>
 </div>
</section>
  <?php }}  ?>
<!--
<section id="details_tab" class="clearfix">
 <div class="container">
  <div class="row">
   <div class="details_tab clearfix">
     <div class="middle_1_para clearfix">
		
		   <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Reviews</a></li>
  <li><a data-toggle="tab" href="#menu1">Write Review</a></li>
  
</ul>

<div class="tab-content clearfix">
 


  <div id="home" class="tab-pane fade in active clearfix">
	 <div class="click clearfix">
       <div class="grade clearfix">
	    <div class="grade_top clearfix">
		 <div class="col-sm-6 grade_top_left clearfix">
		  <div class="grade_top_left_inner clearfix">
		   <h4>Sagittis Ipsum</h4>
		   <h3>10/08/2016</h3>
		  </div>
		 </div>
		 <div class="col-sm-6 grade_top_right clearfix">
		  <div class="grade_top_right_inner clearfix">
		   <h4>AUGUE</h4>
		   <h5><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
		  </div>
		 </div>
		</div>
		<div class="grade_middle clearfix">
		 <h2>THANK YOU</h2>
		 <p>Hi, my order reached yesterday. I like it! Thank you! What a impressive service...your wark are great! I wish every site was like this one</p>
		 
		</div>
	   </div>
   </div>
  </div>
</div>
		</div>
   </div>
  </div>
 </div>
</section>
-->
<?php include("footer1.php"); ?>
 
 
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>