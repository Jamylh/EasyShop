<?php
require_once('classes/config.php');
	$cat_id = $_GET['cat_id'];
	$sql = "select * from products where cat_id= $cat_id";
	$r = mysqli_query($conn,$sql);
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"product_id"=>$row['product_id'],
			"sho_id"=>$row['shop_id'],
			"name"=>$row['name'],
			"price"=>$row['price'],
			"description"=>$row['description'],
			"pic"=>$row['pic']
			
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>