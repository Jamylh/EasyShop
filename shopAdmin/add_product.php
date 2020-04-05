<?php include_once("header.php");
 require_once ('mail/class.phpmailer.php');
 $mail = new PHPMailer;
  $shop_id = $_SESSION['shop_id'];
?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">

   <script>
  function validateForm(){
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("address").value;
      
    if(name.length < 3){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter grocery name";
        document.getElementById("name").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(phone.length != 10){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter grocery Phone";
        document.getElementById("phone").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }
     
    if(!validateEmail(email)){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter correct email";
        document.getElementById("email").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(address.length < 3){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter grocery address";
        document.getElementById("address").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

    return true;
  }
  function validateEmail(emailID)
      {
         atpos = emailID.add_groceryOf("@");
         dotpos = emailID.lastadd_groceryOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
           
            return false;
         }
         return( true );
      }
</script>

<script>
  function validateForm2(){
    var name2 = document.getElementById("name2").value;
    var phone2 = document.getElementById("phone2").value;
    var email2 = document.getElementById("email2").value;
    var address2 = document.getElementById("address2").value;
      
    if(name2.length < 3){
        document.getElementById("error2").style="display:block;"
        document.getElementById("error_id2").innerHTML="Please enter grocery name";
        document.getElementById("name2").focus();
        return false;
      }else{
        document.getElementById("error2").style="display:none;"
        document.getElementById("error_id2").innerHTML="";
      }

       if(phone2.length != 10){
        document.getElementById("error2").style="display:block;"
        document.getElementById("error_id2").innerHTML="Please enter grocery Phone";
        document.getElementById("phone2").focus();
        return false;
      }else{
        document.getElementById("error2").style="display:none;"
        document.getElementById("error_id2").innerHTML="";
      }
     
    if(!validateEmail(email2)){
        document.getElementById("error2").style="display:block;"
        document.getElementById("error_id2").innerHTML="Please enter correct email";
        document.getElementById("email2").focus();
        return false;
      }else{
        document.getElementById("error2").style="display:none;"
        document.getElementById("error_id2").innerHTML="";
      }

       if(address2.length < 3){
        document.getElementById("error2").style="display:block;"
        document.getElementById("error_id2").innerHTML="Please enter grocery address";
        document.getElementById("address2").focus();
        return false;
      }else{
        document.getElementById("error2").style="display:none;"
        document.getElementById("error_id2").innerHTML="";
      }

    return true;
  }
  function validateEmail(emailID)
      {
         atpos = emailID.add_groceryOf("@");
         dotpos = emailID.lastadd_groceryOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
           
            return false;
         }
         return( true );
      }
</script>


      <!-- Content -->
      <div id="content" >
         <?php

          if(isset($_POST['submitProduct'])){
            $product_name = $_POST['name'];
            $cat_id = $_POST['cat_id'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

            }else{
              $_SESSION['uniqid'] = @$_POST['uniqid']; 
              

                $dir_name=dirname(__FILE__)."/upload/";
              $path = $_FILES['pic']['tmp_name'];
              $name = $_FILES['pic']['name'];
              $size = $_FILES['pic']['size'];
              $type = $_FILES['pic']['type'];
              $msg = $_FILES['pic']['error'];
              if($path != "" && $name != ""){
                if(in_array($type,array('image/png','image/gif','image/jpg','image/jpeg'))){

                  $pic_name=  rand().".png";
                  if(move_uploaded_file($path,$dir_name.$pic_name)){
                    $res = $objProduct->addProducts($conn,$admin_id,$cat_id,$product_name,$price,$description,$pic_name);

                    if($res){
                     ?>
                     <div class="msg msg-ok">
                    <p><strong>Product added succesifully</strong></p>
                     </div>
                     <?php
                    }

                  }


                }
              }




           }
          }

        ?>

 
      

    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
  </ol>
</nav> 
    
    <!-- Main -->
    <div id="main" >
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content" >
        <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>

          
<form action="add_product.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" maxlength="45" class="field form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Categories </label>
    <select class="form-control" name="cat_id" >
<?php
                    $sql = "select * from shop_categories where shop_id=$shop_id";
                    $res = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                      ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['cat_name']?></option>
                      <?php

                    }
                  ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input type="text" min="0" maxlength="10" class="field form-control" id="price" name="price" required="" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description </label>
    <textarea class="form-control" name="description" maxlength="200" rows="3"></textarea>
  </div> 
    
    <div class="form-group">
    <label for="exampleFormControlTextarea1">picture required </label>
    <input type="file"  class="field size1" id="pic" name="pic">
  </div>
                <div class="buttons form-group ">
              <input type="reset" class="btn" value="reset" />
              <input type="submit" type="submit" class="btn" name="submitProduct" value="ADD" />
            </div>
</form> 
        </div></div>


</div>
       
 </div>
    </div>
      <!-- End Content -->

<?php include_once("footer.php");?>