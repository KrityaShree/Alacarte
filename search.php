<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SEARCH</title>
  </head>
  <body>

  <!--      SEARCH BAR BEGIN   ------>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" method="post">
                    <input type="search" name="search" placeholder="Type any keywords..." onkeydown="searchq();"/>
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>

<!--      SEARCH BAR END  ------>

<!--     PHP code to search   ------>
<?php
if(isset($_POST['search'])){                //when search button is selected
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

  $query = "SELECT * FROM recipe WHERE rname LIKE '%$searchq%' OR cname LIKE '%$searchq%' OR course LIKE '%$searchq%'";
  $q = mysqli_query($connect,$query);
if($q->num_rows == 0){
  $output[0] = 'No results found';

  ?>
<!--     If no results are found the below code will be executed (IF Statement)  ------>
  <div class="row">
      <div class="col-12">
          <div class="section-heading">
              <h3> <?php echo $output[0]; ?></h3>
          </div>
      </div>
  </div>
<!--     If results are found the below code will be executed (Else Statement)  ------>
<?php }else {
  while ($row = mysqli_fetch_array($q)) {
    $output[0] = 'Results found Are:';
    $output[1] = $row['rname'];
    $output[2]='<img src="data:image/jpeg;base64,'.base64_encode($row['i_name'] ).'" style="width:auto;"/>';


?>
<section class="rec">
    <div class="container">
        <div class="row">
          <h5><?php echo $output[0]; ?></h5><br>
            <!-- Small Receipe Area -->
            <div class="single-small-receipe-area d-flex">
                <div class="single-small-receipe-area d-flex">
                    <!-- Receipe Thumb -->
                    <div id="output img" class="receipe-thumb">
                      <?php echo $output[2]; ?>
                    </div>
                    <!-- Receipe Content -->
                    <div class="receipe-content">
                        <a href="recipepost.php?name=<?php echo $output[1]; ?>">
                            <h5><?php echo $output[1]; ?></h5>
                        </a>
                    </div>
                </div>
              </div>
          </div>
      </div>
</section>
<?php
}
}
}
?>


</body>
</html>
