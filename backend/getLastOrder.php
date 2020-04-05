<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$phone = $_GET['phone'];
	$customer_id = $order->returnCustomerID($conn,$phone);
	$order_id = $order->returnCustomerOrder($conn,$customer_id);
	$order_status = $order->returnOrderStatus($conn,$order_id);
	$fees = $order-> getOrderFees($conn,$order_id);
	$total = $order->getOrderTotalPrice($conn,$order_id);
	$fcm_id = $order->getOrderFCM($conn,$order_id);
	$sql = "select * from order_details,products where order_details.order_no=$order_id
			and order_details.product_id = products.product_id";
	$r = mysqli_query($conn,$sql);
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		$pro_total_price = $row['price']*$row['qty'];
	array_push($result,array(
			"price"=>$pro_total_price,
			"pic"=>$row['pic'],
			"name"=>$row['name'],
			"order_status"=>$order_status,
			"fees"=>$fees,
			"total_price"=>$total,
			"fcm_id"=>$fcm_id
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>