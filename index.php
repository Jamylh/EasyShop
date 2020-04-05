<?php 
ob_start();
session_start();
  include_once("shopAdmin/classes/config.php");
  $page_name = basename($_SERVER['PHP_SELF']);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Shop Easy CP</title>
   <link rel="icon" type="image/png" href="img/logo.png" sizes="16x16" />
      
  </head>
  <body>
  
  <!--------------------- NavigationBar----------------------->
      
      <section id="nav-bar">
          
          <nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="systemAdmin/index.php">System Admin</a>
          <a class="dropdown-item" href="shopAdmin/index.php">Shop Admin</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="branches/index.php">Branches</a>
      </li>
        
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Registe
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="freelancer.php">as Freelancer</a>
          <a class="dropdown-item" href="add_grocery.php"> as Shop</a>
        </div>
      </li>
        

    </ul>
  </div>
</nav>
      </section>
<!-- End Header -->
<!-------------------- Slider ----------------------->
      <div id="slider">
      <div id="headerSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/Supermarket3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/Supermarket.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
        <h2>Welcome To SHOP EASY</h2>
            <p>is all about an integrated system that aims to satisfy the customer<br> by delivering his/her orders in less time and price.</p>
        </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>
      
        <!-- End Box -->
 <!-- Box -->
<!------------------------------------------------------>
      

      <section>
          <div  class="title-box">
          <h1>Participating stores with us</h1>
              <div class="line"></div>
<!--
          <p>is all about an integrated system that aims to satisfy <br>
              the customer by delivering his/her orders in less time and price</p>
          
-->
        </div>  

        <div class="container"> 
          <div class="row">
            <div class="col-md-3">
            <div class="shop-row">
            <div class="info-box">
              <h4>Alraya </h4>
                <small>Mandarin</small>
                <img src="img/shop5.png">
                <div class="social-box">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram-f"></i>
                </div>

              </div>
              </div>
              </div>
              
              <div class="col-md-3">
            <div class="shop-row">
            <div class="info-box">
              <h4>Mandarin</h4>
                <small>Mandarin</small>
                <img src="img/shop3.jfif">
                <div class="social-box">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram-f"></i>
                </div>

              </div>
              </div>
              </div>
              
              <div class="col-md-3">
            <div class="shop-row">
            <div class="info-box">
              <h4>Carrefour</h4>
                <small>Mandarin</small>
                <img src="img/shop2.png">
                <div class="social-box">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram-f"></i>
                </div>

              </div>
              </div>
              </div>
              
              <div class="col-md-3">
            <div class="shop-row">
            <div class="info-box">
              <h4>Panda <br> Hyperpanda</h4>
                <small>Mandarin</small>
                <img src="img/shop6.png">
                <div class="social-box">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>

              </div>
              </div>
              </div>
            </div>
          </div>
      </section>
    

            
      <!-------------------------Footer----------------------------->
      <!-- Footer -->
<footer class="page-footer font-small indigo">

  <!-- Footer Links -->
  <div class="container">

    <!-- Grid row-->
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">

        
          <!-- Facebook -->
          <a class="fb-ic"  href="#">
            <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic"  href="#">
            <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic"  href="#">
            <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic" href="#">
            <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic"  href="#">
            <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic"  href="#">
            <i class="fab fa-pinterest fa-lg white-text"> </i>
          </a>

    </div>
    <!-- Grid row-->
    <hr class="rgba-white-light" style="margin: 0 15%;">

    <!-- Grid row-->
    <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

      <!-- Grid column -->
      <div class="col-md-8 col-12 mt-5">
          <img src="img/logo.png">
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->
    <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

    <!-- Grid row-->

    <!-- Grid row-->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
      	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |   SHOP EASY APPLICATION <i class="icon-heart" aria-hidden="true"></i> by <a href="index.php" target="_blank">SHOP EASY</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      Design by <a href="">SHOP EASY</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
      <script src="js/all.min.js"></script>
  </body>
</html>
<?php ob_flush();?>
