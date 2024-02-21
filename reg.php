<!DOCTYPE html>
<?php
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/SMTP.php';
session_start();
 ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Register</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<?php $error = array();

if(isset($_POST['submit'])){
  $u = $_POST['u'];
  $e = $_POST['e'];
  $p = $_POST['p'];
  $p2 = $_POST['p2'];

if (empty($u)){
    $error['usern'] = "Enter username.";
}elseif(strlen($u) < 5){
    $error['uname'] = "Your username must be at least 5 charecters. ";
}elseif (!preg_match("/^[a-zA-Z ]*$/",$u)) {
    $error['nameErr'] = "Only letters and white space allowed";
}elseif (empty($e)){
    $error['em'] = "Enter email id.";
}elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    $error['emailErr'] = "Invalid email format";
}elseif (empty($p)){
    $error['pa'] = "Enter password.";
}elseif (empty($p2)){
    $error['pas'] = "Enter confirm password.";
}elseif ($p2 != $p) {
    $error['pass'] = "The password do not match ";
}else {
  //Form is Valid

  //connect to DB
  $mysqli = NEW MySQLi('localhost','root','','SE');

  //sanitize form DB
  $u = $mysqli->real_escape_string($u);
  $e = $mysqli->real_escape_string($e);
  $p = $mysqli->real_escape_string($p);
  $p2 = $mysqli->real_escape_string($p2);

  //Generating Vkey
  $vkey = md5(time().$u);

  //Insert values in DB
  $p = md5($p);
  $insert = $mysqli->query("INSERT INTO user(username,password,email,vkey) VALUES ('$u','$p','$e','$vkey')");

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->isHTML(true);
  $mail->Username = "krityashree@gmail.com";
  $mail->Password = "Kritya_Shree_28";


  //Email Settings
  $mail->setFrom("krityashree@gmail.com","Álacarte");
  $mail->Subject = "Hello New Cook";
  $mail->Body = "<a href='http://localhost/website/verify.php?vkey=$vkey'>Please verify your account.</a>";
  $mail->addAddress("$e");
  if($mail->send()){
    echo "Email SENT!";

  }else{
    echo "Something is wrong<br><br>".$mail->ErrorInfo;
  }


  if($insert){
    //send email

header('location:thankyou.php');


  }
  else{
    echo $mysqli->error;
  }
}
}

 ?>



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
                                              <li><a href="recipe.php">Submit own recipe</a></li>>
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

    <!-- Register Section Begin -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
              <div class= "form-sty">
                <form action="reg.php" method="post">
                  <h3 class="text-center">REGISTER</h3>

                  <?php if(count($error) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($error as $er): ?>
                        <li><?php echo $er; ?></li>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!----------->

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="u" class= "form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="e" class= "form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="p" class="form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="passwordConf">Confirm Password</label>
                    <input type="password" name="p2" class="form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <button type="SUBMIT" name="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                  </div>

                  <p class="text center"> Already a member? <a href="login.php">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>
    </div>
<div class="contact-area section-padding-0-80">

    </div>
    <!-- ##### Register section ends ##### -->

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
