<!-- connect file-->
<?php
include('../includes/connect.php');
//include('../functions/common_functions.php');
@session_start();

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

<!-- first child: header -->
<!-- include header -->
    <?php 
      //include('../includes/header.php');
      
    ?>



<!-- fourth child; body-->
<div class="row px-2">
  <div class="col-md-12">
    <!-- Products -->
    <div class="row p-3">
      <?php
        if (!isset ($_SESSION['username'])) {
            include('user_login.php');
        }else {
            include('payment.php');
        }
      ?>

    <!-- row end -->
    </div>
  <!-- col end -->
  </div>


    
    </ul>
  </div>
</div>




<!-- last child: footer -->
<!-- include footer -->
<?php include("../includes/footer.php") ?>


<!-- bootstrap js Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html>