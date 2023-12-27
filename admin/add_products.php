<?php
include('../includes/connect.php');


if(isset($_POST['add_products'])){ 
    $product_title=$_POST['product_title'];
    $product_short_desc=$_POST['short_description'];
    $product_description=$_POST['description'];
    $product_keyword=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_size=$_POST['product_size'];
    $product_status=$_POST['product_status'];;

    //access images
    $product_image1=$_FILES['product_image1']['name'];
    //$product_image2=$_FILES['product_image2']['name'];
    //$product_image3=$_FILES['product_image3']['name'];

    //accessing imagetmp
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    //$temp_image2=$_FILES['product_image2']['tmp_name'];
    //$temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $product_short_desc=='' or $product_description=='' or $product_keyword=='' 
    or $product_category=='' or $product_price=='' or $product_image1=='' ){
        echo "<script>alert('Please fill all the available fiels')</script>";
        exit();
    }else {
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        //move_uploaded_file($temp_image2,"./product_images/$product_image2");
        //move_uploaded_file($temp_image3,"./product_images/$product_image3");
        

        //insert query
        $insert_products="insert into `products` (product_title,short_description,product_describtion,product_keywords,
        category_id,product_image1,product_price,product_size,status) 
        values('$product_title','$product_short_desc','$product_description','$product_keyword','$product_category',
        '$product_image1','$product_price','$product_size','$product_status')";
        
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the products')</script>";
        }
    }

}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products: Admin</title>
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
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
<div class="container-fluid p-0">
        <!-- first child: header -->
        <?php  include('../includes/admin_header.php'); ?>
    <div class="container mt-3">
        <h1 class="text-center margins_heading mb-4" >ADD PRODUCTS</h1>
        <!-- form -->
        <form actions="" method="post" enctype="multipart/form-data">
            <!-- title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable">Product title <sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                <input type="text" name="product_title" id="product_title" class="form-control" 
                placeholder="Enter Product title" 
                autocomplete="off" required="required">
            </div>

            <!-- short description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="short_description" class="form-lable">Short description about the product<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                <input type="text" name="short_description" id="short_description" class="form-control" 
                placeholder="Enter Product description " 
                autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-lable">Product description<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                <input type="text" name="description" id="description" class="form-control" 
                placeholder="Enter Product description " 
                autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-lable">Product keywords<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
                placeholder="Enter Product keywords " 
                autocomplete="off" required="required">
            </div>


            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
            <!--<label for="product_category" class="form-lable">Product Category</label>-->
                <select name="product_category" id="" class="form-select">
                    <option value="">select a category<sup class="font_bold" style="color:#EA2027 ">*</sup></option>
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
                <label for="product_image1" class="form-lable">product image <sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                <input type="file" name="product_image1" id="product image 1 " class="form-control" 
                 required="required">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-lable">Product price<sup class="font_bold" style="color:#EA2027 ">*</sup></label>
                <input type="text" name="product_price" id="product_price" class="form-control" 
                placeholder="Enter Product price " 
                autocomplete="off" required="required">
            </div>

            <!-- size -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_size" class="form-lable">Available Product sizes</label>
                <input type="text" name="product_size" id="product_size" class="form-control" 
                placeholder="Enter available Product sizes " 
                autocomplete="off" required="required">
            </div>

            <!-- Status -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_status" class="form-lable">Product Availability</label>
                <input type="text" name="product_status" id="product_status" class="form-control" 
                placeholder="Availability " 
                autocomplete="off" required="required">
            </div>


            <!-- Add product button -->
            <div class="form-outline mb-4 w-50 m-auto ">
                <input type="submit" name="add_products" class="d-grid gap-2 col-6 mx-auto btn secondary_btn text-light mb-3 px-3"  
                style="background-color: #009432;" value="Add Products"
                
            </div>
            
        </form>
        <form actions="" method="post">
        <input type="submit" name="back_to_dashboard" class="d-grid gap-2 col-6 mx-auto btn secondary_btn text-dark mb-3 px-3 "  
                style="background-color: #CCF3EE;" value="Back to Dashboard">
        </form>
    </div>

    <!-- include footer -->
<?php include("../includes/footer.php") ?>
    
</body>
</html>

<?php
if (isset($_POST['back_to_dashboard'])){
    echo "<script>window.open('index.php','_self')</script>";
}


?>