<?php 
include_once("systemAdmin/header_login.php");
ob_start();
session_start();
  include_once("shopAdmin/classes/config.php");
  $page_name = basename($_SERVER['PHP_SELF']);
?>

<!-- End Header -->
<!-- Container -->
 <script>
  function validateForm(){
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var license = document.getElementById("license").value;
    var car_model = document.getElementById("car_model").value;
    if(name.length < 3){
        document.getElementById("error").style="display:block;width:67%;margin: 0 auto;display:table;"
        document.getElementById("error_id").innerHTML="Please enter  name";
        document.getElementById("name").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(phone.length != 10){
         document.getElementById("error").style="display:block;width:67%;margin: 0 auto;display:table;"
        document.getElementById("error_id").innerHTML="Please enter  Phone";
        document.getElementById("phone").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }
     
    if(!validateEmail(email)){
        document.getElementById("error").style="display:block;width:67%;margin: 0 auto;display:table;"
        document.getElementById("error_id").innerHTML="Please enter correct email";
        document.getElementById("email").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }
      if(lat == "" || lng == "" || lat == null || lng == null){
         document.getElementById("error").style="display:block;width:67%;margin: 0 auto;display:table;"
        document.getElementById("error_id").innerHTML="Please enter select your location";
      }else{
         document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

      if(license.length == 0){
         document.getElementById("error").style="display:block;width:67%;margin: 0 auto;display:table;"
        document.getElementById("error_id").innerHTML="Please enter  license  number";
        document.getElementById("license").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(car_model.length == 0){
         document.getElementById("error").style="display:block;width:67%;margin: 0 auto;display:table;"
        document.getElementById("error_id").innerHTML="Please enter  Car model  ";
        document.getElementById("car_model").focus();
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

<div id="container">
  <div class="shell">
    <!-- Small Nav -->

    <!-- Main -->
    <div id="main" >
      <div class="cl">&nbsp;</div>
      <!-- Content -->
        
          <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
          <br>


        <?php

          if(isset($_POST['submit_freelance'])){
            $freename = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $licence = $_POST['license'];
            $car_model = $_POST['car_model'];
         
            
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

                }else{
                  $_SESSION['uniqid'] = @$_POST['uniqid']; 

                   $dir_name=dirname(__FILE__)."/freelancerphotos/";
                  $path = $_FILES['pic']['tmp_name'];
                  $name = $_FILES['pic']['name'];
                  $size = $_FILES['pic']['size'];
                  $type = $_FILES['pic']['type'];
                  $msg = $_FILES['pic']['error'];
                  if($path != "" && $name != ""){
                    if(in_array($type,array('image/png','image/gif','image/jpg','image/jpeg'))){
                       $pic_name=  rand().".png";
                        if(move_uploaded_file($path,$dir_name.$pic_name)){
                           $sql = "insert into freelancer (freelancer_id,name,phone,email,licence,car_model,pic,status) values('','$freename','$phone','$email','$licence','$car_model','$pic_name','Not yet')";
                              $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                              if($res){
                               ?>
                                <div class="msg msg-ok">
                                      <p><strong>Registration successfully</strong></p>
                                       </div>
                               <?php
                              }else{
                               ?>
                                <div class="msg msg-error" id="error">
                                  <p><strong id="error_id">Registration Fail</strong></p>
                                  </div>
                               <?php
                              }
                        }else{
                            ?>
                            <div class="msg msg-error" id="error">
                                  <p><strong id="error_id">Fail saving your photo</strong></p>
                                  </div>
                            <?php
                        }
                      }else{
                        ?>
                        <div class="msg msg-error" id="error">
                                  <p><strong id="error_id">Your photo should be image type</strong></p>
                                  </div>
                        <?php
                      }
                    }
               
               }
          
          }

        ?>

        <!-- Box -->
        
                      <section class="login">
              
        <img class="wave" src="img/wave.png">
          <div class="container">
          <div class="img">
              <img src="img/undraw.svg">
              </div>
              <div class="login-content">
                <form action="freelancer.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
                
                    <img class="avatar" src="img/pro.svg">
                    <h2>Register as Freelancer</h2>
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
           		    	<i class="fad fa-steering-wheel"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Driving license number  <span>(*)</span></h5>
           		    	<input class="input"  type="number"  min="0"  id="license" name="license">
            	   </div>
            	</div>
                    
                     <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-car"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Car model <span>(*)</span></h5>
           		    	<input class="input"  type="number" mmaxlength="45"  id="car_model" name="car_model">
            	   </div>
            	</div>
                    
                    
                   <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-user-tie"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Your Photo  <span>(*)</span></h5>
           		    	<input type="file" class="field size1" id="pic" name="pic" >
            	   </div>
            	</div>
                    
            	<input type="reset" class="btn" value="reset">
                <input type="submit" class="btn" name="submit_freelance" value="Register" >
         
                  </form>
              </div>
          </div>
      </section>
        


      </div>
      <!-- End Content -->
      <br>
      <br>
      <!-- Sidebar -->
    

      <!-- End Sidebar -->

    <!-- Main -->
  </div>
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
