<?php 
require_once('classes/config.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$oldphone = $_POST['oldphone'];

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		//Creating an sql query
	$sql = "update customers set name='$name',phone='$phone',email='$email',password='$password' where phone='$oldphone'";
		
		//Importing our db connection script
		
		
		//Executing query to database
		if(mysqli_query($conn,$sql)){
			echo '1';
		}else{
			echo '0';
		}
		
		//Closing the database 
		mysqli_close($conn);
	}