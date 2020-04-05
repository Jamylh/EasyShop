<?php 
require_once('classes/config.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting values
		$username = $_POST['username'];

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		//Creating an sql query
	$sql = "update freelancer set name='$name',phone='$phone',email='$email',password='$password' where username='$username'";
		
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