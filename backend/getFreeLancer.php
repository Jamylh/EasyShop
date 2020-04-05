<?php
require_once('classes/config.php');
require_once('classes/map.class.php');
$map = new Map();
// customers location details
	$jsFree = $_GET['jsFree'];
	$lat = $_GET['f'];
	$lng = $_GET['b'];
	$shop_id = $_GET['c'];
	
	$branch_id = $map->getNearhShopBranch($lat, $lng,$shop_id,$conn);
	$row2 = $map->getCoordonaitionOfBranch($conn,$branch_id);
	$branch_lat = $row2['lat'];
	$branch_lng = $row2['lng'];
	$result = array();
	$someArray = json_decode($jsFree,true);
	foreach ($someArray as $key => $value) {
		$freelance_username = $value["username"];
		$sql = "select * from freelancer where username='$freelance_username'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($res);

		$freelat = $value["lat"];
		$freelng = $value["lng"];
		$dis1 = $map->distance($freelat, $freelng, $branch_lat, $branch_lng, "K");
		$dis2 = $map->distance($branch_lat, $branch_lng, $lat, $lng, "K");
		$dis = $dis1+$dis2;
		if($dis <= 40){
			$pic = $row['pic'];
			if($pic == '' || $pic == null){
				$pic = 'free.png';
			}
			array_push($result,array(
				"freelancer_id"=>$row['freelancer_id'],
				"name"=>$row['name'],
				"phone"=>$row['phone'],
				"email"=>$row['email'],
				"lat"=>$freelat,
				"longt"=>$freelng,
				"dist"=>$dis,
				"pic"=>$pic,
				"token"=>$row['fcm_token'],
				"branch_id"=>$branch_id
			));

		}


	}
	

	
	
	//echo $shop_id;

	echo json_encode(array('result'=>$result));
	
	
	mysqli_close($conn);
?>