<!-- connect file-->
<?php
include('includes/connect.php');
include('functions/common_functions.php');

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
</head>
<body>
    <!-- include header -->
    <?php 
      include('./includes/header.php');
    ?>


<!-- fourth child; body-->
<div class="row px-2 my-3">
  <div class="col-md-12">
    <!-- Products -->
    <div class="row">
      <!--fetching products -->
      <?php
      //call function
      view_details();

      ?>

    <!-- row end -->
    </div>
  <!-- col end -->
  </div>

<!--<div class="col-md-2 p-0" style="background-color:#f7f1e3" >
    <!-- side navbar-->
    <!--<ul class="navbar-nav me-auto text-center">
      <li class="nav-item" style="background-color: #b33939">
        <a href="#" class="nav-link text-light font_bold"> CATEGORIES</a>
      </li>-->
      <?php
      //call function get all categories in side navbar
      //getcategories(); 
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