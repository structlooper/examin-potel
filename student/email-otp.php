<?php 

require_once '..includes/config.php';
require_once 'includes/functions.php';

if(isset($_POST['email']) && !empty($_POST['email'])){

	$email = get_safe_value($conn,$_POST['email']);
	$result = mysqli_query($conn,"SELECT * FROM users WHERE email='".$email."'");
	$count  = mysqli_num_rows($result);

	if($count>0) {
		// generate OTP
		$otp = rand(100000,999999);
		
		//SET Time for valid_from and valid_to before setting the session for otp..
		$startTime = strtotime('now');		
		$endTime = strtotime('+5 minutes', $startTime);

		$valid_from = date('Y-m-d H:i:s', $startTime);
		$valid_to = date('Y-m-d H:i:s', $endTime);		


		//$valid_from = date("Y-m-d H:m:s");
		
		$sql = "INSERT INTO otps (otp, email, valid_from, valid_to) VALUES ('$otp', '$email', '$valid_from', '$valid_to')";
		$result = mysqli_query($conn,$sql);
		if(!$result){
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}else{
		//$error_message = "Email not exists!";
		return 0;


	}
}


//GET the otpemail, otp, new password..
if(isset($_POST['otpemail']) && isset($_POST['otp'])){
	$email = get_safe_value($conn,$_POST['otpemail']);
 	$otp = get_safe_value($conn,$_POST['otp']);
 	$password = get_safe_value($conn,$_POST['newPassord']);

 	$startTime = strtotime('now');
 	$valid_from = date('Y-m-d H:i:s', $startTime);

	
 	//Fetch data from otp table and match weather otp and email match or not..and then match with their respective session time...

 	$check_otp = "SELECT * FROM otps WHERE otp = '$otp' AND email = '$email'";
 	$result = mysqli_query($conn,$check_otp);
 	$count  = mysqli_num_rows($result);
 	if($count > 0){
 		//Now check if the otp session is valid or not...
 		$fetch_otp_data = mysqli_fetch_assoc($result);
 		;
 		$stored_valid_from = $fetch_otp_data['valid_from'];
 		
 		$stored_valid_to = $fetch_otp_data['valid_to'];
 		if($valid_from > $stored_valid_from && $valid_from < $stored_valid_to ){
 	
 			$update_password = "UPDATE users SET password ='$password',last_update='$valid_from' WHERE email='$email'";
 			$result = mysqli_query($conn,$update_password);
 			if(mysqli_affected_rows($conn) == 1){ 				
 				return "Success";
 			}else{
 				echo "Query Failed ". mysqli_error($conn);
 			}
 			

 		}else{
 			echo "SESSION TIME OUT";
 		}


 	}
	
}



?>