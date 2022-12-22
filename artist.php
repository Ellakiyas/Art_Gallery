<?php
  session_start();
  if (!isset($_SESSION['userid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  else{
?>
<?php include ("./includes/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0">
	<title>ART-GALLERY</title>
	<link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/front-global.51b20904.css">
    <link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/home-default.38b457c5.css">
    <link rel="stylesheet" href="./SINGULART Gallery _ Buy Art Online _ Original Art for Sale_files/featured-collections.fe18f04e.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="./css/c1.css">
    <link rel="stylesheet" href="./css/artwork.css">
	<link href="images/icon.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/header.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<nav>
	<button></button>
	<div class="logo">
		<p class="logo-text" style="margin-top:10px">Art-<span>Gallery</span></p>
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
				<button class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;background-color:black;margin-left:-140px;margin-top:px"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
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
<section class="sub-header" style="margin-top:-100px;background-image: linear-gradient(rgba(4,9,30,0.2),rgba(4,9,30,0.2)),url(img/contact1.jpg);height:200px">
	<h1 style="padding-top:70px">Popular Artists</h1>
</section>
	<div class="input-task-name-container row-myTasksNew" style="margin-top:-10px;border-bottom:2px solid gray;">
                <div class="" style="margin-left:80px">
               <?php
				$total_rows = mysqli_query($con,"SELECT * FROM artist");
				$num = mysqli_num_rows($total_rows);
				?>
                 <h1 style="color:#CD5C5C;font-size:30px;font-weight:bold">TOTAL<span style="margin-left:20px">ARTIST</span><span>(<?php echo htmlentities($num); ?>)</h1>
                </div>
				<form class="form">
                <div class="input-div-myTasksNew" style="margin-left:-60px;margin-right:40px">
                <label for="company">Search</label>
                <input type="text" name="name" id="name" placeholder="Search by name" oninput="myFunction()">
                   <!-- <button class="abs-button"><img src="./img/Icon ionic-ios-arrow-down.svg" alt=""></button>-->
                </div>
				</form>
				 <div class="input-div-myTasksNew" style="margin-left:-60px;margin-right:40px">
                <label for="medium">Sort By Artist Medium</label>
               <select name="medium" id="medium" class="sortbySelect" onchange="myFunction1()">
    						<option value="">Medium</option>
							<?php 
$sql=mysqli_query($con,"select * from category");
while ($rw=mysqli_fetch_array($sql)) {
?>
<option value="<?php echo htmlentities($rw['category_name']);?>"><?php echo htmlentities($rw['category_name']);?></option>
<?php
}
?>
							
    						
			  
            </select>
                   <!-- <button class="abs-button"><img src="./img/Icon ionic-ios-arrow-down.svg" alt=""></button>-->
                </div>
				
				
            </div>

<div class="row"  id="result" style="margin-left:25px;margin-right:25px;margin-bottom:20px;margin-top:-10px">
<?php
		$sql=mysqli_query($con,"select * from artist");
        $check=mysqli_num_rows($sql)>0;
		if($check){
        while($row=mysqli_fetch_assoc($sql)){
            ?>
  <div class="col-sm-3 text-center my-auto" style="margin-top:100px;">
   <div class="card justify-content-center" style="margin-top:40px;background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 1px 3px 10px #00000033;">
   <div class="rounded">
    <img  src="./Artist/img/<?php echo $row["artist_image"]; ?>" alt="Card image"  class="rounded-circle" width="200" height="200" style="margin-top:30px">
	</div>
    <div class="card-body">
      <h4 class="card-title justify-content-center" ><?php echo $row["artist_fname"]; ?></h4>
      <p class="card-text"><?php echo $row["artist_medium"]; ?></p>
      <a href="artistart.php?id=<?php echo htmlentities($row['artist_id'])?>" class="btn btn-primary" style="width:200px;height:50px;font-size:18px;padding-top:10px">View ArtWorks</a>
    </div>
  </div>
  </div>
  <?php } } ?>
  </div>
  <?php include("footer1.php"); ?>
  
  </body>
  </html>
  <?php } ?>		
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
<script type="text/javascript">

	function myFunction1(){
			var medium=document.getElementById('medium').value;
        
			$.post('./includes/artist_action2.php', {medium1:medium}, function(data){
            $('#result').html(data);
        });      
  }
</script>
		
<script type="text/javascript">

	function myFunction(){
			var action='data';
			var name=document.getElementById('name').value;
			
		
        
			$.ajax({
				url:'./includes/artist_action1.php',
			    method:'POST',
				data:{action:action,name:name},
				success:function(response){
					$("#result").html(response);

				}
			});
		}
		</script>