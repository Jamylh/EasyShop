<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$sql = "select * from shop where status='Accepeted'";
	$r = mysqli_query($conn,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
	$shop_rate = $order->getShopRate($conn,$row['sho_id']);
	array_push($result,array(
			"sho_id"=>$row['sho_id'],
			"name"=>$row['name'],
			"location"=>$row['location'],
			"status"=>$row['status'],
			"phone"=>$row['phone'],
			"email"=>$row['email'],
			"delivery"=>$row['delivery'],
			"rating"=>$shop_rate,
			"logo"=>$row['logo']
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>