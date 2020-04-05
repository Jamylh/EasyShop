<?php 
require_once('classes/config.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$username = $_POST['username'];
		$password = $_POST['password'];
		$token = $_POST['token'];
		
		//Creating an sql query
		$sql = "select * from freelancer where username='$username' and password='$password' and status='active'";
		
		//Importing our db connection script
		$res = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($res);
		
		
		//Executing query to database
		if($num > 0){
			$sql2 ="update freelancer set fcm_token='$token' where username='$username' ";
			$res2  = mysqli_query($conn,$sql2);
			if($res2){
				echo '1';
			}else{
				echo '0';
			}
			
		}else{

			$sql2 = "select * from deliverer where username='$username' and password='$password'";
			$res2  = mysqli_query($conn,$sql2);
			$num2 = mysqli_num_rows($res2);
			if($num2 > 0){
				$sql3 ="update deliverer set fcm_token='$token' where username='$username' ";
				$res3  = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
				echo '2';
			}else{
				echo '0';
			}
		}
	//Closing the database 
		mysqli_close($conn);
}