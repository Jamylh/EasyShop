<?php
		
	class Order{

		public function isShopDelivery($conn,$shop_id){
			$sql  = "select * from shop where sho_id = $shop_id and delivery = 'yes' ";
			$res = mysqli_query($conn,$sql);
			$num = mysqli_fetch_assoc($res);
			if($num > 0){
				return true;
			}else{
				return false;
			}

		}


		public function returnProductPrice($conn,$pro_id){
			$sql = "select price from products where product_id = $pro_id";
			$res  = mysqli_query($conn,$sql) ;
			$row = mysqli_fetch_assoc($res);
			return $row['price'];
		}


		public function returnCustomerID($conn,$phone){
			$sql  = "select * from customers where phone='$phone'";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['id'];
		}


		public function insertNewOrder($conn,$customer_phone,$date,$shop_id,$branch_id,$deliverer_id,$lat,$lng,$address,$paymentMethod,$total_price,$fcm_order_id,$fees,$pre_time){

				$isShopDelivery = $this->isShopDelivery($conn,$shop_id);
				if($isShopDelivery == true){
					$deliverer_id = 0;
				}
				$customer_id= $this->returnCustomerID($conn,$customer_phone);

			$sql = "insert into	orders values('',$customer_id,'$date','New',$shop_id,$branch_id,$deliverer_id,$lat,$lng,'$address','$paymentMethod',$total_price,'$fcm_order_id',$fees,'$pre_time')";
			$res = mysqli_query($conn,$sql);
			return $res;
		}

		public function returnMaxOrder($conn){
			$sql = "select max(order_id) as max_id from orders";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['max_id'];
		}

		public function insertIntoOrdeDetail($conn,$product_id,$qty){
			$order_no = $this->returnMaxOrder($conn);
			$sql = "insert into order_details values('',$order_no,$product_id,$qty)";
			$res = mysqli_query($conn,$sql);
			return $res;
		}
		public function returnShopid($conn,$product_id){
			$sql = "select shop_id from products where product_id=$product_id";
			$res= mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['shop_id'];
		}

		public function returnTotalPrice($conn,$order_id){
			$total_price = 0;
			$sql = "select products.price as price,order_details.qty as qty from products,order_details where order_details.order_no=$order_id and order_details.product_id = products.product_id";
			$res = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($res)){
				$price = $row['price'];
				$qty = $row['qty'];
				$total_price +=$price*$qty;

			}
			return $total_price;
		}

		public function updateTotal($conn,$order_id,$total_price){
			$sql = "update orders set total_price=$total_price where order_id=$order_id";
			$res = mysqli_query($conn,$sql);
			return $res;
		}

		public function sendNotiy($key,$title,$message){

			
								$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
								$server_key = 'AAAAmpN0dOM:APA91bEFD3FxHmHJExA3v86QBqRUTsSI0a6MM2PQlzn73Fo32hPByYGflU3ahynnbXu7qwr8pyzaHIMFQ71TMKmfelHYJvyPyfs5m0vw2Sqqd1LANEtT-r6RjIJ-VVV1psanCtG0U-BX';


								$headers = array(
												'Authorization:key='.$server_key,
												'Content-Type:application/json'
												);

								$fields = array('to'=>$key,
												'notification'=>array('title'=>$title,'body'=>$message));
									

								$playload = json_encode($fields);

								$curl_session = curl_init();

								curl_setopt($curl_session, CURLOPT_URL,$path_to_fcm);
								curl_setopt($curl_session, CURLOPT_POST,true);
								curl_setopt($curl_session, CURLOPT_HTTPHEADER,$headers);
								curl_setopt($curl_session, CURLOPT_RETURNTRANSFER,true);
								curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER,false);
								curl_setopt($curl_session, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
								curl_setopt($curl_session, CURLOPT_POSTFIELDS,$playload);

								$resu = curl_exec($curl_session);


								curl_close($curl_session);
								
		}

		public function returnDelivererId($conn,$deliverer_id){
			$sql = "select freelancer_id from freelancer where fcm_token='$deliverer_id'";
			$res = mysqli_query($conn,$sql);
			$row  = mysqli_fetch_assoc($res);
			return $row['freelancer_id'];
		}

		public function returnbranchPosition($conn,$branch_id){
			$sql = "select * from shop_branches where id = $branch_id";
			$res=  mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row;

		}

		public function returnDelivererIdByUsername($conn,$username){
			$sql = "select freelancer_id from freelancer where username='$username'";
			$res = mysqli_query($conn,$sql);
			$row  = mysqli_fetch_assoc($res);
			return $row['freelancer_id'];
		}

		public function returnOrder($conn,$order_id){
			$sql = "select *   from orders where order_id = $order_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row;
		}

		public function earningPerWeek($conn,$freelancer_id){
			$total = 0;
			$day = date('w');
			$week_start = date('Y-m-d', strtotime('-'.$day.' days'));
			$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));

			$sql = "select * from freelancer_fees where freelancer_id = $freelancer_id and daydate between '$week_start' and '$week_end'";
			$res = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($res)){
				$total +=$row['fees'];
			}

			return $total;
		}

		public function tripCount($conn,$freelancer_id){
			$sql = "select count(id) as count_id from freelancer_fees where freelancer_id=$freelancer_id ";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['count_id'];
		}

		public function totalBalance($conn,$freelancer_id){
			$total = 0;
			
			$sql = "select * from freelancer_fees where freelancer_id = $freelancer_id ";
			$res = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($res)){
				$total +=$row['fees'];
			}

			return $total;
		}

		public function getFreeLancerRate($conn,$freelancer_id){
			$sum = 0;
			$sql  = "select del_rate from rates where deliverer_id =$freelancer_id";
			$res = mysqli_query($conn,$sql);
			while($row =  mysqli_fetch_assoc($res)){
				$sum+=$row['del_rate'];
			}

			$num_of_raters = $this->getCountOfRatersValues($conn,$freelancer_id);

			if($num_of_raters == 0){
				return 0;
			}else{
				$rate_value = $sum/$num_of_raters;
				return (($rate_value*5)/100)*100;
			}
			
		}

		public function getCountOfRatersValues($conn,$freelancer_id){
			$sql  = "select count(id) as count_id from rates where deliverer_id =$freelancer_id";
			$res = mysqli_query($conn,$sql);
			$row =  mysqli_fetch_assoc($res);
			return $row['count_id']*5;
		}

		public function getShopRate($conn,$shop_id){
			$sum = 0;
			$sql  = "select shop_rate from rates where shop_id =$shop_id";
			$res = mysqli_query($conn,$sql);
			while($row =  mysqli_fetch_assoc($res)){
				$sum+=$row['shop_rate'];
			}

			$num_of_raters = $this->getCountOfShopRatersValues($conn,$shop_id);
			if($num_of_raters == 0){
				return 0;
			}else{
				$rate_value = $sum/$num_of_raters;
				return (($rate_value*5)/100)*100;
			}
			
		}

		public function getCountOfShopRatersValues($conn,$shop_id){
			$sql  = "select count(id) as count_id from rates where shop_id =$shop_id";
			$res = mysqli_query($conn,$sql);
			$row =  mysqli_fetch_assoc($res);
			return $row['count_id']*5;
		}

		public function returnCustomerOrder($conn,$customer_id){
			$sql = "select order_id from orders where customer_id = $customer_id order by order_id desc limit 1";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['order_id'];
		} 

		public function returnOrderStatus($conn,$order_id){
			$sql = "select order_status from orders where order_id=$order_id";
			$res = mysqli_query($conn,$sql);
			$row= mysqli_fetch_assoc($res);
			return $row['order_status'];
		}

		public function returnShopeDelivererIdByUsername($conn,$username){
			$sql = "select id from deliverer where username='$username'";
			$res = mysqli_query($conn,$sql);
			$row  = mysqli_fetch_assoc($res);
			return $row['id'];
		}


		public function getOrderFees($conn,$order_id){
			$sql = "select fees from orders where order_id = $order_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['fees'];
		}

		public function getOrderTotalPrice($conn,$order_id){
			$sql = "select total_price from orders where order_id = $order_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['total_price'];
		}

		public function getOrderFCM($conn,$order_id){
			$sql = "select fcm_order_id from orders where order_id = $order_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row['fcm_order_id'];
		}



	}

?>