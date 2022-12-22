<?php include('config.php') ?>
<?php
if(isset($_POST['sort_val'])){

	if($_POST['sort_val'] == "Recent"){ 

		$sql="SELECT * from art order by uploaded_on desc";
        $result=$con->query($sql);

    }
    else if($_POST['sort_val'] == "Old"){ 

        $sql="SELECT * from art order by uploaded_on asc";
        $result=$con->query($sql);

    }
    else{

        $sql="SELECT * from art";
        $result=$con->query($sql);

    }
    if($result){
        while($row=$result->fetch_assoc()){
            ?>
						 <div class="col" style="display:flex">
  <div class="carousel__slide js-carousel-slide">
    <figure title="Serie Protective Mountains: Der Tiger" class="artwork-item artwork-item-fix js-track-artwork ">
            <div>
              <a href="artdetails.php?id=<?php echo htmlentities($row['art_id']);?>" class="carousel__link js-track-artwork-link">
                <picture>
                  <img src="./Artist/img/<?php echo $row["art_image"]; ?>" style="height:800px;width:800px">
                <div class="material artwork-item__material artwork-synthesis">
                  <div class="meta">
                    <div class="artwork-synthesis__title" style="font-size:18px;margin-top:20px">
                      <?php echo $row["art_title"]; ?>
                    </div>
                    Rs. <?php echo $row["art_price"]; ?>               </div><?php echo $row["art_category"]; ?></div>
                </a>
                <div class="art-actions">
				<a href="artworks.php?id=<?php echo htmlentities($row['art_id'])?>&&action=wishlist" title="Wishlist">
								 <i class="fa fa-heart fa-fw"></i>
							</a>
				</div>
              </div>
            </figure>
  </div>
  </div>
          
    <?php
    }
}
}
?>
