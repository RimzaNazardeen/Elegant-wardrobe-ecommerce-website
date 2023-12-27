<!-- connect file-->
<?php
@include('../includes/connect.php');
@include('../functions/common_functions.php');
@session_start();

?>
<!-- navbar-->
<div class="container-fluid p-0">
        <!-- first child: header -->
        <nav id="navbar-example2" class="navbar navbar-dark px-2"  style="background-color:#535c68;">
  <img src="./images/logoFinal2.jpg" alt=""class="logo">
  <h1  style="color:#ecf0f1"> ELEGANT WARDROBE</h1>
  <ul class="nav nav-pills">
    <li class="nav-item"> 
 
    <li class="nav-item  ">
          <a class="nav-link active ml-2" aria-current="page" href="my_cart.php">
            <i class="fa-solid fa-cart-shopping " style="color:#ecf0f1"></i>
            <?php no_of_cart_items(); ?> Items </a>
        </li>
    
    <li class="nav-item dropdown " >
      
        <?php
          if (!isset($_SESSION['username'])) {
            echo "<a  class='nav-link dropdown-toggle fw-bolder' data-bs-toggle='dropdown' href='' role='button' aria-expanded='false' 
            style='color:#ecf0f1'> Account </a>
            <ul class='dropdown-menu'><li><a class='dropdown-item' href='./user/user_login.php'>login</a></li>
            <li><a class='dropdown-item' href='./user/user_registration.php'>Register</a></li>";
          }else {
            echo "<a  class='nav-link dropdown-toggle fw-bolder' data-bs-toggle='dropdown' href='' role='button' aria-expanded='false' 
            style='color:#ecf0f1'> Welcome ".$_SESSION['username']."</a>
            <ul class='dropdown-menu'><li><a class='dropdown-item' href='./user/logout.php'>logout</a></li>
            <li><a class='dropdown-item' href='./user/profile.php'>My Profile</a></li>";
          }
        
        


        ?>
        
      </ul>
    </li>
  </ul>
</nav>

<!-- call add to cart function-->
<?php add_cart(); ?>

<!-- Second child: menu bar-->

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #BDC581;">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon font_bold"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 font_bold ">
      <li class="nav-item offset-md-4 ">
          <a class="nav-link active ml-2" aria-current="page" href="index.php"> HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link offset-md-2 ml-2" href="display_all_products.php"> PRODUCTS GALLERY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link offset-md-2 ml-2" href="#"> CONTACT </a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
         name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>