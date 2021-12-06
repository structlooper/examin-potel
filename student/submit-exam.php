<?php 
error_reporting(0);
require_once '../includes/config.php';
require_once 'includes/functions.php';

$student_id = $_SESSION['student']['id'];
$student_name = $_SESSION['student']['student_fname']." ".$_SESSION['student']['student_lname'];
$exam_id = $_SESSION['exam_details']['id'];
$web = web;

$Exmsession_id = $_SESSION['exam_session'];

$myMarks=0;
function score(){
	global $conn;
	$student_id = $_SESSION['student']['id'];
	$exam_id = $_SESSION['exam_details']['id'];
	
	$selScore = $conn->query("SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id AND eqt.correct_answer = ea.stud_answer AND ea.stud_answer != '' WHERE ea.student_id = '".$student_id."' AND ea.exam_id = '".$exam_id."'");

	if($countRows = mysqli_num_rows($selScore) > 0 )
	{

	  while($rows = $selScore->fetch_assoc()){
	   $myMarks += $rows['marks'];
	    //$myPercentage = $myMarks/$totalMarks_ofExam * 100;    
	 }
   }
	return $myMarks; 
}

// //select data from exam_answer table according to student_id and exam_id if already exist means studen has given this exam and so increment the countr to count how many time this exam is given by student..
// $selAns = $conn->query("SELECT * FROM exam_answers WHERE student_id='$student_id' AND exam_id='$exam_id' ");

if(isset($_POST['exam_submit'])){
	$quest_length = count($_POST['question']);
	
	$ans_length = count($_POST['answer']);


	$question_arr = $_POST['question'];
	$answer_arr =  $_POST['answer'];
	$question_id_arr = $_POST['question_id'];



	//select data from exam_answer table according to student_id and exam_id if already exist means studen has given this exam and so increment the countr to count how many time this exam is given by student..	
	$selAns = $conn->query("SELECT * FROM exam_answers WHERE student_id='$student_id' AND exam_id='$exam_id' order by exam_attemp_counter desc limit 0,1");	

	if($question_count=mysqli_num_rows($selAns) > 0 )
		{	
			$answer_entry = mysqli_fetch_assoc($selAns);
			
			$exam_attemp_counter  = $answer_entry['exam_attemp_counter'];		
			$exam_attemp_counter1 = $exam_attemp_counter + 1;			

			//Enter exam attend but increment the exam_attemp_counter by 1 every time the student attend the exam..
			for($i = 1; $i <= $quest_length; $i++){
			global $conn;
			//echo $i;
			$question_data = $question_arr[$i];
			$answer = NULL;
			if(!empty($answer_arr[$i]))
			{
				$answer = $answer_arr[$i];
			}
			else
			{
				$answer = NULL;
			}

			$answer_data = $answer;
			$question_id_data = $question_id_arr[$i];

			$question = get_safe_value($conn,$question_data);
			$answer = get_safe_value($conn,$answer_data);
			$question_id = get_safe_value($conn,$question_id_data);


			$sql = $conn->prepare("INSERT INTO exam_answers SET student_id=?, exam_id=?, question_id=?, answerd_question=?, stud_answer=?,exam_attemp_counter=?");

	    	$sql->bind_param("iiissi",$student_id, $exam_id, $question_id, $question, $answer,$exam_attemp_counter1);
		    $sql->execute();
		    if(!$sql){
		    	echo "Query Failed: ".$conn->errno;
		    } 

		}
	}else{
		//INSERT Fresh exam attend to exam answer (question,stud_answer)"; 
		for($i = 1; $i <= $quest_length; $i++)
		{
			global $conn;
			//echo $i;
			$question_data = $question_arr[$i];

			$answer = NULL;
			if(!empty($answer_arr[$i]))
			{
				$answer = $answer_arr[$i];
			}
			else
			{
				$answer = NULL;
			}

			$answer_data = $answer;
			$question_id_data = $question_id_arr[$i];

			$question = get_safe_value($conn,$question_data);
			$answer = get_safe_value($conn,$answer_data);
			$question_id = get_safe_value($conn,$question_id_data);
			$exam_attemp_counter = 1;


			$sql = $conn->prepare("INSERT INTO exam_answers SET student_id=?, exam_id=?, question_id=?, answerd_question=?, stud_answer=?,exam_attemp_counter=?");

	    	$sql->bind_param("iiissi",$student_id, $exam_id, $question_id, $question, $answer,$exam_attemp_counter);
		    $sql->execute();   
		}
	}

	if($sql)
		{	
			//Count the number of attempts or any existing record student has given for this exam from exam_attempts table.. 
			//echo "SELECT * FROM exam_attempt WHERE stud_id='$student_id' AND exam_id='$exam_id'";
			$selExAttempt = $conn->query("SELECT * FROM exam_attempt WHERE stud_id='$student_id' AND exam_id='$exam_id'");
			
			$attempt_count=mysqli_num_rows($selExAttempt);
			
			if($attempt_count > 0 ){
				$res = mysqli_fetch_assoc($selExAttempt);
				$used_attempt  = $res['attempt_count'];
				$used_attempt++;

				 $insAttempt = $conn->prepare("UPDATE exam_attempt SET attempt_count=? WHERE stud_id='$student_id' AND exam_id='$exam_id'");
				 $insAttempt->bind_param("i",$used_attempt);
				 $insAttempt->execute();
				 if($conn->affected_rows==1){

				 	//Now update exam status to 0...
				 	$upSessdstatus = 0;				 	
					 $updExStatus = $conn->prepare("UPDATE exam_sessions SET status=? WHERE session_id='$Exmsession_id'");
					 $updExStatus->bind_param("i",$upSessdstatus);
					 $updExStatus->execute();
					 if($conn->affected_rows==1){
					 	$response = 1;
				 		echo json_encode($response);
					 }
				 	// $response = 1;
				 	// echo json_encode($response);

				 }else{
				 	$response = 0;
				 	echo json_encode($response);
				 }		
				
			}else{
				//echo "INSERT INTO exam_attempt SET stud_id=?,exam_id=?,attempt_count=?";
				$used_attempt =1; 
				 $insAttempt = $conn->prepare("INSERT INTO exam_attempt SET stud_id=?,exam_id=?,attempt_count=?");
				 $insAttempt->bind_param("iii",$student_id,$exam_id,$used_attempt);
				 $insAttempt->execute();
				 if($conn->affected_rows==1){
				 	//Now update exam status to 0...
				 	$upSessdstatus = 0;				 	
					 $updExStatus = $conn->prepare("UPDATE exam_sessions SET status=? WHERE session_id='$Exmsession_id'");
					 $updExStatus->bind_param("i",$upSessdstatus);
					 $updExStatus->execute();
					 if($conn->affected_rows==1){
					 	//Now get the sum of marks to store in best performance table..
					 	$score = score();
					 	$created_on = date("Y-m-d H:i:s");
					 	//Now insert in top score table
					 	
					 	 $instopscore = $conn->prepare("INSERT INTO top_scores SET student_id=?,student_name=?,exam_id=?,score=?,created_on=?");
						 $instopscore->bind_param("isiis",$student_id,$student_name,$exam_id,$score,$created_on);
						 $instopscore->execute();
					 	if($conn->affected_rows==1){
					 		$response = 1;
				 			echo json_encode($response);
					 	}					 	
					 	// $response = 1;
				 		// echo json_encode($response);
					 }
				 	session_destroy($_SESSION['exam_details']);
				 }else{
				 	echo "Query failed ".mysqli_error($conn);
				 }	
			}
					 
		}

}
?>