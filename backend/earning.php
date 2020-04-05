<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$username = $_GET['username'];

	$delivery_id = $order->returnDelivererIdByUsername($conn,$username);

	$earningW = $order->earningPerWeek($conn,$delivery_id);
	$trip_count = $order->tripCount($conn,$delivery_id);
	$balance = $order->totalBalance($conn,$delivery_id);
	$result = array();

	array_push($result,array(
			"earningW"=>$earningW,
			"trip_count"=>$trip_count,
			"balance"=>$balance
		
			
		));
	

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>