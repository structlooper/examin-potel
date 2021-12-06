<?php 
require_once '../includes/config.php';
require_once 'includes/functions.php';

//This file is handling ajax request before editing question and sending the data back to edit_questiong.php in json format to show on popup form START..
if(isset($_POST['question_id'])){
     
	$question_id = mysqli_real_escape_string($con,$_POST['question_id']);
	$questionData_arr = array();
	 //fetch data from question table related to this question id...
	$sql = $conn->prepare("SELECT * FROM `questions` WHERE `id`=?");
	$sql->bind_param('i', $question_id);
	$sql->execute();
	$result = $sql->get_result();
	while($questionData = $result->fetch_assoc()){
		$questionData_arr[] = $questionData;
	}

	//print_r($questionData_arr);
	//encode array to json format
	echo json_encode($questionData_arr);

    }
 //handling ajax request before editing question and sending the data back to edit_questiong.php in json format to show on popup form END..
?>
