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
    
	<link rel="stylesheet" href="./css/front-global.51b20904.css">
    <link rel="stylesheet" href="./css/home-default.38b457c5.css">
    <link rel="stylesheet" href="./css/featured-collections.fe18f04e.css">
	<link rel="stylesheet" href="./css/artwork.css">
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
	<link rel="stylesheet" href="./css/artwork.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
*{
	 font-family: 'Poppins', sans-serif;
}
</style>

<body >
<?php include('header.php');?>
<section class="facilities" >
	<h1>All Exhibitions</h1>
	<p>View all upcoming and ongoing exhibition details here.</p>
	<div class="input-task-name-container row-myTasksNew" style="margin-top:-10px;">
	<div class="input-div-myTasksNew" style="margin-left:60px;margin-right:40px;width:300px">
   <label for="medium" style="margin-left:-70px">Exhibition</label>
               <select name="category" id="category" class="sortbySelect" onchange="myFunction()">
			                <option value="">Select category</option>
    						<option value="upcoming exhibition">Upcoming Exhibition</option>
							<option value="ongoing exhibition">Ongoing Exhibition</option>
							</select>
							</div>
							<div class="input-div-myTasksNew" style="margin-left:60px;margin-right:40px;width:300px">
                            <label for="medium" style="margin-left:-70px">Location</label>
                            <select name="location" id="location" class="sortbySelect" onchange="myFunction()">
			                <option value="">Select Location</option>
							<?php 
							$sql=mysqli_query($con,"select distinct location from exhibition order by location");
							while ($rw=mysqli_fetch_array($sql)) {
								?>
								<option value="<?php echo htmlentities($rw['location']);?>"><?php echo htmlentities($rw['location']);?></option>
								<?php
								}
								?>
    						
							</select>
							</div>
							<div class="input-div-myTasksNew" style="margin-left:60px;margin-right:40px;width:300px">
   <label for="medium" style="margin-left:-80px">Sort By</label>
             <select name="multi_search" id="multi_search" class="sortbySelect">
    						<option>Select</option>
    						<option value="Recent">Recent</option>
    						<option value="Old">Old</option>
			  
            </select>
							</div>
							</div>
	<div class="row" style="margin-top:15px" id="result">
	<?php
	$date=date("Y-m-d");

		$sql=mysqli_query($con,"select * from exhibition");
        $check=mysqli_num_rows($sql)>0;
		if($check){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
	
		<div class="facilities-col">

		
			
			<a href="exbdetails.php?id=<?php echo htmlentities($row['exb_id']);?>" class="carousel__link js-track-artwork-link"><img src="../Admin/img/<?php echo htmlentities($row['image']);?>" style="width:100%;height:250px"></a>
			<h3><?php echo htmlentities($row['event_name']);?></h3>
			<h4 style="margin-left:-200px"><?php
			$date=$row['start_date']; 
			$datetime=date_format(new DateTime($date),"d F, Y");
			?>
			<?php echo $datetime; ?></h4>
		</div>
		
	
	<?php } } ?>
	</div>
</section>
<!--<section class="facilities" >
	<h1>Ongoing Exhibitions</h1>
	<p>Upskill and Uplevel your Team With Engaging Learning and Development Platform.</p>
	<div class="row">
	<?php
	//$date=date("Y-m-d");

		//$sql=mysqli_query($con,"select * from exhibition where start_date='$date' or end_date='$date'");
        //$check=mysqli_num_rows($sql)>0;
		//if($check){
        //while($row=mysqli_fetch_assoc($sql)){
            //?>
	
		<div class="facilities-col">
			<img src="./Admin/img/<?php //echo htmlentities($row['image']);?>" style="width:100%;height:250px">
			<h3><?php //echo htmlentities($row['event_name']);?></h3>
			<p><?php //echo htmlentities($row['location']);?></p>
		</div>
		
	
	<?php //} //} ?>
	</div>
</section>->
		
  
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
			var location=document.getElementById('location').value;
		
        
			$.post('includes/exb_action.php', {category1:category,location1:location}, function(data){
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
				url:'./includes/exb_action1.php',
				method:'POST',
				data:{sort_val:sort_val},
				success:function(response){
					$("#result").html(response);
				}
			});
		});
	});
</script>		

