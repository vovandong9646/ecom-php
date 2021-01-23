<?php
  include("includes/db.php");
  include("functions/function.php");
?>

<!doctype html>
<html lang="en">
<head>
  <title>Ecommerge Store</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

  <!--top start-->
  <div id="top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offer">
          <a href="#" class="btn btn-success btn-sm">Welcome : Guest</a>
          <a href="#">Shopping Cart Total Price: <?php getTotalPrice(); ?>, Total Item: <?php countItemInCart(); ?></a>
        </div>
        <div class="col-md-6">
          <ul class="menu">
            <li><a href="customer_register.php">Register</a></li>
            <li><a href="customer/my_account.php">My Account</a></li>
            <li><a href="cart.php">Go to Cart</a></li>
            <li><a href="checkout.php">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--    end top-->

  <div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
    <div class="container"><!-- container Starts -->
      <div class="navbar-header"><!-- navbar-header Starts -->
        <a class="navbar-brand home" href="index.php"><!--- navbar navbar-brand home Starts -->
          <img src="images/logo.png" alt="computerfever logo" class="hidden-xs">
          <img src="images/logo-small.png" alt="computerfever logo" class="visible-xs">
        </a><!--- navbar navbar-brand home Ends -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
          <span class="sr-only">Toggle Navigation </span>
          <i class="fa fa-align-justify"></i>
        </button>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
          <span class="sr-only">Toggle Search</span>
          <i class="fa fa-search"></i>
        </button>
      </div><!-- navbar-header Ends -->
      <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Starts -->
        <div class="padding-nav"><!-- padding-nav Starts -->
          <ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left Starts -->
            <li class="active">
              <a href="index.php"> Home </a>
            </li>
            <li>
              <a href="shop.php"> Shop </a>
            </li>
            <li>
              <a href='customer/my_account.php'>My Account</a>
            </li>
            <li>
              <a href="cart.php"> Shopping Cart </a>
            </li>
            <li>
              <a href="contact.php"> Contact Us </a>
            </li>
          </ul><!-- nav navbar-nav navbar-left Ends -->
        </div><!-- padding-nav Ends -->

        <a class="btn btn-primary navbar-btn right" href="cart.php"><!-- btn btn-primary navbar-btn right Starts -->
          <i class="fa fa-shopping-cart"></i>
          <span> 4 items in cart </span>
        </a><!-- btn btn-primary navbar-btn right Ends -->

        <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Starts -->
          <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
            <span class="sr-only">Toggle Search</span>
            <i class="fa fa-search"></i>
          </button>
        </div><!-- navbar-collapse collapse right Ends -->

        <div class="collapse clearfix" id="search"><!-- collapse clearfix Starts -->
          <form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->
            <div class="input-group"><!-- input-group Starts -->
              <input class="form-control" type="text" placeholder="Search" name="user_query" required>
              <span class="input-group-btn"><!-- input-group-btn Starts -->
                                      <button type="submit" value="Search" name="search" class="btn btn-primary">
                                          <i class="fa fa-search"></i>
                                      </button>
                                  </span><!-- input-group-btn Ends -->
            </div><!-- input-group Ends -->
          </form><!-- navbar-form Ends -->
        </div><!-- collapse clearfix Ends -->
      </div><!-- navbar-collapse collapse Ends -->
    </div><!-- container Ends -->
  </div><!-- navbar navbar-default Ends -->

  <!--    slider-->
  <div class="container" id="slider"> <!--    start container-->
    <div class="col-md-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner">

          <?php
            $sql = "select * from slider";
            $sliders = mysqli_query($conn, $sql);
            while($slider = mysqli_fetch_array($sliders)) {
          ?>

          <div class="item <?php if($slider['slider_id'] == 1) { echo "active"; } ?>">
            <img src="admin_area/slides_images/<?php echo $slider['slider_image'] ?>" alt=""/>
          </div>

          <?php } ?>
        </div> <!-- end carousel inner -->
        <a href="#myCarousel" class="left carousel-control" data-slide="prev"> <!-- left carousel control -->
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a href="#myCarousel" class="right carousel-control" data-slide="next"> <!-- left carousel control -->
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> <!-- end myCarousel -->
    </div> <!-- col-md-12 -->
  </div> <!-- end container -->
  <!--end slider-->

  <div id="advantages"> <!--start advantages-->
    <div class="container"> <!--start container-->
      <div class="same-height-row"> <!--start same-height-row -->
        <div class="col-md-4">
          <div class="box same-height">
            <div class="icon">
              <i class="fa fa-heart"></i>
            </div>
            <h3><a href="">WE LOVE OUR CUSTOMER</a></h3>
            <p>We are known to provide best possible service ever</p>
          </div> <!--end same-height -->
        </div> <!--end col-md-4 -->
        <div class="col-sm-4">
          <div class="box same-height">
            <div class="icon"><i class="fa fa-tags"></i></div>
            <h3><a href="">BEST PRICES</a></h3>
            <p>You can check on all others sites about the prices and than compare with us.</p>
          </div> <!--end same-height -->
        </div>  <!--end col-md-4 -->
        <div class="col-sm-4">
          <div class="box same-height">
            <div class="icon"><i class="fa fa-thumbs-up"></i></div>
            <h3><a href="">100% SATISFACTION GUARANTEED</a></h3>
            <p>Free returns on everything for 3 months.</p>
          </div> <!--end same-height -->
        </div>  <!--end col-md-4 -->
      </div> <!--end same-height-row -->
    </div> <!--end container-->
  </div> <!--end advantages-->

  <!--  hot product-->
    <div id="hot">
      <div class="box">
        <div class="container">
          <div class="col-md-12">
            <h2>last this week</h2>
          </div>
        </div>
      </div> <!-- end box -->
    </div><!-- end hot product -->
  <!--end hot product-->

  <div id="content" class="container">
    <div class="row">

      <?php  getProducts(); ?>

    </div>
  </div>

<!--  footer-->
  <?php require_once("includes/footer.php")  ?>
<!--end footer-->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>