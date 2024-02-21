<?php
// Initialize shopping cart class
include_once 'Cart.class.php';
require "chatbot.php";
$cart = new Cart;

// Include the database config file
require_once 'dbConfig.php';
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
    <title>Store</title>

    <!-- Favicon -->

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
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
                        <input type="search" name="search" placeholder="Type any keywords...">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->

    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->




    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg9.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 tect-center">
                    <div class="cta-content text-center">
                        <h2>Àlacarte Store</h2>
                        <p>All the needed support and kitchen supplies to invent your dream dish is found here!</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ##### CTA Area End ##### -->
    <!-- ##### Small Receipe Area Start ##### -->
    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-cooking">Cooking Equipment</li>
              <li data-filter=".filter-preparation">Preparation Equipment</li>
              <li data-filter=".filter-storage">Storage and Serving Equipment</li>
              <li data-filter=".filter-other">Other Equipment</li>
              <li><a href="viewCart.php" title="View Cart"><i style="font-size:24px" class="fa fa-shopping-cart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a></li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <?php
          // Get products from database
          $result = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
          ?>
          <?php if($row['category']=='cooking'){?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-cooking">
            <div class="portfolio-wrap">
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="width:auto;"/>' ?>
              <div class="portfolio-info">
                <h4><?php echo $row['name'];?></h4>
                <p>Rs.<?php echo $row['price'];?></p>
              </div>
              <div class="portfolio-links">
                <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" data-gall="portfolioGallery" class="venobox" title="cooking 1"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

      <?php }elseif($row['category']=='preparation'){?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-preparation">
          <div class="portfolio-wrap">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="width:auto;"/>' ?>
            <div class="portfolio-info">
              <h4><?php echo $row['name'];?></h4>
              <p>Rs.<?php echo $row['price'];?></p>
            </div>
            <div class="portfolio-links">
              <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" data-gall="portfolioGallery" class="venobox" title="cooking 1"><i class="bx bx-plus"></i></a>
            </div>
          </div>
        </div>

    <?php }elseif($row['category']=='storage'||$row['category']=='serving'){?>
      <div class="col-lg-4 col-md-6 portfolio-item filter-storage">
        <div class="portfolio-wrap">
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="width:auto;"/>' ?>
          <div class="portfolio-info">
            <h4><?php echo $row['name'];?></h4>
            <p>Rs.<?php echo $row['price'];?></p>
          </div>
          <div class="portfolio-links">
            <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" data-gall="portfolioGallery" class="venobox" title="cooking 1"><i class="bx bx-plus"></i></a>
          </div>
        </div>
      </div>

  <?php }elseif($row['category']=='other'){?>
    <div class="col-lg-4 col-md-6 portfolio-item filter-other">
      <div class="portfolio-wrap">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="width:auto;"/>' ?>
        <div class="portfolio-info">
          <h4><?php echo $row['name'];?></h4>
          <p>Rs.<?php echo $row['price'];?></p>
        </div>
        <div class="portfolio-links">
          <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" data-gall="portfolioGallery" class="venobox" title="cooking 1"><i class="bx bx-plus"></i></a>
        </div>
      </div>
    </div>
  <?php }?>

        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>


        </div>

      </div>
    </section>

    <!-- End Our Portfolio Section -->

    <style>
    .portfolio .portfolio-item {
      margin-bottom: 30px;
    }

    .portfolio #portfolio-flters {
      padding: 0;
      margin: 0 auto 35px auto;
      list-style: none;
      text-align: center;
      background: #fff;
      border-radius: 50px;
      padding: 2px 15px;
    }

    .portfolio #portfolio-flters li {
      cursor: pointer;
      display: inline-block;
      padding: 10px 15px 8px 15px;
      font-size: 14px;
      font-weight: 600;
      line-height: 1;
      text-transform: uppercase;
      color: #334240;
      margin-bottom: 5px;
      transition: all 0.3s ease-in-out;
    }

    .portfolio #portfolio-flters li:hover, .portfolio #portfolio-flters li.filter-active {
      color: #1bbca3;
    }

    .portfolio #portfolio-flters li:last-child {
      margin-right: 0;
    }

    .portfolio .portfolio-wrap {
      transition: 0.3s;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .portfolio .portfolio-wrap::before {
      content: "";
      background: rgba(88, 113, 109, 0.6);
      position: absolute;
      left: 30px;
      right: 30px;
      top: 30px;
      bottom: 30px;
      transition: all ease-in-out 0.3s;
      z-index: 2;
      opacity: 0;
    }

    .portfolio .portfolio-wrap .portfolio-info {
      opacity: 0;
      position: absolute;
      top: 10%;
      left: 0;
      right: 0;
      text-align: center;
      z-index: 3;
      transition: all ease-in-out 0.3s;
    }

    .portfolio .portfolio-wrap .portfolio-info h4 {
      font-size: 20px;
      color: #fff;
      font-weight: 600;
    }

    .portfolio .portfolio-wrap .portfolio-info p {
      color: #ffffff;
      font-size: 14px;
      text-transform: uppercase;
    }

    .portfolio .portfolio-wrap .portfolio-links {
      opacity: 0;
      left: 0;
      right: 0;
      bottom: 10%;
      text-align: center;
      z-index: 3;
      position: absolute;
      transition: all ease-in-out 0.3s;
    }

    .portfolio .portfolio-wrap .portfolio-links a {
      color: #fff;
      margin: 0 2px;
      font-size: 28px;
      display: inline-block;
      transition: 0.3s;
    }

    .portfolio .portfolio-wrap .portfolio-links a:hover {
      color: #56e7d0;
    }

    .portfolio .portfolio-wrap:hover::before {
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      opacity: 1;
    }

    .portfolio .portfolio-wrap:hover .portfolio-info {
      opacity: 1;
      top: calc(50% - 48px);
    }

    .portfolio .portfolio-wrap:hover .portfolio-links {
      opacity: 1;
      bottom: calc(50% - 50px);
    }
  </style>
    <!-- End Our Portfolio Section -->

    <!-- ##### Small Receipe Area End ##### -->

    <!-- ##### Quote Subscribe Area Start ##### -->

    <!-- ##### Quote Subscribe Area End ##### -->

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
    <script src="assets/js/main.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>

</body>

</html>
