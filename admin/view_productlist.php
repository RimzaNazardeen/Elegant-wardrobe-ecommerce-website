<h3 class="fw-bold "> PRODUCTS <h6 style="color: #7F8487"> All available Products in the Store </h6></h3>

<table class="table table-bordered text-center">
<thead>
    <tr style="background-color: #f7f1e3">
        <th>Product ID</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
      <?php 
      $get_products="Select * from products";
      $result=mysqli_query($con,$get_products);
      $number=0;
      while ($row=mysqli_fetch_assoc($result)) {
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_image=$row['product_image1'];
          $product_price=$row['product_price'];
          $status=$row['status'];
          $number++;
          ?>

          <tr class="table-dark" >
          <td class="table-active"><?php echo $number; ?></td>
          <td ><?php echo $product_title; ?></td>
          <td ><img src='./product_images/<?php echo $product_image; ?>' class='produc-img' alt='$product_title'/></td>
          <td ><?php echo $product_price; ?></td>
          <td >
              <?php
              $get_count="Select * from orders_pending where product_id=$product_id";
              $result_count=mysqli_query($con,$get_count);
              $row_count=mysqli_num_rows($result_count);
              echo $row_count;
              ?>
          </td>
          <td ><?php echo $status; ?></td>
          <td ><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-decoration-none'>
          <i class='fa-solid fa-pen-to-square '></i> <h6> Edit </h6></a></td>
          <td ><a href='index.php?delete_products=<?php echo $product_id ?>'type="button" class="text-decoration-none text-danger" 
      data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class='fa-solid fa-trash text-danger'></i><h6> Delete </h6></a></td>
      </tr>
      <?php
      }
      ?>
  </tbody> 
  </table>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body fw-bold">
        You are about to delete a product.
        Are you sure you want to delete this Product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="button" class="btn btn-primary "><a href='index.php?delete_products=<?php echo $product_id ?>' 
        class="text-decoration-none text-light"> Yes </a></button>
      </div>
    </div>
  </div>
</div>


















<!-- On tables -->
<table class="table-primary">...</table>
<table class="table-secondary">...</table>
<table class="table-success">...</table>
<table class="table-danger">...</table>
<table class="table-warning">...</table>
<table class="table-info">...</table>
<table class="table-light">...</table>
<table class="table-dark">...</table>

<!-- On rows -->
<tr class="table-primary">...</tr>
<tr class="table-secondary">...</tr>
<tr class="table-success">...</tr>
<tr class="table-danger">...</tr>
<tr class="table-warning">...</tr>
<tr class="table-info">...</tr>
<tr class="table-light">...</tr>
<tr class="table-dark">...</tr>

<!-- On cells (`td` or `th`) -->
<tr>
  <td class="table-primary">...</td>
  <td class="table-secondary">...</td>
  <td class="table-success">...</td>
  <td class="table-danger">...</td>
  <td class="table-warning">...</td>
  <td class="table-info">...</td>
  <td class="table-light">...</td>
  <td class="table-dark">...</td>
</tr>