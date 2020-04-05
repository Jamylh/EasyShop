<?php include_once("header.php");
 require_once ('mail/class.phpmailer.php');
 $mail = new PHPMailer;
  $shop_id = $_SESSION['shop_id'];

?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->
      <div id="content" >
              <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Offers banner</li>
  </ol>
</nav> 
    <div id="main" >


         <?php

          if(isset($_POST['submitoffer'])){
            
            if(isset($_POST['uniqid']) AND $_POST['uniqid'] == @$_SESSION['uniqid']){

            }else{
              $_SESSION['uniqid'] = @$_POST['uniqid']; 
              

                $dir_name=dirname(__FILE__)."/banner/";
              $path = $_FILES['pic']['tmp_name'];
              $name = $_FILES['pic']['name'];
              $size = $_FILES['pic']['size'];
              $type = $_FILES['pic']['type'];
              $msg = $_FILES['pic']['error'];
              if($path != "" && $name != ""){
                if(in_array($type,array('image/png','image/gif','image/jpg','image/jpeg'))){

                  $pic_name=  rand().".png";
                  if(move_uploaded_file($path,$dir_name.$pic_name)){
                   
                  $res =  $objProduct->checkIsBannerFound($conn,$shop_id,$pic_name);

                    if($res){
                     ?>
                     <div class="msg msg-ok">
                    <p><strong>Banner added successfully</strong></p>
                     </div>
                     <?php
                    }

                  }


                }
              }




           }
          }

        ?>

        <!-- Box -->
          <!-- Box Head -->

          <!-- End Box Head -->
          <form action="offer_banner.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
            <!-- Form -->
            <div class="form">
             
              <p> <span class="req">picture required</span>
                <label>pic  <span>(*)</span></label>
                <input type="file"  class="form-control" id="pic" name="pic" />
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="reset" class="btn" value="reset" />
              <input type="submit" class="btn" name="submitoffer" value="ADD" />
            </div>
            <!-- End Form Buttons -->
          </form>
        
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