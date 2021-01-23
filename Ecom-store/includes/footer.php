<div id="footer">
  <div class="container">
    <div class="row">

      <div class="col-md-3 col-sm-6">
        <h4>Pages</h4>
        <ul>
          <li><a href="cart.php">Shopping Cart</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="checkout.php">My Account</a></li>
        </ul>

        <hr>

        <h4>User Section</h4>
        <ul>
          <li><a href="checkout.php">Login</a></li>
          <li><a href="customer_register.php">Register</a></li>
        </ul>

        <hr class="hidden-md hidden-lg hidden-sm">

      </div>

      <div class="col-md-3 col-sm-6">
        <h4>Top Products Categories</h4>
        <ul>

          <?php
            $query = mysqli_query($conn, "select * from product_categories");
            while($pCate = mysqli_fetch_array($query)) {
          ?>
            <li><a href="shop.php?p_cat=<?php echo $pCate['p_cate_id']; ?>"><?php echo $pCate['p_cate_title']; ?></a></li>
          <?php } ?>
        </ul>
        <hr class="hidden-md hidden-lg">
      </div>

      <div class="col-md-3 col-sm-6">
        <h4>Where to find us</h4>
        <p>
          <strong>Computerfever Ltd.</strong>
          <br>Seed Prt
          <br>Lahore
          <br>1111111111
          <br>aaaaa@gmail.com
          <br>
          <strong>Critiano Ronaldo</strong>
        </p>
        <a href="contact.html">Go to contact us page</a>
        <hr class="hidden-md hidden-lg">
      </div>

      <div class="col-md-3 col-sm-6">
        <h4>Get the news</h4>
        <p class="text-muted">
          Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        </p>
        <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=computerfever', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!-- form Starts -->
          <div class="input-group">
            <input type="text" class="form-control" name="email">
            <input type="hidden" value="computerfever" name="uri"/>
            <input type="hidden" name="loc" value="en_US"/>
            <span class="input-group-btn">
              <input type="submit" value="subscribe" class="btn btn-default">
            </span>
          </div>
        </form>

        <hr>

        <h4>Stay in touch</h4>
        <p class="social">
          <a href=""><i class="fa fa-facebook"></i></a>
          <a href=""><i class="fa fa-twitter"></i></a>
          <a href=""><i class="fa fa-instagram"></i></a>
          <a href=""><i class="fa fa-google-plus"></i></a>
          <a href=""><i class="fa fa-envelope"></i></a>
        </p>

      </div>

    </div>
  </div>
</div>
<div id="copyright">
  <div class="container">
    <div class="col-md-6">
      <p class="pull-left">&copy; 2021 aaaaaa</p>
    </div>
    <div class="col-md-6">
      <p class="pull-right">Template create by <a href="">AAAAAA</a></p>
    </div>
  </div>
</div>