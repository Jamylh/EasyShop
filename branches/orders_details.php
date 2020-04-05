<?php include_once("header.php");
$order_id = $_REQUEST['order_id'];
$sql = "update orders set order_status='Received' where order_id=$order_id and order_status='New'";
$res = mysqli_query($conn,$sql);
$or_status = "";
?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="add_product.php">Dashboard</a> <span> &gt;<a href="orders.php"> Orders</a> </span> <span> &gt; Order number <?php echo $order_id;?></span> </div>
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
          
          <!-- End Box Head -->
          <!-- Table -->
          
            <?php
            if($objProduct->checkIsFoundFreeLancer($conn,$order_id) == false){
                ?>
                  <!-- Box Head -->
                <div class="box-head">
                  <h2 class="left">Current order # <?php echo $order_id;?></h2>
                  <div class="right" style="width: 40%;">
                    <form action="orders_details.php?order_id=<?php echo $order_id;?>" method="post">
                    <label>Assign Order to deliverer </label>
                    <select name="del_id" required="required" style="margin-left: 10px;width: 40%;">
                      <option></option>
                      <?php
                        $sql = "select * from deliverer where branch_id=$branch_id";
                        $res = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($res)){
                          ?>
                          <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                          <?php
                        }
                      ?>
                    </select>
                   
                    <input type="submit" class="button" name="AssignOrder" value="Confirm" style="float: right;" />
                  </form>
                  </div>
                </div>
                <?php
            }else{
                // shop delivery



            }
            ?>
          
          <div class="table">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="13">#</th>
                <th>product id</th>
                <th>product name</th>
                 <th>product qunatity</th>
                 <th>Total price</th> 
                        
              </tr>
             
             <?php
             $count = 1;
             $sql = "select * from order_details,products where order_details.order_no=$order_id and order_details.product_id = products.product_id";
             $res = mysqli_query($conn,$sql);
             while($row = mysqli_fetch_assoc($res)){
              
              ?>
              <tr>
                <td><?php echo $count++;?></td>
                <td><?php echo $row['product_id'];?></td>
                <td><?php echo $row['name'];?> </td>
                <td><?php echo $row['qty'];?></td>
                <td><?php echo $row['price']*$row['qty'];?> SR</td>
                
              </tr>
               
              <?php
             }
             ?>
            </table>

            <?php
              
             if($objProduct->checkIsFoundFreeLancer($conn,$order_id)){
                $sql = "select * from freelancer,orders where orders.order_id=$order_id and orders.deliverer_id = freelancer.freelancer_id";
                $res=  mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($res);
                $or_status = $row['order_status'];
                ?>
                <br><br>
                <p style="background: green;padding: 5px;color:#fff;">Free Lancer Information

                  <?php
                    if($row['order_status'] == 'Shipped'){
                      echo " >> Freelnacer Received The Order ";
                    }else if($row['order_status'] == 'New' || $row['order_status']=='Received'){
                      echo " >> Freelnacer Wait Receiving order";
                    }else if($row['order_status'] == 'Confirmed'){
                       echo " >> Freelnacer Delivered The Order";
                    }
                  ?>
                </p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th>Free Lancer</th>
                <th>Phone</th>
                 <th>Email</th>
                 <th>Licence</th> 
                <th>Car model</th> 
                <th>Photo</th> 
                <th>Shipping to freelnacer</th> 
               </tr>
               <tr>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['phone'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['licence'];?></td>
                  <td><?php echo $row['car_model'];?></td>
                  <td><img src="../freelancerphotos/<?php echo $row['pic'];?>" style='width:80px;'></td>
                  <?php
                    if($or_status != 'Confirmed'){
                      ?>
                       <td align="center"><a href="orders_details.php?order_id=<?php echo $order_id;?>&&do=shipping" style='padding: 10px;background: #ccc;border-radius: 5px;'>Done</a></td>
                      <?php
                    }
                  ?>
                  
               </tr>
             </table>
                <?php
             }else{

                // shop deliverer

$sql = "select * from deliverer,deliverer_orders,orders where deliverer_orders.order_id=$order_id and deliverer_orders.deliverer_id=deliverer.id and orders.order_id = deliverer_orders.order_id";
                $res=  mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($res);
                $or_status = $row['order_status'];
                ?>
                <br><br>
                <p style="background: green;padding: 5px;color:#fff;">Shop Deliverer

                  <?php
                    if($row['order_status'] == 'Shipped'){
                      echo " >> Shop Deliverer Received The Order ";
                    }else if($row['order_status'] == 'New' || $row['order_status']=='Received'){
                      echo " >> Shop Deliverer  Wait Receiving order";
                    }else if($row['order_status'] == 'Confirmed'){
                       echo " >> Shop Deliverer  Delivered The Order";
                    }
                  ?>
                </p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th style="padding: 5px;">Free Lancer</th>
                <th style="padding: 5px;"> Phone</th>
                 <th style="padding: 5px;">Email</th>
                <th align="center" style="padding: 5px;">Shipping to Deliverer</th> 
               </tr>
               <tr>
                  <td style="padding: 5px;"><?php echo $row['name'];?></td>
                  <td style="padding: 5px;"><?php echo $row['phone'];?></td>
                  <td style="padding: 5px;"><?php echo $row['email'];?></td>
                 
                  <?php
                    if($or_status != 'Confirmed'){
                      ?>
                       <td style="padding: 5px;"><a href="orders_details.php?order_id=<?php echo $order_id;?>&&do=shipping" >Done</a></td>
                      <?php
                    }
                  ?>
                  
               </tr>
             </table>
                <?php




             }
            ?>  

            <?php

                if(isset($_REQUEST['do']) && $_REQUEST['do']=='shipping'){

                  $sql = "update orders set order_status='Shipped' where order_id=$order_id";
                  $res = mysqli_query($conn,$sql);
                  if($res){

                    header("location: orders_details.php?order_id=$order_id");
                  }
                }
            ?>

              <?php

                  if(isset($_POST['AssignOrder'])){
                    $del_id = $_POST['del_id'];
                    $sql_check = "select * from deliverer_orders where order_id=$order_id and deliverer_id=$del_id";
                    $res_check = mysqli_query($conn,$sql_check);
                    $num = mysqli_num_rows($res_check);
                    if($num == 0){
                      $sql=  "insert into deliverer_orders values('',$del_id,$order_id)";
                      $res = mysqli_query($conn,$sql);
                      if($res){
                        $title = "New Order # ".$order_id;
                        $message = "New order";
                        $key = $objProduct->returnFCMTokenForDeliverer($conn,$del_id);
                        $objProduct->sendNotiy($key,$title,$message);
                        header("location: orders_details.php?order_id=$order_id");
                      }
                    }else{
                      $sql = "update deliverer_orders set deliverer_id = $del_id where order_id=$order_id";
                      $res=  mysqli_query($conn,$sql);
                      if($res){
                        $title = "New Order # ".$order_id;
                        $message = "New order";
                        $key = $objProduct->returnFCMTokenForDeliverer($conn,$del_id);
                        $objProduct->sendNotiy($key,$title,$message);
                         header("location: orders_details.php?order_id=$order_id");
                      }
                    }
                  }
              ?>
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