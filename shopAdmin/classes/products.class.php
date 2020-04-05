<?php
		
	class Products{

		public function checkDeleivery($conn,$admin_id){

			$sql = "select shop_id from shop_admin where admin_id=$admin_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			$shop_id = $row['shop_id'];

			$sql2 = "select delivery from shop where sho_id=$shop_id";
			$res2 = mysqli_query($conn,$sql2);
			$row2 = mysqli_fetch_assoc($res2);
			if($row2['delivery'] == 'yes'){
				return true;
			}else{
				return false;
			}
		}

		


		public function addProducts($conn,$admin_id,$cat_id,$name,$price,$description,$pic){
			$shop_id = $this->getShopId($conn,$admin_id);
			$sql = "insert into products values('',$shop_id,$cat_id,'$name',$price,'$description','$pic',0)";
			$res  = mysqli_query($conn,$sql);
			return $res;
		}

		public function getShopId($conn,$admin_id){

			$sql = "select shop_id from shop_admin where admin_id=$admin_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			$shop_id = $row['shop_id'];
			return $shop_id;
		}

		public function getProduct($conn,$product_id){
			$sql = "select * from products where product_id=$product_id";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
			return $row;
		}

		public function deleteProduct($conn,$product_id){
			$sql = "delete from products where product_id=$product_id";
			$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			return $res;
		}

		public function setOffer($conn,$product_id,$price){
			
			
				$sql = "update products set isoffer=1 and offer_price = $price where product_id = $product_id";
				$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
				if($res){
					return true;
				}else{
					return false;
				}
			
		}

		public function checkIsOffer($conn,$product_id){
			$sql = "select * from products where product_id = $product_id and isoffer=1";
			$res  = mysqli_query($conn,$sql);
			$num = mysqli_num_rows($res);
			if($num > 0){
				return true;
			}else{
				return false;

			}
		}

		public function checkIsBannerFound($conn,$shop_id,$pic){
			$sql = "select * from offers_banners where shop_id = $shop_id";

			$res = mysqli_query($conn,$sql);
			$num = mysqli_fetch_assoc($res);
			if($num  == 0){
				$sql = "insert into offers_banners values('',$shop_id,'$pic')";
				$res = mysqli_query($conn,$sql);
				if($res){
					return true;
				}else{
					return false;
				}
			}else{
				$sql = "update offers_banners set pic='$pic' where shop_id=$shop_id";
				$res = mysqli_query($conn,$sql);
				if($res){
					return true;
				}else{
					return false;
				}
			}
		}

	}

?>