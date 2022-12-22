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
	<style>
	body{
	font-family: Verdana, sans-serif;
	}
	</style>
</head>
<body>
<?php include ("header.php"); ?>
<div class="alert-message">

</div>
<section id="details_2" class="clearfix">
 <div class="container">
  <div class="row">
   <div class="details_2 clearfix">
    

  <!-- Wrapper for slides -->
 
  <?php
$id=$_GET['id'];
$query=mysqli_query($con,"select * from art inner join artist on art.artist_id=artist.artist_id where art_id='$id'");
while($row=mysqli_fetch_array($query)){
	?>
<div class="col-sm-6 details_2_right clearfix" style="width:100%">
	 <div class="details_2_right_inner clearfix">
	  <h2>Art Details</h2>
	  <!--<h4><span class="classic_1" style="font-size:18px">Artist Name <span class="classic_2"><a href="#"> <?php echo $row["artist_fname"]; ?> </a></span></h4>
	  <h3>  <span class="classic_3">Rs. <?php echo $row["art_price"]; ?></span> </h3>
	  <span style="font-size:28px;color:#b11d85;margin-top:20px;margin-bottom:10px;color:#173e43">ART DESCRIPTION</span>-->
	  <!--<h1><?php echo $row["art_description"]; ?></h1>-->
	  <div class="col-sm-8 pager_left_1 clearfix">
	   <ul class="locker">
		   <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Title</p></li>
		  <li style="font-size:18px;width:300px;"><?php echo $row["art_title"]; ?></li>
              </ul>
	    <ul class="locker">
		   <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Category</p></li>
		  <li style="font-size:18px;width:300px;"><?php echo $row["art_category"]; ?></li>
              </ul>
 <ul class="locker">
		   <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Theme</p></li>
		  <li style="font-size:18px;width:300px;"><?php echo $row["art_theme"]; ?></li>
              </ul>   			  
        <ul class="locker">
		   <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Style</p></li>
		  <li style="font-size:18px;width:300px;"><?php echo $row["art_style"]; ?></li>
              </ul>   
			   <ul class="locker">
		   <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Technique</p></li>
		  <li style="font-size:18px;width:300px;"><?php echo $row["art_technique"]; ?></li>
		  </ul>
		  <ul class="locker">
		  <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Orientation</p></li>
		  <li  style="font-size:18px;width:300px;"><?php echo $row["art_orientation"]; ?></li>
              </ul>  
 <ul class="locker">
		  <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Description</p></li>
		  <li  style="font-size:18px;width:300px;"><?php echo $row["art_description"]; ?></li>
              </ul>  	
<ul class="locker">
		  <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Price</p></li>
		  <li  style="font-size:18px"><?php echo $row["art_price"]; ?></li>
              </ul>  
<ul class="locker">
		  <li><p class="sizzler" style="width:300px;color:#173e43;font-weight:500">Art Image</p></li>
		  <li  style="font-size:18px"><img src="./img/<?php echo $row["art_image"]; ?>"></li>
              </ul>  				  
	   </div>
	 </div>
	 <div class="details_2_right_inner_2 clearfix">
	   <ul class="commander">
	   <form class="form-submit">
	   <input type="hidden" class="aid" value="<?php echo $row["art_id"]; ?>">
	   <input type="hidden" class="aimage" value="<?php echo $row["art_image"]; ?>">
	   <input type="hidden" class="atitle" value="<?php echo $row["art_title"]; ?>">
	   <input type="hidden" class="aprice" value="<?php echo $row["art_price"]; ?>">
	    <li class="commander_1"><button id="addItem"><a href="updatedetails.php?id=<?php echo htmlentities($row['art_id']);?>">UPDATE DETAILS</a></button></li>
		
		<li class="commander_2" style="margin-top:30px">
		</form>
	   </ul>
	   
	 </div>
	</div>
   </div>
  </div>
 </div>
</section>
<?php }  ?>
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
  <?php } ?>
 
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

<script type="text/javascript">
$(document).ready(function(){
		$(document).on("click","#addItem",function(e){
	         e.preventDefault();
			var form=$(this).closest(".form-submit");
			var id=form.find(".aid").val();
			var image=form.find(".aimage").val();
			var title=form.find(".atitle").val();
			var price=form.find(".aprice").val();
			
		
        
			$.ajax({
				url:'./includes/action3.php',
			    method:'POST',
				data:{aid:id,aimage:image,atitle:title,aprice:price},
				success:function(response){
					$(".alert-message").html(response);
					window.scrollTo(0,0);
					load_cart_item_number();

				}
			});
		});
	// Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: './includes/action3.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>