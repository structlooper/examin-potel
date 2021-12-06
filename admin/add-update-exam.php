<?php 
ob_start();
//require_once 'includes/config.php';//change if don't work..
require_once '../includes/config.php';
require_once 'includes/functions.php';
$web = web; //path of the root folder..


if(isset($_POST['add_exam'])){

	//send the field values to be clean for sql point of view...
	$class_id = get_safe_value($conn,$_POST['class']);	
	$subject_id = get_safe_value($conn,$_POST['subject']);	
	$chapter_id = get_safe_value($conn,$_POST['chapter']);

  
  $qustions_list_comma_wise = $_POST['question_list'];
  $qustions_ids_comma_wise = $_POST['question_ids'];
 
  
  $question_array = explode(",",$qustions_list_comma_wise);
   // echo "<pre>";
   // print_r($question_array);
  

	$exam_name = get_safe_value($conn,$_POST['exam_name']);  	
	$instruction = get_safe_value($conn,$_POST['instruction']);
  
	$exam_duration_min = get_safe_value($conn,$_POST['exam_duration_min']);
	$attempt = get_safe_value($conn,$_POST['attempt']);	
	$start_time = get_safe_value($conn,$_POST['start_time']);	
	$start_date = get_safe_value($conn,$_POST['start_date']);
  $exam_date = get_safe_value($conn,$_POST['exam_date']); 	
	$end_date = get_safe_value($conn,$_POST['end_date']);

  $end_date = get_safe_value($conn,$_POST['end_date']);
  $total_questions = get_safe_value($conn,$_POST['total_questions']);
	$total_marks = get_safe_value($conn,$_POST['total_marks']);
  $required_passPercentage = get_safe_value($conn,$_POST['required_passPercentage']);
  $show_answer = get_safe_value($conn,$_POST['show_answer']); 	
	$negative_marking = get_safe_value($conn,$_POST['negative_marking']);

	$paid_exam = get_safe_value($conn,$_POST['paid_exam']);
  $exam_amaunt = get_safe_value($conn,$_POST['exam_amaunt']);

	$result_after_finish = get_safe_value($conn,$_POST['result']);	
	$instant_result = get_safe_value($conn,$_POST['instant_result']); 
	$option_shuffle = get_safe_value($conn,$_POST['shuffle']);	
	

	//fetch class name from class table based on $class_id variable while add exam to store in exam table..
    $query = "SELECT * FROM classes WHERE id = '$class_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
      $class_data = mysqli_fetch_assoc($res);
      $class_name = $class_data['class_name'];
      
    }
    
    //fetch subject name from subject table based on $subject_id variable while add exam to store in exam table..
    $query = "SELECT * FROM subject WHERE id = '$subject_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
      $subject_data = mysqli_fetch_assoc($res);
      $subject_name = $subject_data['subject_name'];
      
    }

    //fetch subject name from chapter table based on $chapter_id variable while add exam to store in exam table..
    $query = "SELECT * FROM chapter WHERE id = '$chapter_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
      $chapter_data = mysqli_fetch_assoc($res);
      $chapter_name = $chapter_data['chapter_name'];
      
    }    

    //Check if exam_name and also the class name, subject name and chapter name already exist in exam table before insert operation if it exist then it means exam is already avaialable in exam table so show user that exam already exist under this class,subject and chapter..
    $sql = "SELECT * FROM exam WHERE exam_name = '$exam_name' AND class_name = '$class_name' AND subject_name = '$subject_name' AND chapter_name = '$chapter_name'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
      // header("location:{$hostname}/add_subject.php");
    $msg = "This Exam already exist in this class,subject and chapter";
    //redirect back to add_question with this message..
	    //header("location: $ref?msg=$msg");
      
    }else{
      //Else Insert Data...
      $status = 1;
      $sql = "INSERT INTO exam(exam_name,class_name,class_id,subject_name,subject_id,chapter_name, chapter_id, instruction, exam_duration, attempt,start_time, start_date, exam_date, end_date, total_questions, questions_ids, total_marks, pass_percentage,  show_answer_sheet,negative_marking, paid_exam,exam_amount, result_after_finish, instant_result,option_shuffle,status) VALUES('$exam_name','$class_name','$class_id','$subject_name','$subject_id','$chapter_name','$chapter_id','$instruction','$exam_duration_min', '$attempt','$start_time','$start_date','$exam_date','$end_date', '$total_questions','$qustions_ids_comma_wise','$total_marks','$required_passPercentage', '$show_answer','$negative_marking','$paid_exam','$exam_amaunt','$result_after_finish','$instant_result','$option_shuffle','$status')";

      if(mysqli_query($conn,$sql)){
        header("location:".$web."admin/exam_list.php?msg=success");

	    //redirect back to add_question with this message..
	    //header("location: $ref?msg=$msg");
      }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }

}


if(isset($_POST['update_exam'])){

  //send the field values to be clean for sql point of view...
   $class_id = get_safe_value($conn,$_POST['update_class_name']);   
   $subject_id = get_safe_value($conn,$_POST['subject']);        
   $chapter_id = get_safe_value($conn,$_POST['chapter']);   

   // $exam_id = get_safe_value($conn,$_POST['exam_id']);
   $exam_id = get_safe_value($conn,$_POST['exam_id']);   
   
   

   $exam_name = get_safe_value($conn,$_POST['update_examName']);  
   $instruction = get_safe_value($conn,$_POST['update_instruction']);   
   $exam_duration_min = get_safe_value($conn,$_POST['update_exam_duration_min']);
   
   
   $attempt = get_safe_value($conn,$_POST['update_attempts']);       
   $start_time = get_safe_value($conn,$_POST['update_start_time']);       
   $start_date = get_safe_value($conn,$_POST['update_start_date']);   
   $exam_date = get_safe_value($conn,$_POST['update_exam_date']);     
   $end_date = get_safe_value($conn,$_POST['update_end_date']);
   
   

   $update_totalQuestion = get_safe_value($conn,$_POST['update_total_questions']);
   
   $update_qustions_ids_comma_wise = $_POST['update_question_ids'];   
   $total_marks = get_safe_value($conn,$_POST['update_total_marks']);   
   $passPercentage = get_safe_value($conn,$_POST['update_required_passPercentage']);   
   $show_answer = get_safe_value($conn,$_POST['update_show_answer']);       
   $negative_marking = get_safe_value($conn,$_POST['update_negative_marking']);
   

  $paid_exam = get_safe_value($conn,$_POST['update_paid_exam']);
  $exam_amaunt = get_safe_value($conn,$_POST['upd_exam_amaunt']);

  $result_after_finish = get_safe_value($conn,$_POST['update_result']);
  $instant_result = get_safe_value($conn,$_POST['update_instant_result']);
  $option_shuffle = get_safe_value($conn,$_POST['update_shuffle']);
  

  //fetch class name from class table based on $class_id variable while add exam to store in exam table..
    $query = "SELECT * FROM classes WHERE id = '$class_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
      $class_data = mysqli_fetch_assoc($res);
      $class_name = $class_data['class_name'];
    
    }  
    
    //fetch subject name from subject table based on $subject_id variable while add exam to store in exam table..
    $query = "SELECT * FROM subject WHERE id = '$subject_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
      $subject_data = mysqli_fetch_assoc($res);
      $subject_name = $subject_data['subject_name'];
      
    }

    //fetch subject name from chapter table based on $chapter_id variable while add exam to store in exam table..
    $query = "SELECT * FROM chapter WHERE id = '$chapter_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
      $chapter_data = mysqli_fetch_assoc($res);
      $chapter_name = $chapter_data['chapter_name'];
    
    }
    
      //Else Insert Data...
      $status = 1;
      //echo "UPDATE exam SET exam_name='$exam_name', class_name='$class_name', class_id='$class_id', subject_name='$subject_name',subject_id='$subject_id',chapter_name='$chapter_name', chapter_id='$chapter_id', instruction='$instruction', exam_duration='$exam_duration_min', attempt='$attempt',start_time='$start_time', start_date='$start_date', exam_date='$exam_date', end_date='$end_date', total_questions='$update_totalQuestion', total_marks='$total_marks', pass_percentage='$passPercentage', show_answer_sheet='$show_answer',negative_marking='$negative_marking',paid_exam='$paid_exam', result_after_finish='$result_after_finish',  instant_result='$instant_result', option_shuffle='$option_shuffle', status='$status' WHERE id = '$exam_id'";

       //"UPDATE exam SET exam_name='$exam_name', class_name='$class_name', class_id='$class_id', subject_name='$subject_name',subject_id='$subject_id',chapter_name='$chapter_name', chapter_id='$chapter_id', instruction='$instruction', exam_duration='$exam_duration_min', attempt='$attempt',start_time='$start_time', start_date='$start_date', exam_date='$exam_date', end_date='$end_date', total_questions='$update_totalQuestion',questions_ids='$update_qustions_ids_comma_wise', total_marks='$total_marks', pass_percentage='$passPercentage', show_answer_sheet='$show_answer',negative_marking='$negative_marking',paid_exam='$paid_exam', result_after_finish='$result_after_finish',  instant_result='$instant_result', option_shuffle='$option_shuffle', status='$status' WHERE id = '$exam_id'";


       $sql = "UPDATE exam SET exam_name='$exam_name',class_name='$class_name',class_id='$class_id',subject_name='$subject_name',subject_id='$subject_id',chapter_name='$chapter_name', chapter_id='$chapter_id', instruction='instruction', exam_duration='$exam_duration_min', attempt='$attempt',start_time='$start_time', start_date='$start_date', exam_date='$exam_date', end_date='$end_date', total_questions='$update_totalQuestion', questions_ids='$update_qustions_ids_comma_wise', total_marks='$total_marks', pass_percentage='$passPercentage', show_answer_sheet='$show_answer',negative_marking='$negative_marking',paid_exam='$paid_exam',exam_amount='$exam_amaunt', result_after_finish='$result_after_finish', instant_result='$instant_result',option_shuffle='$option_shuffle',status='$status' WHERE id = '$exam_id'";

       $result = mysqli_query($conn,$sql);
       if($conn->affected_rows == 1){
        echo "exam updated";
        header('location:exam_list.php');
       }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    

}

?>