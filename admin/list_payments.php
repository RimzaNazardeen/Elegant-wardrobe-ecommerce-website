


<h3 class="fw-bold">ALL PAYMENTS <h6 style="color: #7F8487"> Manage Customer Payments</h6></h3>
<table class="table table-bordered">
  <thead>
  <?php
    $get_payments="Select * from user_payments";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    

  if ($row_count==0) {
    echo "<h2 class='text-danger text-center mt-5'> No Payments received yet</h2>";
  }else {
    echo "<tr class='text-center' style='background-color: #f7f1e3'>
      <th scope='col'>Slno</th>
      <th scope='col'>Invoice no</th>
      <th scope='col'>Ordered Date</th>
      <th scope='col'>Amount</th>
      <th scope='col'>Payment Mode</th>
      <th scope='col'>Delete</th>
    </tr>
  </thead>
  <tbody class='table-group-divider'>";
    $number=0;
    while ($row_data=mysqli_fetch_assoc($result)) {
      $order_id=$row_data['order_id'];
      $payment_id=$row_data['payment_id'];
      $invoice_number=$row_data['invoice_number'];
      $total_amount=$row_data['amount'];
      $payment_mode=$row_data['payment_mode'];
      $ordered_date=$row_data['date'];
      $number++;

      echo " <tr class='text-center table-dark'>
      <td class='table-active'>$number</td>
      <td>$invoice_number</td>
      <td>$ordered_date</td>
      <td>$total_amount</td>
      <td>$payment_mode</td>
      <td><a href='index.php?delete_payment_record=$payment_id' type='button' class='text-decoration-none text-danger'
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
         Are you sure you want to delete this Payment Record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="button" class="btn btn-primary "><a href='index.php?delete_payment_record=<?php echo $payment_id ?>' 
        class="text-decoration-none text-light"> Yes </a></button>
      </div>
    </div>
  </div>
</div>
