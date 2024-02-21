<!DOCTYPE html>
<?php require 'chatbot.php';

session_start();
$error = array();
$conn = new mysqli('localhost', 'root', '', 'SE');
$connect = new mysqli('localhost', 'root', '', 'recipes');

?>
<html lang="en">
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
  </body>
</html>
