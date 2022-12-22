<?php include('config.php') ?>
<?php
if(isset($_POST['action'])){
$sql="SELECT * from artist where artist_fname !=''";

if (isset($_POST['name'])){

$name=$_POST['name'];
$sql .="AND artist_fname LIKE '%$name%'";

}
$result=$con->query($sql);

if($result->num_rows>0){
while($row=$result->fetch_assoc()){
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
    <?php
    }
}
else{
    ?>
     <h3>No records found matching the search criteria.</h3>
<?php }
}
?>