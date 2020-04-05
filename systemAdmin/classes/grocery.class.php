<?php
		
	class Shop{

		public function Editshop($conn,$id,$name,$email,$phone,$address,$status,$del){
			$sql = "update shop set name='$name',location='$address',status='$status',phone=$phone,email='$email',delivery='$del' where sho_id=$id";
			$res= mysqli_query($conn,$sql) or die(mysqli_error($conn));
			return $res;
		}
		public function Editshop2($conn,$id,$name,$email,$phone,$address,$status,$del,$pic_name){
			$sql = "update shop set name='$name',location='$address',status='$status',phone=$phone,email='$email',delivery='$del',logo='$pic_name' where sho_id=$id";
			$res= mysqli_query($conn,$sql) or die(mysqli_error($conn));
			return $res;
		}


		public function getShop($conn,$id){
			$sql=  "select * from shop where sho_id=$id";
			$res  = mysqli_query($conn,$sql)or die(mysqli_error($conn));
			$row = mysqli_fetch_array($res);
			return $row;
		}

		public function deleteShop($conn,$id){
			$sql=  "delete from shop where sho_id=$id";
			$res  = mysqli_query($conn,$sql)or die(mysqli_error($conn));
			return $res;
		}

		public function random_username($string) {
			$pattern = " ";
			$firstPart = strstr(strtolower($string), $pattern, true);
			$secondPart = substr(strstr(strtolower($string." ".$string), $pattern, false), 0,7);
			$nrRand = rand(0, 100);

			$username = trim($firstPart).trim($secondPart).trim($nrRand);
			return $username;
			}

			function rand_password( $length ) {

	   			 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    		return substr(str_shuffle($chars),0,$length);

		}

		public function getShopRate($conn,$shop_id){
			$sum = 0;
			$sql  = "select shop_rate from rates where shop_id =$shop_id";
			$res = mysqli_query($conn,$sql);
			while($row =  mysqli_fetch_assoc($res)){
				$sum+=$row['shop_rate'];
			}

			$num_of_raters = $this->getCountOfRatersValues($conn,$shop_id);

			if($num_of_raters == 0){
				return 0;
			}else{
				$rate_value = $sum/$num_of_raters;
				return (($rate_value*5)/100)*100;
			}
			
		}

		public function getCountOfRatersValues($conn,$shop_id){
			$sql  = "select count(id) as count_id from rates where shop_id =$shop_id";
			$res = mysqli_query($conn,$sql);
			$row =  mysqli_fetch_assoc($res);
			return $row['count_id']*5;
		}

		public function getFreeLancerRate($conn,$freelancer_id){
			$sum = 0;
			$sql  = "select del_rate from rates where deliverer_id =$freelancer_id";
			$res = mysqli_query($conn,$sql);
			while($row =  mysqli_fetch_assoc($res)){
				$sum+=$row['del_rate'];
			}

			$num_of_raters = $this->getCountOfRatersValues2($conn,$freelancer_id);

			if($num_of_raters == 0){
				return 0;
			}else{
				$rate_value = $sum/$num_of_raters;
				return (($rate_value*5)/100)*100;
			}
			
		}

		public function getCountOfRatersValues2($conn,$freelancer_id){
			$sql  = "select count(id) as count_id from rates where deliverer_id =$freelancer_id";
			$res = mysqli_query($conn,$sql);
			$row =  mysqli_fetch_assoc($res);
			return $row['count_id']*5;
		

}	}

?>