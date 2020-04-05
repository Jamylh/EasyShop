<?php

$conn = mysqli_connect("aghiadbakry88615.ipagemysql.com","shopeasydb_root1",'root1');
	
	if($conn ==  true){
		$r = mysqli_select_db($conn,"shopeasydb");
		mysqli_query($conn,"SET NAMES 'utf8'"); mysqli_query($conn,'SET CHARACTER SET utf8');
		
		
	}



?>