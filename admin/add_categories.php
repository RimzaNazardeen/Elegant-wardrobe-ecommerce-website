<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
    $category_title=$_POST['cat_title'];

    // select data from database
    $select_query="Select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if ($number>0)  {
        echo "<script>alert('This category is already exist')</script>";
    }else {

        $insert_query="insert into `categories` (category_title) values ('$category_title')";
        $result=mysqli_query($con,$insert_query);
        if ($result) {
            echo "<script>alert('category inserted')</script>";
        }

    }
}


?>

<h2 class="text-center"> INSERT CATEGORY</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-100 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Add categories" aria-label="categories" 
        aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        
        <input type="submit" class=" btn secondary_btn text-light mb-3 px-3"  
                style="background-color: #009432;" name="insert_cat" 
        value="Add Category">

        
    </div>
</form>