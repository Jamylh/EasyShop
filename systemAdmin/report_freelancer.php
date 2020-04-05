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
          
           <!-- Box -->
              <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Report Freelancer</li>
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

          <form  action="report_freelancer.php" method="post" onsubmit="return validateForm()">
<input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
  <div class="form-group">
    <label for="exampleFormControlSelect1">Freelancer Name </label>
                <select name="freelancer_id" class="field size1 form-control">
                    <?php
                      $sql = "select * from freelancer ";
                      $res = mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_assoc($res)){
                        $rate= $objShop->getFreeLancerRate($conn,$row['freelancer_id']);
                        ?>
                          <option value="<?php echo $row['freelancer_id'];?>"><?php echo $row['name'];?> -- Rate is : <?php echo $rate; ?> </option>
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
              
                <input type="submit" class="btn" name="submit_grocery" value="Repot Freelancer">
            </div>
            <!-- End Form Buttons -->
</form>
          
        </div></div>


       
        <!-- End Box -->

 <!-- Box -->


 <?php

    if(isset($_POST['submit_grocery'])){
      $freelancer_id= $_POST['freelancer_id'];
      $sql = "select email from freelancer where freelancer_id=$freelancer_id";
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
 <!-- Box -->
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