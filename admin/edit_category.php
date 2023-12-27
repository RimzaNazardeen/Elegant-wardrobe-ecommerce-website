<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
   //echo $edit_category;

   $get_categories="Select * from categories where categoty_id =$edit_category";
   $result=mysqli_query($con,$get_categories);
   $row=mysqli_fetch_assoc($result);
   $category_title=$row['category_title'];
   //echo $category_title;
}

if (isset($_POST['edit_cat'])) {
    $cat_title=$_POST['cat_title'];

    $update_query="update categories set category_title='$cat_title' where categoty_id =$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('Category updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
    }
}

?>


<h2 class="text-center mb-3"> EDIT CATEGORY</h2>
<form action="" method="post" class="mb-2 text-center">
<lable for="cat_title" class="form-lable "> Category Title</lable>
    <div class="input-group form-outlined w-50 mb-3 mt-2 m-auto">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" id="cat_title" aria-label="categories" 
        aria-describedby="basic-addon1" required="required" value="<?php echo $category_title ?>">
    </div>
    
        
    <input type="submit" class=" btn secondary_btn text-light mb-3 px-3"  
        style="background-color: #009432;" name="edit_cat" id="edit_cat"value="Update Category">

        
    
</form>