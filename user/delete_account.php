
<form action="" method="post">
<div class="card text-center my-4 mx-4">
  <div class="card-header">
    Delete Account
  </div>
  <div class="card-body">
    <img src="../images/sad-emoji2.png" class="card-img-top" alt="..." width="10" height="10">
    <h5 class="card-title fw-bold fs-1" >Sad to see You go!</h5>
    <p class="card-text text-muted fw-bold fs-4">Are you sure, you want to Delete Your account?</p>
    <div>
        <input type="submit" class="btn btn-danger me-3 w-25" name="delete" value="Delete">
        <input type="submit" class="btn btn-light  w-25 " style="background-color: #CEAB93;" 
        name="cancel_delete" value="Cancel">
    </div>
  </div>
  <div class="card-footer">
  </div>
</div>
</form>

<?php
$username_session=$_SESSION['username'];
if (isset($_POST['delete'])) {
    $delete_query="Delete from `user_info_table` where user_name='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if ($result) {
        session_destroy();
        echo "<script>alert('Your Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if (isset($_POST['cancel_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}

?>

