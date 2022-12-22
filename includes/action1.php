<?php
include("config.php");
session_start();
$check_code="";
if(isset($_POST['aid']) && isset($_POST['aimage']) && isset($_POST['atitle']) && isset($_POST['aprice']) )
{
	$id=$_POST['aid'];
	$image=$_POST['aimage'];
	$title=$_POST['atitle'];
	$price=$_POST['aprice'];
	$qty=1;
	$date=date("Y-m-d");
	$member_id=$_SESSION['userid'];
	
	$sql=mysqli_query($con,"select * from cart where art_id='$id' and member_id='$member_id'");
	while($row=mysqli_fetch_array($sql)){
		$check_code=$row["art_id"];
	}
	    
		if(!$check_code)
		{
			$insert_stmt=mysqli_query($con,"insert into cart (art_id,member_id,art_image,art_title,quantity,art_price,total_price,added_on) values ('$id','$member_id','$image','$title','$qty','$price','$price','$date')");
			echo '<div class="alert alert-success alert-dismissible mt-2">
			<button type="button" class="close" data-dismiss="alert">*</button>
			<strong>Item added to you cart</strong>
			</div>';
		}
		else{
			echo '<div class="alert alert-danger alert-dismissible mt-2">
			<button type="button" class="close" data-dismiss="alert">*</button>
			<strong>Item already added to you cart</strong>
			</div>';
		}
}
?>
<?php
	if(isset($_POST["aqty"])){
		
		$qty=$_POST['aqty'];
        $id=$_POST['aid'];
	    $price=$_POST['aprice'];
		
		$total_price=$qty*$price;
		
		$sql=mysqli_query($con,"UPDATE cart set quantity='$qty',total_price='$total_price' where id='$id'");
	}
		
?>
<?php
// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $arts=[];
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $arts[] = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	 
      $id=$_SESSION['userid'];
	  $data = '';
	  $date=date("Y-m-d");
	  
      $allItems = implode(', ', $arts);
      $insert_stmt=mysqli_query($con,"insert into orders (member_id,title,amount,order_date,address) values ('$id','$allItems','$grand_total','$date','$address')");
	  $insert_stmt1=mysqli_query($con,"Delete from cart where member_id='$id'");
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Artworks Purchased : ' . $allItems . '</h4>
								<h4>Your Name   : ' . $name . '</h4>
								<h4>Your E-mail       : ' . $email . '</h4>
								<h4>Your Phone        : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4><a href="orderdetails.php"><button class="btn">View my orders</button></a></h4>
						  </div>';
	  echo $data;
	}
?>