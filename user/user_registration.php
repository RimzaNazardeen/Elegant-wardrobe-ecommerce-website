<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
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
</head>
<body>

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
            <h2 class="text-center login-form-title p-b-49" >Register Here</h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="post">
                        <!--username-->
                        <div class="form-outline ">
                            <label for="u_username" class="form-label">Username<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                            <input class=" form-control input-borders mb-4 " type="text" name="u_username" id="u_username" 
                            placeholder="Enter your User Name" autocomplete="off" required="required">

                            <!--user email-->
                        <div class="form-outline">
                            <label for="user_email" class="form-label">Email<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                            <input class=" form-control input-borders mb-4 " type="email" name="user_email" id="user_email" 
                            placeholder="Enter your Email" autocomplete="off" required="required">

                            <!--password-->
                            <div class="form-outline ">
                            <label for="user_password" class="form-label">Password<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                            <input class=" form-control input-borders mb-4 " type="password" name="user_password" id="user_password" 
                            placeholder="Enter your Password" autocomplete="off" required="required">

                            <!--confirm password-->
                            <div class="form-outline ">
                            <label for="repassword" class="form-label">Confirm Password<sup class="font_bold" style="color:#EA2027 ">
                            *</sup></label>
                            <input class=" form-control input-borders mb-4 " type="password" name="repassword" id="repassword" 
                            placeholder="Confirm Password" autocomplete="off" required="required">

                            <!--address-->
                        <div class="form-outline ">
                            <label for="user_address" class="form-label">Address<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                            <input class=" form-control input-borders mb-4 " type="text" name="user_address" id="user_address" 
                            placeholder="Enter your Address" autocomplete="off" required="required">

                            <!--contact-->
                        <div class="form-outline ">
                            <label for="user_contact_num" class="form-label">Contact No<sup class="font_bold" style="color:#EA2027 ">*</sup>
                        </label>
                            <input class=" form-control input-borders mb-4 " type="text" name="user_contact_num" id="user_contact_num" 
                            placeholder="Enter your contact number" autocomplete="off" required="required">

                        </div>
                        <div class="mt-4 pt-2">
                        <input value="Sign Up" type="submit" name="signup_button" class=" btn secondary_btn text-light mb-3 px-3"  
                            style="background-color: #009432;">
                        <p class=" fw-bold mt-1 pt-1">Already have an account? <a href="user_login.php" class='text-decoration-none fw-bolder'>  LOGIN</a></p>
                        
                    </form>
                </div>

            </div>

        </div>
			
        <!-- include footer -->
<?php include("../includes/footer.php") ?>
    
</body>
</html>


<!-- php code-->
<?php
if (isset($_POST['signup_button'])) {
    $u_username=$_POST['u_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $repassword=$_POST['repassword'];
    $user_address=$_POST['user_address'];
    $user_contact_num=$_POST['user_contact_num'];
    $user_ip=getIPAddress();

    //select query
    $select_query="Select * from `user_info_table` where user_name='$u_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if ($rows_count>0) {
        echo "<script>alert('Existing Username or password, please try again with another!! ')</script>";
    }elseif ($user_password !=$repassword) {
        echo  "<script>alert('passwords do not match')</script>";
    }
    else {
        //insert query
    $insert_query="insert into `user_info_table` (user_name,user_email,user_password,user_ip,user_address,user_mobile) 
    values('$u_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact_num')";
    $sql_execute=mysqli_query($con,$insert_query);
    if ($sql_execute) {
        echo "<script>alert('You are successfully Registered')</script>";
        
    }else {
        die(mysqli_error($con));
    }
    }


    //selecting cart items
    $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    $cart_result=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($cart_result);
    if ($cart_result>0) {
        $_SESSION['username']=$u_username;
        echo  "<script>alert('You have items in your cart')</script>";
        echo  "<script>window.open('checkout_page.php','_self')</script>";
    }else{
        echo  "<script>window.open('../index.php','_self')</script>";
    }
}


?>