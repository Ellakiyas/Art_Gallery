<?php include('config.php') ?>
<?php
if(isset($_POST['sort_val'])){

	if($_POST['sort_val'] == "Recent"){ 

		$sql="SELECT * from exhibition order by exb_id desc";
        $result=$con->query($sql);

    }
    else if($_POST['sort_val'] == "Old"){ 

        $sql="SELECT * from exhibition order by exb_id asc";
        $result=$con->query($sql);

    }
    else{

        $sql="SELECT * from exhibition";
        $result=$con->query($sql);

    }
    if($result){
        while($row=$result->fetch_assoc()){
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
}
?>
