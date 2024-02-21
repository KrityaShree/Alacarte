<?php
require 'chatbot.php';
session_start();
$error = array();
$msg = array();
if($_SESSION["name"]=='admin') {
  header("Location:login.php");
}else{

//connect to DB
    $conn = new mysqli('localhost', 'root', '', 'SE');
    $mysqli = new mysqli('localhost', 'root', '', 'recipes');
    $n = 5;
    if(isset($_POST["submit"]))
    {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "INSERT INTO images(i_name) VALUES ('$file')";
        if(mysqli_query($mysqli, $query))
        {
            //move_uploaded_file($file,"images/".$file);
        }
        else
        {
            echo 'mysqli->error';
        }

        $rname = $_POST['rname'];
        $category = $_POST['category'];
        $comments = $_POST['comments'];
        $history = $_POST['history'];
        $course = $_POST['course'];
        $basetype = $_POST['basetype'];
        $prepm = $_POST['prepm'];
        $ethnicity = $_POST['ethnicity'];
        $prept = $_POST['prept'];
        $diff = $_POST['diff'];
        $serving = $_POST['serving'];
        $ingredients = $_POST['ingredients'];
        $directions = $_POST['directions'];
        $keywords = $_POST['keywords'];

      if (empty($rname)){
          $error['1'] = "Enter recipe name.";
      }elseif (empty($history)){
          $error['2'] = "Enter history.";
      }elseif (empty($prept)){
            $error['3'] = "Enter prep time.";
      }elseif (empty($directions)){
            $error['4'] = "Enter directions";
      }
      else{
        $rname = $mysqli->real_escape_string($rname);
        $category = $mysqli->real_escape_string($category);
        $comments = $mysqli->real_escape_string($comments);
        $history = $mysqli->real_escape_string($history);
        $course = $mysqli->real_escape_string($course);
        $basetype = $mysqli->real_escape_string($basetype);
        $prepm = $mysqli->real_escape_string($prepm);
        $ethnicity = $mysqli->real_escape_string($ethnicity);
        $prept = $mysqli->real_escape_string($prept);
        $diff = $mysqli->real_escape_string($diff);
        $serving = $mysqli->real_escape_string($serving);
        $directions = $mysqli->real_escape_string($directions);
        $keywords = $mysqli->real_escape_string($keywords);
        $insert1 = $mysqli->query("INSERT INTO recipe(rname,cname,comments,history,course,base_type,prep_method,ethnicity,prep_time,difficulty,serving_size,ingredients,directions,i_name,keywords) VALUES ('$rname','$category','$comments','$history','$course','$basetype','$prepm','$ethnicity','$prept','$diff','$serving','$ingredients','$directions','$file','$keywords')");
        $insert2 = $mysqli->query("UPDATE category set total=total+1 where cname='$category'");

        if($insert1){
            $msg['1'] = "Successfully inserted in Recipe";
        }
        if($insert2){
            $msg['2'] = "Successfully updated in Category";
        }
        else{
            echo $mysqli->error;
        }



        }
    }




?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Homepage</title>

    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#submit').click(function(){
                var size = document.getElementById('image').files[0].size;
                bytes = (size / 1048576).toFixed(2);
                var image_name = $('#image').val();
                if(image_name == '')
                {
                    alert("Please Select Image");
                    return false;
                }
                else{
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                    {
                        alert("Invalid Image File ");
                        $('#image').val('');
                        return false;
                    }
                    else if(bytes > 40){
                      alert("Size over 40MB. Please enter file with size less than 40MB");

                    }
                }
            })

        });
    </script>

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


    <!-- Recipe Section Begin -->
    <div class="container">
        <div class="row">
              <div class= "rec-form">
                <form method="post" enctype="multipart/form-data">
                  <h3 class="text-center">RECIPE POST</h3>

                  <?php if(count($error) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($error as $er): ?>
                        <li><?php echo $er; ?></li>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!----------->

                  <div class="form-group">
                    <label for="rname">Recipe Name</label>
                    <input type="text" name="rname" class= "form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" class= "form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="comments">Description</label>
                    <input type="text" name="comments" class= "form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="history">History</label>
                    <input type="text" name="history" class="form-control form-control -lg">
                  </div>

                  <div class="form-group">
                  <label for="course">Course</label>
                  <select id="course" name="course">
                    <option value="Breakfast">Breakfast & Brunch</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Snacks">Appetizers & Snacks</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Drink">Drinks</option>
                    <option value="Salad">Salad</option>
                </select>
                  </div>

                  <div class="form-group">
                  <label for="basetype">Base Type</label>
                  <select id="basetype" name="basetype">
                    <option value="Rice/Pasta/Noodles">Rice/Pasta/Noodles</option>
                    <option value="Milk">Milk/Cheese</option>
                    <option value="Egg">Egg</option>
                    <option value="Poultry">Poultry</option>
                    <option value="Meat">Meat</option>
                    <option value="Fish">Fish</option>
                    <option value="Fruit">Fruit/Vegetable</option>
                    <option value="Other">Other</option>
                </select>
                  </div>

                  <div class="form-group">
                    <label for="prepm">Preparation Method</label>
                    <select id="prepm" name="prepm">
                    <option value="Stove">Stove</option>
                    <option value="Induction Stove">Induction Stove</option>
                    <option value="Microwave">Microwave</option>
                    <option value="Oven">Oven</option>
                    <option value="BBQ">BBQ</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="ethnicity">Ethnicity</label>
                    <select id="ethnicity" name="ethnicity">
                    <option value="Indian">Indian</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Mexican">Mexican</option>
                    <option value="American">American</option>
                    <option value="Italian">Italian</option>
                    <option value="Middleeast">Middle Eastern</option>
                    <option value="French">French</option>
                    <option value="Japanese">Japanese</option>
                </select>
                  </div>

                  <div class="form-group">
                    <label for="prept">Preparation Time (In minutes)</label>
                    <input type="text" name="prept" class="form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="diff">Difficulty</label>
                    <select id="diff" name="diff">
                    <option value="Easy">Easy</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Expert">Expert</option>
                </select>
                  </div>

                  <div class="form-group">
                    <label for="serving">Serving Size</label>
                    <input type="int" name="serving" class="form-control form-control -lg">
                  </div>

                <div class="form-group">
                  <div class="form-group">
                    <label for="ingredients">Ingredient</label>
                    <pre><textarea class="form-control form-control -lg" type="text" name="ingredients" placeholder="Submit in points with measurements. Example: 2 eggs" style="height:200px"></textarea></pre>
                  </div>

                  <div class="form-group">
                    <label for="directions">Directions</label>
                    <pre><textarea class="form-control form-control -lg" type="text" name="directions" placeholder="Submit in point Example: 1. Add...." style="height:200px"></textarea></pre>
                  </div>

                  <div class="form-group">
                    <label for="keywords">Keywords</label><br>
                    <pre><textarea class="form-control form-control -lg" type="text" name="keywords" placeholder="Type in the keywords from the list below to help find your recipe quickly. Seperate each with comma and use the exact words given below" style="height:200px"></textarea></pre>
                        <label class="checkbox-inline"> Appetizers & Snacks, </label>
                        <label class="checkbox-inline"> Breakfast & Brunch, </label>
                        <label class="checkbox-inline"> Lunch, </label>
                        <label class="checkbox-inline"> Dinner,</label>
                        <label class="checkbox-inline"> Desserts, </label>
                        <label class="checkbox-inline"> Drinks, </label>
                        <label class="checkbox-inline"> Salads, </label>
                        <label class="checkbox-inline"> Keto, </label>
                        <label class="checkbox-inline"> Low Carb Diet,</label>
                        <label class="checkbox-inline"> Vegan, </label>
                        <label class="checkbox-inline">Vegetarian,</label>
                        <label class="checkbox-inline"> NV, </label>
                        <label class="checkbox-inline"> Low Fat, </label>
                        <label class="checkbox-inline"> Under 5 Ingredients, </label>
                        <label class="checkbox-inline"> No Bake Recipes, </label>
                        <label class="checkbox-inline"> One Pot Recipes, </label>
                        <label class="checkbox-inline"> Healthy, </label>
                        <label class="checkbox-inline"> Under 30 Minutes </label>

                  </div>

                  <div class="container" style="width:500px;">
                <h3 align="center">Insert Images</h3>
                <br />

                     <input type="file" name="image" id="image" />
                     <br />
                </form>
                <br />
                <br />
           </div>


                  <div class="form-group">
                    <button type="SUBMIT" name="submit" id="submit" class="btn btn-primary btn-block btn-lg">SUBMIT</button>
                  </div>

                </form>
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
  <?php } ?>
</body>

</html>
