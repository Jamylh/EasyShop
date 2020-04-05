<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$username = $_GET['username'];

	$del_id = $order->returnShopeDelivererIdByUsername($conn,$username);

	$sql = "select * from deliverer where id = $del_id";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$result = array();

	array_push($result,array(
			"name"=>$row['name'],
			"email"=>$row['email'],
			"phone"=>$row['phone'],
			"password"=>$row['password']
			
		
			
		));
	

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>