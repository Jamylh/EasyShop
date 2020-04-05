<?php include_once("header.php");

?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="add_product.php">Dashboard</a> <span>&gt; <a href="product_search.php">All products</a> <span>&gt;Search products</span>  </div>
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
            <h2 class="left">Current Products</h2>
            <div class="right">
              <label>search product</label>
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
                <th>ID</th>
                <th>Name</th>
                 <th>price</th>
                
                <th width="100" class="ac" >Content Control</th>
              </tr>
             
              <?php
                $product_name = "";
                  if(isset($_POST['product_name'])){
                    $product_name = $_POST['product_name'];
                  }
                 $shop_id =  $objProduct->getShopId($conn,$admin_id);

                  $sql = "select * from products where shop_id=$shop_id and name like'$product_name%' order by product_id desc";
                  $res = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_assoc($res)){
                    ?>
                     <tr>
                        <td><input type="checkbox" class="checkbox" /></td>
                        <td><h3><a href="#"><?php echo $row['product_id'];?></a></h3></td>
                        <td><h3><?php echo $row['name'];?></h3></td>
                        <td><h3><?php echo $row['price'];?> <span style='color:red;'>SR</span></h3></td>
                       
                        <td colspan="2"><a href="product_search.php?do=remove&&product_id=<?php echo $row['product_id'];?>" class="ico del">Delete</a><a href="product_search.php?do=edit&&product_id=<?php echo $row['product_id'];?>" class="ico edit">Edit</a></td>
                    </tr>
                    <?php

                  }

              ?>


            </table>


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
        
        <form action="product_search.php" method="post"  enctype="multipart/form-data" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
           <input type="hidden" name="product_id" value="<?php echo $product_id;?>" />
            <!-- Form -->
            <div class="form">
              <p> <span class="req">max 45 symbols</span>
                <label>Name  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $rows['name'];?>" class="field size1" id="name" name="name" style='width: 90%;' required/>
              </p>
               <p> <span class="req"></span>
                <label>Price  <span>(Required Field)</span></label>
                <input type="text" min="0" maxlength="10" value="<?php echo $rows['price'];?>"  class="field size1" id="price"  style='width: 90%;' name="price" required="" />
              </p>
               <p> <span class="req">max 200 symbols</span>
                <label>Description  <span>(Required Field)</span></label>
                <textarea name="description" maxlength="200"  class="field size1" required="" style='width: 90%;'>value="<?php echo $rows['description'];?>" </textarea>
              </p>
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
            $description = $_POST['description'];
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
                    $sql = "update products set name='$name',price=$price,description='$description',pic='$pic_name' where product_id=$product_id";
                    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if($res){
                     header("location: product_search.php");
                    }
                  } 
                
              }else{
                
                 $sql = "update products set name='$product_name',price=$price,description='$description' where product_id=$product_id";
                    $res = mysqli_query($conn,$sql);
                    if($res){
                      header("location: product_search.php");
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
              close: function(event, ui) { location.href="product_search.php"; }      
              });
            });
      </script>
    <!-- ui-dialog -->
    
    
    <div id="dialog-modal" class='header_model'  title="Remove Product">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <form action="product_search.php" method="post" class="form_data" style='margin:0 auto;display: table;'>
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
      header("location: product_search.php");
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