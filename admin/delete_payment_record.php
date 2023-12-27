<?php

if(isset($_GET['delete_payment_record'])){
    $delete_payment=$_GET['delete_payment_record'];
   //echo $delete_order;

   //delete query
   $delete_payment_query="Delete from user_payments where payment_id=$delete_payment";
   $result_delete_payment=mysqli_query($con,$delete_payment_query);
   if ($result_delete_payment) {
        echo "<script>alert('Payment Record has been deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
   }

}

?>