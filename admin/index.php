<!-- connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title> Admin Dashboard-Elegant Wardrobe</title>

    <!-- bootstrap Css Link-->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' 
    rel='stylesheet' 
    integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' 
    crossorigin='anonymous'>

    <!-- font awsome Link-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' 
    integrity='sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=='
    crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- css file -->
    <link rel='stylesheet' href='../style.css'>

    <style>
      body{
        overflow-x:hidden;
      }

      .produc-img{
        width: 100px;
        object-fit: contain;
      }
    </style>
</head>
<body>
<!-- first child: header -->
<?php  include('../includes/admin_header.php'); ?>

<div style='color: #EA2027'>
  <h3 class='text-center margins_heading '></h3>
</div>
<div class='row'>
  <div class='col-md-2 p-0' style='background-color:#f7f1e3'>
    <!-- first child: side nav -->
    <ul class='navbar-nav me-auto  '>
      <li class='nav-item' style='background-color: #b33939'>
        <a href='#' class='nav-link text-light font-weight-bold text-center'><h4> ADMIN </h4></a>
      </li>
      <li class='nav-item '>
        <a href='#' class='nav-link text-dark font_bold mt-4 ms-5 text-right'> USERS LIST </a>
      </li>
      <!--<li class='nav-item '>
        <a href='index.php?view_productlist' class='nav-link text-dark font_bold mt-2  ms-5 text-right'> PRODUCT LIST </a>
      </li>
      <li class='nav-item '>
        <a href='index.php?view_productlist' class='nav-link text-dark font_bold mt-2  ms-5 text-right'> CATEGORY LIST </a>
      </li>-->
      <li class='nav-item '>
        <a href='index.php?orders_list' class='nav-link text-dark font_bold mt-2 ms-5 text-right'> ORDERS </a>
      </li>
      <li class='nav-item '>
        <a href='index.php?view_categories' class='nav-link text-dark font_bold mt-2 ms-5 text-right'> MANAGE CATEGORY </a>
      </li>
      <li class='nav-item'>
        <a href='add_products.php' class='nav-link text-dark font_bold mt-2 ms-5 text-right'> ADD PRODUCTS </a>
      </li>
      <li class='nav-item'>
        <a href='index.php?add_categories' class='nav-link text-dark font_bold mt-2 ms-5 text-right'> ADD CATEGORIES </a>
      </li>
      <li class='nav-item '>
        <a href='index.php?list_payments' class='nav-link text-dark font_bold mt-2 ms-5 text-right'> CUSTOMER PAYMENTS </a>
      </li>

      <div class='nav-item dropend'>
        <button type='' class='text-dark font_bold mt-2 ms-5 text-right dropdown-toggle px-3' data-bs-toggle='dropdown' aria-expanded='false'>
          VIEW ALL
        </button>
        <ul class='dropdown-menu '>
          <li><a href='index.php?view_productlist' class='dropdown-item fw-bold'> Product List</a></li>
          <li><a href='index.php?view_categories' class='dropdown-item fw-bold'>Category List</a></li>
        </ul>
      </div>

      <li class='nav-item'>
        <a href='admin_login.php' class='nav-link text-dark font_bold mt-2 ms-5 text-right'>
          <i class='fa-solid fa-arrow-right-from-bracket'></i>LOGOUT </a>
      </li>




      


    </ul>
  </div>
  <div class='col-md-10  '>
    <!--third child: add categoty>-->
    <div class='container'>
      <?php
      if (isset($_GET['add_categories'])) {
        include('add_categories.php');
      }
      if (isset($_GET['view_productlist'])) {
        include('view_productlist.php');
      }
      if (isset($_GET['edit_products'])) {
        include('edit_products.php');
      }
      if (isset($_GET['delete_products'])) {
        include('delete_products.php');
      }
      if (isset($_GET['view_categories'])) {
        include('view_categories.php');
      }
      if (isset($_GET['edit_category'])) {
        include('edit_category.php');
      }
      if (isset($_GET['delete_category'])) {
        include('delete_category.php');
      }
      if (isset($_GET['orders_list'])) {
        include('orders_list.php');
      }
      if (isset($_GET['delete_orders'])) {
        include('delete_orders.php');
      }
      if (isset($_GET['list_payments'])) {
        include('list_payments.php');
      }
      if (isset($_GET['delete_payment_record'])) {
        include('delete_payment_record.php');
      }
      
  ?>
  </div>
</div>


    </div>
</div>


</div>


<!-- include footer -->
<?php include('../includes/footer.php') ?>

<!-- bootstrap js Link-->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' 
integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' 
crossorigin='anonymous'></script>
    
</body>
</html>