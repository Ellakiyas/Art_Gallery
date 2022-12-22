<!--- Query for textbox and checkbox filters--->

<?php include('config.php') ?>

<?php
if ($_POST) {
	$category = $_POST['category1'];
	$theme = $_POST['theme1'];
	$style = $_POST['style1'];
	$technique = $_POST['technique1'];

 if ($category=='' && $theme=='' && $style=='' && $technique=='') {
 		$queryMeal = "SELECT * FROM art";
 	}else{

 		if ($category!='') {
 			$categorySearch="`art_category` LIKE '$category' ";
 		}else {
 			$categorySearch = "`art_category` !='NULL'";
 		}

 		if ($theme!='') {
 			$themeSearch="`art_theme` LIKE '$theme' ";
 		}else {
 			$themeSearch = "`art_theme` !='NULL'";
 		}

 		if ($style!='') {
 			$styleSearch="`art_style` LIKE '$style' ";
 		}else {
 			$styleSearch = "`art_style` !='NULL'";
 		} 

 		if ($technique!='') {
 			$techniqueSearch="`art_technique` LIKE '$technique'";
 		}else {
 			$techniqueSearch = "`art_technique` !='NULL'";
 		}

 		$queryMeal = "SELECT * FROM `art` WHERE $categorySearch AND $themeSearch AND $styleSearch AND $techniqueSearch";
 	}

 	if ($result = mysqli_query($con, $queryMeal)) {
 			while ($row = mysqli_fetch_array($result)) {
                
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
else{
     echo '<div class="row alert">
	       <h3 style="width:1000px">No result found matching the search criteria.</h3>
		   </div>';
    }
}
?>

