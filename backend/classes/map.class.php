<?php
	class Map{

		public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
			  $theta = $lon1 - $lon2;
			  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			  $dist = acos($dist);
			  $dist = rad2deg($dist);
			  $miles = $dist * 60 * 1.1515;
			  $unit = strtoupper($unit);

			  if ($unit == "K") {
			      return ($miles * 1.609344);
			  } else if ($unit == "N") {
			      return ($miles * 0.8684);
			  } else {
			      return $miles;
			  }
			}

		public function getNearhShopBranch($lat1, $lon1,$shop_id,$conn) {
			$branch_id  = 0;
			$max = 30;
			$sql = "select * from shop_branches where shop_id=$shop_id";
			$res = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($res)){

				$lat2 = $row['lat'];
				$lon2 = $row['lng'];
				$dis = $this->distance($lat1, $lon1, $lat2, $lon2, "K");
				if($dis < $max){
					$max = $dis;
					$branch_id = $row['id'];
				}
				
			}
			return $branch_id;
			  
		}

		public function getCoordonaitionOfBranch($conn,$branch_id){
			$sql = "select lat,lng from shop_branches where id=$branch_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row;
		}
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


	}
?>