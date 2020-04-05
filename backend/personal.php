<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$username = $_GET['username'];

	$freelancer_id = $order->returnDelivererIdByUsername($conn,$username);

	$sql = "select * from freelancer where freelancer_id = $freelancer_id";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$rateValue = $order->getFreeLancerRate($conn,$freelancer_id);
	$result = array();

	array_push($result,array(
			"name"=>$row['name'],
			"email"=>$row['email'],
			"phone"=>$row['phone'],
			"rateValue"=>$rateValue
		
			
		));
	

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>