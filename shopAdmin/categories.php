<?php include_once("header.php");
 $shop_id = $_SESSION['shop_id'];
?>
<!-- End Header -->
<!-- Container -->

<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="categories.php">Dashboard</a> <span>&gt;Product Categories</span>  </div>
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

        <!-- Box -->
          
          <section class="category login ">
    
    <h2>Add new product category</h2>
    <div class="login-content">

        <form class="text-center" action="categories.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
            <!-- Form -->
    <div class="form-group">
   
    <input class="form-control" type="text" maxlength="100" id="cat" name="cat" required placeholder="Category Name">
  </div>

            

            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons form-group form-row">
              <input type="reset" class="btn" value="reset" />
              <input type="submit" class="btn" name="submitCat" value="ADD"  />
            </div>
            <!-- End Form Buttons -->
        </form></div>
</section>

<section class="Current-Categories">
<table class="table table-hover text-center">
  <thead>
      
      <tr class="alert alert-dark" style="">
      <td colspan="5"><strong>Current Categories</strong></td>

      
      </tr>
      
      <tr>
      <th scope="col"><input type="checkbox" class="checkbox" /></th>
      <th scope="col">#</th>
      <th scope="col">Name</th>
    <th class="ac" colspan="">Content Control</th>
        
    </tr>
  </thead>
  <tbody>
      
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
                       
                        <td colspan="2"><a href="categories.php?do=remove&&cat_id=<?php echo $row['id'];?>" class="ico del" style="color:#ff2b2b">Delete</a><a href="categories.php?do=edit&&cat_id=<?php echo $row['id'];?>" class="ico edit" style="color:#E38A17">Edit</a></td>
                    </tr>
                    <?php

                  }

              ?>

 </tbody>
</table>
</section>


      
</div>
        
   
<?php include_once("footer.php");?>