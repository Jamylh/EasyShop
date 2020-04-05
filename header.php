<?php 
ob_start();
session_start();
  include_once("classes/config.php");
  $page_name = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>AS-HL LK CP</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

<link type="text/css" href="popup_testing/css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="mos-css/slider.css"> <!--pemanggilan file css-->

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
</head>
<body style="background-color: #fff;">
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">SHOP EASY CONTROL PANEL</a></h1>
      <div id="top-navigation"> Welcome <a href="#"><strong>Administrator</strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="#">Log out</a> </div>
    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
      <ul>
        <li><a href="index.php" <?php if($page_name == "index.php") echo 'class=active';?> ><span>Add grocery</span></a></li>
        <li><a href="report_grocery.php" <?php if($page_name == "report_grocery.php") echo 'class=active';?>><span>Report grocery</span></a></li>
        <li><a href="add_freelancer.php" <?php if($page_name == "add_freelancer.php") echo 'class=active';?>><span>Add freelancer</span></a></li>
        <li><a href="report_freelancer.php"  <?php if($page_name == "report_freelancer.php") echo 'class=active';?> ><span>Report freelancer</span></a></li>
        
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>