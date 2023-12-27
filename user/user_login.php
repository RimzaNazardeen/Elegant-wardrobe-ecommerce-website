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
    <title>User Registration form- Elegant wardrobe</title>

    <!-- bootstrap Css Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- font awsome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            overflow-x:hidden
        }
    </style>
</head>
<body>

<!-- navbar-->
<div class="container-fluid p-0">
        <!-- first child: header -->
        <nav id="navbar-example2" class="navbar navbar-dark px-1"  style="background-color:#535c68;">
  <img src="../images/logoFinal2.jpg" alt=""class="logo mx-auto d-block">
</nav>




    <style>
    .input-borders{
        border-radius:30px;
    }
    </style>
		<!-- row -->
				
        <div class="container-fluid my-3">
            <h2 class="text-center login-form-title p-b-49" >Login Here</h2>
            <div class="row d-flex align-items-center justify-content-center mt-5">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="post">
                        <!--username-->
                        <div class="form-outline ">
                            <label for="u_username" class="form-label">Username<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                            <input class=" form-control input-borders mb-4 " type="text" name="u_username" id="u_username" 
                            placeholder="Enter your User Name" autocomplete="off" required="required">

                            <!--password-->
                            <div class="form-outline ">
                            <label for="user_password" class="form-label">Password<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                            <input class=" form-control input-borders mb-4 " type="password" name="user_password" id="user_password" 
                            placeholder="Enter your Password" autocomplete="off" required="required">


                        </div>
                        <div class="mt-4 pt-2">
                        <input value="Login" type="submit" name="login_button" class=" btn secondary_btn text-light mb-3 px-3"  
                            style="background-color: #009432;">
                        <p class=" fw-bold mt-1 py-1">Don't have an account? <a href="user_registration.php" 
                        class="text-decoration-none fw-bolder">  SIGN UP</a></p>
                        
                    </form>
                </div>

            </div>

        </div>
					
    <!-- include footer -->
<?php //include("../includes/footer.php") ?>

</body>
</html>

<?php

if (isset($_POST['login_button'])) {
    $u_username=$_POST['u_username'];
    $user_password=$_POST['user_password'];
    

    $select_query="Select * from `user_info_table` where user_name='$u_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip_address=getIPAddress();

    //cart items
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip_address'";
    $select_cart_items=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart_items);
    if ($row_count>0) {
        $_SESSION['username']=$u_username;
        if(password_verify($user_password,$row_data['user_password'])){
            //echo "<script>alert('Login Successfully')</script>";
            if ($row_count==1 and $row_count_cart==0) {
                $_SESSION['username']=$u_username;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('../index.php','_self')</script>";

            }else {
                $_SESSION['username']=$u_username;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }

        }else {
            echo "<script>alert('Invalid Credentials')</script>";}        

    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
    
}

?>