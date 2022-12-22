<?php
  session_start();
  if (!isset($_SESSION['userid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  else{
?>
<?php include("includes/config.php"); ?>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
	<link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/front-global.51b20904.css">
    <link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/home-default.38b457c5.css">
    <link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/featured-collections.fe18f04e.css">
	<link rel="stylesheet" href="./css/artwork.css">
	<link rel="stylesheet" type="text/css" href="./css/c1.css">
	<link rel="stylesheet" type="text/css" href="css/header.css" />
	
	<link rel="stylesheet" href="./css/artwork.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body >
<nav>
	<button></button>
	<div class="logo">
		<p class="logo-text" style="margin-top:15px">Art-<span>Gallery</span></p>
	</div>
	<div class="menu">
		<ul class="list" style="margin-top:-10px">
			<li class="item"><a href="member_index.php">Home</a></li>
			<li class="item"><a href="artworks.php">Art Gallery</a></li>
			<li class="item"><a href="exhibition.php">Art Exhibition</a></li>
			<li class="item"><a href="about.php">About</a></li>
			<li class="item"><a href="contact1.php">Contact us</a></li>
		</ul>
		
		<ul class="list">
			<li class="item">
				<button class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;background-color:black;margin-left:-140px;margin-top:-10px"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="profile.php" style="color:black;font-size:18px" >Profile</a><br>
					<a class="dropdown-item" href="logout.php" style="color:black;font-size:18px">Logout</a>
				</div>
			</li>
			<li class="item" style="margin-left:-60px;margin-top:px">
			<a href="favourites.php">
				<i class="fa fa-heart fa-fw"></i> 
				</a>
				</li>
				<?php
				$total_rows = mysqli_query($con,"SELECT * FROM cart where member_id='".$_SESSION['userid']."'");
				$num = mysqli_num_rows($total_rows);
				?>
				<li class="item" style="margin-left:-10px;margin-top:px">
					<a href="cart.php"><i class="fa fa-shopping-cart"><span id="cart-item" style="font-size:15px;padding-right:5px;padding-left:5px;margin-left:10px;width:30px;border-radius:10%;height:10px;background-color:white;color:black;"><?php echo htmlentities($num); ?></span></i>
					</a>
				</li>
		</ul>
</div>
<!--<form action="">
	<input type="text" id="search" placeholder="Search">
	<i class="fa fa-search"></i>
	<i class="fa fa-times"></i>
</form>-->
</nav>
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
		<a href="exbdetails.php?id=<?php echo htmlentities($row['exb_id']);?>" class="carousel__link js-track-artwork-link"><img src="./Admin/img/<?php echo htmlentities($row['image']);?>" style="width:100%;height:250px"></a>
			<h3><?php echo htmlentities($row['event_name']);?></h3>
			<h4 style="margin-left:px"><?php
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

