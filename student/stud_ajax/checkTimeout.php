<?php 
require_once '../../includes/config.php';

if(isset($_POST['sessionID'])){
	$sessionID = $_POST['sessionID'];

	//Fetch session related data..
	$selSessionData = $conn->query("SELECT * FROM `exam_sessions` WHERE `session_id` = '$sessionID'");
	$sessionData = $selSessionData->fetch_assoc();



	$current_time = date("Y-m-d H:i:s");
	$end_time = $sessionData['session_endtime'];

	$timeFirst =strtotime($current_time);

	$timesecond =strtotime($end_time);

	$differenceinseconds = $timesecond - $timeFirst;
	echo json_encode($differenceinseconds); 

	// echo "<br>";
	// echo "difference of end time and start time is ".$end_time1 = date('H:i:s',strtotime('+'.$end_time.'minutes',strtotime($current_time)));

	// $session_id = md5(uniqid());
	// $status = 1;
	// $date_created = date('Y-m-d H:i:s');

	// $sql = $conn->prepare("INSERT INTO exam_sessions SET student_id=?,exam_id=?,exam_duration=?,session_id=?,session_startime=?,session_endtime=?,status=?,date_created=?");
	// $sql->bind_param("iiisssis",$studentID,$examID,$timeDuration,$session_id,$start_time,$end_time,$status,$date_created);
	// $sql->execute();

    // if($conn->affected_rows == 1){
    // 	$response = $session_id;
    // 	echo json_encode($response);
    // }else{
    // 	$response = 0;
    // 	echo json_encode($response);
    // }



}		
		


?>