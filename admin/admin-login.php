<?php

	//require_once 'includes/config.php';
	require_once '../includes/config.php';
	require_once 'includes/functions.php';
	if(isset($_POST)){
		$email = $_POST['username'];
		//$phone = $_POST['phone'];
		$password = $_POST['password'];

		$select_admindata = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
		if($check = mysqli_num_rows($select_admindata) > 0){
		 $res = mysqli_fetch_assoc($select_admindata);      
      	 $_SESSION['admin'] = $res['email']; 
      	 //return 1;
      	 $response = 1;
      	 echo json_encode($response);
	}else{
		//echo "Your login details not found in database";
		//return 0;
		$response = 0;
      	echo json_encode($response);
	}
}

?>