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
			echo '<div class="alert alert-success alert-dismissible mt-2" style="margin-top:20px;width:1000px;margin-left:30px">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Item added to you cart</strong>
			</div>';
		}
		else{
			echo '<div class="alert alert-danger alert-dismissible mt-2" style="margin-top:20px;width:1000px;margin-left:30px">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Item already added to you cart</strong>
			</div>';
		}
}
?>
<?php
// Get no.of items available in the cart table
$member_id=$_SESSION['userid'];
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $con->prepare("SELECT * FROM cart where member_id='$member_id'");
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}
?>