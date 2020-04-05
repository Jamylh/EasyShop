<?php include_once("header.php");
 $shop_id = $_SESSION['shop_id'];
?>
<!-- End Header -->
<!-- Container -->
<script>
  function validatForm(){
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

      
    if(name.length < 3){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter Deliverer name";
        document.getElementById("name").focus();
        return false;
      }else{
        document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(phone.length != 10){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter Deliverer Phone";
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
      if(username.length < 3 ){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter username  ";
        document.getElementById("username").focus();
        return false;
      }else{
      document.getElementById("error").style="display:none;"
        document.getElementById("error_id").innerHTML="";
      }

       if(password.length < 6){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter  password";
        document.getElementById("password").focus();
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
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Shop Delivere</li>
  </ol>
</nav> 
    <!-- End Small Nav -->
    <!-- Message OK -->
  
    <br />
    <!-- Main -->
    <div id="main" >

      <div id="content" >
         <?php

          if(isset($_POST['submit_dele'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

            }else{
              $_SESSION['uniqid'] = @$_POST['uniqid']; 
              

                

                $sql = "insert into deliverer values('',$shop_id,$branch_id,'$username','$password','$name','$phone','$email','')";
                $res = mysqli_query($conn,$sql);
                if($res){
                 ?>
                 <div class="msg msg-ok">
                          <p><strong>Deleivere added successfully</strong></p>
                     </div> 
                 <?php
                }


           }
          }

        ?>
          
 <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
        <!-- Box -->
                    
<form action="product_delivery.php" method="post" onsubmit="return validatForm()" >
    <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
  <div class="form-group">
    <label for="exampleFormControlInput1">Name <span>(*)</span></label>
    <input type="text" maxlength="45" class="field form-control" id="name" name="name">
  </div>

  <div class="form-group">
                <label> Phone <span>(*)</span></label>
                <input type="number" maxlength="100" class="field form-control" id="phone" name="phone" />
  </div>
  <div class="form-group">
                <label> Email  <span>(*)</span></label>
                <input type="email" maxlength="100" class="field form-control" id="email" name="email" />
  </div> 
    
    <div class="form-group">
                <label> Username  <span>(*)</span></label>
                <input type="text" maxlength="100" class="field form-control" id="username" name="username" />
  </div>
    
        <div class="form-group">
                <label> Password  <span>(*)</span></label>
                <input type="text" maxlength="100" class="field form-control" id="password" name="password" />
  </div>
                <div class="buttons form-group ">
              <input type="reset" class="btn" value="reset" />
              <input type="submit" type="submit" class="btn" name="submit_dele" value="ADD"/>
            </div>
</form> 
        </div></div>


</div>
    
  

        <!-- End Box -->
 </div>


<?php include_once("footer.php");?>