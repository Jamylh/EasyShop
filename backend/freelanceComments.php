<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$username = $_GET['username'];

	$freelancer_id = $order->returnDelivererIdByUsername($conn,$username);

	$sql = "select comment from rates where deliverer_id = $freelancer_id and comment <>'' order by id desc limit 20 ";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	
	$result = array();

	array_push($result,array(
			"comment"=>$row['comment']
		));
	

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>