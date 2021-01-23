<?php
$db = mysqli_connect('localhost', 'root', '', 'ecom_store');

// get address IP
function getRealUserIp() {
  switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])):
      return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])):
      return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default:
      return $_SERVER['REMOTE_ADDR'];
  }
}

// add cart
function addCart() {
  global $db;
  if(isset($_POST['submit'])) {
    $ipAdd = getRealUserIp();
    $productId = $_POST['product_id'];
    $productQty = $_POST['product_qty'];
    $productSize = $_POST['product_size'];

    // check products cua user da co trong cart chua, neu chua co thi add vaof cart, neu co roi thi bao message la ton tai san pham roi
    $sqlCheckCart = "select * from cart where ip_add = '$ipAdd' and product_id = '$productId'";
    $runQuery = mysqli_query($db, $sqlCheckCart);
    if(mysqli_num_rows($runQuery) > 0) {
      echo "<script>alert('This Product is already added in cart');</script>";
      echo "<script>window.open('details.php?id=$productId', '_self')</script>";
    } else {
      $sqlInsert = "insert into cart (product_id, ip_add, qty, size) values ('$productId','$ipAdd','$productQty', '$productSize')";
      mysqli_query($db, $sqlInsert);
      echo "<script>window.open('details.php?id=$productId','_self')</script>";
    }
  }
}

// count item in cart
function countItemInCart() {
  global $db;
  $ipAdd = getRealUserIp();
  $sql = "select * from cart where ip_add = '$ipAdd'";
  $runQuery = mysqli_query($db, $sql);
  $countItem = mysqli_num_rows($runQuery);
  echo $countItem;
}

// get total price
function getTotalPrice() {
  global $db;
  $ipAdd = getRealUserIp();
  $sql = "select * from cart where ip_add = '$ipAdd'";
  $runQuery = mysqli_query($db, $sql);
  $totalPrice = 0;
  while($item = mysqli_fetch_array($runQuery)) {
    $id = $item["product_id"];
    $sqlItem = "select * from products where product_id = '$id'";
    $it = mysqli_fetch_array(mysqli_query($db, $sqlItem));
    $totalPrice += ($it['product_price'] * $item['qty']);
  }
  echo "$".$totalPrice;
}



function getProducts()
{
  global $db;

  $query = mysqli_query($db, "select * from products order by product_id desc limit 0, 8");
  while ($product = mysqli_fetch_array($query)) {
    $product_id = $product['product_id'];
    $product_title = $product['product_title'];
    $product_price = $product['product_price'];
    $product_img1 = $product['product_img1'];
    echo "<div class='col-md-3 col-sm-6 single'>
        <div class='product'>
          <a href='details.php?id=$product_id'>
            <img src='admin_area/product_images/$product_img1' class='img-responsive'>
          </a>
          <div class='text'>
            <h3><a href='details.php?id=$product_id'>$product_title</a></h3>
            <p class='price'>$$product_price</p>
            <p class='buttons'>
              <a href='details.php?id=$product_id' class='btn btn-default'>View Details</a>
              <a href='details.php?id=$product_id' class='btn btn-primary'>
                <i class='fa fa-shopping-cart'></i>
                <span>Add to cart</span>
              </a>
            </p>
          </div>
        </div>
      </div>";
  }
}

function getProductCategory() {
  global $db;
  $runQuery = mysqli_query($db, "select * from product_categories");
  while($pCate = mysqli_fetch_array($runQuery)) {
    $pCateId = $pCate['p_cate_id'];
    $pCateTitle = $pCate['p_cate_title'];
    echo "<li><a href='shop.php?pCate=$pCateId'>$pCateTitle</a></li>";
  }
}

function getCategory() {
  global $db;
  $runQuery = mysqli_query($db, "select * from categories");
  while($cate = mysqli_fetch_array($runQuery)) {
    $cateId = $cate['cate_id'];
    $cateTitle = $cate['cate_title'];
    echo "<li><a href='shop.php?cateId=$cateId'>$cateTitle</a></li>";
  }
}

?>