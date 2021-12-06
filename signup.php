
<?php

	include 'config.php';
	//echo "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$user_name = $_POST['su_name'];
		$email_id = $_POST['su_email'];
		$password = $_POST['su_pwd'];
		$rpassword = $_POST['su_rpwd'];
		$status=0;
		$activationcode=md5($email_id.time());

		echo $query = "INSERT INTO user(user_name,email_id,password,rpassword,status,activationcode)
		 VALUES('{$user_name}','{$email_id}','{$password}','{$rpassword}','{$activationcode}','{$status}')";
   		echo $table = mysqli_query($connection,$query);
    
// 		if($table){
// 			$_SESSION['login_user']= $_POST['su_name']; 
// 			header("location: profile.php"); // Redirecting To Other Page
// 			exit();
// 		}
// 		mysqli_close($connection); // Closing Connection
// 	}
//  



if($query)
 {
	$to=$email_id;

	$msg = "Thanks for new Registration.";   
	
	$subject = "Email verification";
	
    $headers .= "MIME-Version: 1.0"."\r\n";
	
	$headers .= "Content-type: text/html, charset=iso-8859-1"."\r\n";
	
	$headers .= "Ankit <ankit.softonic@gmail.com>"."\r\n";
	
			
	
	$ms .="<html></body><div><div>Dear $user_name,</div></br></br>";
	
	$ms .="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
	
	<div style='padding-top:10px;'><a href='http://localhost/emailverify/email_verification.php?code=$activationcode'>Click Here</a></div>
	
	<div style='padding-top:4px;'>Powered by <a href='ankit.com'>ankit.com</a></div></div>
	
	</body></html>";
	
	mail($to,$subject,$ms,$headers);
	
	echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";
	
	//echo "<script>windows.location = 'login.php';</script>";
	}
	
	else
	
	{
	
	echo "<script>alert('Data not inserted');</script>";
	
	}
	
	}

	 ?>
	