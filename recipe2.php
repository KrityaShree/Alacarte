<!DOCTYPE html>
<?php require 'chatbot.php'; ?>
<?php
session_start();
$error = array();
$conn = new mysqli('localhost', 'root', '', 'SE');
$connect = new mysqli('localhost', 'root', '', 'recipes');
$output = array('','','');

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Recipes</title>

    <!-- Favicon -->

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div id="preloader">
        <i class="circle-preloader"></i>
        <img src="unknown.jpeg" alt="">
    </div>

    <!-- Search Wrapper -->
    <div class="search-wrapper">
        <!-- Close Btn -->
        <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>

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
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

      <div class="top-header-area">
          <div class="container h-100">
              <div class="row h-100 align-items-center justify-content-between">
                  <!-- Breaking News -->
                  <div class="col-12 col-sm-6">
                      <div class="breaking-news">
                          <div id="breakingNewsTicker" class="ticker">
                              <ul>
                                  <li><a href="#">Hello World!</a></li>
                                  <li><a href="#">Welcome to Colorlib Family.</a></li>
                                  <li><a href="#">Hello Delicious!</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>

                  <!-- Top Social Info -->
                  <div class="col-12 col-sm-6">
                      <div class="top-social-info text-right">
                        <ul>
                          <?php
                          if($_SESSION["name"]=='admin') {
                            ?>
                            <li><a href="#"></a></li>
                            <li>Welcome!</li>
                            <li>Click here to <a href="login.php" title="Login">Login.</a></li>
                          <?php  }else{ ?>
                            <li><a href="#"></a></li>
                            <li>Welcome <?php echo $_SESSION["name"]; ?>.</li>
                            <li>Click here to <a href="logout.php" title="Logout">Logout.</a></li>
                        <?php  }?>
                        </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.php"><img src="unknown.jpeg" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About Us</a></li>
                                            <li><a href="blogpost.php">Blog Post</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                            <li><a href="recipe.php">Submit own recipe</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Mega Menu</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Meal Type</li>
                                                <li><a href="recipe2.php#1">Appetizers & Snacks</a></li>
                                                <li><a href="recipe2.php#2">Breakfast & Brunch</a></li>
                                                <li><a href="recipe2.php#3">Lunch</a></li>
                                                <li><a href="recipe2.php#4">Dinner</a></li>
                                                <li><a href="recipe2.php#5">Desserts</a></li>
                                                <li><a href="recipe2.php#6">Drinks</a></li>
                                                <li><a href="recipe2.php#7">Salads</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Diets Special</li>
                                                <li><a href="recipe2.php#8">Keto</a></li>
                                                <li><a href="recipe2.php#9">Low Carb Diet</a></li>
                                                <li><a href="recipe2.php#10">Vegan</a></li>
                                                <li><a href="recipe2.php#11">Vegetarian</a></li>
                                                <li><a href="recipe2.php#12">Non Vegetarian</a></li>
                                                <li><a href="recipe2.php#13">Low Fat</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                              <li class="title">Easy</li>
                                              <li><a href="recipe2.php#14">Under 5 Ingredients</a></li>
                                              <li><a href="recipe2.php#15">No Bake Recipes</a></li>
                                              <li><a href="recipe2.php#16">One Pot Recipes</a></li>
                                              <li><a href="recipe2.php#17">Healthy</a></li>
                                              <li><a href="recipe2.php#18">Under 30 Minutes</a></li>
                                            </ul>
                                            <div class="single-mega cn-col-4">
                                                <div class="receipe-slider owl-carousel">
                                                    <a href="#"><img src="img/bg-img/bg1.jpg" alt=""></a>
                                                    <a href="#"><img src="img/bg-img/bg6.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="active"><a href="recipe2.php">Recipes</a></li>
                                    <li><a href="shop.php">Shop HERE</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>

                                <!-- Newsletter Form -->
                                <div class="search-btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <!-- ##### Header Area End ##### -->

    <?php


    ?>

    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg15.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2>Recipes</h2>
                        <p>RECIPES OF DIFFERENT CATEGORY IS DISPLAYED BELOW</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

    <?php
    if(isset($_POST['search'])){
      $searchq = $_POST['search'];
      $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

      $query = "SELECT * FROM recipe WHERE rname LIKE '%$searchq%' OR cname LIKE '%$searchq%' OR course LIKE '%$searchq%'";
      $q = mysqli_query($connect,$query);
    if($q->num_rows == 0){
      $output[0] = 'No results found'; ?>

      <div class="row">
          <div class="col-12">
              <div class="section-heading">
                  <h3> <?php echo $output[0]; ?></h3>
              </div>
          </div>
      </div>

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



<?php
    $r = $connect->query("SELECT * FROM keywords");
    if($r->num_rows > 0){
        while($row = $r->fetch_assoc()){
          $rec=$row['kname'];
 ?>
<section class="best-receipe-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div data-animation="fadeOutDown" class="section-heading">
                    <h3 id="<?php echo $row['keyid'];?>"><?php echo $row['kname'];?></h3>
                </div>
            </div>
        </div>
        <?php
        // Get products from database
        $result = $connect->query("SELECT * FROM recipe WHERE course LIKE '$rec' OR keywords LIKE '%$rec%'");
        ?>
        <div class="row">
            <!-- Single Best Receipe Area -->
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div method="get" class="single-best-receipe-area mb-30">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['i_name'] ).'" style="width:auto;height:auto;"/>' ?>
                    <div class="receipe-content">
                        <a href="recipepost.php?name=<?php echo $row['rname']?>">
                            <h5><?php echo $row['rname']?></h5>
                        </a>

                    </div>
                </div>
            </div>
          <?php } } ?>

        </div>
    </div>
</section>


<?php } } ?>

    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### Follow Us Instagram Area Start ##### -->
    <div class="follow-us-instagram">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>Follow Us Instagram</h5>
                </div>
            </div>
        </div>
        <!-- Instagram Feeds -->
        <div class="insta-feeds d-flex flex-wrap">
            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta1.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta2.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta3.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta4.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta5.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta6.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta7.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Follow Us Instagram Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Footer Social Info -->
                    <div class="footer-social-info text-right">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <!-- Footer Logo -->
                    <div class="footer-logo">
                        <a href="index.php"><img src="unknown.jpeg" alt=""></a>
                    </div>
                    <!-- Copywrite -->
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>
