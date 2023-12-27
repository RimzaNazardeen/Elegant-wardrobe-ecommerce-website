


<h3 class="fw-bold">ORDER HISTORY <h6 style="color: #7F8487"> Customer order Details</h6></h3>
<table class="table table-bordered">
  <thead>
  <?php
    $get_orders="Select * from orders";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    

  if ($row_count==0) {
    echo "<h2 class='text-danger text-center mt-5'> No Orders yet</h2>";
  }else {
    echo "<tr class='text-center' style='background-color: #f7f1e3'>
      <th scope='col'>Slno</th>
      <th scope='col'>Invoice no</th>
      <th scope='col'>Date</th>
      <th scope='col'>No.Of.Items</th>
      <th scope='col'>Total</th>
      <th scope='col'>Status</th>
      <th scope='col'>Delete</th>
    </tr>
  </thead>
  <tbody class='table-group-divider'>";
    $number=0;
    while ($row_data=mysqli_fetch_assoc($result)) {
      $order_id=$row_data['order_id'];
      $user_id=$row_data['user_id'];
      $total_amount=$row_data['amount_due'];
      $invoice_number=$row_data['invoice_number'];
      $total_product=$row_data['total_product'];
      $order_date=$row_data['order_date'];
      $order_status=$row_data['order_status'];
      $number++;

      echo " <tr class='text-center table-dark'>
      <td class='table-active'>$number</td>
      <td>$invoice_number</td>
      <td>$order_date</td>
      <td>$total_product</td>
      <td>$total_amount</td>
      <td>$order_status</td>
      <td><a href='index.php?delete_orders=$order_id' 'type='button' class='text-decoration-none text-danger'
      data-bs-toggle='modal' data-bs-target='#exampleModal'>
        <i class='fa-solid fa-trash text-danger'></i> Delete </a></td>
    </tr>";
    }
  }

?>
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body fw-bold">
        You are about to delete an order. Are you sure you want to delete this Order?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="button" class="btn btn-primary "><a href='index.php?delete_orders=<?php echo $order_id ?>' 
        class="text-decoration-none text-light"> Yes </a></button>
      </div>
    </div>
  </div>
</div>
