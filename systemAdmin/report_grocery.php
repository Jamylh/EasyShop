<?php include_once("header.php");
 include_once("classes/grocery.class.php");
 $objShop = new Shop();
 require_once ('mail/class.phpmailer.php');
 $mail = new PHPMailer;
 $shop_email ="" ;
?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->

        <!-- Box -->
              <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Report grocery</li>
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

          <form  action="report_grocery.php" method="post" onsubmit="return validateForm()">
<input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
  <div class="form-group">
    <label for="exampleFormControlSelect1">Grocert Name</label>
    <select name="sho_id" class="field size1 form-control">
        
        <?php
                      $sql = "select * from shop ";
                      $res = mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_assoc($res)){
                        $shop_email = $row['email'];  
                        $rate= $objShop->getShopRate($conn,$row['sho_id']);

                        ?>
                          <option value="<?php echo $row['sho_id'];?>"><?php echo $row['name'];?> -- Rate is : <?php echo $rate; ?> </option>
                        <?php
                      }
                    ?>
    </select>
  </div>
  <div class="form-group">
    <label >Report  <span>*</span></label>
    <textarea class="form-control field size1" id="exampleFormControlTextarea1" rows="5"  name="message" required=""></textarea>
  </div>
              
                          <!-- Form Buttons -->
            <div class="buttons">
              
                <input type="submit" class="btn" name="submit_grocery" value="Repot Grocery">
            </div>
            <!-- End Form Buttons -->
</form>
          
        </div></div>


       
        <!-- End Box -->

 <!-- Box -->

 <?php

    if(isset($_POST['submit_grocery'])){
      $sho_id= $_POST['sho_id'];
      $sql = "select email from shop where sho_id=$sho_id";
      $res = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($res);
      $email_send = $row['email'];
      $message= $_POST['message'];


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
                          $text = "<p>".$message."</p>";
                          $mail->Body = $text;

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