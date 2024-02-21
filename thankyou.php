<?php
require_once 'controllers/authController.php';
session_start();
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
    <title>Logged In</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

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
                                  <li class="active"><a href="index.php">Home</a></li>
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
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->
    <!-- To display alert message -->
    <!-- when successfully logged in -->


    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
    <div class="alert alert-success">
        You are now logged in!
    </div>



    <div class="alert alert-warning">
        You need to verify your account.
        Sign in to your email account and click on the
        verification link we just emailed you.
    </div>



    </div>
    </div>
    </div>

    <style>
    .form-sty{
      margin: 50px auto 50px;
      padding: 25px 15px 10px 15px;
      border: 1px solid #003d99;
      border-radius: 5px;
      font-size: 1.1em;
      font-family: 'Lora', serif;
    }
    .form-control:focus{
      box-shadow: none;
    }
    .form p{
      font-size: 0.89em;
    }
    </style>



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
