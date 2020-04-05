<?php
require_once('classes/config.php');
require_once('classes/order.class.php');
require_once('classes/map.class.php');
$order = new Order();
$map = new Map();
$noBranch = false;
$i=0;
$del_id=0;
$fees;
$pre_time;
$res;
$fcm_order_id = "";
	$products = $_GET['products'];
	$obj = json_decode($products);
	if($obj !=null){
		$lat  = "";
		$lng = "";
		$phone = "";
		$deliverer_id = "";
		$deliverer_Address = "";
		$shop_id = 0;
		$branch_id = 0;
		$total_price = 0;
		$someArray = json_decode($products, true);
 // print_r($someArray);    
		foreach ($someArray as $key => $value) {
		    $lat =  $value["lat"];
			$lng =  $value["lng"];
			$phone =  $value["phone"];
			$fcm_order_id = $value["fcm_order_id"];
			$paymentMethod = $value["paymentMethod"];;
			$deliverer_id =  $value["deliverer_id"];
			$deliverer_Address =  $value["deliverer_Address"];
		    $branch_id =  $value["branch_id"];
		    $product_id =  $value["product_id"];
		    $product_qty =  $value["product_qty"];
			$pre_time = $value["pre_time"];
			$fees = $value["fees"];
		    if($deliverer_id == 0){
		    	$del_id  = $order->returnDelivererId($conn,$deliverer_id);
		    }else{
		    	$del_id = $deliverer_id;
		    }
		    
		    $shop_id =  $order->returnShopid($conn,$product_id);
		    
		     
			  	$branch_id = $map->getNearhShopBranch($lat, $lng,$shop_id,$conn);
			 	if($branch_id == 0){
			 		$noBranch = true;
			 		break;
			 		
			 	} 
			 	
			 // insert new order
			 	if($i == 0){
			 		if($order->isShopDelivery($conn,$shop_id) == true){
		  				$branch_id = $map->getNearhShopBranch($lat, $lng,$shop_id,$conn);
					  }
					
					 $today = date("F j, Y, g:i a"); 
				 
						$res =  $order->insertNewOrder($conn,$phone,$today,$shop_id,$branch_id,$del_id,$lat,$lng,$deliverer_Address,$paymentMethod,0,$fcm_order_id,$fees,$pre_time);
				}

			 $order-> insertIntoOrdeDetail($conn,$product_id,$product_qty);

			
		   $i++;
		    
		  }

		  
			
		if($noBranch == true){
			echo '2';
		}else{
			
			 if($res){
			 	$max_order_no = $order->returnMaxOrder($conn);
			 	$total_price = $order->returnTotalPrice($conn,$max_order_no);
			 	$order->updateTotal($conn,$max_order_no,$total_price);
			 	echo '1';
			 }else{
			 	echo $del_id;
			 }
		 }


	}
 



  //echo $someArray[0]["shop_id"]; 
	mysqli_close($conn);
?>