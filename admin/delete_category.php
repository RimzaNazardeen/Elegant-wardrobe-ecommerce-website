<?php

if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
   //echo $delete_category;

   //delete query
   $delete_query="Delete from categories where categoty_id=$delete_category";
   $result=mysqli_query($con,$delete_query);
   if ($result) {
        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
   }

}

?>