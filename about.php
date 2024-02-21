<?php require 'chatbot.php';

session_start();
$conn = new mysqli('localhost', 'root', '', 'SE');
$connect = new mysqli('localhost', 'root', '', 'recipes');



$con = $connect->query("SELECT COUNT(rname) as count FROM recipe");
while ($c = mysqli_fetch_array($con)) {
$count = $c['count'];
}

$con = $connect->query("SELECT COUNT(rname) as count FROM recipe WHERE cname LIKE '%vegetarian' OR cname LIKE '%vegan' OR keywords LIKE '%vegetarian' OR keywords LIKE '%vegan'");
while ($c = mysqli_fetch_array($con)) {
$c1 = $c['count'];
}

$con = $connect->query("SELECT COUNT(rname) as count FROM recipe WHERE cname LIKE '%non-veg' OR cname LIKE '%non-veg' OR keywords LIKE '%NV' OR keywords LIKE '%NV'");
while ($c = mysqli_fetch_array($con)) {
$c2 = $c['count'];
}

$con = $connect->query("SELECT COUNT(rname) as count FROM recipe WHERE course LIKE '%dessert%' OR course LIKE '%dessert%' OR keywords LIKE '%dessert%' OR keywords LIKE '%dessert%'");
while ($c = mysqli_fetch_array($con)) {
$c3 = $c['count'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>alacarte</title>

    <!-- Favicon -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>
  <div id="preloader">
      <i class="circle-preloader"></i>
      <img src="unknown.jpeg" alt="">
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
                                  <li><a href="recipe2.php">Recipes</a></li>
                                  <li><a href="shop.php">Shop HERE</a></li>
                                  <li><a href="contact.php">Contact</a></li>
                              </ul>

                              <!-- Newsletter Form -->
                              <div class="search-btn">
                                  <i  aria-hidden="true"></i>
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

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>About us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Who we are and what we do?</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h6 class="sub-heading pb-5">
                      WE ARE HERE TO ROCK THE FOOD INDUSTRY BY CREATING NEW RECIPES INSPIRED BY PEOPLE ALL AROUND THE GLOBE.PEOPLE WHO ARE IN NEED OF INNOVATIVE IDEAS CAN USE WEBSITE AS A TOOL TO FIND A NEW OR AN EXISTING DISH.INNOVATIVE PEOPLE CAN UPLOAD THEIR IDEAS AND SHARE THEIR HAPPINESS.
                    </h6>
                    <p class="text-center"></p>
                </div>

                <div class="col-12">
                    <h6 class="sub-heading pb-5">
                      THE MAIN GOAL OF ÁLACARTE IS TO ELIMINATE THE NECESSITY FOR A TYRO CHEF TO BUY COOKBOOKS CONTAINING DIFFERENT RECIPES OF ALL CUISINES.
                      <BR>
                      THIS EVICTS THE NEED FOR THE KOSHER ASPIRANT TO SUFFER THE FAILS OF COOKING.
                      <BR>
                      OUR SYSTEM ENABLES THE CUSTOMER TO BUY NEEDED BACKING TO ASSEMBLE LE MANGER LA NOURRITURE.
                    </h6>
                    <p class="text-center"></p>
                </div>

                <div class="col-12">
                    <h6 class="sub-heading pb-5">
                      THE WEBSITE EMPOWERS EMPTOR AND SAUCIERS TO SHARE THEIR KNOWLEDGE AND TRIALS AND ERRORS TO MAKE THEIR COOKING EXPERIENCE MORE JOYOUS .
                    </h6>
                    <p class="text-center"></p>
                </div>

                <div class="col-12">
                    <h6 class="sub-heading pb-5">
                      WE BELIEVE THAT GOOD FOOD CAN WIN MILLIONS OF HEARTS AND HAVE CREATED ÁLACARTE TO MAKE IT REALITY.
                    </h6>
                    <p class="text-center"></p>
                </div>
            </div>

            <div class="row align-items-center mt-70">
                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact">
                        <img src="img/core-img/salad.png" alt="">
                        <h3><span class="counter"><?php echo $count; ?></span></h3>
                        <h6>Total Recipes</h6>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact">
                        <img src="img/core-img/hamburger.png" alt="">
                        <h3><span class="counter"><?php echo $c1; ?></span></h3>
                        <h6>Vegetarian Recipes</h6>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact">
                        <img src="img/core-img/rib.png" alt="">
                        <h3><span class="counter"><?php echo $c2; ?></span></h3>
                        <h6>Non Vegetarian Recipes</h6>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact">
                        <img src="img/core-img/pancake.png" alt="">
                        <h3><span class="counter"><?php echo $c3; ?></span></h3>
                        <h6>Dessert Recipes</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <img class="mb-70" src="img/bg-img/about.png" alt="">
                    <p class="text-center">.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Contact Area Start ##### -->

    <!-- ##### Contact Area End ##### -->

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
</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
