<?php 
error_reporting(0);
	// require_once 'includes/config.php';
	require_once '../includes/config.php';
	require_once 'includes/functions.php';
	$ref = web; 

	if(isset($_POST['save'])){
		
		echo "Class_id ".$class_id = get_safe_value($conn,$_POST['class_id']);
		
		$selClassName = $conn->query("SELECT class_name FROM classes WHERE id='$class_id'");
		$class_Name = $selClassName->fetch_assoc();
		
		$className = $class_Name['class_name'];
				

		echo $subject_id = get_safe_value($conn,$_POST['subject_id']);
		echo "</br>";
		$selSubName = $conn->query("SELECT subject_name FROM subject WHERE id='$subject_id'");
		echo "</br>";
	    $sub_Name = $selSubName->fetch_assoc();
		echo "</br>";
		echo $subjectName = $sub_Name['subject_name'];
		echo "</br>";
		

		echo $chapter_id = get_safe_value($conn,$_POST['chapter_id']);
		echo "</br>";
		$selchapName = $conn->query("SELECT chapter_name FROM chapter WHERE id='$chapter_id'");
		echo "</br>";
		$chapter_Name = $selchapName->fetch_assoc();
		echo "</br>";
		echo $chapterName = $chapter_Name['chapter_name'];
		echo "</br>";		

		echo $question_type = get_safe_value($conn,$_POST['question_type']);
		echo "</br>";		
		$correct_answer;		

		if($question_type =="objective"){
			$question = get_safe_value($conn,$_POST['editorContent0']);

			$option1 = get_safe_value($conn,$_POST['editorContent1']);
			$option2 = get_safe_value($conn,$_POST['editorContent2']);
			$option3 = get_safe_value($conn,$_POST['editorContent3']);
			$option4 = get_safe_value($conn,$_POST['editorContent4']);
			$correct_answer = get_safe_value($conn,$_POST['answer']);
		}
		

		if($question_type=="true_false"){
			$question = get_safe_value($conn,$_POST['editorContent0']);
			$true_false = get_safe_value($conn,$_POST['QuesCheck']);
			
			if($true_false=="true"){
			    $true_false = 1;			
				$correct_answer = 1;
				}elseif($true_false=="false" ){
				$true_false = 2;				
				$correct_answer = 2;
				}
			//$sql = "";
		}

		if($question_type=="fill_in_blank"){
			$question = get_safe_value($conn,$_POST['editorContent0']);
			$blank_space = get_safe_value($conn,$_POST['blank_space']);
		}
		if($question_type=="subjective"){
			 $question = get_safe_value($conn,$_POST['editorContent0']);
		}
		
		if($question_type =="match_the_following"){
			$question = get_safe_value($conn,$_POST['editorContent0']);

			$option1 = get_safe_value($conn,$_POST['editorContent1']);
			$option2 = get_safe_value($conn,$_POST['editorContent2']);
			$option3 = get_safe_value($conn,$_POST['editorContent3']);
			$option4 = get_safe_value($conn,$_POST['editorContent4']);
			$correct_answer = get_safe_value($conn,$_POST['answer']);
		}

		//$blank_space = get_safe_value($conn,$_POST['blank_space']);
		$explanation = get_safe_value($conn,$_POST['explanation']);
		$exam_id = get_safe_value($conn,$_POST['exam_id']);
		
		$hint = get_safe_value($conn,$_POST['hint']);
		$marks = get_safe_value($conn,$_POST['marks']);
		$negative_marks = get_safe_value($conn,$_POST['negativeMark']);
		$difficulty = get_safe_value($conn,$_POST['difficulty']);
	  
	      //Insert Data..
	      $status = 1;
	     
	      $sql = "INSERT INTO questions (question_type,question,option_1,option_2,option_3,option_4,option_5,correct_answer,is_true_or_false,fill_in_the_blanks,	explanation,class_id, class_name, subject_id, subject_name, chapter_id, chapter_name, hint,marks,negative_marks,difficulty_level,status) VALUES ('$question_type','$question','$option1','$option2','$option3','$option4','$option5','$correct_answer','$true_false','$blank_space','$explanation','$class_id','$className','$subject_id','$subjectName','$chapter_id','$chapterName','$hint','$marks','$negative_marks', '$difficulty','$status')";
	      if(mysqli_query($conn,$sql)){
	  //     	$response_array['status'] = 'success';	      	
			// echo json_encode($response_array);
			header('location:'.$ref.'add_question.php?msg=success');

	        //header("location:{$hostname}/add_question.php");
	      }else {
	       echo "ERROR ".mysqli_error($conn);
	       //echo $response_array['status'] = 'error';
	       die;
	      }
	    
	}



//This CODE is handling the question update request which is coming from edit_question.php....START....
if(isset($_POST['update_question'])){

	$option1 ='';
	$option2 ='';
	$option3 ='';
	$option4 ='';
	$option5 ='';
	$option1 ='';
	$true_false ='';
	$blank_space = '';
	// echo "dfasdfasfasdfsadfasf";
	$question_id = get_safe_value($conn,$_POST['question_id']);

	$class_id = get_safe_value($conn,$_POST['class_id']);
	$selClassName = $conn->query("SELECT class_name FROM classes WHERE id='$class_id'");
	$class_Name = $selClassName->fetch_assoc();
	$className = $class_Name['class_name'];	

	$subject_id = get_safe_value($conn,$_POST['subject_id']);
	$selSubName = $conn->query("SELECT subject_name FROM subject WHERE id='$subject_id'");
	$sub_Name = $selSubName->fetch_assoc();
	$subjectName = $sub_Name['subject_name'];

	$chapter_id = get_safe_value($conn,$_POST['chapter_id']);
	$selchapName = $conn->query("SELECT chapter_name FROM chapter WHERE id='$chapter_id'");
	$chapter_Name = $selchapName->fetch_assoc();
	$chapterName = $chapter_Name['chapter_name'];

	$question_type = get_safe_value($conn,$_POST['question_type']);
	

	if($question_type =="objective"){
		
		$question = get_safe_value($conn,$_POST['editorContent0']);			
		$option1 = get_safe_value($conn,$_POST['editorContent1']);				
		$option2 = get_safe_value($conn,$_POST['editorContent2']);		
	 	$option3 = get_safe_value($conn,$_POST['editorContent3']);
		
		$option4 = get_safe_value($conn,$_POST['editorContent4']);			
		$correct_answer = get_safe_value($conn,$_POST['answer']);

	}

	if($question_type=="true_false"){
			$question = get_safe_value($conn,$_POST['editorContent0']);
			$true_false = get_safe_value($conn,$_POST['QuesCheck']);
			
				if($true_false=="true"){
				$true_false = 1;
			
				$correct_answer = 1;
				}elseif($true_false=="false" ){
				$true_false = 2;
				
				$correct_answer = 2;
				}
			
		}

		if($question_type=="fill_in_blank"){
			$question = get_safe_value($conn,$_POST['editorContent0']);
			$blank_space = get_safe_value($conn,$_POST['blank_space']);
		}
		if($question_type=="subjective"){
			//$question_type;
			$question = get_safe_value($conn,$_POST['editorContent0']);
		}

		if($question_type =="match_the_following"){
			$question = get_safe_value($conn,$_POST['editorContent0']);

			$option1 = get_safe_value($conn,$_POST['editorContent1']);
			$option2 = get_safe_value($conn,$_POST['editorContent2']);
			$option3 = get_safe_value($conn,$_POST['editorContent3']);
			$option4 = get_safe_value($conn,$_POST['editorContent4']);
			$correct_answer = get_safe_value($conn,$_POST['answer']);
		}

		$blank_space = get_safe_value($conn,$_POST['blank_space']);
		$explanation = get_safe_value($conn,$_POST['explanation']);
		
		$hint = get_safe_value($conn,$_POST['hint']);
		$marks = get_safe_value($conn,$_POST['marks']);
		$negative_marks = get_safe_value($conn,$_POST['negativeMark']);
		$difficulty = get_safe_value($conn,$_POST['difficulty']);    
	       
	    $sql = "UPDATE questions SET question_type='$question_type', question='$question', option_1='$option1', option_2='$option2', option_3='$option3', option_4='$option4', option_5='$option5', correct_answer='$correct_answer', is_true_or_false='$true_false', fill_in_the_blanks='$blank_space', explanation='$explanation', class_id='$class_id',class_name='$className', subject_id='$subject_id', subject_name='$subjectName', chapter_id='$chapter_id', chapter_name='$chapterName', hint='$hint', marks='$marks', negative_marks='$negative_marks', difficulty_level='$difficulty' WHERE id = '$question_id'";
	      
	    if(mysqli_query($conn,$sql)){	      	
	        //header("location:{$hostname}/edit_question.php?exam_id=$exam_id&success=1");
	      }else {
	        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	      }
}
?>