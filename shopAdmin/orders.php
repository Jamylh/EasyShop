<?php include_once("header.php");

?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="add_product.php">Dashboard</a> <span> &gt;New Orders</span>  </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
   
    <br />
    <!-- Main -->
    <div id="main" >
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content" >
        <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
        

 <!-- Box -->
        <div class="box" style="width:130%;">
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current orders</h2>
            <div class="right">
              <label>search orders</label>
              <input type="text" class="field small-field" />
              <input type="submit" class="button" value="search" />
            </div>
          </div>
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="13"><input type="checkbox" class="checkbox" /></th>
                <th>Order ID</th>
                <th>Order name</th>
                 <th>Order qantity</th>
                 <th>Total price</th>
                 <th>Order date</th>
                <th width="100" class="ac" >Content Control</th>
              </tr>
             
            </table>


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
    <!-- Main -->
  </div>
</div>
<br><br><br><br><br><br><br>
<?php include_once("footer.php");?>