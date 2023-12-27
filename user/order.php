<?php
include('../includes/connect.php');
include('../functions/common_functions.php');


if (isset($_GET['user_id'])) {
    $user_id=$_GET['user_id'];
    
}


//get total items and total price of all items
$get_ipAddress=getIPAddress();
$total_price=0;
$cart_query_price="Select * from `cart_details` where ip_address='$get_ipAddress'";
$result_cartPrice=mysqli_query($con,$cart_query_price);
$invoice_no=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cartPrice);
while ($row_price=mysqli_fetch_array($result_cartPrice)) {
    $product_id=$row_price['product_id'];    
    $select_product="Select * from `products` where product_id=$product_id";
    $run_price=mysqli_query($con,$select_product);
    while ($row_product_price=mysqli_fetch_array($run_price)) {
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    //echo $total_price;
    }
}


//get quantity
$get_cart="Select * from `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_qty=mysqli_fetch_array($run_cart);
$quantity=$get_item_qty['quantity'];
if ($quantity==0) {
    $quantity=1;
    $subtotal=$total_price;

}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
    //echo $total_price;
}

$insert_orders="Insert into `orders` (user_id,amount_due,invoice_number,total_product,
order_date,order_status) values ($user_id,$subtotal,$invoice_no,$count_products,NOW(),'$status')";
$result_query_details=mysqli_query($con,$insert_orders);
if ($result_query_details) {
    

    echo "<script>alert('Your orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self') </script>";
}

//orders pending
$insert_pending_orders = "Insert into orders_pending (user_id, invoice_number, product_id, quantity, order_status)
values( $user_id, $invoice_no, $product_id, $quantity, '$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);

//delete items from cart
$empty_cart = "Delete from cart_details where ip_address='$get_ipAddress'";
$result_delete = mysqli_query($con, $empty_cart);
?>