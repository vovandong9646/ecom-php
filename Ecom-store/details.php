<?php
include("includes/db.php");
include("functions/function.php");

if(isset($_GET['id'])) {
  $productId = $_GET['id'];
  $sql = "select * from products where product_id = $productId";
  $sqlQuery = mysqli_query($conn, $sql);
  $product = mysqli_fetch_array($sqlQuery);
}

addCart();

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
          <li class="active">
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


<!--details-->
<div id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Details</li>
      </ul>
    </div>  <!-- end col-md-12 -->

    <div class="col-md-3">
      <?php include("includes/sidebar.php"); ?>
    </div>

    <!--        content details-->
    <div class="col-md-9">
      <div class="row" id="productMain">
<!--        image chinh-->
        <div class="col-sm-6">
          <div id="mainImage">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-toggle-to="0" class="active"></li>
                <li data-target="#myCarousel" data-toggle-to="1"></li>
                <li data-target="#myCarousel" data-toggle-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <center>
                    <img src="admin_area/product_images/<?php echo $product["product_img1"]; ?>" class="img-responsive" />
                  </center>
                </div>
                <div class="item">
                  <center>
                    <img src="admin_area/product_images/<?php echo $product["product_img2"]; ?>" class="img-responsive" />
                  </center>
                </div>
                <div class="item">
                  <center>
                    <img src="admin_area/product_images/<?php echo $product["product_img3"]; ?>" class="img-responsive" />
                  </center>
                </div>
              </div> <!-- end inner carousel -->

              <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>

              <a href="#myCarousel" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>

            </div>
          </div>
        </div>
<!--        end image chinh-->

        <div class="col-sm-6">

<!--          menu chon size-->
          <div class="box">
            <h1 class="text-center"><?php echo $product['product_title']; ?></h1>
            <form method="post" class="form-horizontal">
              <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
              <div class="form-group">
                <label for="" class="col-md-5 control-label">Product Quantity</label>
                <div class="col-md-7">
                  <select name="product_qty" class="form-control" required>
                    <option value="">-- Select quantity --</option>
                    <?php for($i=1;$i<100;$i++) { ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-md-5 control-label">Product Size</label>
                <div class="col-md-7">
                  <select name="product_size" class="form-control" required>
                    <option value="">-- Select size --</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                  </select>
                </div>
              </div>

              <p class="price">$<?php echo $product["product_price"]; ?></p>
              <p class="text-center buttons">
                <button class="btn btn-primary" name="submit" type="submit">
                  <i class="fa fa-shopping-cart"></i>Add to cart
                </button>
              </p>

            </form>
          </div>
<!--          end menu chon size-->

<!--          anh nho-->
          <div class="row" id="thumbs">
            <div class="col-xs-4">
              <a href="" class="thumb">
                <img src="admin_area/product_images/<?php echo $product["product_img1"]; ?>" class="img-responsive">
              </a>
            </div> <!-- end col-4 -->

            <div class="col-xs-4">
              <a href="" class="thumb">
                <img src="admin_area/product_images/<?php echo $product["product_img2"]; ?>" class="img-responsive">
              </a>
            </div> <!-- end col-4 -->

            <div class="col-xs-4">
              <a href="" class="thumb">
                <img src="admin_area/product_images/<?php echo $product["product_img3"]; ?>" class="img-responsive">
              </a>
            </div> <!-- end col-4 -->

          </div> <!-- end thumbs -->
<!--          anh nho-->

        </div>

      </div> <!-- productMain -->
      <!--   describe product-->
      <div class="box" id="details">
        <p>
        <h4>Product details</h4>
        <p><?php echo $product["product_desc"]; ?></p>
        <h4>Size</h4>
        <ul>
          <li>Small</li>
          <li>Medium</li>
          <li>Large</li>
        </ul>
        </p>
        <hr>


      </div> <!-- end box -->

      <div class="row same-height-row">
        <div class="col-md-3 col-ms-6">
          <div class="box same-height headline">
            <h3 class="text-center">You also like these Products</h3>
          </div>
        </div>
        <?php
          $sqlQuery = "select * from products where p_cate_id = ".$product["p_cate_id"]." and product_id <> ".$product["product_id"]." order by product_id desc limit 0, 3 ";
          $productRelativeQuery = mysqli_query($conn, $sqlQuery);
          while($productRelative = mysqli_fetch_array($productRelativeQuery)) {
        ?>
        <div class="center-responsive col-md-3 col-sm-6">
          <div class="product same-height">
            <a href="details.php?id=<?php echo $productRelative["product_id"]; ?>">
              <img src="admin_area/product_images/<?php echo $productRelative['product_img1']; ?>" class="img-responsive" alt="">
            </a>
            <div class="text">
              <h3><a href="details.php?id=<?php echo $productRelative["product_id"]; ?>"><?php echo $productRelative["product_title"]; ?></a></h3>
              <p class="price">$<?php echo $productRelative["product_price"]; ?></p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <!--    end describe product-->
    </div> <!-- col-9 -->
  </div> <!-- end container -->
</div> <!-- end content -->
<!--end details-->

<!--  footer-->
<?php require_once("includes/footer.php") ?>
<!--end footer-->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>