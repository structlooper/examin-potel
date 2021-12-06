<?php 
require_once '../../includes/config.php';
		
		$studentID = $_SESSION['student']['id'];
		$examID = $_SESSION['exam_details']['id'];
        $timeDuration = $_SESSION['exam_details']['exam_duration'];
		$start_time = date("Y-m-d H:i:s");        
		$end_time = date('Y-m-d H:i:s',strtotime('+'.$timeDuration.'minutes',strtotime($start_time)));

		$session_id = md5(uniqid());
		$status = 1;
		$date_created = date('Y-m-d H:i:s');

		$sql = $conn->prepare("INSERT INTO exam_sessions SET student_id=?,exam_id=?,exam_duration=?,session_id=?,session_startime=?,session_endtime=?,status=?,date_created=?");
		$sql->bind_param("iiisssis",$studentID,$examID,$timeDuration,$session_id,$start_time,$end_time,$status,$date_created);
		$sql->execute();

        if($conn->affected_rows == 1){
        	$_SESSION['exam_session'] = $session_id;
        	$response = $session_id;
        	echo json_encode($response);
        }else{
        	$response = 0;
        	echo json_encode($response);
        }
?>