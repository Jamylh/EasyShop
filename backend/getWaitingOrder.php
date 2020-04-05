<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order  = new Order();
	$username = $_GET['username'];
	$freelancer_id = $order->returnDelivererIdByUsername($conn,$username);
	$sql = "select * from orders,customers where orders.deliverer_id= $freelancer_id and orders.order_status <> 'Confirmed' and orders.customer_id = customers.id";
	$r = mysqli_query($conn,$sql);
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"name"=>$row['name'],
			"order_id"=>$row['order_id'],
			"order_status"=>$row['order_status'],
			"fcm_order_id"=>$row['fcm_order_id']
			
			
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>