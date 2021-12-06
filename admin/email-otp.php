<?php 

require_once '../includes/config.php';
require_once 'includes/functions.php';
$from_mail = from_mail;
if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = get_safe_value($conn,$_POST['email']);
	$result = mysqli_query($conn,"SELECT * FROM admin WHERE email='".$email."'");
	$count  = mysqli_num_rows($result);

	if($count>0) {
		// generate OTP
		$otp = rand(100000,999999);
		
		//SET Time for valid_from and valid_to before setting the session for otp..
		$startTime = strtotime('now');		
		$endTime = strtotime('+2 minutes', $startTime);

		$valid_from = date('Y-m-d H:i:s', $startTime);
		$valid_to = date('Y-m-d H:i:s', $endTime);		


		//$valid_from = date("Y-m-d H:m:s");
		
		$sql = "INSERT INTO user_otp (otp, email, valid_from, valid_to) VALUES ('$otp', '$email', '$valid_from', '$valid_to')";
		$result = mysqli_query($conn,$sql);
		if(!$result){
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}else{
			//if query passed send email to the user and ask to enter otp while resetting new password..
			$to_email = $email;
	          	
	       	$subject = "Your verification code";
			// $message_body = "Your verification code is $otp";
			$message_body = "Thanks for signing up! .
				Please Verify the otp to reset password!! otp valid for 5 minutes only. 
				  
				------------------------
				Email: $to_email
				OTP: $otp
				------------------------";

			$headers = "From: {$from_mail}";

			if (mail($to_email , $subject, $message_body, $headers)) {				
				echo $response = 1;			

			} else {
				echo $response = 0;
			} 

		}
	}else{
		//$error_message = "Email not exists!";
		echo "Email not exists!";


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

 	$check_otp = "SELECT * FROM user_otp WHERE otp = '$otp' AND email = '$email'";
 	$result = mysqli_query($conn,$check_otp) or die("error".mysqli_error($conn));

 	$count  = mysqli_num_rows($result);
 	if($count > 0){
 		//Now check if the otp session is valid or not...
 		$fetch_otp_data = mysqli_fetch_assoc($result);
 		;
 		$stored_valid_from = $fetch_otp_data['valid_from'];
 		
 		$stored_valid_to = $fetch_otp_data['valid_to'];
 		if($valid_from > $stored_valid_from && $valid_from < $stored_valid_to ){
 	
 			$update_password = "UPDATE admin SET password ='$password',last_update='$valid_from' WHERE email='$email'";
 			$result = mysqli_query($conn,$update_password);
 			if(mysqli_affected_rows($conn) == 1){ 				
 				echo "Success";
 			}else{
 				echo "Query Failed ". mysqli_error($conn);
 			}
 			

 		}else{
 			echo "SESSION TIME OUT";
 		}


 	}
	
}



?>