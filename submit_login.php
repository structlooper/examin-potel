<?php
error_reporting(1);
	require_once 'includes/config.php';
	require_once 'includes/functions.php';


if(isset($_POST['login'])){
		$email = get_safe_value($conn,$_POST['email']);		
		$password = md5(get_safe_value($conn,$_POST['password']));		

		//$old_query "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		//"SELECT * FROM student_details WHERE student_email = '$email' AND password = '$password'";
		
		$select_userdata = mysqli_query($conn,"SELECT * FROM student_details WHERE student_email = '$email' AND password = '$password'");
		if($check = mysqli_num_rows($select_userdata) > 0){
			
			$res = mysqli_fetch_assoc($select_userdata);
			if($res['status']==1){

				 $_SESSION['student'] = $res;
				  $response = 1;
      	 		  echo json_encode($response); 
			}elseif($res['status'] == 0){
				$response = 0;
         	    echo json_encode($response);
			}      	
		}else{
		$response = 2;
  		echo json_encode($response);
	}
}
?>