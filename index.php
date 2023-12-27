<!-- connect file-->
<?php
//include('includes/connect.php');
include('functions/common_functions.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Elegant Wardrobe. </title>

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
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            overflow-x:hidden
        }
    </style>
</head>
<body>

<!-- first child: header -->
<!-- include header -->
    <?php 
      include('./includes/header.php');
      
    ?>


<!-- third child: image slider-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/template.jpg" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/template_mens.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/template_kid.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/template_womenswear.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
    <span class="visually-hidden ">Previous</span>
  </button>
  <button id="slider-btn" class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  
</div>

<!-- fourth child; body-->
<div  style="color: #EA2027">
  <h3 class="text-center margins_heading mb-4" > NEW ARRIVALS </h3>
</div>

<div class="row px-2">
  <div class="col-md-10">
    <!-- Products -->
    <div class="row p-3">
      <!--fetching products -->
      <?php
      //call function
      getproducts();
      //call prodcuts catregory wise
      get_products_catergory_wise();

      //$ip = getIPAddress();  
      //echo 'User Real IP Address - '.$ip; 
      ?>

    <!-- row end -->
    </div>
  <!-- col end -->
  </div>

  <div class="col-md-2 p-0" style="background-color:#f7f1e3" >
    <!-- side navbar-->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item" style="background-color: #b33939">
        <a href="#" class="nav-link text-light font_bold"> CATEGORIES</a>
      </li>
      <?php
      //total_cart_price();
          getcategories();
          
            
      ?>
    
    </ul>
  </div>
</div>




<!-- last child: footer -->
<!-- include footer -->
<?php include("./includes/footer.php") ?>


<!-- bootstrap js Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html>