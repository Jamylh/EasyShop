<?php include_once("header.php");

?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
        
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Orders</li>
  </ol>
</nav> 
    <!-- Main -->
    <div id="main" >

      <div id="content" >
        <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
        
      
<table class="table table-hover table-dark  text-center">
  <thead>
      
      <tr class="alert alert-dark" style="">
      <td colspan="9">Current Products</td>

      
      </tr>
      
              <tr>
                <th>#</th>
                <th>Deliverer</th>
                <th>username</th>
                <th>password</th>
                <th>Phone</th>
                 <th>Email</th>
                 
                <th class="ac" >Content Control</th>
              </tr>
  </thead>
  <tbody>
      
             <?php
             $count = 1;
             $res =  $objProduct-> selectDeliverer($conn,$branch_id);
             while($row = mysqli_fetch_assoc($res)){
             
              ?>
              <td><?php echo $count++;?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['password'];?></td>
              <td><?php echo $row['phone'];?></td>
              <td><?php echo $row['email'];?></td>
             
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
     

      </div>
      <!-- End Content -->
      <!-- Sidebar -->
     
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>

<?php include_once("footer.php");?>