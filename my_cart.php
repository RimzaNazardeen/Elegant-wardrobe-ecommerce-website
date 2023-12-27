<!-- connect file-->
<?php
include('includes/connect.php');
include('functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Elegant Wardrobe/My cart. </title>
    

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
        .card_size{
  width: 400px;
  height: 200px;
  
}
    </style>
</head>
<body>

<!-- first child: header -->
<!-- include header -->
    <?php 
      include('./includes/header.php');
      
    ?>
<a href="index.php"><button class="rounded p-2 m-2" style="background-color:#FFC312">
<i class="fa-solid fa-angles-left"></i> Continue Shopping </button></a>

<!-- Second child: cart items table -->
<div class="container mt-2 ">
    <div class="row">
        <form action="" method="post">
        <table class="table table-sm text-center">
            
                <!-- php code to display added items to cart -->
                <?php
                global $con;
                $get_ip_address = getIPAddress();
                $total_amount=0;
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if ($result_count>0) {
                    echo "
                    <thread>
                        <tr>
                            <th>Product</th>
                            <th> price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th> Remove </th>
                            <th colspan='2'> Update / Delete </th>
                                                
                        </tr>
                    </thread>
                    <tbody>";
                
                while ($row=mysqli_fetch_array($result)) {
                  $product_id=$row['product_id'];
                  $select_product="Select * from `products` where product_id='$product_id'";
                  $result_product=mysqli_query($con,$select_product);
                  while ($row_product_price=mysqli_fetch_array($result_product)){
                    $product_price=array($row_product_price['product_price']);
                    $price_singleproduct=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['product_image1'];
                    $product_value=array_sum($product_price);
                    $total_amount+=$product_value;


                ?>

                <tr class="fs-6  ">
                    <td> <div class="card mb-1 card_size" >
                            <div class="row g-0">
                                <div class="col-md-4 text-dark ">
                                <img src="./admin/product_images/<?php echo $product_image1 ?>" class="img-fluid rounded-start " 
                                alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">wwwwwwwwwwwww</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                                </div>
                                <p class="card-title fw-bolder"><?php echo $product_title ?></p>
                            </div>
                        </div>
                    </td>
                    <td><input type="double" name="" id="" placeholder="Rs. <?php echo $price_singleproduct ?>"
                     readonly="readonly" style="background-color:#dfe4ea" 
                    class="rounded-3 mt-3 form-input w-75"></td>
                    <!-- quantity input field-->
                    <td><input type="text" name="qty" class="rounded-3 mt-3 form-input w-50"></td>
                    <!-- code to update the quantity in my cart table-->
                    <?php 
                        $get_ip_address = getIPAddress();
                        if (isset($_POST['update_cart'])) {
                            $quantity=$_POST['qty'];
                            $cart_update="update `cart_details` set quantity=$quantity where ip_address='$get_ip_address'";
                            $result_Product_quantity=mysqli_query($con,$cart_update);
                            $total_amount= $total_amount * $quantity;
                        

                        }
                    
                    ?>
                    <td><input type="double" name="" id="" readonly="readonly" style="background-color:#dfe4ea" 
                    class="rounded-3 mt-3 form-input "></td>
                    <td><input type="checkbox" name="removeitem[]" class="rounded-3 mt-3 form-input " value="<?php echo $product_id?>"> </td>
                    <td >
                        <!-- update button
                        <button class="secondary_btn mt-3 " ><i class="fa-solid fa-trash-can"></i></button>-->
                        <input type="submit" value="Update" class="rounded p-2 m-2" style="background-color:#27ae60" name="update_cart">
                        
                        <!-- delete button
                        <button class="update_btn mt-3  "><i class="fa-solid fa-square-pen"></i></button>-->
                        <input type="submit" value="Delete" class="mt-3 bg-danger rounded p-2 m-2" name="remove_cart">
                        
                    </td>
                </tr>
                <?php
                 }
                }
                }
                else {
                    echo "<h2 class='text-center text-danger'> Your cart is empty</h2>";
                }
                ?>
            </tbody>
        </table>
        <!--total-->
        <div class="mb-5">
            <?php 
                $get_ip_address = getIPAddress();
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if ($result_count>0) {
                    echo "<h5 class='px-3 text-end'>TOTAL:<strong>  LKR  $total_amount </strong>
                    <button class='rounded p-2 m-2' style='background-color:#05c46b'><a href='./user/checkout_page.php' 
                    class='text-decoration-none fw-bold' style='color:#ecf0f1'>
                     Checkout </a></button></h5>";
                
                }

            ?>
            

        </div>

    </div>
</div>
</form>


<!--function to remove items -->
<?php 
function remove_item(){
    global $con;
    if (isset($_POST['remove_cart'])) {
        if(isset($_POST['removeitem'])){
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query="Delete from `cart_details` where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
                if ($run_delete) {
                    echo "<script>window.open('my_cart.php','_self') </script>";
                }
            }
        }else{
            echo "<script>alert('Select item to delete')</script>";

        }
    }

}
echo $remove_item=remove_item();


?>




<!-- last child: footer -->
<!-- include footer -->
<?php include("./includes/footer.php") ?>


<!-- bootstrap js Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html>