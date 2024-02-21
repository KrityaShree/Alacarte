<!DOCTYPE html>
<?php require 'chatbot.php'; ?>
<?php
session_start();
$error = array();
$conn = new mysqli('localhost', 'root', '', 'SE');
$connect = new mysqli('localhost', 'root', '', 'recipes');
$name = $_GET['name'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Recipe Page</title>

    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="/website/js/Print.js/src/js/print.js"></script>

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

        <!-- Recipe Slider -->
        <?php
            $query = "SELECT * FROM recipe WHERE rname = '$name'";
            $result = mysqli_query($connect, $query);
            if($result->num_rows != 0){
                //process login
                $row = $result->fetch_assoc();
                $rname = $row['rname'];
                $category = $row['cname'];
                $comments = $row['comments'];
                $history = $row['history'];
                $course = $row['course'];
                $basetype = $row['base_type'];
                $prepm = $row['prep_method'];
                $ethnicity = $row['ethnicity'];
                $prept = $row['prep_time'];
                $diff = $row['difficulty'];
                $serving = $row['serving_size'];
                $ingredients = $row['ingredients'];
                $directions = $row['directions'];
                $img= $row['i_name'];

            }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="image">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['i_name'] ).'" style="width:auto;"/>' ?>
                    </div>
                </div>
            </div>
          </div>
        <!-- Recipe Content Area -->
        <div class="receipe-content-area">
            <div class="container">
              <script>
                function printpage(){
                  var print_div = document.getElementById("recipe");
                  var print_area = window.open();
                  print_area.document.write(print_div.innerHTML);
                  //print_area.document.write("<html><head><link rel="stylesheet" href="style.css" type="text/css" /></head></html>");
                  print_area.document.close();
                  print_area.focus();
                  print_area.print();
                  print_area.close();
                }

              </script>

                <div class="row" id="recipe">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <h2><?php echo $rname?></h2>
                            <div class="receipe-duration">
                                <h5>Prep: <?php echo $prept?> Minutes</h6>
                                <h5>Yields: <?php echo $serving?> Servings</h6>
                                <h5>Course: <?php echo $course?></h5>
                                <h5>Base Type: <?php echo $basetype?></h5>
                                <h5>Preparation method: <?php echo $prepm?></h5>
                                <h5>Ethnicity: <?php echo $ethnicity?></h5>
                                <h5>Difficulty: <?php echo $diff?></h5>
                            </div>
                        </div>
                        <div>
                            <a href="ingredients.php"><h4>Ingredients</h4></a>
                            <p><?php echo nl2br($ingredients) ?>
                            <h4 class="noprint"><a href="alternate.php" target="_top">TO VIEW ALTERNATE INGREDIENTS CLICK HERE!</a></h4><style> @media print { .noprint { visibility: hidden;} } </style></p>
                        </div>
                        <div>
                            <h4>Direction</h4>
                            <p><h6><p><?php echo nl2br($directions) ?></h6></p></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 noprint">
                        <div class="receipe-ratings text-right my-5">
                        <div class="history" class="single-preparation-step d-flex">
                            <h4>History</h4>
                            <p><h6><p><?php echo $history ?></h6></p></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p><h3 class="noprint"><a href="recipe.php" target="_top">HAVE A RECIPE OF YOUR OWN? SUBMIT YOUR RECIPE HERE!</a></h3><style> @media print { .noprint { visibility: hidden;} } </style>
                  <input type="button" id="print" class="delicious-btn" class="noprint" value="Print Recipe" onclick="printpage()"></p>

            </div>
          </div>

      <div class="container">

                <div class="row">
                    <div class="col-12">
                      <div class="section-heading text-left">
                        <p>
                          <h3>Leave a comment</h3><br></p>
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn delicious-btn" type="submit">Post Comments</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>


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
    <script src="print.js"></script>

</body>

</html>
