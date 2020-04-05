<?php
require_once('classes/config.php');
	$shop_id = $_GET['shop_id'];
	$sql = "select * from shop_categories where shop_id= $shop_id";
	$r = mysqli_query($conn,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"id"=>$row['id'],
			"cat_name"=>$row['cat_name']
			
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>