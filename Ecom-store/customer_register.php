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
          <li><a href="checkout.php">My Account</a></li>
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
          <li>
            <a href="index.php"> Home </a>
          </li>
          <li>
            <a href="shop.php"> Shop </a>
          </li>
          <li>
            <a href='checkout.php'>My Account</a>
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


<!--content shop-->
<div id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Register</li>
      </ul>
    </div>  <!-- end col-md-12 -->

    <div class="col-md-3">
      <?php include ("includes/sidebar.php"); ?>
    </div>

    <!--    content contact-->
    <div class="col-md-9">
      <div class="box">
        <div class="box-header">
          <center>
            <h2>Register A New Account</h2>
          </center>
        </div>
        <form action="">
          <div class="form-group">
            <label for="">Customer Name</label>
            <input type="text" class="form-control" name="c_name" required />
          </div>
          <div class="form-group">
            <label for="">Customer Email</label>
            <input type="text" class="form-control" name="c_email" required />
          </div>
          <div class="form-group">
            <label for="">Customer Password</label>
            <input type="password" class="form-control" name="c_pass" required />
          </div>
          <div class="form-group">
            <label for="">Customer Country</label>
            <input type="text" class="form-control" name="c_country" required />
          </div>
          <div class="form-group">
            <label for="">Customer City</label>
            <input type="text" class="form-control" name="c_city" required />
          </div>
          <div class="form-group">
            <label for="">Customer Contact</label>
            <input type="text" class="form-control" name="c_contact" required />
          </div>
          <div class="form-group">
            <label for="">Customer Address</label>
            <input type="text" class="form-control" name="c_address" required />
          </div>
          <div class="form-group">
            <label for="">Customer Image</label>
            <input type="file" class="form-control" name="c_image" required />
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="register">
              <i class="fa fa-user-md"></i> Register
            </button>
          </div>
        </form>
      </div>
    </div>
    <!--    end content contact-->

  </div>
</div>

<!--  footer-->
<?php require_once("includes/footer.php")  ?>
<!--end footer-->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>