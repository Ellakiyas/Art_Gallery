<!--- Query for textbox and checkbox filters--->

<?php include('config.php') ?>

<?php
if ($_POST) {
	$category = $_POST['category1'];
	$location = $_POST['location1'];
	$date=date("Y-m-d");

 if ($location=='' && $category=='') {
 		$queryMeal = "SELECT * FROM exhibition";
 	}else{

 		if ($location!='') {
 			$locationSearch="`location` LIKE '$location' ";
 		}else {
 			$locationSearch = "`location` !='NULL'";
 		}

 		if ($category=='upcoming exhibition') {
 			$categorySearch="start_date>'$date'";
 		}
		else if ($category=='ongoing exhibition') {
 			$categorySearch="start_date='$date'";
 		}
		else {
 			$categorySearch = "`category` !='NULL'";
 		}

 		$queryMeal = "SELECT * FROM `exhibition` WHERE $locationSearch AND $categorySearch";
 	}

 	if ($result = mysqli_query($con, $queryMeal)) {
 			while ($row = mysqli_fetch_array($result)) {
                
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
    <?php
    }
}
else{
     echo '<div class="row alert">
	       <h3 style="width:1000px">No result found matching the search criteria.</h3>
		   </div>';
    }
}
?>

