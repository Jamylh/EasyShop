<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$freelancer_id = $_GET['freelancer_id'];
	$lat = $_GET['f'];
	$lng = $_GET['b'];
	$sql = "select fcm_token from freelancer where freelancer_id=$freelancer_id";
	$res = mysqli_query($conn,$sql);
	$row= mysqli_fetch_assoc($res);
	$key = $row['fcm_token'];
	$order->sendNotiy($key,"freelancer"," New Order");
	// $sql = "select * from shop where status='Accepeted'";
	// $r = mysqli_query($conn,$sql);
	
	// $result = array();
	
	// while($row = mysqli_fetch_array($r)){
	// array_push($result,array(
	// 		"sho_id"=>$row['sho_id'],
	// 		"name"=>$row['name'],
	// 		"location"=>$row['location'],
	// 		"status"=>$row['status'],
	// 		"phone"=>$row['phone'],
	// 		"email"=>$row['email'],
	// 		"delivery"=>$row['delivery'],
	// 		"logo"=>$row['logo']
	// 	));
	// }

	// echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>