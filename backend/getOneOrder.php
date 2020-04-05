<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$order_id = $_GET['order_id'];
	$sql = "select * from orders,customers where orders.order_id = $order_id and orders.customer_id = customers.id";
	$r = mysqli_query($conn,$sql);
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		$customer_lat = $row['lat'];
		$customer_lng = $row['lng'];
		$rowbranch = $order->returnbranchPosition($conn,$row['branch_id']);
		$branch_lat = $rowbranch['lat'];
		$branch_lng = $rowbranch['lng'];
	array_push($result,array(
			"name"=>$row['name'],
			"order_id"=>$row['order_id'],
			"customer_id"=>$row['customer_id'],
			"phone"=>$row['phone'],
			"order_date"=>$row['order_date'],
			"order_status"=>$row['order_status'],
			"shop_id"=>$row['shop_id'],
			"branch_id"=>$row['branch_id'],
			"fcm_order_id"=>$row['fcm_order_id'],
			"total_price"=>$row['total_price'],
			"customer_lat"=>$customer_lat,
			"customer_lng"=>$customer_lng,
			"branch_lng"=>$branch_lng,
			"branch_lat"=>$branch_lat,
			"fees"=>$row['fees'],
			"pre_time"=>$row['pre_time']

			
			
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>