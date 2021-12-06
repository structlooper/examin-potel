<?php 
//require_once 'includes/config.php';
require_once '../includes/config.php';
require_once 'includes/functions.php';

//fetch the exam details and fill the edit form fields when update exam button will be clicked on add_exam.php page and send that form back....

if(isset($_POST['exam_id'])){

  $exam_id = mysqli_real_escape_string($conn,$_POST['exam_id']);
  $examData_arr = array();

   //fetch data from exam table related to this exam id...
  $sql = $conn->prepare("SELECT * FROM `exam` WHERE `id`=?");
  $sql->bind_param('i', $exam_id);
  $sql->execute();
  $result = $sql->get_result();
  while($examData = $result->fetch_assoc()){

    $examData_arr[] = $examData;
  }

  //print_r($questionData_arr);
  //encode array to json format
  echo json_encode($examData_arr);

    }



  // $class_id = $_POST['class_id'];
  // $class_name = $_POST['class_name'];
  // $subject_id = $_POST['subject_id'];
  // $subject_name = $_POST['subject_name'];

  // $chapter_id = $_POST['chapter_id'];
  // $chapter_name = $_POST['chapter_id'];

  // $sql = "SELECT * FROM exam WHERE id = '$exam_id'";

  // $result = mysqli_query($conn,$sql);
  // $count = mysqli_num_rows($result);
  // if($count > 0){
  //   $exam_data = mysqli_fetch_assoc($result);
  // //print_r($exam_data);

  //   $exam_name = $exam_data['exam_name'];
  //   $instruction = $exam_data['instruction'];
  //   $exam_duration = $exam_data['exam_duration'];
  //   $attempt = $exam_data['attempt'];
  //   $start_time = $exam_data['start_time'];
  //   $start_date = $exam_data['start_date'];
  //   $exam_date = $exam_data['exam_date'];
  //   $end_date = $exam_data['end_date'];

  //   $total_marks = $exam_data['total_marks'];
  //   $pass_percentage = $exam_data['pass_percentage'];
  //   $show_answer_sheet = $exam_data['show_answer_sheet'];
  //   $negative_marking = $exam_data['negative_marking'];
  //   $paid_exam = $exam_data['paid_exam'];
  //   $result_after_finish = $exam_data['result_after_finish'];
  //   $instant_result = $exam_data['instant_result'];
  //   $option_shuffle = $exam_data['option_shuffle'];



  // }

?>

