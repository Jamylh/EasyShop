<?php 
include_once("../systemAdmin/header_login.php");
ob_start();
session_start();
  include_once("classes/config.php");
  $page_name = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html lang="en">
<head>
<!--------------------------Style files-------------------------------------->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="all.css">
      <link href="https://fonts.googleapis.com/css?family=Dosis|Istok+Web&display=swap" rel="stylesheet">
      <link href="../systemAdmin/css/style2.css" rel="stylesheet">

    <title>Shop Easy CP</title>
<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16" />
</head>
<body>

    <div id="main" >
      <!-- Content -->
         <?php

          if(isset($_POST['submit_Login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "select * from shop_branches where email='$email' and password='$passworsd'"
            ;
            $res = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($res);
            if($num > 0){
              $row = mysqli_fetch_assoc($res);
              $_SESSION['branch_id']=$row['id'];
               $_SESSION['shop_id']=$row['shop_id'];
              $_SESSION['name']=$row['name'];

              header("location: orders.php");
            }else{
              ?>
              <div class="msg msg-error" id="error2" style="width:50%;margin: 0 auto;display: table;" >
                <p><strong id="error_id2">Incorrect username or passsword</strong></p>
            </div>
            <br>
              <?php
            }

            
           
          }

        ?>


<section class="login">
              
              <img class="wave" src="../img/wave.png">
                <div class="container">
                <div class="img">
                    <img src="../img/undraw.svg">
                    </div>
                    <div class="login-content">
                      <form action="index.php" method="post">
                        <img class="avatar" src="../img/pro.svg">
                          <h2>Login<span>Shop Branches </span></h2>
                          <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
                          <div class="input-div one">
                              <div class="i">
                                  <i class="fas fa-user"></i>
                              </div>
                        <div class="div">
                            <h5>Email</h5>
                            <input type="text" class="input" id="email" name="email"  required="required">
                        </div>
                          </div>
      
                          <div class="input-div pass">
                        <div class="i"> 
                           <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                           <h5>Password</h5>
                           <input type="password" class="input" required="required" id="password" name="password">
                       </div>
                    </div>
                      <a href="#">Forgot Password?</a>
                    <input type="reset" class="btn" value="reset">
                          <input type="submit" class="btn" name="submit_Login" value="Login">
               
                        </form>
                    </div>
                </div>
            </section>
       
      
          </div>
  <div class="footer-copyright text-left py-3">
      	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						   Copyright &copy;<script>document.write(new Date().getFullYear());</script> SHOP EASY APPLICATION <i class="icon-heart" aria-hidden="true"></i> by <span>SHOP EASY</span>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      <p class="text-right">Design by <span>SHOP EASY</span></p>
  </div>
<?php include_once("footer.php");?>
