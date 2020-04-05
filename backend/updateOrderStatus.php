<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();
	$order_id = $_GET['order_id'];
	$free_user_name = $_GET['b'];
	$freelancer_id = $order->returnDelivererIdByUsername($conn,$free_user_name);
	//Creating an sql query
		$sql = "update orders set order_status='Confirmed' where order_id = $order_id";
		
		//Importing our db connection script
		$res = mysqli_query($conn,$sql);
		
		$daydate = date('Y-m-d');
		//Executing query to database
		if($res){
			$fees = $order->getOrderFees($conn,$order_id);
			$sql2 = "insert into freelancer_fees values('',$freelancer_id,$order_id,$fees,'$daydate')";
			$res2 = mysqli_query($conn,$sql2);
			echo '1';
		}else{
			echo '0';

	}
	//Closing the database 
		mysqli_close($conn);

?>