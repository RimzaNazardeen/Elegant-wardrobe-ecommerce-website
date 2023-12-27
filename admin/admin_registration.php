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
        <h2 class="text-center mb-5 mt-5"> ADMIN REGISTRATION</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/dashboard-concept.webp" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">

                    <!--Admin Username-->
                    <div class="form-outline mb-4">
                        <lable for="admin_username" class="form-lable">Username</lable>
                        <input type="text" id="admin_username" name="admin_username" placeholder="Enter your username" 
                        required="required" class="form-control">
                    </div>
                    <!--Admin Email-->
                    <div class="form-outline mb-4">
                        <lable for="email" class="form-lable">Email</lable>
                        <input type="email" id="email" name="email" placeholder="Enter your Email" 
                        required="required" class="form-control">
                    </div>
                    <!--Admin Password-->
                    <div class="form-outline mb-4">
                        <lable for="password" class="form-lable">Password</lable>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" 
                        required="required" class="form-control">
                    </div>
                    <!--Admin confirm Password-->
                    <div class="form-outline mb-4">
                        <lable for="confirm_password" class="form-lable">Confirm Password</lable>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your Password" 
                        required="required" class="form-control">
                    </div>
                    <div class="mt-4 pt-2 ">
                        <input value="Register" type="submit" name="btnadmin_registration" class=" btn secondary_btn text-light mb-1 px-3"  
                            style="background-color:#009432;">
                        <p class=" fw-bold  py-1"> Already have an account? <a href="admin_login.php" 
                            class="text-decoration-none fw-bolder">  LOGIN </a></p>
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
if (isset($_POST['btnadmin_registration'])) {
    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $repassword=$_POST['confirm_password'];
    

    //select query
    $select_query="Select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if ($rows_count>0) {
        echo "<script>alert('Existing Username or password, please try again with another!! ')</script>";
    }elseif ($admin_password !=$repassword) {
        echo  "<script>alert('passwords do not match')</script>";
    }
    else {
        //insert query
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) 
    values('$admin_username','$admin_email','$admin_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if ($sql_execute) {
        echo "<script>alert('You are successfully Registered')</script>";
        echo  "<script>window.open('admin_login.php','_self')</script>";
        
    }else {
        die(mysqli_error($con));
    }
    }
}

?>



















