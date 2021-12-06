<?php 
require_once '../../includes/config.php';
require_once '../includes/functions.php';


if(isset($_POST['studentID'])){
	$studentID = get_safe_value($conn,$_POST['studentID']);
	$studName = get_safe_value($conn,$_POST['studName']);
	$student_lname = get_safe_value($conn,$_POST['student_lname']);
	$studEmail = get_safe_value($conn,$_POST['studEmail']);
	$studContact = get_safe_value($conn,$_POST['studContact']);

	//Update Student Detials..
	$update_query = "UPDATE student_details SET student_fname='$studName',student_lname='$student_lname', student_email='$studEmail', contact='$studContact' WHERE id = '$studentID'";

	$result = mysqli_query($conn,$update_query);
	if(mysqli_affected_rows($conn) == 1){
		echo json_encode("success");
		
	}

}



?>