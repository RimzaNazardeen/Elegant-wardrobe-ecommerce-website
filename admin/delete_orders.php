<?php

if(isset($_GET['delete_orders'])){
    $delete_order=$_GET['delete_orders'];
   //echo $delete_order;

   //delete query
   $delete_order_query="Delete from orders where order_id=$delete_order";
   $result_delete_order=mysqli_query($con,$delete_order_query);
   if ($result_delete_order) {
        echo "<script>alert('Order has been deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
   }

}
?>