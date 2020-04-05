<?php 
require_once('classes/config.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$token = $_POST['token'];
		
		//Creating an sql query
		$sql = "select * from customers where phone='$phone' and password='$password'";
		
		//Importing our db connection script
		$res = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($res);
		
		
		//Executing query to database
		if($num > 0){
			$sql2 = "update customers set fcm_token='$token' where phone='$phone'";
			$res2 = mysqli_query($conn,$sql2);
			echo '1';
		}else{
			echo '0';

	}
	//Closing the database 
		mysqli_close($conn);
}
?>