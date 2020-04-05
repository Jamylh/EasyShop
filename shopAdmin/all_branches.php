<?php include_once("header.php");
 $shop_id = $_SESSION['shop_id'];
?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Main -->

      
      <div id="content" >
        <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
        
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Display all Shop Braches</li>
  </ol>
</nav> 
          
        
<table class="table table-hover table-dark  text-center">
  <thead>
      
      <tr class="alert alert-dark" style="">
      <td colspan="9">Current Products</td>

      
      </tr>
      
      <tr>
      <th scope="col"><input type="checkbox" class="checkbox" /></th>
      <th scope="col">ID</th>
      <th scope="col">City</th>
        <th scope="col">Name</th>
        <th scope="col">phone</th>
      <th scope="col">mobile</th>
        <th scope="col">email</th>
      <th scope="col">address</th>
    <th class="ac" colspan="4" >Content Control</th>
        
    </tr>
  </thead>
  <tbody>
      
                    <?php
                  $count = 1;
                 $shop_id =  $objProduct->getShopId($conn,$admin_id);

                  $sql = "select * from shop_branches where shop_id=$shop_id";
                  $res = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_assoc($res)){

                    ?>
                     <tr>
                        <td><input type="checkbox" class="checkbox" /></td>
                        <td><h3><a href="#"><?php echo $count++;?></a></h3></td>
                        <td><h3><?php echo $row['city'];?></h3></td>
                         <td><h3><?php echo $row['name'];?></h3></td>
                          <td><h3><?php echo $row['phone'];?></h3></td>
                          <td><h3><?php echo $row['mobile'];?></h3></td>
                          <td><h3><?php echo $row['email'];?></h3></td>
                          <td><h3><?php echo $row['address'];?></h3></td>
                        
                       
                    </tr>
                    <?php

                  }

              ?>


 </tbody>
</table>



</div>
 <!-- Box -->



            <!-- Pagging -->
            <div class="pagging">
              
            </div>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
        </div>
        <!-- End Box -->
        <?php
    
      if(@$_REQUEST['do']=='edit'){
        $product_id = $_REQUEST['product_id'];
        $rows = $objProduct->getProduct($conn,$product_id);
        ?>
          <script type="text/javascript">
            $(function() {
              $( "#dialog:ui-dialog" ).dialog( "destroy" );
              $( "#dialog-modal" ).dialog({
             
              resizable: false,
              width:500,
              modal: true,
              close: function(event, ui) { location.href="<?php echo $_SERVER['PHP_SELF'];?>"; }      
              });
            });
      </script>
    <!-- ui-dialog -->
    
    
    <div id="dialog-modal" class='header_model'  title="Edit Product">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <div class="msg msg-error" id="error2" style="display: none;">
                <p><strong id="error_id2"></strong></p>
          </div>
        
        <form action="all_products.php" method="post"  enctype="multipart/form-data" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
           <input type="hidden" name="product_id" value="<?php echo $product_id;?>" />
            <!-- Form -->
            <div class="form">
              <p> <span class="req">max 45 symbols</span>
                <label>Name  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $rows['name'];?>" class="field size1" id="name" name="name" style='width: 90%;' required/>
              </p>

               <p> <span class="req"></span>
                <label>Categories  <span>(Required Field)</span></label>
                <select name="cat_id" class="field size1" style='width: 92%;'>
                  
                  <?php
                    $sql = "select * from shop_categories where shop_id=$shop_id";
                    $res = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                      ?>
                        <option value="<?php echo $row['id'];?>" <?php if($rows['cat_id'] == $row['id']) echo 'selected';?>><?php echo $row['cat_name']?></option>
                      <?php

                    }
                  ?>
                </select>
              </p>
               <p> <span class="req"></span>
                <label>Price  <span>(Required Field)</span></label>
                <input type="text" min="0" maxlength="10" value="<?php echo $rows['price'];?>"  class="field size1" id="price"  style='width: 90%;' name="price" required="" />
              </p>
               <p> <span class="req">max 200 symbols</span>
                <label>Description  <span>(Required Field)</span></label>
                <textarea name="description" maxlength="200"  class="field size1" required="" style='width: 90%;'><?php echo $rows['description'];?></textarea>
              </p>
              <?php
                $check = $objProduct->checkIsOffer($conn,$product_id);
                if($check){
                  ?>
                   <p> <span class="req"></span>
                    <label>Remove Offer  <span>(Offer)</span></label>
                    <input type="checkbox" name="removeOffer" value="removeoffer" class="field size1"> 
                 </p>
                  <?php
                }
              ?>
              
              <p> <span class="req">picture required</span>
                <label>pic  <span>(optional)</span></label>
                <input type="file"  class="field size1" id="pic" name="pic" style='width: 90%;'/>
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="reset" class="button" value="reset" />
              <input type="submit" class="button" name="submitProduct" value="update" />
            </div>
            <!-- End Form Buttons -->
          </form>
    </div>
          
        
        <?php
      }

      if(isset($_POST['submitProduct'])){
          $product_id = $_POST['product_id'];
           $product_name = $_POST['name'];
            $price = $_POST['price'];
             $cat_id = $_POST['cat_id'];
            $description = $_POST['description'];
            if(isset($_POST['removeOffer'])){
              $removeoffer = 0;
            }else{
              $removeoffer = 1;
            }
             $dir_name=dirname(__FILE__)."/upload/";
              $path = $_FILES['pic']['tmp_name'];
              $name = $_FILES['pic']['name'];
              $size = $_FILES['pic']['size'];
              $type = $_FILES['pic']['type'];
              $msg = $_FILES['pic']['error'];
              if($name != "" && $path != ""){
                $rows = $objProduct->getProduct($conn,$product_id);
                $old_pic = $rows['pic'];

                  if($old_pic != ""){
                  @unlink("upload/$old_pic");
                }
                $pic_name=  rand().".png";
                  if(move_uploaded_file($path,$dir_name.$pic_name)){
                    $sql = "update products set name='$name',cat_id=$cat_id,price=$price,description='$description',pic='$pic_name',isoffer=$removeoffer where product_id=$product_id";
                    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if($res){
                     header("location: all_products.php");
                    }
                  } 
                
              }else{
                
                 $sql = "update products set name='$product_name',cat_id=$cat_id,price=$price,description='$description',isoffer=$removeoffer where product_id=$product_id";
                    $res = mysqli_query($conn,$sql);
                    if($res){
                      header("location: all_products.php");
                    }
              }
      }
    
    ?>

  <?php
    
      if(@$_REQUEST['do']=='remove'){
        $product_id = $_REQUEST['product_id'];
        $rows = $objProduct->getProduct($conn,$product_id);
       
        ?>
          <script type="text/javascript">
            $(function() {
              $( "#dialog:ui-dialog" ).dialog( "destroy" );
              $( "#dialog-modal" ).dialog({
             
              resizable: false,
             
              modal: true,
              close: function(event, ui) { location.href="all_products.php"; }      
              });
            });
      </script>
    <!-- ui-dialog -->
    
    
    <div id="dialog-modal" class='header_model'  title="Remove Product">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <form action="all_products.php" method="post" class="form_data" style='margin:0 auto;display: table;'>
                <img src="css/images/rr.png" width="40" style="margin:0 auto;display: table;">
                <br>
              <p  style="padding-bottom:2px; font-weight:bold;font-family: DroidKufi-Regular;">Are you sure for deleting <?php echo $rows['name'];?> </p>
              <br>
              <div class="table_btn_pop" style="margin:0 auto;display: table;">

                <input type="submit" name="Confirm_Delete"  class="button_save" value=" Remove "/>
                <input type="hidden" name="delete_ID" value="<?php echo $product_id; ?>"/>
                <input type="hidden" name="pic_name" value="<?php echo $rows['pic'];?>">
                
              </div>
            </form>
    </div>
          
        
        <?php
      }
      ?>
<?php
  
 if(@$_POST['Confirm_Delete']){

    $delete_ID = $_POST['delete_ID'];
    $pic_name = $_POST['pic_name'];
    @unlink("upload/$pic_name");
     $res= $objProduct->deleteProduct($conn,$delete_ID);
     if($res){
      header("location: all_products.php");
     }
    

  }

?>

 <?php
    
      if(@$_REQUEST['do']=='offer'){
        $product_id = $_REQUEST['product_id'];
        $rows = $objProduct->getProduct($conn,$product_id);
        

        ?>
          <script type="text/javascript">
            $(function() {
              $( "#dialog:ui-dialog" ).dialog( "destroy" );
              $( "#dialog-modal" ).dialog({
             
              resizable: false,
             
              modal: true,
              close: function(event, ui) { location.href="all_products.php"; }      
              });
            });
      </script>
    <!-- ui-dialog -->
    
    
    <div id="dialog-modal" class='header_model'  title="Set Product offer">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <div class="msg msg-error" id="error33" style="display: none;">
                <p><strong id="error_id33"></strong></p>
          </div>
        
        <form action="all_products.php" method="post" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
           <input type="hidden" name="product_id" value="<?php echo $product_id;?>" />
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Name </label>
                <input type="text" maxlength="45" value="<?php echo $rows['name'];?>" class="field size1" id="name" name="name" style='width: 90%;' disabled required />
              </p>
               
               
               <p> <span class="req"></span>
                <label>New Price  <span style="color: red;">(*)</span></label>
                <input type="text" class="field size1" id="newprice"  style="width: 90%;" name="newprice"  />
             </p> 
             
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="submit" class="button" name="submit_offer" value="update" />
            </div>
            <!-- End Form Buttons -->
          </form>
    </div>
          
        
        <?php
      }

?>



<?php
    
    if(isset($_POST['submit_offer'])){
     
      $newprice = $_POST['newprice'];
      $product_id = $_POST['product_id'];
      $sql = "update products set isoffer=1 , price = $newprice where product_id=$product_id";
      $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
      if($res){
       header("location: all_products.php");
      }

    }
?>
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