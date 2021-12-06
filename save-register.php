<?php 
require_once 'includes/config.php';
require_once 'includes/functions.php';
$ref = web;
$from_mail = from_mail;


if(isset($_POST['register_student']) AND !empty($_POST['register_student'])){
	
	$stud_name = get_safe_value($conn,$_POST['stud_name']);
	$stud_email = get_safe_value($conn,$_POST['stud_email']);
	$stud_mobile = get_safe_value($conn,$_POST['stud_mobile']);
	$stud_class_id = get_safe_value($conn,$_POST['stud_class']);

	$stud_password = md5(get_safe_value($conn,$_POST['password']));
	$category_status = 0;
	$sql7 = "SELECT * FROM classes WHERE id = '$stud_class_id'";
	$result7 = mysqli_query($conn, $sql7) or die("Query Failed.");
	 $row7 = mysqli_fetch_assoc($result7);
	  $class_name = $row7['class_name'];

	//Email Check if email already exist don't register again with same email id..
	$email_check = "SELECT * FROM student_details WHERE student_email = '$stud_email'";
    $res = mysqli_query($conn, $email_check);

    if(mysqli_num_rows($res) > 0){
    	while($row = mysqli_fetch_assoc($res)){
    		$code = $row['code'];
    		$status = $row['status']; 
    		$user_id = $row['id'];   		
    		
    	}
    	//Check the code to know if verified or not..
    	if($code == 0){
    		// Genereate the otp once again and send for verification by user..
    		$otp = rand(999999, 111111);

    		//Now insert OTP in user_otp table...
			//SET Time for valid_from and valid_to before setting the session for otp..
			$startTime = strtotime('now');		
			$endTime = strtotime('+5 minutes', $startTime);

			$valid_from = date('Y-m-d H:i:s', $startTime);
			$valid_to = date('Y-m-d H:i:s', $endTime);


			$sql=$conn->prepare("INSERT INTO user_otp SET user_id=?, otp=?,email=?,valid_from=?, valid_to=?");
			$sql->bind_param("issss", $user_id, $otp,$stud_email, $valid_from, $valid_to);
			$sql->execute();
			if(!$sql){
				echo "sql error";
			}
			//Now insert OTP in user_otp END...
		 	if($conn->affected_rows==1){
		 		$to_email = $stud_email;
	          	
		       	$subject = "Your verification code";
				// $message_body = "Your verification code is $otp";
				$message_body = "Thanks for signing up! .
					Your account has been created, Please Verify the otp to login with the following account after you have activated your account by pressing 
					  
					------------------------
					Email: $to_email
					OTP: $otp
					------------------------				  
					
					  
					 // Our message above including the link";

				$headers = "From: {$from_mail}";

				if (mail($to_email , $subject, $message_body, $headers)) {
					//echo "Email successfully sent to $stud_email ...";
					//echo "<script>window.location = 'verify-email-otp.php'</script>";
					header("location:".$ref."register.php?msg=success");

				} else {
					header("location:".$ref."register.php?msg=Problem in sending email");;
				}
			}
    	}else{
    		header("location:".$ref."register.php?msg=Email Already Exist");
    	}

        //$errors['email'] = "Email that you have entered is already exist!";
      	// header("location:".$ref."?msg=Email Already Exist");
      	//header("location:".$ref."register.php?msg=Email Already Exist");
    }else{
    	// $password = password_hash($password, PASSWORD_BCRYPT);
        $otp = rand(999999, 111111);
        $status = 0;

        
        //Insert Student Details in student_details....
		$sql=$conn->prepare("INSERT INTO student_details SET student_fname=?, student_email=?, password=?,contact=?, status=?, class_id=?, class_name=?,category_status=?");
		$sql->bind_param("ssssiisi", $stud_name, $stud_email, $stud_password,$stud_mobile, $status, $stud_class_id, $class_name, $category_status);
		$sql->execute();
		if($conn->affected_rows==1){
		  	// $_SESSION['user_id'] = $user_id =  mysqli_insert_id($conn);
		  	$user_id =  mysqli_insert_id($conn);
		}


		//Now insert OTP in user_otp table...
		//SET Time for valid_from and valid_to before setting the session for otp..
		$startTime = strtotime('now');		
		$endTime = strtotime('+5 minutes', $startTime);

		$valid_from = date('Y-m-d H:i:s', $startTime);
		$valid_to = date('Y-m-d H:i:s', $endTime);

		$sql=$conn->prepare("INSERT INTO user_otp SET user_id=?, otp=?,email=?,valid_from=?, valid_to=?");
		$sql->bind_param("issss", $user_id, $otp,$stud_email, $valid_from, $valid_to);
		$sql->execute();
		//Now insert OTP in user_otp END...
	 	if($conn->affected_rows==1){
	 		$to_email = $stud_email;
          
	       	$subject = "Your verification code";
			// $message_body = "Your verification code is $otp";
			$message_body = "Thanks for signing up! .
				Your account has been created, Please Verify the otp to login with the following account after you have activated your account by pressing 
				  
				------------------------
				Email: $to_email
				OTP: $otp
				------------------------				  
				
				  
				 // Our message above including the link";

			$headers = "From: {$from_mail}}";

			if (mail($to_email , $subject, $message_body, $headers)) {
				//echo "Email successfully sent to $stud_email ...";
				//echo "<script>window.location = 'verify-email-otp.php'</script>";
				header("location:".$ref."register.php?msg=success");

			} else {
				header("location:".$ref."register.php?msg=Problem in sending email");;
			}
		}
	
}
}

if(isset($_POST['verify'])){

  $email_otp = get_safe_value($conn,$_POST['email-otp']);

  $_SESSION['info'] = "";
  $otp_code = mysqli_real_escape_string($conn, $_POST['email-otp']);
  $check_code = "SELECT * FROM user_otp WHERE otp = $otp_code";
  
  $insertTime = date("Y-m-d H:i:S");


  $code_res = mysqli_query($conn, $check_code);
  if(mysqli_num_rows($code_res) > 0){
      $fetch_data = mysqli_fetch_assoc($code_res);
      $fetch_code = $fetch_data['otp'];
      $valid_to = $fetch_data['valid_to'];
      $email = $fetch_data['email'];
      $code = 1;
      $status = 1;

      if($insertTime < $valid_to){
      	$update_otp = "UPDATE student_details SET code = $code, status = '$status' WHERE student_email = '$email'";
	      $update_res = mysqli_query($conn, $update_otp);
	      if($update_res){
	        $success = "successfully!! registration!";
	          // $_SESSION['name'] = $name;
	          // $_SESSION['email'] = $email;
	          header('location: verify-email-otp.php?msg=success');
	          exit();
	      }else{
	      	echo  "error ".mysqli_error($conn);
	          $errors['otp-error'] = "Failed while updating code!";
	      }
      }else{
      	header('location: verify-email-otp.php?msg=otpexpired');
      }
      
  }else{
      // $errors['otp-error'] = "incorrect otp code!";
  		header('location: verify-email-otp.php?msg=incorrect-otp');
  }
}

if(isset($_POST['resend-otp'])){
	  $email = mysqli_real_escape_string($conn, $_POST['resend-otp-email']);
	  

	  //Email Check if email exist then generate the otp again and send else print email doesn't exist please register..
	$email_check = "SELECT * FROM student_details WHERE student_email = '$email'";
	
    $res = mysqli_query($conn, $email_check);

    if(mysqli_num_rows($res) > 0){
    	$result = mysqli_fetch_assoc($res);
    	$user_id = $result['id'];
    	
        $otp = rand(999999, 111111);        

        //Now insert OTP in user_otp table...
		//SET Time for valid_from and valid_to before setting the session for otp..
		$startTime = strtotime('now');		
		$endTime = strtotime('+5 minutes', $startTime);

		
		$valid_from = date('Y-m-d H:i:s', $startTime);
		$valid_to = date('Y-m-d H:i:s', $endTime);

		//echo "INSERT INTO user_otp SET user_id=?, otp=?,email=?,valid_from=?, valid_to=?";

		$sql=$conn->prepare("INSERT INTO user_otp SET user_id=?, otp=?,email=?,valid_from=?, valid_to=?");
		$sql->bind_param("issss", $user_id, $otp,$email, $valid_from, $valid_to);
		$sql->execute();
		//Now insert OTP in user_otp END...

	 	if($conn->affected_rows==1){
	 		$to_email = $email;	 		
          
	       	$subject = "Your verification code";
			// $message_body = "Your verification code is $otp";
			$message_body = "Thanks for signing up! .
				Your account has been created, Please Verify the otp to login with the following account after you have activated your account by pressing 
				  
				------------------------
				Email: $to_email
				OTP: $otp
				------------------------				  
				
				  
				 // Our message above including the link";

			$headers = "From: {$from_mail}";

			if (mail($to_email , $subject, $message_body, $headers)) {
				//echo "Email successfully sent to $stud_email ...";
				//echo "<script>window.location = 'verify-email-otp.php'</script>";
				header("location:".$ref."resend-otp.php?msg=success");

			} else {
				header("location:".$ref."resend-otp.php?msg=Problem in sending email");;
			}

    }	
}else{
      	header("location:".$ref."resend-otp.php?msg=email not exist");
    }
}
?>