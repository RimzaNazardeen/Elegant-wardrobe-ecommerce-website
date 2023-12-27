<?php

//including connect file
//include("./includes/connect.php");

//get products
function getproducts(){
    global $con;

  if (!isset($_GET['catergory'])){
    $select_query="select * from `products` order by rand()";
      $result_query=mysqli_query($con,$select_query);
      while ($row=mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_shortdesc=$row['short_description'];
        $category_id=$row['category_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-4'>
        <div class='card' >
            <img src='./admin/product_images/$product_image1' class='card-img-top image_select' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_shortdesc.</p>
              <a href='product_details.php?product_id=$product_id' class='btn secondary_btn w-100'  
              style='background-color: #e77f67;'> View more</a>
            </div>
          </div>
        </div>";
    }
  }
}

//display all products
function display_all_products(){
  global $con;

  if (!isset($_GET['catergory'])){
    $select_query="select * from `products` order by rand() LIMIT 0,9";
      $result_query=mysqli_query($con,$select_query);
      while ($row=mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_shortdesc=$row['short_description'];
        $category_id=$row['category_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-4'>
        <div class='card' >
            <img src='./admin/product_images/$product_image1' class='card-img-top image_select' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_shortdesc.</p>
              <a href='product_details.php?product_id=$product_id' class='btn secondary_btn w-100'  
              style='background-color: #e77f67;'> View more</a>
            </div>
          </div>
        </div>";
    }
  }
}


//function: get products category wise
function get_products_catergory_wise(){
  global $con;

if (isset($_GET['catergory'])){
  $category_id= $_GET['catergory'];
  $select_query="select * from `products` where category_id  = $category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);

    if ($num_of_rows == 0){
      echo "<h3 class='text-center text-danger'>No items available<h3>";
    }
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_shortdesc=$row['short_description'];
      $category_id=$row['category_id'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      echo "<div class='col-md-4 mb-4'>
      <div class='card' >
          <img src='./admin/product_images/$product_image1' class='card-img-top image_select' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_shortdesc.</p>
            <a href='product_details.php?product_id=$product_id' class='btn secondary_btn w-100'  
              style='background-color: #e77f67;'> View more</a>
          </div>
        </div>
      </div>";
  }
}
}


//display categories in sidenav
function getcategories(){
    global $con;
    $select_category="Select * from `categories`";
        $result_category=mysqli_query($con,$select_category);
        while($row_data=mysqli_fetch_assoc($result_category)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['categoty_id'];
            echo "<li class='nav-item' >
            <a href='index.php?catergory=$category_id' class='nav-link text-dark'>$category_title</a>
        </li>";
        }
}


//searching products function
function search_product(){
    global $con;

    if (isset($_GET['search_data_product'])) {
        $usersearch_data_value=$_GET['search_data'];
        $search_query="Select * from `products` where product_keywords like '%$usersearch_data_value%'";
      $result_query=mysqli_query($con,$search_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
          echo "<h2 class='text-center text-danger> No results match!!!</h2>";
      }
      while ($row=mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_shortdesc=$row['short_description'];
        $category_id=$row['category_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-4'>
        <div class='card' >
            <img src='./admin/product_images/$product_image1' class='card-img-top image_select' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_shortdesc.</p>
              <a href='product_details.php?product_id=$product_id' class='btn secondary_btn w-100'  
              style='background-color: #e77f67;'> View more</a>
            </div>
      </div>
    </div>";
    }
}
}

//view product details function
function view_details(){
    global $con;

//condition to chech isset or not
if (isset($_GET['product_id'])) {
  if (!isset($_GET['catergory'])){
    $product_id=$_GET['product_id'];
    $select_query="select * from `products` where product_id=$product_id";
      $result_query=mysqli_query($con,$select_query);
      while ($row=mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_shortdesc=$row['short_description'];
        $product_description=$row['product_describtion'];
        $category_id=$row['category_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $product_size=$row['product_size'];
        $product_status=$row['status'];
        echo "<div class='row px-2 my-3'>
        <div class='col-md-12'>
          <!-- Products -->
          <div class='row'>
              <div class='col-md-2'>
                  <!--<h1>hi</h1>-->
                  <!-- side-->
                  
              </div>
        
                <div class='col md-12 '>
                <!-- product details-->
                <div class='card mb-3' style='max-width: w-100;'>
        <div class='row g-0 '>
        <div class='col-md-4'>
          <img src='./admin/product_images/$product_image1' class='img-fluid rounded-start' alt='...'>
        </div>
        <div class='col-md-8 mt-2 px-3'>
          <div class='card-bod'>
            <h5 class='card-title fw-bold fs-2'>$product_title</h5>
            <p class='card-text mt-3'>$product_shortdesc.</p>
            <p class='mt-2 text-danger font_bold'>$product_price</p>
            <a><a style='color:#009432'>Available sizes</a><br>$product_size</a>
            
            <p class='card-text mt-3'><small class='text-muted'>$product_status</small></p>
            <h5 class='mt-4'>Product Description</h5>
            <p class='card-text txt_allign'> $product_description.</p>

            <input type='text' name='quantity' class='form-control w-25' value='1'/>
            <!-- Add to cart button -->
            <a href='index.php?add_to_cart=$product_id' class='btn primary-btn w-25 my-3'> ADD TO CART</a>
            
          </div>
        </div>
        </div>
        </div>
        
        ";
    }
  }
}
}


//get ip-address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 


//cart function
function add_cart(){
  if (isset($_GET['add_to_cart'])) {
    global $con;

    $get_ip_address = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows>0){
          echo "<script> alert('You have already added this item to the cart')</script>";
          echo "<script>window.open('index.php','_self')</script>";
      }else{
        $insert_query="insert into `cart_details` (product_id,ip_address,quantity) 
        values ($get_product_id,'$get_ip_address',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo "<script> alert('Item added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }
  }
}


//function for number of items added into cart
function no_of_cart_items(){
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_address = getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
      }else{
        global $con;
        $get_ip_address = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
      }
      echo $count_cart_items;
}


//function to get total price
function total_cart_price(){
  global $con;
  $get_ip_address = getIPAddress();
  $total_amount=0;
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
  $result=mysqli_query($con,$cart_query);
  while ($row=mysqli_fetch_array($result)) {
    $product_id=$row['product_id'];
    $select_product="Select * from `products` where product_id='$product_id'";
    $result_product=mysqli_query($con,$select_product);
    while ($row_product_price=mysqli_fetch_array($result_product)){
      $product_price=array($row_product_price['product_price']);
      $product_value=array_sum($product_price);
      $total_amount+=$product_value;
    }
  }
  echo $total_amount;

}

//function to get total price
/*function subtotal_price(){
  global $con;
  $get_ip_address = getIPAddress();
  $product_subTotal=0;
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
  $result=mysqli_query($con,$cart_query);
  while ($row=mysqli_fetch_array($result)) {
    $product_id=$row['product_id'];
    $quantity=$row['quantity'];
    $select_product="Select * from `products` where product_id='$product_id'";
    $result_product=mysqli_query($con,$select_product);
    while ($row_product_price=mysqli_fetch_array($result_product)){
      $product_price=array($row_product_price['product_price']);
      $product_subTotal=$product_price*$quantity;
    }
  }
  echo $product_subTotal;

}*/

//get user order detaisl
function get_user_order_details(){
  global $con;
  $username = $_SESSION['username'];
  $get_detaisl="select * from user_info_table where user_name='$username' ";
  $result_query = mysqli_query($con,$get_detaisl);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id = $row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders = "select * from orders where user_id = $user_id and order_status='pending' ";
          $result_order_query = mysqli_query($con,$get_orders);
          $row_count = mysqli_num_rows($result_order_query);
          if($row_count >0){
            echo "<h3 class='text-center my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order details</a></p>";
          }else{
            echo "<h3 class='text-center my-5'>You have zero pending orders</h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
          
          }
        }
      }
    }
  }
}
?>