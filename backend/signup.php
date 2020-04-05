<?php 
require_once('classes/config.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		//Creating an sql query
		$sql = "INSERT INTO customers  VALUES ('','$name','$phone','$email','$password','')";
		
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