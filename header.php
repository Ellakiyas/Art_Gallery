<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/h1.css" />
	<title>ART-GALLERY</title>
</head>
<body>
<nav>
	<button></button>
	<div class="logo">
		<h1>Art-<span>Gallery</span></h1>
	</div>
	<div class="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="artworks.php">Art Gallery</a></li>
			<li><a href="exhibition.php">Art Exhibition</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact1.php">Contact us</a></li>
		</ul>
		<ul>
			<li class="btn" id="myBtn"><i class="fa fa-user"></i></li>
			<div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content" style="position: relative;display: flex;">
            	<span class="close" style="size:30px">&times;</span>
            	<div class="pop-double">
            		<div class="modal-header">
            			<img src="img/user.svg" width="500px" height="150px" style="margin-left:-140px;margin-top:-40px">
            			<div class="modal-title">
            				<h1 style="margin-left:-200px;margin-top:30px">I am an art member,<br> a collector</h1>
            			</div>
            		</div>
            		<div class="modal-body" style="margin-top:10px;">
                    <!--<p>Create an account to save your favorites and to receive personal offers.</p>-->
                        <div>
                    	    <a href="register.php" class="button-primary" >Create an account </a>
                        </div>
                    </div>
                    <div class="modal-elements" style="margin-top:-40px;margin-bottom:-42px">
                    	<hr>
                    	<div class="message">
                    		Already have an account ?<br>
                    		<a href="login.php" class="link or">Sign in</a>
                    	</div>
                    </div>
                </div>
                <div class="pop-double-grey">
                	<div class="modal-header">
                		<img src="img/artist.png" style="margin-top:-100px">
                		<div class="modal-title">
                			<h1 style="margin-left:-200px;margin-top:20px">I am an artist</h1>
                		</div>
                	</div>
                	<div class="modal-body" style="margin-top:10px">
                    <!--<p>Create an account to post and sell your art works through online.</p>-->
                        <div>
                       	    <a href="./Artist/artist_signup.php"  class="button-primary">Create an account </a>
                       	</div>
                    </div>
                    <div class="modal-elements" style="margin-top:-40px;margin-bottom:-42px">
                    	<hr>
                    	<div class="message">
                    		Already have an account?<br>
                    		<a href="./Artist/artist_login.php" class="link or">Sign in</a>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i></a><span></span></li>
    </ul>
</div>
<form action="">
	<input type="text" id="search" placeholder="Search">
	<i class="fa fa-search"></i>
	<i class="fa fa-times"></i>
</form>
</nav>
</body>
</html>

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
