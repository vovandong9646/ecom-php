<?php
  include ("includes/db.php");

  if(isset($_POST['submit'])) {
    $product_title = $_POST['product_title'];
    $product_cate = $_POST['product_cate'];
    $category = $_POST['category'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_image1 = $_FILES['product_img1']['tmp_name'];
    $temp_image2 = $_FILES['product_img2']['tmp_name'];
    $temp_image3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_image1, "product_images/$product_img1");
    move_uploaded_file($temp_image2, "product_images/$product_img2");
    move_uploaded_file($temp_image3, "product_images/$product_img3");

    $resultQuery = mysqli_query($conn,
        "insert into products 
        (p_cate_id,cate_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keywords) 
        values 
        ('$product_cate', '$category', now(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_desc', '$product_keywords')");

    if($resultQuery) {
      echo "<script>alert('Product has been inserted successfully!!!')</script>";
      echo "<script>window.open('insert_product.php', '_self')</script>";
    }

  }

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/fontawesome.min.css">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>


<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-dashboard"></i> Dashboard / Insert Products
      </li>
    </ol>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> Insert Products
        </h3>
      </div>

      <div class="panel-body">
        <form enctype="multipart/form-data" class="form-horizontal" method="post">
          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Title</label>
            <div class="col-md-6">
              <input type="text" name="product_title" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Category</label>
            <div class="col-md-6">
              <select name="product_cate" id="" class="form-control">
                <option value="">Select a product category</option>

                <?php
                  $sql = "select * from product_categories";
                  $categories = mysqli_query($conn, $sql);
                  while($cate = mysqli_fetch_array($categories)) {
                ?>
                    <option value="<?php echo $cate['p_cate_id']; ?>"><?php echo $cate['p_cate_title']; ?></option>
                <?php
                  }
                ?>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Category</label>
            <div class="col-md-6">
              <select name="category" class="form-control" required>
                <option value="">Select a category</option>
                <?php
                  $sql = "select * from categories";
                  $categories = mysqli_query($conn, $sql);
                  while($cate = mysqli_fetch_array($categories)) {
                ?>
                    <option value="<?php echo $cate['cate_id']; ?>"><?php echo $cate['cate_title']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Image 1</label>
            <div class="col-md-6">
              <input type="file" name="product_img1" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Image 2</label>
            <div class="col-md-6">
              <input type="file" name="product_img2" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Image 3</label>
            <div class="col-md-6">
              <input type="file" name="product_img3" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Price</label>
            <div class="col-md-6">
              <input type="text" name="product_price" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Keywords</label>
            <div class="col-md-6">
              <input type="text" name="product_keywords" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">Product Description</label>
            <div class="col-md-6">
              <textarea name="product_desc" class="form-control" cols="30" rows="10"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label"></label>
            <div class="col-md-6">
              <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>