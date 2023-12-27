<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page-Elegant wardrobe</title>
    <!-- bootstrap Css Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- font awsome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

   

</head>
<body>
    
<!-- navbar-->
<div class="container-fluid p-0">
        <!-- first child: header -->
        <nav id="navbar-example2" class="navbar navbar-dark px-2"  style="background-color:#535c68;">
  
  <h4  style="color:#ecf0f1"> ELEGANT WARDROBE</h4>
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
            <ul class='dropdown-menu'><li><a class='dropdown-item' href='/logout.php'>logout</a></li>
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
      <span class="navbar-toggler-icon fw-bold"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold ">
      <li class="nav-item offset-md-4 ">
          <a class="nav-link active ml-2 " aria-current="page" href="../index.php"> HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link offset-md-2 ml-2" href="../display_all_products.php"> PRODUCTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link offset-md-2 ml-2" href="#"> CONTACT </a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


















<!--php code to access user id-->
<?php
$user_ip=getIPAddress();
$get_user="Select * from `user_info_table` where user_ip='$user_ip'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];

?>


<!--payment-->
<div style="background-color:#f7f1e3">
    <div class="container" >
        <h2 class="text-center mx-2 p-3 " style="color:#009432">Payment Options</h2>

        <!-- payment options-->
<div class="row">
  <div class="col-sm-8">
  <div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pay Online</h5>

        <a href="https://www.paypal.com" target="_blank"  ><img src="../images/pay-online2.png"
         class="card-img-top" alt="card options"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pay Offline</h5>
        <a href="order.php?user_id=<?php echo $user_id ?>" class=""><img src="../images/COD2.jpg" 
        class="card-img-top"  alt="card options"></a>
      </div>
    </div>
  </div>
</div>
  </div>

  <!-- cart details-->
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">cart</h5>
        <!--<table class="table">
          

        
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">product title</th>
      <th scope="col">Qty</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><?php echo $product_title ?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>-->
      </div>
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