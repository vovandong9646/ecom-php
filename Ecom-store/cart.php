<?php
include("includes/db.php");
include("functions/function.php");

// update cart
if (isset($_POST['update'])) {
  $productIds = $_POST['remove'];
  foreach ($productIds as $id) {
    $sql = "delete from cart where product_id = '$id'";
    $delQuery = mysqli_query($conn, $sql);
    if($delQuery){
      echo "<script>window.open('cart.php','_self')</script>";
    }
  }
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
          <li class="active">
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

<div id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Cart</li>
      </ul>
    </div>  <!-- end col-md-12 -->

<!--    content carts-->
  <div class="col-md-9" id="cart">
    <div class="box">
      <form method="post" enctype="multipart/form-data">
        <h1>Shopping Cart</h1>
        <p class="text-muted" > You currently have <?php echo countItemInCart(); ?> item(s) in your cart. </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th colspan="2">Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Size</th>
                <th colspan="1">Delete</th>
                <th colspan="2">Sub Total</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $ipAdd = getRealUserIp();
              $sql = "select * from cart where ip_add = '$ipAdd'";
              $queryCart = mysqli_query($conn, $sql);
              while($itemInCart = mysqli_fetch_array($queryCart)) {
                $itemId = $itemInCart["product_id"];
                $qty = $itemInCart['qty'];
                $size = $itemInCart['size'];
                $sqlItem = "select * from products where product_id = '$itemId'";
                $productQuery = mysqli_query($conn, $sqlItem);
                while($product = mysqli_fetch_array($productQuery)) {
                  $subTotal = $product['product_price'] * $qty;
            ?>
              <tr>
                <td>
                  <img src="admin_area/product_images/<?php echo $product['product_img1']; ?>" alt="">
                </td>
                <td>
                  <a href=""><?php echo $product['product_title']; ?></a>
                </td>
                <td><?php echo $qty; ?></td>
                <td>$<?php echo $product['product_price'] ;?>.00</td>
                <td><?php echo $size; ?></td>
                <td><input type="checkbox" name="remove[]" value="<?php echo $product['product_id']; ?>"></td>
                <td>$<?php echo $subTotal; ?>.00</td>
              </tr>
            <?php
                }
              }
              ?>

            </tbody>
            <tfoot>
              <tr>
                <th colspan="5">Total</th>
                <th colspan="2"><?php getTotalPrice(); ?>.00</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="box-footer">
          <div class="pull-left">
            <a href="" class="btn btn-default">
              <i class="fa fa-chevron-left"></i> Continue Shop
            </a>
          </div>
          <div class="pull-right">
            <button class="btn btn-default" type="submit" name="update" value="Update Cart">
              <i class="fa fa-refresh"></i> Update Cart
            </button>
            <a href="checkout.php" class="btn btn-primary">
              Proceed to checkout <i class="fa fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </form>
    </div>

    <div class="row same-height-row">
      <div class="col-md-3 col-ms-6">
        <div class="box same-height headline">
          <h3 class="text-center">You also like these Products</h3>
        </div>
      </div>
      <div class="center-responsive col-md-3 col-sm-6">
        <div class="product same-height">
          <a href="details.php">
            <img src="admin_area/product_images/product.jpg" class="img-responsive" alt="">
          </a>
          <div class="text">
            <h3><a href="">Marvel black kids polo t-shirt</a></h3>
            <p class="price">$50</p>
          </div>
        </div>
      </div>
      <div class="center-responsive col-md-3 col-sm-6">
        <div class="product same-height">
          <a href="details.php">
            <img src="admin_area/product_images/product.jpg" class="img-responsive" alt="">
          </a>
          <div class="text">
            <h3><a href="">Marvel black kids polo t-shirt</a></h3>
            <p class="price">$50</p>
          </div>
        </div>
      </div>
      <div class="center-responsive col-md-3 col-sm-6">
        <div class="product same-height">
          <a href="details.php">
            <img src="admin_area/product_images/product.jpg" class="img-responsive" alt="">
          </a>
          <div class="text">
            <h3><a href="">Marvel black kids polo t-shirt</a></h3>
            <p class="price">$50</p>
          </div>
        </div>
      </div>
    </div>

  </div>

    <div class="col-md-3">
      <div class="box" id="order-summary">
        <div class="box-header">
          <h3>Order Summary</h3>
        </div>
        <p class="text-muted">
          Shipping and additional costs are calculated based on the values you have entered.
        </p>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>Order Subtotal</td>
                <th><?php getTotalPrice(); ?>.00</th>
              </tr>
            <tr>
              <td>Shipping and handing</td>
              <th>$0.00</th>
            </tr>
            <tr>
              <td>Tax</td>
              <th>$0.00</th>
            </tr>
            <tr class="total">
              <td>Total</td>
              <th>$200.00</th>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
<!--    end content carts-->

  </div>
</div>

<!--  footer-->
<?php require_once("includes/footer.php") ?>
<!--end footer-->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>