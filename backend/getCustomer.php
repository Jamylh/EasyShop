<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$phone = $_GET['phone'];
	$sql= "select * from customers where phone='$phone'";
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