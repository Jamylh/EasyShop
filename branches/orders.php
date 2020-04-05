<?php include_once("header.php");

?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->

                  
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Orders</li>
  </ol>
</nav> 
    <!-- End Small Nav -->
    <!-- Message OK -->
   
    <br />
    <!-- Main -->
    <div id="main" >


          
        
<table class="table table-hover table-dark  text-center">
  <thead>
      
      <tr class="alert alert-dark" style="">
      <td colspan="3">Current orders</td>
    <td colspan="6">
                      <div class="right">
              <label>search orders</label>
              <input type="text" class="field small-field" />
              <input type="submit" class="button" value="search" />
            </div>
          </td>
      
      </tr>
      
              <tr>
                <th width="13">#</th>
                <th>Order number</th>
                <th>Customer name</th>
                 <th>Customer Phone</th>
                 <th>Total price</th>
                 <th>Order date</th>
                 <th>Order Status</th>
                <th  width="100" class="ac" >Content Control</th>
              </tr>
  </thead>
  <tbody>
      
             <?php
             $count = 1;
             $res =  $objProduct->selectOrders($conn,$branch_id);
             while($row = mysqli_fetch_assoc($res)){
              $customer_id = $row['customer_id'];
              $row_cust = $objProduct->returnCustomerName($conn,$customer_id);
               
              ?>
              <tr>
              <td><?php echo $count++;?></td>
              <td><?php echo $row['order_id'];?></td>
              <td><?php echo $row_cust['name'];?></td>
              <td><?php echo $row_cust['phone'];?></td>
              <td><?php echo $row['total_price'];?> SR</td>
               <td><?php echo $row['order_date'];?></td>
                <td><?php echo $row['order_status'];?></td>
                <td colspan="3"><a href="orders_details.php?order_id=<?php echo $row['order_id'];?>">Detials</a></td>
              </tr>
              <?php
             }
             ?>

 </tbody>
</table>



</div>
            <!-- Pagging -->
            <div class="pagging">
              
            </div>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
        </div>
        <!-- End Box -->
     


<?php include_once("footer.php");?>