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

		$examId = get_safe_value($conn,$_POST['examId']);		
		
		//Now fetch featured exams details like exam_name and exam_id from exam table that are under this examID...

		$selExamData = mysqli_query($conn,"SELECT * FROM exam WHERE id = '$examId'");
		$count = mysqli_num_rows($selExamData);
		while($row = mysqli_fetch_assoc($selExamData)){
			$exam_id = $row['id'];
			$exam_name = $row['exam_name'];
			$paid_unpaid = $row['paid_exam'];
		}
			
		$select_userdata = mysqli_query($conn,"SELECT * FROM student_details WHERE student_email = '$email' AND password = '$password'");
		$check = mysqli_num_rows($select_userdata);			
		if($check > 0){			
			$res = mysqli_fetch_assoc($select_userdata);
			if($res['status']==1 || 0){
				 $_SESSION['student'] = $res;
				 $studentID = $_SESSION['student']['id'];
				 $student_name = $_SESSION['student']['student_fname']." ".$_SESSION['student']['student_lname'];

						//Now insert exam data of this package in student_exam table..				
						$sql=$conn->prepare("INSERT INTO student_exams SET stud_id=?, stud_name=?, exam_id=?,exam_name=?, exam_paid_unpaid_type=?");
						$sql->bind_param("isiss", $studentID, $student_name, $exam_id,$exam_name, $paid_unpaid);
						$sql->execute();
						// if($conn->affected_rows > 0){
						// 	$response = 1;
				  //     	    echo json_encode($response); 
						// }
					}

				  $response = 1;
      	 		  echo json_encode($response); 
			    	
		}else{
		$response = 2;
  		echo json_encode($response);
	}
}

//IF the user is already login while buying the package, we would need only packageID, becuase session is already set..get packageID and insert in student_exams table...

if(isset($_POST['exam_Id'])){
	$studentID;
	$student_name;
	$category_status = 1;
	$examId = get_safe_value($conn,$_POST['exam_Id']);


 	//Now fetch featured exams details like exam_name and exam_id from exam table that are under this examID...
	$selExamData = mysqli_query($conn,"SELECT * FROM exam WHERE id = '$examId'");
	$count = mysqli_num_rows($selExamData);
	while($row = mysqli_fetch_assoc($selExamData)){
		$exam_id = $row['id'];
		$exam_name = $row['exam_name'];
		$paid_unpaid = $row['paid_exam'];

		//Now insert exam data of this package in student_exam table..
		$sql=$conn->prepare("INSERT INTO student_exams SET stud_id=?, stud_name=?, exam_id=?,exam_name=?, exam_paid_unpaid_type=?");
		$sql->bind_param("isiss", $studentID, $student_name, $exam_id,$exam_name, $paid_unpaid);
		$sql->execute();

		// if(!$sql){
		// 	echo "Query Failed".$sql->errorno;
		// }
		if($conn->affected_rows > 0){
			$query = "UPDATE student_details SET category_status = '$category_status' WHERE id= '$studentID'";
			$update = mysqli_query($conn,$query);
			$response = 1;
      	    echo json_encode($response); 
		}else{
			$response = 0;
    		echo json_encode($response); 
		}
		
	}
		
}

?>