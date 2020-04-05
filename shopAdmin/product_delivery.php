<?php include_once("header.php");
 $shop_id = $_SESSION['shop_id'];
?>
<!-- End Header -->
<!-- Container -->
<script>
  function validateForm(){
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

      
    if(name.length < 3){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="Please enter Branch name";
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
      if(username.length > 3 ){
        document.getElementById("error").style="display:block;"
        document.getElementById("error_id").innerHTML="e  ";
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
    <div class="small-nav"> <a href="categories.php">Dashboard</a> <span>&gt;Product Deliverer</span>  </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
  
    <br />
    <!-- Main -->
    <div id="main" >
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content" >
         <?php

          if(isset($_POST['submitCat'])){
            $cat = $_POST['cat'];
            
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

            }else{
              $_SESSION['uniqid'] = @$_POST['uniqid']; 
              

                

                $sql = "insert into shop_categories values('',$shop_id,'$cat')";
                $res = mysqli_query($conn,$sql);
                if($res){
                  header("location: categories.php");
                }


           }
          }

        ?>
      <div id="content" >
        <div class="msg msg-error" id="error" style="display: none;">
                <p><strong id="error_id"></strong></p>
          </div>
        <!-- Box -->
        <div class="box" style="width: 130%;border: 1px solid;">
          <!-- Box Head -->
          <div class="box-head" >
            <h2>Add new product category</h2>
          </div>
          <!-- End Box Head -->
          <form action="categories.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
            <!-- Form -->
            <div class="form">
              <p> <span class="req">max 100  symbols</span>
                <label>Category Name  <span>(Required Field)</span></label>
                <input type="text" maxlength="100" class="field size1" id="cat" name="cat" required/>
              </p>
               
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="reset" class="button" value="reset" />
              <input type="submit" class="button" name="submitCat" value="ADD" />
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->

        <!-- Box -->
        <div class="box" style="width:130%;">
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current Categories</h2>
            <div class="right" style=" width: 50%;">
              
            </div>
          </div>
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="13"><input type="checkbox" class="checkbox" /></th>
                <th>#</th>
                <th>Name</th>
                
                <th width="100" class="ac" >Content Control</th>
              </tr>
             
              <?php
                  $count=1;
                  $sql = "select * from shop_categories where shop_id=$shop_id";
                  $res = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_assoc($res)){
                    ?>
                     <tr>
                        <td><input type="checkbox" class="checkbox" /></td>
                         <td><h3><a href="#"><?php echo $count++;?></a></h3></td>
                        <td><h3><a href="#"><?php echo $row['cat_name'];?></a></h3></td>
                       
                        <td colspan="2"><a href="categories.php?do=remove&&cat_id=<?php echo $row['id'];?>" class="ico del">Delete</a><a href="categories.php?do=edit&&cat_id=<?php echo $row['id'];?>" class="ico edit">Edit</a></td>
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