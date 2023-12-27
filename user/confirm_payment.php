<?php 
include('../includes/connect.php');
// include('../functions/common_functions.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    //echo $order_id;
    $select_data="select * from orders where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into user_payments (order_id,invoice_number,amount,payment_mode) 
    values($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3  class='text-center'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
        
    }
    $update_orders="update orders set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title> Elegant Wardrobe. </title>

    <!-- bootstrap Css Link-->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' 
    rel='stylesheet' 
    integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' 
    crossorigin='anonymous'>

    <!-- font awsome Link-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' 
    integrity='sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=='
    crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- css file -->
    <link rel='stylesheet' href='../style.css'>
    <style>
        body{
            overflow-x:hidden
        }
    </style>
</head>
<body style='background-color: #BDC581;' class=''>
    <h1 class='text-center my-5'>Confirm Payment</h1>
    <div class='container my-5'>
        <form action=''method='post'>
            <div class='form-outline my-4 text-center w-50 m-auto'>
                <input type='text' class='form-control w-50 m-auto ' name='invoice_number'
                value='<?php echo $invoice_number?>' >
            </div>
            <div class='form-outline my-4 text-center w-50 m-auto'>
                <input type='text' class='form-control w-50 m-auto ' placeholder='Amount' name='amount'
                value='<?php echo $amount_due?>' >
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto" >
                    <option>Select payment mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Cash on Delivery</option>
                    <option>Payoffline</option>
                </select>
            </div>
            <div class='form-outline my-4 text-center w-50 m-auto'>
                <input type='submit' class='bg-info py-2 px-3 border-0' value='Confirm' name='confirm_payment'>
            </div>
        </form>
    </div>

</body>
</html>