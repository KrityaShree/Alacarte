<!DOCTYPE html>
<?php require 'header.php'; ?>
<?php

$error = array();
$conn = new mysqli('localhost', 'root', '', 'SE');
$connect = new mysqli('localhost', 'root', '', 'recipes');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Alternate Ingredients</title>

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
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="#"><i class=""></i>"         "</a>
                            <span>            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=container>
          <style>
          table {
            border-collapse: collapse;
            width: 100%;
          }

          th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
          }
        </style>

            <h3 class="text-center">Alternate Ingredients</h3>
            <?php
              $query = "SELECT * FROM alternate";
              $result = mysqli_query($connect, $query);
              if($result->num_rows != 0){
                //process login
                $row = $result->fetch_assoc();
                $ing = $row['ing'];
                $amt = $row['amt'];
                $sub = $row['sub'];

              }
              echo "<table border='0'>
              <tr>
              <th>Ingredient</th>
              <th>Amount</th>
              <th>Substitute Ingredient</th>
              </tr>";
              while($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>" . $row['ing'] . "</td>";
                echo "<td>" . $row['amt'] . "</td>";
                echo "<td>" . $row['sub'] . "</td>";
                echo "</tr>";
              }
              echo "</table>";


              ?>
      </div>
    </div>

    <!-- Adds -->
    <div class="col-12 col-lg-4">
        <div class="delicious-add">

        </div>
    </div>
</div>
</div>
</section>
    <!-- ##### Follow Us Instagram Area Start ##### -->
    <div class="follow-us-instagram">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>Follow Us instagram</h5>
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
    <script src="print.js"></script>

</body>

</html>
