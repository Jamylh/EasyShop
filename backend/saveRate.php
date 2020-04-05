<?php 
require_once('classes/config.php');
require_once('classes/order.class.php');
$order = new Order();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$shopRate = $_POST['shopRate'];
		$delivererRate = $_POST['delivererRate'];
		$comment = $_POST['comment'];
		$orderId = $_POST['orderId'];
		

		$row = $order->returnOrder($conn,$orderId);
		$shop_id = $row['shop_id'];
		$deliverer_id = $row['deliverer_id'];
		//Creating an sql query
		$sql = "INSERT INTO rates  VALUES ('',$orderId,$delivererRate,$shopRate,$deliverer_id,$shop_id,'$comment')";
		
		//Importing our db connection script
		
		
		//Executing query to database
		if(mysqli_query($conn,$sql)){
			echo '1';
		}else{
			echo '0';
		}
		
		//Closing the database 
		mysqli_close($conn);
	}