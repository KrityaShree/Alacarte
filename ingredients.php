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
    <title>Ingredient Page</title>

    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script async>(function(w, d) { w.CollectId = "5e9887642bf69958e24c5ec1"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
    <script src="/website/js/Print.js/src/js/print.js"></script>
</head>

<body>

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php //print("$output"); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

        <!-- Recipe Slider -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                  <br>

                </div>
            </div>
        <?php

            $query2 = "SELECT * FROM ingredient";
            $result = mysqli_query($connect, $query2);
            if($result->num_rows != 0){
                //process login
                $row = $result->fetch_assoc();
                $ing_id = $row['ing_id'];
                $ing_name = $row['ing_name'];
                $ing_des = $row['ing_des'];
                $i_name = $row['i_name'];
            }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <h4 class="text-center">Ingredients</h4>
                  <form class="receipe-ratings text-right my-5" action="#" method="post">
                      <input type="search" name="ingsearch" placeholder="Type any ingredient">
                      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
                </div>
                  <br>
                <?php
                if(isset($_POST['ingsearch'])){
                  $s = $_POST['ingsearch'];
                  $s = preg_replace("#[^0-9a-z]#i","",$s);

                  $query3 = "SELECT * FROM Ingredient WHERE ing_name LIKE '%$s%'";
                  $qu = mysqli_query($connect,$query3);
                  if($qu->num_rows == 0){
                      $out = 'No results found';
                    }else{
                  while ($row = mysqli_fetch_array($qu)) {
                    echo '<div id= "$ing_id">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['i_name'] ).'" style="width:128px;height:128px;"/>';
                    echo "<br>";
                    echo "<h5>" . $row['ing_name'] . "</h5>";
                    echo "<h6>" . $row['ing_des'] . "</h6>";
                    echo "<br>";
                    echo "</div>";
                  }
                }
              }

                while($row = mysqli_fetch_array($result))
                {
                  echo '<div id= "$ing_id">';
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['i_name'] ).'" style="width:128px;height:128px;"/>';
                  echo "<br>";
                  echo "<h5>" . $row['ing_name'] . "</h5>";
                  echo "<h6>" . $row['ing_des'] . "</h6>";
                  echo "<br>";
                  echo "</div>";
                }

                ?>

                </div>
            </div>
          </div>
        <!-- Recipe Content Area -->


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
