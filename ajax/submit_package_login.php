<?php
error_reporting(1);
	include '../includes/config.php';
	include '../includes/functions.php';

	if(isset($_SESSION['student'])){
		$studentID = $_SESSION['student']['id'];
		$student_name = $_SESSION['student']['student_fname']." ".$_SESSION['student']['student_lname'];
	}

if(isset($_POST['login'])){
		$email = get_safe_value($conn,$_POST['email']);		
		$password = md5(get_safe_value($conn,$_POST['password']));
		$packageId = get_safe_value($conn,$_POST['packageId']);		
		//Now get package details..
		$selPackData = mysqli_query($conn,"SELECT * FROM exam_packages WHERE package_id = '$packageId'");
		$count = mysqli_num_rows($selPackData);
		$package = mysqli_fetch_assoc($selPackData);
		$category_status = 1;
		$package_name = $package['package_name'];
		$feature_exam = $package['featured_exams'];

		//Now fetch featured exams details like exam_name and exam_id from exam table that are under this package...
		// echo "SELECT * FROM exam WHERE id IN($feature_exam])";
		// die;
		// $selExamData = mysqli_query($conn,"SELECT * FROM exam WHERE id IN($feature_exam)");
		// $count = mysqli_num_rows($selExamData);
		// while($row = mysqli_fetch_assoc($selExamData)){
		// 	print_r($row);
		// }
		// $featured_exams = mysqli_fetch_assoc($selExamData);


		// print_r($featured_exams);
		// die;

		//$old_query "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		//echo "SELECT * FROM student_details WHERE student_email = '$email' AND password = '$password'";
		
		$select_userdata = mysqli_query($conn,"SELECT * FROM student_details WHERE student_email = '$email' AND password = '$password'");
		$check = mysqli_num_rows($select_userdata);			
		if($check > 0){			
			$res = mysqli_fetch_assoc($select_userdata);
			if($res['status']==1 || 0){
				 $_SESSION['student'] = $res;
				 $studentID = $_SESSION['student']['id'];
				 $student_name = $_SESSION['student']['student_fname']." ".$_SESSION['student']['student_lname'];

				 	//Now fetch featured exams details like exam_name and exam_id from exam table that are under this package...
					$selExamData = mysqli_query($conn,"SELECT * FROM exam WHERE id IN($feature_exam)");
					$count = mysqli_num_rows($selExamData);
					while($row = mysqli_fetch_assoc($selExamData)){
						$exam_id = $row['id'];
						$exam_name = $row['exam_name'];
						$paid_unpaid = $row['paid_exam'];

						//Now insert exam data of this package in student_exam table..				
						$sql=$conn->prepare("INSERT INTO student_exams SET stud_id=?, stud_name=?, exam_id=?,exam_name=?, exam_paid_unpaid_type=?,package_id=?,package_name=?");
						$sql->bind_param("isissis", $studentID, $student_name, $exam_id,$exam_name, $paid_unpaid,$packageId,$package_name);
						$sql->execute();
						// if($conn->affected_rows > 0){
						// 	$response = 1;
				  //     	    echo json_encode($response); 
						// }
						$query = "UPDATE student_details SET category_status = '$category_status' WHERE id= '$studentID'";
						$update = mysqli_query($conn,$query);
					}

				
				  $response = 1;
      	 		  echo json_encode($response); 
			}    	
		}else{
		$response = 2;
  		echo json_encode($response);
	}
}

//IF the user is already login while buying the package, we would need only packageID, becuase session is already set..get packageID and insert in student_exams table...

if(isset($_POST['package_Id'])){
	$studentID;
	$student_name;
	$category_status = 1;
	$packageId = get_safe_value($conn,$_POST['package_Id']);

	//Now get package details..
	$selPackData = mysqli_query($conn,"SELECT * FROM exam_packages WHERE package_id = '$packageId'");
	//$count = mysqli_num_rows($selPackData);
	$package = mysqli_fetch_assoc($selPackData);
	
	$package_name = $package['package_name'];
	$feature_exam = $package['featured_exams'];

 	//Now fetch featured exams details like exam_name and exam_id from exam table that are under this package...
	$selExamData = mysqli_query($conn,"SELECT * FROM exam WHERE id IN($feature_exam)");
	$count = mysqli_num_rows($selExamData);
	while($row = mysqli_fetch_assoc($selExamData)){
		$exam_id = $row['id'];
		$exam_name = $row['exam_name'];
		$paid_unpaid = $row['paid_exam'];

		//Now insert exam data of this package in student_exam table..
		$sql=$conn->prepare("INSERT INTO student_exams SET stud_id=?, stud_name=?, exam_id=?,exam_name=?, exam_paid_unpaid_type=?,package_id=?,package_name=?");
		$sql->bind_param("isissis", $studentID, $student_name, $exam_id,$exam_name, $paid_unpaid,$packageId,$package_name);
		$sql->execute();

		// if($conn->affected_rows > 0){
		// 	$response = 1;
  //     	    echo json_encode($response); 
		// }
		
	}

	$query = "UPDATE student_details SET category_status = '$category_status' WHERE id= '$studentID'";
	$update = mysqli_query($conn,$query);

	$response = 1;
    echo json_encode($response); 	
}

?>