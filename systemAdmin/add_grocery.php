<?php include_once("header.php");
 include_once("classes/grocery.class.php");
 $objShop = new Shop();
 require_once ('mail/class.phpmailer.php');
 $mail = new PHPMailer;
?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="add_grocery.php">Dashboard</a> <span>&gt; Add grocery</span>  </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
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
      
    <!-- Main -->
    <div id="main" >
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content" >
        <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
        



    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add grocery</li>
  </ol>
</nav> 
          
          
<table class="table table-hover table-dark  text-center">
  <thead>
      
      <tr class="alert alert-dark" style="">
      <td colspan="3">Current Shopes</td>
      <td colspan="4" class="text-right">
                    <label>search shop</label>
              <input type="text" class="field small-field" />
              <input type="submit" class="button" value="search" />
      </td>
      
      </tr>
      
      <tr>
      <th scope="col"><input type="checkbox" class="checkbox" /></th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Status</th>
      <th scope="col">Delivery</th>
    <th class="ac" >Content Control</th>
        
    </tr>
  </thead>
  <tbody>
                    <?php

                  $sql = "select * from shop order by sho_id desc";
                  $res = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_assoc($res)){
                    ?>
    <tr>
    <td scope="row"><input type="checkbox" class="checkbox" /></td>
                        <td><h3><a href="#"><?php echo $row['name'];?></a></h3></td>
                        <td><h3><?php echo $row['email'];?></h3></td>
                         <td><h3><?php echo $row['phone'];?></h3></td>
                        <td><h3><?php echo $row['status'];?></h3></td>
                        <td><h3><?php echo $row['delivery'];?></h3></td>
      <td>
        <a style="color:#ff2b2b" href="add_grocery.php?do=remove&&shop_id=<?php echo $row['sho_id'];?>" class="ico del">Delete</a>&nbsp;
        <a style="color:#E38A17" href="add_grocery.php?do=edit&&shop_id=<?php echo $row['sho_id'];?>" class="ico edit">Edit</a>&nbsp;
        <a  style="color:#FFCC26" href="add_grocery.php?do=send&&shop_id=<?php echo $row['sho_id'];?>">Send Login info</a>
        </td>
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
        <?php
    
      if(@$_REQUEST['do']=='edit'){
        $sho_id = $_REQUEST['shop_id'];
        $rows = $objShop->getShop($conn,$sho_id);
       
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
    
    
    <div id="dialog-modal" class='header_model'  title="Edit Shop">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <div class="msg msg-error" id="error2" style="display: none;">
                <p><strong id="error_id2"></strong></p>
          </div>
        
        <form action="add_grocery.php" method="post" onsubmit="return validateForm2()" enctype="multipart/form-data" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
           <input type="hidden" name="sho_id" value="<?php echo $sho_id;?>" />
            <!-- Form -->
            <div class="form" >
              <p> <span class="req">max 45 symbols</span>
                <label>Name  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $rows['name'];?>" class="field size1" id="name2" name="name" style='width:100%;' />
              </p>
               <p> <span class="req">max 10 symbols</span>
                <label>Phone  <span>(Required Field)</span></label>
                <input type="number" min="0" maxlength="10" value="<?php echo $rows['phone'];?>" class="field size1" id="phone2" name="phone" style='width:100%;'/>
              </p>
               <p> <span class="req">max 45 symbols</span>
                <label>Email  <span>(Required Field)</span></label>
                <input type="Email" maxlength="45" value="<?php echo $rows['email'];?>"  class="field size1" id="email2" name="email" style='width:100%;'/>
              </p>
              <p> <span class="req">max 100 symbols</span>
                <label>Address  <span>(Required Field)</span></label>
                <input type="text" maxlength="100" value="<?php echo $rows['location'];?>" class="field size1" id="address2" name="address" style='width:100%;' />
              </p>

               <p> <span class="req">*</span>
                <label>Status  <span>(Required Field)</span></label>
                <select name="status" class="field size1" style="width: 100%;">
                    <option value="Not yet" <?php if($rows['status'] == 'Not yet') echo 'selected';?>>Not yet</option>
                     <option value="Accepeted" <?php if($rows['status'] == 'Accepeted') echo 'selected';?>>Accepted</option>
                <option value="Stoped" <?php if($rows['status'] == 'Stoped') echo 'selected';?>>Stoped</option>
                </select>
              </p>
               <p> <span class="req"></span>
                <label>Product delivery  <span>(Optional)</span></label>
                <select name="delivery" class="field size1" style="width: 100%;">
                    <option value="yes" <?php if($rows['delivery'] == 'yes') echo 'selected';?>>Yes</option>
                    <option value="no" <?php if($rows['delivery'] == 'no') echo 'selected';?>>No</option> 
                </select>
              </p>
               <p> <span class="req">picture required</span>
                <label>pic  <span>(Required Field)</span></label>
                <input type="file"  class="field size1" id="pic" name="pic" />
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="reset" class="button" value="reset" />
              <input type="submit" class="button" name="submit_Edit" value="UPDATE" />
            </div>
            <!-- End Form Buttons -->
          </form>
    </div>
          
        
        <?php
      }

      if(isset($_POST['submit_Edit'])){
          $pro_name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $status = $_POST['status'];
            $sho_id = $_POST['sho_id'];
            $del = $_POST['delivery'];

             $dir_name=dirname(__FILE__)."/shoplogo/";
              $path = $_FILES['pic']['tmp_name'];
              $name = $_FILES['pic']['name'];
              $size = $_FILES['pic']['size'];
              $type = $_FILES['pic']['type'];
              $msg = $_FILES['pic']['error'];
              if($path != "" && $name != ""){
                if(in_array($type,array('image/png','image/gif','image/jpg','image/jpeg'))){
                   $pic_name=  rand().".png";
                    if(move_uploaded_file($path,$dir_name.$pic_name)){
                      $res = $objShop->Editshop2($conn,$sho_id,$pro_name,$email,$phone,$address,$status,$del,$pic_name);
           
                      if($res){
                       header("location: add_grocery.php");
                      }
                    }
                }
              }else{
                 $res = $objShop->Editshop($conn,$sho_id,$pro_name,$email,$phone,$address,$status,$del);
           
                if($res){
                 header("location: add_grocery.php");
                }
              }

           
             
      }
    
    ?>

  <?php
    
      if(@$_REQUEST['do']=='remove'){
        $sho_id = $_REQUEST['shop_id'];
        $rows = $objShop->getShop($conn,$sho_id);
       
        ?>
          <script type="text/javascript">
            $(function() {
              $( "#dialog:ui-dialog" ).dialog( "destroy" );
              $( "#dialog-modal" ).dialog({
             
              resizable: false,
             
              modal: true,
              close: function(event, ui) { location.href="add_grocery.php"; }      
              });
            });
      </script>
    <!-- ui-dialog -->
    
    
    <div id="dialog-modal" class='header_model'  title="Remove Shop">
    <style>
      .ui-dialog-titlebar{ background: #efefef;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <form action="add_grocery.php" method="post" class="form_data" style='margin:0 auto;display: table;'>
                <img src="css/images/rr.png" width="40" style="margin:0 auto;display: table;">
                <br>
              <p  style="padding-bottom:2px; font-weight:bold;font-family: DroidKufi-Regular;">Are you sure for deleting <?php echo $rows['name'];?> </p>
              <br>
              <div class="table_btn_pop" style="margin:0 auto;display: table;">

                <input type="submit" name="Confirm_Delete"  class="button_save" value=" Remove "/>
                <input type="hidden" name="delete_ID" value="<?php echo $sho_id; ?>"/>
                <input type='hidden' name="shoplogo" value="<?php echo $rows['logo'];?>">
              </div>
            </form>
    </div>
          
        
        <?php
      }
      ?>
<?php
  
 if(@$_POST['Confirm_Delete']){

    $delete_ID = $_POST['delete_ID'];
    $shoplogo = $_POST['shoplogo'];
     $res= $objShop->deleteShop($conn,$delete_ID);
     if($res){
      unlink("shoplogo/$shoplogo");
      header("location: add_grocery.php");
     }
    

  }

?>


 <?php
    
      if(@$_REQUEST['do']=='send'){
        $sho_id = $_REQUEST['shop_id'];
        $rows = $objShop->getShop($conn,$sho_id);
       
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
    
    
    <div id="dialog-modal" class='header_model'  title="Send Login info">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <div class="msg msg-error" id="error2" style="display: none;">
                <p><strong id="error_id2"></strong></p>
          </div>
        
        <form action="add_grocery.php" method="post">
           <input type="hidden" name="sho_id" value="<?php echo $sho_id;?>" />
            <!-- Form -->
            <div class="form" >
              <p> <span class="req">*</span>
                <label>Name  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $rows['name'];?>" class="field size1" id="name2" name="name" style='width:100%;' disabled />
              </p>
               
              <p> <span class="req">*</span>
                <label>Email  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $rows['email'];?>" class="field size1" id="email_send" name="email_send" style='width:100%;'  />
              </p>
              <p> <span class="req">max 20   symbols</span>
                <label>Username  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $objShop->random_username($rows['name']);?>" class="field size1" id="username" name="username" style='width:100%;'  />
              </p>
              <p> <span class="req">max 20   symbols</span>
                <label>Password  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $objShop->rand_password(8);?>"  class="field size1" id="password" name="password" style='width:100%;'  />
              </p>

            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="reset" class="button" value="reset" />
              <input type="submit" class="button" name="submit_Send" value="Send" />
            </div>
            <!-- End Form Buttons -->
          </form>
    </div>
          
        
        <?php
      }
      ?>






        <?php


            // send email and save password with shop username

          if(isset($_POST['submit_Send'])){
            $sho_id = $_POST['sho_id'];
            $email_send = $_POST['email_send'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "insert into shop_admin values('',$sho_id,'','$username','$password')";
            $res=  mysqli_query($conn,$sql);
            if($res){

                            
                           $mail->IsSMTP();
                          $mail->SMTPOptions = array(
                              'ssl' => array(
                                  'verify_peer' => false,
                                  'verify_peer_name' => false,
                                  'allow_self_signed' => true
                              )
                          );
                          $mail->SMTPDebug = 0;
                          $mail->SMTPAuth = true;
                          $mail->SMTPSecure = 'tls'; 
                          $mail->Host = "smtp.gmail.com"; 
                          $mail->Port = 587; 
                          $mail->IsHTML(true);
                          //$mail->SetLanguage("tr", "phpmailer/language");
                          $mail->CharSet  ="utf-8";
                          $mail->Username = "ashal.lkapp@gmail.com"; 
                          $mail->Password = "Ashal@0123"; 
                          $mail->SetFrom("ashal.lkapp@gmail.com", "AS-HAL LK");
                          $mail->AddAddress($email_send); 
                          $mail->Subject = "AS-HAL LK APPLICATION";
                          $text = "<p>Congratulation your shop  accepeted to join us as grocery shop for As-hal lk system</p>"; 
                          $text.="<p><Strong>Shop Admin username is: </strong>".$username ."</p>";
                          $text.="<p><Strong>Shop Admin Password is: </strong>".$password ."</p>";
                          $mail->Body = $text;
                          if($mail->Send()){
                            $sql = "update shop set status='Accepeted' where sho_id=$sho_id";
                            $res = mysqli_query($conn,$sql);
                            ?>
                              <script type="text/javascript">alert("Email sent");</script>
                            <?php
                          }else{
                            ?>
                              <script type="text/javascript">alert("Error");</script>
                            <?php
                          }




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