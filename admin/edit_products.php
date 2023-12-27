
<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
   // echo $edit_id;
   
   $get_data="Select * from products where product_id=$edit_id";
   $result=mysqli_query($con,$get_data);
   $row=mysqli_fetch_assoc($result);
   $product_title=$row['product_title'];
   //echo $product_title;

   $short_description=$row['short_description'];
   $product_describtion=$row['product_describtion'];
   $product_keywords=$row['product_keywords'];
   $category_id=$row['category_id'];
   $product_image=$row['product_image1'];
   $product_price=$row['product_price'];
   $product_size=$row['product_size'];


   //fetch category name
   $select_category="Select * from categories where categoty_id=$category_id";
   $result_category=mysqli_query($con,$select_category);
   $row_category=mysqli_fetch_assoc($result_category);
   $category_title=$row_category['category_title'];
   //echo $category_title;
}
?>


<div class="container mt-3">
        <h3 class="text-center margins_heading mb-4" >EDIT PRODUCT</h3>
        <!-- form -->
        <form actions="" method="post" enctype="multipart/form-data">
            <!-- title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable">Product title </label>
                <input type="text" name="product_title" id="product_title" value="<?php echo $product_title ?>" class="form-control" 
                placeholder="Enter Product title" 
                autocomplete="off" required="required">
            </div>

            <!-- short description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="short_description" class="form-lable">Short description about the product</label>
                <input type="text" name="short_description" id="short_description" value="<?php echo $short_description ?>" class="form-control" 
                placeholder="Enter Product description " 
                autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-lable">Product description</label>
                <input type="text" name="description" id="description" value="<?php echo $product_describtion ?>" class="form-control" 
                placeholder="Enter Product description " 
                autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-lable">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" value="<?php echo $product_keywords ?>" class="form-control" 
                placeholder="Enter Product keywords " 
                autocomplete="off" required="required">
            </div>


            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-lable">Product Category</label>
                <select name="product_category" id=""  class="form-select">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)) {
                            $category_title=$row['category_title'];
                            $category_id=$row['categoty_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    
                    ?>    
                </select>
            </div>

            <!-- sub categories -->
            <!--<div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-lable">Product  Sub-category <sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                <select name="product_category" id="" class="form-select">
                    <option value="">select a Sub-category</option>
                    <?php
                         /*$select_query="Select * from `subcategory`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)) {
                            $category_title=$row['category_title'];
                            $category_id=$row['categoty_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }*/
                    
                    ?>    
                </select>
            </div>-->


            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-lable">product image </label>
                <input type="file" name="product_image1" id="product image 1 "  class="form-control" 
                 required="required">
                <img src="./product_images/<?php echo $product_image; ?>" class='produc-img' alt='$product_title'/>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-lable">Product price</label>
                <input type="text" name="product_price" id="product_price" value="<?php echo $product_price ?>" class="form-control" 
                placeholder="Enter Product price " 
                autocomplete="off" required="required">
            </div>

            <!-- size -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_size" class="form-lable">Available Product sizes</label>
                <input type="text" name="product_size" id="product_size" value="<?php echo $product_size ?>" class="form-control" 
                placeholder="Enter available Product sizes " 
                autocomplete="off" required="required">
            </div>

            <!-- Status 
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_status" class="form-lable">Product Availability</label>
                <input type="text" name="product_status" id="product_status" class="form-control" 
                placeholder="Availability " 
                autocomplete="off" required="required">
            </div>-->


            <!-- update button -->
            <div class="form-outline mb-4 w-50 m-auto text-center">
                <input type="submit" name="btnupdate_products" class=" btn secondary_btn text-light mb-3 px-4"  
                style="background-color: #009432;" value="Update">
                
            </div>
        </form>
    </div>


    <!--edit products-->

    <?php

    if (isset($_POST['btnupdate_products'])) {
        $product_title=$_POST['product_title'];
        $short_description=$_POST['short_description'];
        $description=$_POST['description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_image1=$_FILES['product_image1'];
        $product_price=$_POST['product_price'];
        $product_size=$_POST['product_size'];

        $product_image1=$_FILES['product_image1']['name'];

        $temp_product_image1=$_FILES['product_image1']['tmp_name'];

        //checking empty condition
    if($product_title=='' or $short_description=='' or $description=='' or $product_category=='' 
    or $product_image1=='' or $product_price==''){
        echo "<script>alert('Please fill all the available fiels')</script>";
    
    }else {
        move_uploaded_file($temp_product_image1,"./product_images/$product_image1");
        

        //update products
        $update_products="update `products` set product_title='$product_title',short_description='$short_description',
        product_describtion='$description',product_keywords='$product_keywords',
        category_id='$product_category',product_image1='$product_image1',product_price='$product_price',product_size='$product_size' where 
        product_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    }


    ?>