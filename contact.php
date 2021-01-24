<?php
include("includes/db.php");
include("functions/function.php");
include("mail/MailSender.php");

if (isset($_POST['submit'])) {
  $senderName = $_POST['name'];
  $senderEmail = $_POST['email'];
  $senderSubject = $_POST['subject'];
  $senderMessage = $_POST['message'];
  sendMail($senderName, $senderEmail, $senderSubject, $senderMessage);

//  $email = $_POST['email'];
//  $subject = "welcome to my website";
//  $msg = "I shall get you soon, thanks for sending us email";
//  sendMail('Admin', $email, $subject, $msg);
  echo "<h2 align='center'>Your message has been sent successfully</h2>";
}

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
          <li class="active">
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
        <li>Contact</li>
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
          <h2>Contact Us</h2>
          <p class="text-muted">
            If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.
          </p>
        </center>
      </div>
      <form method="post" action="contact.php">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name" required />
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" name="email" required />
        </div>
        <div class="form-group">
          <label for="">Subject</label>
          <input type="text" class="form-control" name="subject" required />
        </div>
        <div class="form-group">
          <label for="">Message</label>
          <textarea name="message" class="form-control"></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="submit">
            <i class="fa fa-user-md"></i> Send Message
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