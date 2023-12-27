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
    <title>Admin Registration</title>
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
        .logo{
    width:10%;
    height: 10%;;
}

    </style>
</head>
<body>
    <!-- first child: header -->
    <?php  include('../includes/admin_header.php'); ?>


    <div class="container-fluid m-3"> 
        <h2 class="text-center mt-5 mb-5"> ADMIN LOGIN</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/customer_log1.webp" alt="Admin Login" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">

                    <!--Admin Username-->
                    <div class="form-outline mb-4">
                        <lable for="admin_username" class="form-lable">Username</lable>
                        <input type="text" id="admin_username" name="admin_username" placeholder="Enter your username" 
                        required="required" class="form-control">
                    </div>
                
                    <!--Admin Password-->
                    <div class="form-outline mb-4">
                        <lable for="password" class="form-lable">Password</lable>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" 
                        required="required" class="form-control">
                    </div>
                    
                    <div class="mt-4 pt-2 ">
                        <input value="Login" type="submit" name="btnadmin_login" class=" btn secondary_btn text-light mb-1 px-3"  
                            style="background-color:#009432;">
                        <p class=" fw-bold  py-1 small"> Don't have an account? <a href="admin_registration.php" 
                            class="text-decoration-none fw-bolder">  REGISTER </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- include footer -->
<?php include('../includes/footer.php') ?>

</body>
</html>





<?php

if (isset($_POST['btnadmin_login'])) {
    $adm_username=$_POST['admin_username'];
    $adm_password=$_POST['password'];
    

    $select_query="Select * from `admin_table` where admin_name='$adm_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip_address=getIPAddress();

    if ($row_count>0) {
        $_SESSION['adm_username']=$adm_username;
        //if(password_verify($adm_password,$row_data['admin_password'])){
            //echo "<script>alert('Login Successfully')</script>";
            if ($row_count==1) {
                $_SESSION['adm_username']=$adm_username;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('index.php','_self')</script>";

            }else {
                $_SESSION['adm_username']=$adm_username;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }

        //}else {
           // echo "<script>alert('Invalid Credentials')</script>";
        //}        

    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
    
    
}

?>















