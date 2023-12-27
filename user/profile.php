<!-- connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Elegant wardrobe  Welcome  <?php echo $_SESSION['username'] ?></title>

    <!-- bootstrap Css Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- font awsome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden
        }
    </style>
</head>
<body>

<!-- first child: header -->
<!-- include header -->
<!-- navbar-->
<div class="container-fluid p-0">
        <!-- first child: header -->
        <nav id="navbar-example2" class="navbar navbar-dark px-1"  style="background-color:#535c68;">
  <img src="../images/New_logo.jpg" alt=""class="logo">
  <ul class="nav nav-pills">
    <li class="nav-item"> 
 
    <li class="nav-item  ">
          <a class="nav-link active ml-2" aria-current="page" href="../my_cart.php">
            <i class="fa-solid fa-cart-shopping " style="color:#ecf0f1"></i>
            <?php no_of_cart_items(); ?> Items </a>
        </li>
    
    <li class="nav-item dropdown " >
      
        <?php
          if (!isset($_SESSION['username'])) {
            echo "<a  class='nav-link dropdown-toggle fw-bolder' data-bs-toggle='dropdown' href='' role='button' aria-expanded='false' 
            style='color:#ecf0f1'> Account </a>
            <ul class='dropdown-menu'><li><a class='dropdown-item' href='user_login.php'>login</a></li>
            <li><a class='dropdown-item' href='user_registration.php'>Register</a></li>";
          }else {
            echo "<a  class='nav-link dropdown-toggle fw-bolder' data-bs-toggle='dropdown' href='' role='button' aria-expanded='false' 
            style='color:#ecf0f1'> Welcome ".$_SESSION['username']."</a>
            <ul class='dropdown-menu'><li><a class='dropdown-item' href='logout.php'>logout</a></li>
            <li><a class='dropdown-item' href='profile.php'>My Profile</a></li>";
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
          <a class="nav-link active ml-2" aria-current="page" href="../index.php"> HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link offset-md-2 ml-2" href="../display_all_products.php"> PRODUCTS GALLERY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link offset-md-2 ml-2" href="#"> CONTACT </a>
        </li>
        
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
         name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- Third child: -->
<div class ="row" >
    <div class="col-md-2"  >
        <ul class="navbar-nav bg-secondary text-center "style="height:65vh" style="background-color: #BDC581;">
            <li class="nav-item ">
                <a class="nav-link text-light" href="../display_all_products.php"><h3> Your Profile</h3></a>
            </li>
            <!-- <li class="nav-item bg-info">
                <img src="../images/profile.jpg" alt="" class="profile_img my-4">
            </li> -->
            <li class="nav-item "style="background-color: #BDC581;">
                <a class="nav-link text-light" href="profile.php">Pending Orders</a>
            </li>
            <li class="nav-item "style="background-color: #BDC581;">
                <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item "style="background-color: #BDC581;">
                <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
            </li>
            <li class="nav-item "style="background-color: #BDC581;">
                <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item "style="background-color: #BDC581;">
                <a class="nav-link text-light" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
          <?php get_user_order_details();
          if(isset($_GET['edit_account'])){
            include('edit_account.php');  
          }
          if(isset($_GET['my_orders'])){
            include('user_orders.php');  
          }
          if(isset($_GET['delete_account'])){
            include('delete_account.php');  
          }
          ?>

    </div>
</div>
<!-- fourth child: menu bar-->

<!-- last child: footer -->
<!-- include footer -->
<?php include("../includes/footer.php") ?>


<!-- bootstrap js Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html> 