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


<!--content shop-->
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Shop</li>
                </ul>
            </div>  <!-- end col-md-12 -->

            <div class="col-md-3">
                <?php include ("includes/sidebar.php"); ?>
            </div>

            <div class="col-md-9">
              <div class="box">
                <?php
                  if(isset($_GET['pCate'])) {
                    $sql = "select * from product_categories where p_cate_id = ".$_GET['pCate'];
                    $productCategory = mysqli_fetch_array(mysqli_query($conn, $sql));
                    $pCateTitle = $productCategory['p_cate_title'];
                    $pCateDesc  = $productCategory['p_cate_desc'];
                    echo "<h1>$pCateTitle</h1>
                          <p>$pCateDesc</p>";
                  } else if(isset($_GET['cateId'])) {
                    $sql = "select * from categories where cate_id = ".$_GET['cateId'];
                    $category = mysqli_fetch_array(mysqli_query($conn, $sql));
                    $categoryTitle = $category['cate_title'];
                    $categoryDesc  = $category['cate_desc'];
                    echo "<h1>$categoryTitle</h1>
                            <p>$categoryDesc</p>";
                  } else {
                    echo "<h1>Shop</h1>
                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using '</p>
                        ";
                  }
                ?>
              </div>
              <div class="row">

                <?php
                  // phan trang
                  $per_page = 6;
                  $page = 1;
                  if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                  }
                  $position = ($page - 1) * $per_page;

                  $sql = "select * from products";
                  if(isset($_GET['pCate'])) {
                    $sql.= " where p_cate_id = ".$_GET['pCate'];
                  }
                  if(isset($_GET['cateId'])) {
                    $sql.= " where cate_id = ".$_GET['cateId'];
                  }
                  $sql.= " limit $position, $per_page";
                  $query = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($query) == 0) {
                    echo "
                          <div class='col-lg-12 center-responsive'>
                            <h2 class='text-center'>Not exits products</h2>                          
                          </div>";
                  } else {
                     while($product = mysqli_fetch_array($query)) {
                ?>

                <div class="col-md-4 col-sm-6 center-responsive">
                  <div class="product">
                    <a href="details.php?id=<?php echo $product['product_id']; ?>">
                      <img src="admin_area/product_images/<?php echo $product['product_img1']; ?>" class="img-responsive">
                    </a>
                    <div class="text">
                      <h3><a href="details.php?id=<?php echo $product['product_id']; ?>"><?php echo $product['product_title']; ?></a></h3>
                      <p class="price">$<?php echo $product['product_price']; ?></p>
                      <p class="buttons">
                        <a href="details.php?id=<?php echo $product['product_id']; ?>" class="btn btn-default">View Details</a>
                        <a href="cart.php?id=<?php echo $product['product_id']; ?>" class="btn btn-primary">
                          <i class="fa fa-shopping-cart"></i>Add to cart
                        </a>
                      </p>
                    </div> <!-- end text -->
                  </div> <!-- end product -->
                </div> <!-- end col-4 -->

                <?php }
                  }
                ?>
              </div> <!-- end row -->

              <center>
                <ul class="pagination">
                  <?php
                    $sql = "select * from products";
                    if(isset($_GET['pCate'])) {
                      $sql.= " where p_cate_id = ".$_GET['pCate'];
                    }
                    if(isset($_GET['cateId'])) {
                      $sql.= " where cate_id = ".$_GET['cateId'];
                    }
                    $query = mysqli_query($conn, $sql);
                    $totalItem = mysqli_num_rows($query);
                    $totalPage = ceil($totalItem / $per_page);
                    if($totalPage > 1) {
                  ?>
                  <li><a href="shop.php?page=1">First Page</a></li>
                  <?php
                    for($i=1;$i<=$totalPage;$i++) {
                   ?>
                      <li><a href="shop.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                   <?php }  ?>
                  <li><a href="shop.php?page=<?php echo $totalPage; ?>">Last Page</a></li>
                  <?php } ?>
                </ul>
              </center>

            </div>

        </div> <!-- end container -->
    </div> <!-- end content -->

<!--end content shop-->

<!--  footer-->
<?php require_once("includes/footer.php")  ?>
<!--end footer-->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>