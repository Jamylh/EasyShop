<?php 
include_once("systemAdmin/header_login.php");
ob_start();
session_start();
  include_once("shopAdmin/classes/config.php");
  $page_name = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>SHOP EASY CP</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<link type="text/css" href="popup_testing/css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="mos-css/slider.css"> <!--pemanggilan file css-->

<script type="text/javascript" src="popup_testing/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="popup_testing/js/jquery-ui-1.8.18.custom.min.js"></script>
  <script src="popup_testing/js/jquery-1.7.1.min.js"></script>
  <script src="popup_testing/development-bundle/external/jquery.bgiframe-2.1.2.js"></script>
  <script src="popup_testing/development-bundle/ui/jquery.ui.core.js"></script>
  <script src="popup_testing/development-bundle/ui/jquery.ui.widget.js"></script>
  <script src="popup_testing/development-bundle/ui/jquery.ui.mouse.js"></script>
  <script src="popup_testing/development-bundle/ui/jquery.ui.draggable.js"></script>
  <script src="popup_testing/development-bundle/ui/jquery.ui.position.js"></script>
  <script src="popup_testing/development-bundle/ui/jquery.ui.resizable.js"></script>
  <script src="popup_testing/development-bundle/ui/jquery.ui.dialog.js"></script>
  <link rel="stylesheet" href="popup_testing/development-bundle/demos/demos.css">
    
<!--------------------------Style files-------------------------------------->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="all.css">
      <link href="https://fonts.googleapis.com/css?family=Dosis|Istok+Web&display=swap" rel="stylesheet">
      <link href="css/style2.css" rel="stylesheet">
</head>
<body >

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

<div id="container">
  <div class="shell">

    <!-- Main -->
    <div id="main" >
      <div class="cl">&nbsp;</div>
      <!-- Content -->
        
          <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
          <br>


        <!-- Box -->
              <section class="login">
              
        <img class="wave" src="img/wave.png">
          <div class="container">
          <div class="img">
              <img src="img/undraw.svg">
              </div>
              <div class="login-content">
                <form action="add_grocery.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
                  <img class="avatar" src="img/business_shop.svg">
<!--                    <img class="avatar" src="img/pro.svg">-->
                    <h2>Register as Grocery shop</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
           		   <div class="div">
                       <h5>Name  <span>(*)</span></h5>
           		   		<input type="text" class="input"  maxlength="45"  id="name" name="name">
           		   </div>
                    </div>
                    
                    <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-mobile-alt"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Phone  <span>(*)</span></h5>
           		    	<input class="input" type="number" min="0" maxlength="10"  id="phone" name="phone">
            	   </div>
            	</div>
                    
                  <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Email  <span>(*)</span></h5>
           		    	<input class="input" type="Email" maxlength="45"  id="email" name="email" >
            	   </div>
            	</div>
                    
                   <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-address-card"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Address  <span>(*)</span></h5>
           		    	<input class="input"  type="text" maxlength="100"  id="address" name="address">
            	   </div>
            	</div>
                    
               <p> <span class="req"></span>
                <label>Product delivery  <span>(Optional)</span></label>
                <select name="delivery" class="field size1" style="width: 77%;">
                    <option value="yes">Yes</option>
                    <option value="no">No</option> 
                </select>
              </p>
                    
                   <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-store-alt"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Shop Logo  <span>(*)</span></h5>
           		    	<input type="file" class="field size1" id="pic" name="pic" >
            	   </div>
            	</div>
                    
            	<input type="reset" class="btn" value="reset">
                <input type="submit" class="btn" name="submit_grocery" value="ADD">
         
                  </form>
              </div>
          </div>
      </section>
        
   

        <?php

          if(isset($_POST['submit_grocery'])){
            $pro_name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $delivery = $_POST['delivery'];
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

            }else{
              $_SESSION['uniqid'] = @$_POST['uniqid']; 
              $del = false;
              if(isset($_POST['delivery'])){
                 $del = true;
              }

              $dir_name=dirname(__FILE__)."/systemAdmin/shoplogo/";
              $path = $_FILES['pic']['tmp_name'];
              $name = $_FILES['pic']['name'];
              $size = $_FILES['pic']['size'];
              $type = $_FILES['pic']['type'];
              $msg = $_FILES['pic']['error'];
              if($path != "" && $name != ""){
                if(in_array($type,array('image/png','image/gif','image/jpg','image/jpeg'))){
                   $pic_name=  rand().".png";
                    if(move_uploaded_file($path,$dir_name.$pic_name)){
                       $sql = "insert into shop values('','$pro_name','$address','Not yet','$phone','$email','$delivery','$pic_name')";
                        $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        if($res){
                          ?>
                          <br>
                      <div class="msg msg-ok">
                          <p><strong>Registration successfully</strong></p>
                     </div>
                          <?php
                         
                        }else{
                          ?>
                            <br>
                          <div class="msg msg-error" id="error">
                          <p><strong id="error_id">Registration Fail</strong></p>
                          </div>
                          <?php
                        }
                  }
                }
              }




             
           
           }
          }

        ?>

      </div>
      <!-- End Content -->

<!-- End Container -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="footer-copyright text-left py-3">
      	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						   Copyright &copy;<script>document.write(new Date().getFullYear());</script> SHOP EASY APPLICATION <i class="icon-heart" aria-hidden="true"></i> by <span>SHOP EASY</span>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      <p class="">Design by <span>SHOP EASY</span></p>
  </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
      <script src="js/all.min.js"></script>
  </body>
</html>
<?php ob_flush();?>
