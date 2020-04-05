<?php
require_once('classes/config.php');
	//$office_type = $_GET['office_type'];
	$sql = "select * from shop where status='Accepeted'";
	$r = mysqli_query($conn,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"sho_id"=>$row['sho_id'],
			"name"=>$row['name'],
			"location"=>$row['location'],
			"status"=>$row['status'],
			"phone"=>$row['phone'],
			"email"=>$row['email'],
			"delivery"=>$row['delivery'],
			"logo"=>$row['logo']
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>