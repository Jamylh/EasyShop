<?php
		
	class Freelancer{

		public function EditFreeLancer($conn,$id,$name,$email,$phone){
			$sql = "update freelancer set name='$name',phone=$phone,email='$email' where freelancer_id=$id";
			$res= mysqli_query($conn,$sql) or die(mysqli_error($conn));
			return $res;
		}

		public function getFreelancer($conn,$id){
			$sql=  "select * from freelancer where freelancer_id=$id";
			$res  = mysqli_query($conn,$sql)or die(mysqli_error($conn));
			$row = mysqli_fetch_array($res);
			return $row;
		}

		public function deleteFreelancer($conn,$id){
			$sql=  "delete from freelancer where freelancer_id=$id";
			$res  = mysqli_query($conn,$sql)or die(mysqli_error($conn));
			return $res;
		}

		public function random_username($string) {
			$pattern = " ";
			$firstPart = strstr(strtolower($string), $pattern, true);
			$secondPart = substr(strstr(strtolower($string), $pattern, false), 0,3);
			$nrRand = rand(0, 100);

			$username = trim($firstPart).trim($secondPart).trim($nrRand);
			return $username;
			}

			function rand_password( $length ) {

	   			 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    		return substr(str_shuffle($chars),0,$length);

		}

	}

?>