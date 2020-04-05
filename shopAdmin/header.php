<?php 
ob_start();
session_start();
  include_once("classes/config.php");
  include_once("classes/products.class.php");
  $objProduct = new Products();
  $page_name = basename($_SERVER['PHP_SELF']);
  if(!isset($_SESSION['name'])){
    header("location: index.php");
  }
  $admin_id = $_SESSION['admin_id'];
?>



    <!doctype html>
<html lang="en">
  <head>
  	<title>Shop Easy CP</title>
      <link rel="icon" type="image/png" href="img/logo.png" sizes="16x16" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link type="text/css" href="popup_testing/css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" /> 

<script type="text/javascript" src="popup_testing/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="popup_testing/js/jquery-ui-1.8.18.custom.min.js"></script>
<link rel="stylesheet" href="popup_testing/development-bundle/themes/base/jquery.ui.all.css">
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/sidebar1.css">
      
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
                    <div id="top">
      
      <div id="top-navigation"> WELCOME <a href="#"><strong><?php echo $_SESSION['name'];?></strong></a> <span>|</span>  <a href="logout.php">Log out</a> </div>
    </div>
		  		<h1><a href="index.html" class="logo"><img src="../img/logo.png"></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="../index.php" >Home</a>
	          </li>
	          <li>
	              <a href="categories.php">Product Categories</a>
	          </li>
	          <li>
              <a href="add_product.php"> Add Product</a>
	          </li>
	          <li>
              <a href="all_products.php"> All products</a>
	          </li>
	          <li>
              <a href="branches.php">Add Branches</a>
	          </li>
               <li>
              <a href="all_branches.php">All Shop Braches</a>
	          </li>
               <li>
              <a href="offer_banner.php">Offers banner</a>
	          </li>
	        </ul>

	        <div class="footer">
             
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | SHOP EASY APPLICATION <i class="icon-heart" aria-hidden="true"></i> by <a href="../index.php" target="_blank">SHOP EASY</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

      <div id="content" >
          <h3 class="text-center"><a href="#" >SHOP EASY Shop Admin</a></h3>
              <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
          
