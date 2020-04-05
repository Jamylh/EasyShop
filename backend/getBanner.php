<?php
require_once('classes/config.php');
	$sql = "select * from offers_banners order by id desc limit 5";
	$r = mysqli_query($conn,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"pic"=>$row['pic']
		));
	}

	echo json_encode(array('result'=>$result));
	
	mysqli_close($conn);
?>