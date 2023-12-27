
<h3 class="fw-bold">Categories <h6 style="color: #7F8487">All categories in the store</h6></h3>
<table class="table table-bordered">
  <thead>
    <tr class="text-center" style="background-color: #f7f1e3">
      <th scope="col">Slno</th>
      <th scope="col">Category title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody class="table-group-divider white">
    <?php
        $select_cat="Select * from categories";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while ($row=mysqli_fetch_assoc($result)) {
            $categoty_id =$row['categoty_id'];
            $category_title=$row['category_title'];
            $number++;

    ?>

    <tr class="text-center table-dark">
      <th scope="row" class="table-active"><?php echo $number; ?></th>
      <td ><?php echo $category_title; ?></td>
      <td ><a href='index.php?edit_category=<?php echo $categoty_id ?>' class="text-decoration-none">
      <i class='fa-solid fa-pen-to-square'></i>  Edit</a></td>
      <td ><a href='index.php?delete_category=<?php echo $categoty_id ?>'type="button" class="text-decoration-none text-danger" 
      data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class='fa-solid fa-trash text-danger'></i> Delete </a></td>
    </tr>
    <?php

    }?>
  </tbody>
</table>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body fw-bold">
        Are you sure, you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="button" class="btn btn-primary "><a href='index.php?delete_category=<?php echo $categoty_id ?>' 
        class="text-decoration-none text-light"> Yes </a></button>
      </div>
    </div>
  </div>
</div>
