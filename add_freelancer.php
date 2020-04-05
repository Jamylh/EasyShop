<?php include_once("header.php");
 include_once("classes/freelancer.class.php");
 $objFree = new Freelancer();
 require_once ('mail/class.phpmailer.php');
 $mail = new PHPMailer;
?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="index.php">Dashboard</a> <span>&gt; Add Free lancer</span>  </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
   <script>
  function validateForm(){
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
      
    if(name.length < 3){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter  name";
        document.getElementById("name").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(phone.length != 10){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter  Phone";
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

      

    return true;
  }
  function validateEmail(emailID)
      {
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
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
      
    if(name2.length < 3){
        document.getElementById("error2").style="display:block;"
        document.getElementById("error_id2").innerHTML="Please enter  name";
        document.getElementById("name2").focus();
        return false;
      }else{
        document.getElementById("error2").style="display:none;"
        document.getElementById("error_id2").innerHTML="";
      }

       if(phone2.length != 10){
        document.getElementById("error2").style="display:block;"
        document.getElementById("error_id2").innerHTML="Please enter  Phone";
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

      

    return true;
  }
  function validateEmail(emailID)
      {
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
           
            return false;
         }
         return( true );
      }
</script>
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
        <div class="box" style="width: 130%;border: 1px solid;">
          <!-- Box Head -->
          <div class="box-head" >
            <h2>Add Freelancer</h2>
          </div>
          <!-- End Box Head -->
          <form action="add_freelancer.php" method="post" onsubmit="return validateForm()" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
            <!-- Form -->
            <div class="form">
              <p> <span class="req">max 45 symbols</span>
                <label>Name  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" class="field size1" id="name" name="name" />
              </p>
               <p> <span class="req">max 10 symbols</span>
                <label>Phone  <span>(Required Field)</span></label>
                <input type="number" min="0" maxlength="10" class="field size1" id="phone" name="phone" />
              </p>
               <p> <span class="req">max 45 symbols</span>
                <label>Email  <span>(Required Field)</span></label>
                <input type="Email" maxlength="45"  class="field size1" id="email" name="email" />
              </p>
             
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="reset" class="button" value="reset" />
              <input type="submit" class="button" name="submit_freelance" value="ADD" />
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->

        <?php

          if(isset($_POST['submit_freelance'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

            }else{
              $_SESSION['uniqid'] = @$_POST['uniqid']; 
            $sql = "insert into freelancer (freelancer_id,name,phone,email) values('','$name','$phone','$email')";
            $res = mysqli_query($conn,$sql);
            if($res){
              header("location add_freelancer.php");
            }
           }
          }

        ?>

 <!-- Box -->
        <div class="box" style="width:130%;">
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current Freelancers</h2>
            <div class="right">
              <label>search Freelancer</label>
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
                <th>Name</th>
                 <th>Email</th>
                  <th>Phone</th>
                   
                <th width="200" class="ac" >Content Control</th>
              </tr>
             
              <?php

                  $sql = "select * from freelancer order by freelancer_id desc";
                  $res = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_assoc($res)){
                    ?>
                     <tr>
                        <td><input type="checkbox" class="checkbox" /></td>
                        <td><h3><a href="#"><?php echo $row['name'];?></a></h3></td>
                        <td><h3><?php echo $row['email'];?></h3></td>
                         <td><h3><?php echo $row['phone'];?></h3></td>
                        <td colspan="2"><a href="add_freelancer.php?do=remove&&freelancer_id=<?php echo $row['freelancer_id'];?>" class="ico del">Delete</a><a href="add_freelancer.php?do=edit&&freelancer_id=<?php echo $row['freelancer_id'];?>" class="ico edit">Edit</a><a href="add_freelancer.php?do=send&&freelancer_id=<?php echo $row['freelancer_id'];?>" style='margin-left: 20px;'>Send Login info</a></td>
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
        $freelancer_id = $_REQUEST['freelancer_id'];
        $rows = $objFree->getFreelancer($conn,$freelancer_id);
       
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
    
    
    <div id="dialog-modal" class='header_model'  title="Edit Freelancer">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <div class="msg msg-error" id="error2" style="display: none;">
                <p><strong id="error_id2"></strong></p>
          </div>
        
        <form action="add_freelancer.php" method="post" onsubmit="return validateForm2()" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
           <input type="hidden" name="freelancer_id" value="<?php echo $freelancer_id;?>" />
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
          $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $freelancer_id = $_POST['freelancer_id'];

            $res = $objFree->EditFreeLancer($conn,$freelancer_id,$name,$email,$phone);
            if($res){
              header("location: add_freelancer.php");
            }
      }
    
    ?>

  <?php
    
      if(@$_REQUEST['do']=='remove'){
        $freelancer_id = $_REQUEST['freelancer_id'];
        $rows = $objFree->getFreelancer($conn,$freelancer_id);
       
        ?>
          <script type="text/javascript">
            $(function() {
              $( "#dialog:ui-dialog" ).dialog( "destroy" );
              $( "#dialog-modal" ).dialog({
             
              resizable: false,
             
              modal: true,
              close: function(event, ui) { location.href="add_freelancer.php"; }      
              });
            });
      </script>
    <!-- ui-dialog -->
    
    
    <div id="dialog-modal" class='header_model'  title="Remove Freelancer">
    <style>
      .ui-dialog-titlebar{ background: #40B34C;repeat left center;text-shadow: 1px 0px #003362;color: #fff;direction: ltr;text-align: left;}
    </style>
      
        <form action="add_freelancer.php" method="post" class="form_data" style='margin:0 auto;display: table;'>
                <img src="css/images/rr.png" width="40" style="margin:0 auto;display: table;">
                <br>
              <p  style="padding-bottom:2px; font-weight:bold;font-family: DroidKufi-Regular;">Are you sure for deleting <?php echo $rows['name'];?> </p>
              <br>
              <div class="table_btn_pop" style="margin:0 auto;display: table;">

                <input type="submit" name="Confirm_Delete"  class="button_save" value=" Remove "/>
                <input type="hidden" name="delete_ID" value="<?php echo $freelancer_id; ?>"/>
                
              </div>
            </form>
    </div>
          
        
        <?php
      }
      ?>
<?php
  
 if(@$_POST['Confirm_Delete']){

    $delete_ID = $_POST['delete_ID'];
    
     $res= $objFree->deleteFreelancer($conn,$delete_ID);
     if($res){
      header("location: add_freelancer.php");
     }
    

  }

?>


 <?php
    
      if(@$_REQUEST['do']=='send'){
        $freelancer_id = $_REQUEST['freelancer_id'];
        $rows = $objFree->getFreelancer($conn,$freelancer_id);
       
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
        
        <form action="add_freelancer.php" method="post">
           <input type="hidden" name="freelancer_id" value="<?php echo $freelancer_id;?>" />
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
                <input type="text" maxlength="45" value="<?php echo $objFree->random_username($rows['name']." ");?>" class="field size1" id="username" name="username" style='width:100%;'  />
              </p>
              <p> <span class="req">max 20   symbols</span>
                <label>Password  <span>(Required Field)</span></label>
                <input type="text" maxlength="45" value="<?php echo $objFree->rand_password(8);?>"  class="field size1" id="password" name="password" style='width:100%;'  />
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
            $freelancer_id = $_POST['freelancer_id'];
            $email_send = $_POST['email_send'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "update freelancer set username='$username' ,password='$password' where freelancer_id=$freelancer_id";
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
                          $mail->Body = "Free lancer username '".$username ."' password ".$password;

                          if($mail->Send()){
                           
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