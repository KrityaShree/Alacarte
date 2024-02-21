<?php
if(!isset($_REQUEST['id'])){
    header("Location: shop.php");
}

// Include the database config file
require_once 'dbConfig.php';
require "chatbot.php";
// Fetch order details from database
$result = $db->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_REQUEST['id']);

if($result->num_rows > 0){
    $orderInfo = $result->fetch_assoc();
}else{
    header("Location: shop.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Order Status</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ##### CTA Area Start ##### -->
  <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg12.jpg);">
      <div class="container h-100">
          <div class="row h-100 align-items-center">
              <div class="col-12 tect-center">
                  <div class="cta-content text-center">
                      <h2>Order Status</h2>
                  </div>

              </div>
          </div>
      </div>
  </section>
  <br>
  <!-- ##### CTA Area End ##### -->
<div class="container">
    <div class="col-12">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12">
                <div class="alert alert-success">Your order has been placed successfully.</div>
            </div>

            <!-- Order status & shipping info -->
            <div class="row col-lg-12 ord-addr-info">
                <div class="hdr"><h6><br><b>Order Info:&nbsp;</b></h6></div>
                <h6><b><br>Reference ID:</b> #<?php echo $orderInfo['id']; ?>&nbsp;</h6>
                <h6><b><br>Total:</b> <?php echo '₹'.$orderInfo['grand_total'].' INR'; ?>&nbsp;</h6>
                <h6><b><br>Placed On:</b> <?php echo $orderInfo['created']; ?>&nbsp;</h6>
                <h6><b><br>Buyer Name:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?>&nbsp;</h6>
                <h6><b><br>Email:</b> <?php echo $orderInfo['email']; ?>&nbsp;</h6>
                <h6><b><br>Phone:</b> <?php echo $orderInfo['phone']; ?>&nbsp;</h6>
            </div>

            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get order items from the database
                        $result = $db->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN products as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']);
                        if($result->num_rows > 0){
                            while($item = $result->fetch_assoc()){
                                $price = $item["price"];
                                $quantity = $item["quantity"];
                                $sub_total = ($price*$quantity);
                        ?>
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo '₹'.$price.' INR'; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo '₹'.$sub_total.' INR'; ?></td>
                        </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php } else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        <?php } ?>
    </div>
</div>
<br>
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
