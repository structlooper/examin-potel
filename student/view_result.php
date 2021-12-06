<?php 
error_reporting(0);
include "header.php";
require_once '../includes/config.php';
if(!isset($_SESSION['student'])){
      // echo "<script>window.location='../index.php'</script>";
  echo "<script>window.location='login.php'</script>";      
}else{ 
  $student_id = $_SESSION['student']['id'];
} 	


$examId = $_GET['exam_id'];
$_SESSION['examId'] = $examId;

//this attempt number will be inititaly 1 but when choose attempt select box will be change then attempt will be set by jquery from code below this page START.
$attemptNo;
if(isset($_GET['attempt'])){
  $attemptNo = $_GET['attempt'];
}else{
  $attemptNo = 1;
}
 //attempt END..

 //GET the action attribute coming from jquery at the end of the page for enabling and disabling the result for student from admin side..
$status = "";
if(isset($_GET['action'])){
  // $action = $_GET['action'];
  if($_GET['action']=="disable"){
    $status = 0;
    
  }elseif($_GET['action']=="enable"){
    $status = 1;

  }

  $updQuery = "UPDATE exam_answers SET result_enable_disable_status = $status WHERE   student_id = '$student_id' AND exam_id='$examId' AND exam_attemp_counter='$attemptNo'";
  $update = mysqli_query($conn,$updQuery);
  if($update){
    echo "Query pass";
  }else{
    echo "Query failed ".mysqli_error($conn);
  }
}
 //action END..


$msg = "";
$myMarks = 0;
$myPercentage = 0;
$finalMarks = 0;
$my_negativeMarks = 0;
$myTotal_negativeMarks = 0;
$my_notAttemptedQuestMarks = 0;


$selExam = $conn->query("SELECT * FROM exam WHERE id='$examId' AND result_status = 1");
if($count = $selExam->num_rows > 0 ){
  $fetch_Exam = $selExam->fetch_assoc();

$totalMarks_ofExam = $fetch_Exam['total_marks'];
$passMarks_ofExam = $fetch_Exam['pass_percentage'];
}else{
  header("location: result.php");
}
// $fetch_Exam = $selExam->fetch_assoc();

// $totalMarks_ofExam = $fetch_Exam['total_marks'];
// $passMarks_ofExam = $fetch_Exam['pass_percentage'];

 //Fetch all the data with related table to show on score card for exam div like total correct answers total incorrect answers and percentage etc.

$selScore = $conn->query("SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id AND eqt.correct_answer = ea.stud_answer AND ea.stud_answer != '' AND exam_attemp_counter = '$attemptNo' WHERE ea.student_id = '$student_id' AND ea.exam_id = '$examId'");


if($countRows = mysqli_num_rows($selScore) > 0 )
{

  while($rows = $selScore->fetch_assoc()){
   $myMarks += $rows['marks'];
    //$myPercentage = $myMarks/$totalMarks_ofExam * 100;    
 }  
 $myPercentage = $myMarks/$totalMarks_ofExam * 100; 
 $score_data = $selScore->fetch_assoc();
 
 $correct_answer=mysqli_num_rows($selScore);
 $incorrect_answer = $fetch_Exam['total_questions'] - $correct_answer;

}

 //Query For negative score...
$selNegScore = $conn->query("SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id AND eqt.correct_answer != ea.stud_answer AND ea.stud_answer != '' AND exam_attemp_counter = '$attemptNo' WHERE ea.student_id = '$student_id' AND ea.exam_id = '$examId'");

$countNegRows = mysqli_num_rows($selNegScore);
if($countNegRows = mysqli_num_rows($selNegScore) > 0 )
{

  while($Neg_rows = $selNegScore->fetch_assoc()){
   $my_negativeMarks += $Neg_rows['negative_marks'];
    //echo "<br>";
      //echo $myTotal_negativeMarks =  $myMarks - $my_negativeMarks;      

 }

 $finalMarks = $myMarks - $my_negativeMarks;
  if($finalMarks < 0){
      $finalMarks = 0;
    }
 $myPercentage = $finalMarks/$totalMarks_ofExam * 100; 
}


 //Query For not attempted questions(NULL) score...
$selNullScore = $conn->query("SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id AND ea.stud_answer = '' AND exam_attemp_counter = '$attemptNo' WHERE ea.student_id = '$student_id' AND ea.exam_id = '$examId'");

$countNullRows = mysqli_num_rows($selNullScore);
if($countNullRows > 0 )
{
  //echo $countNullRows; 
  while($NotAttempted_quest = $selNullScore->fetch_assoc()){
   $my_notAttemptedQuestMarks += $NotAttempted_quest['marks'];
    //echo "<br>";
      //$myTotal_negativeMarks =  $myMarks - $my_negativeMarks;

 }  
}

 //Query For Total attempted questions count...
$selTotalAnsweredQuest = $conn->query("SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id AND ea.stud_answer != '' AND exam_attemp_counter = '$attemptNo' WHERE ea.student_id = '$student_id' AND ea.exam_id = '$examId'");

$count_totalAnsweredQuestions = mysqli_num_rows($selTotalAnsweredQuest);

//  $score_data = $selScore->fetch_assoc();

//  $correct_answer=mysqli_num_rows($selScore);
$incorrect_answer = $fetch_Exam['total_questions'] - $correct_answer;

$minutes = $fetch_Exam['exam_duration']; 

//Convert the minutes of database into readabel hour: minutes formate...
$hours = floor($minutes / 60);
$min = $minutes - ($hours * 60);

$hours.":".$min;

//query for getting all data from exam_answer without any condition of correct/incorrect or left question, generally for our Enable/disable result page operation. START
$selData = $conn->query("SELECT * FROM exam_answers WHERE student_id = '$student_id' AND exam_id = '$examId' AND exam_attemp_counter = '$attemptNo'");
if($countRows = mysqli_num_rows($selData) > 0 )
{
  $Data = $selData->fetch_assoc();
}
//query for getting all data from exam_answer without any condition of correct/incorrect or left question, generally for our Enable/disable result page operation. END


?><!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--My CSS-->
  <link href="css/style.css" rel="stylesheet" />

  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">



  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Basic Graph Chart -->
  <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-core.min.js"></script>
  <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-cartesian.min.js"></script>
  <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-base.min.js"></script>

  <!--jquery funtion calling-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script>
    $(document).ready(function(){
      $("#score").css({"background-color":"grey", "color":"white"});
      $("#subject").click(function(){
        $("#score,#subject,#time,#question,#solution,#compare").css({"background-color":"", "color":""}) 
        $(this).css({"background-color":"grey", "color":"white"});
        $("#subject-report").show();
        $(".tab-content").hide();
        $("#time-management").hide();
        $("#question-report").hide();
        $("#solution-report").hide();
      });
      $("#time").click(function(){
        $("#score,#subject,#time,#question,#solution,#compare").css({"background-color":"", "color":""}) 
        $(this).css({"background-color":"grey", "color":"white"});
        $("#subject-report").hide();
        $(".tab-content").hide();  
        $("#time-management").show();
        $("#question-report").hide();
        $("#solution-report").hide();
      });
      $("#score").click(function(){
        $("#score,#subject,#time,#question,#solution,#compare").css({"background-color":"", "color":""}) 
        $(this).css({"background-color":"grey", "color":"white"});
        $("#subject-report").hide();
        $(".tab-content").show();  
        $("#time-management").hide();
        $("#question-report").hide();
        $("#solution-report").hide();
      });
      $("#question").click(function(){
        $("#score,#subject,#time,#question,#solution,#compare").css({"background-color":"", "color":""}) 
        $(this).css({"background-color":"grey", "color":"white"});
        $("#subject-report").hide();
        $(".tab-content").hide();  
        $("#time-management").hide();
        $("#question-report").show();
        $("#solution-report").hide();
      });
      $("#solution").click(function(){
        $("#score,#subject,#time,#question,#solution,#compare").css({"background-color":"", "color":""}) 
        $(this).css({"background-color":"grey", "color":"white"});
        $("#subject-report").hide();
        $(".tab-content").hide();  
        $("#time-management").hide();
        $("#question-report").hide();
        $("#solution-report").show();
      })
    });

  </script>
</head>

<body>
       
                      <div class="row" id="print_and_back">
                      <diV class="col-md-6">
                       <a href="result.php" button type="button" id="back_btn" class="btn btn-default"><i
                        class="fa fa-arrow-left"></i>&nbsp;Back</button></a>
                      </div>
                      <diV class="col-md-6 print_btn">
                           <a href="#" button type="button" class="btn print-button" style="background-color: #e9e9e9;" data-toggle="tooltip" data-placement="top" title="Print" onclick="window.print();"> <i class='fa fa-print'></i></button></a>
                        </diV>
                    </diV>
                    <!---- Satrt Menu option ---->

                    <div class="col-md-12 menu_option">
                      <div class="row">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#" id="score" data-toggle="tab">SCORE CARD</a></li>

                        <!-- <li><a href="#" id="subject" data-toggle="tab">SUBJECT REPORT</a></li>
                          <li><a href="#" id="time" data-toggle="tab">TIME MANAG.</a></li> -->
                          <li><a href="#" id="question" data-toggle="tab">QUESTION REPORT</a></li>
                          <li><a href="#" id="solution" data-toggle="tab">SOLUTION</a></li>
                          <!--  <li><a href="#" id="compare" data-toggle="tab">COMPARE REPORT</a></li> -->
                          <li class="active">
                           <!-- <label style="display:inline-block;">Select the attempt</label> -->
                           <select id="attempt_counter" >
                             <option>Choose the attempt </option>
                             <?php
                                   //Attempt Counter to choose the attempt and get the relevant attempt data.. 
                             $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE stud_id='$student_id' AND exam_id='$examId'");
                             $Attempts = $selAttempt->fetch_assoc();
                             for($i = 1; $i <= $Attempts['attempt_count']; $i++){ ?>

                              <option value="<?=$i?>" <?php if($i==
                               $attemptNo) echo "selected"; ?> ><?=$i;?></option> 
                               <!-- echo "<option value='$i' >".$i."</option>"; -->
                             <?php }

                             ?>	
                           </select>
                         </li>

                       </ul>
                     </div>
                   </div>

                   <!---- End Menu option ---->


                   <!-------Start score card For--------->

               <div class="tab-content">
                   <div class="tab-pane active" id="score-card">
                    <?php if(isset($msg)){ echo $msg; }?>
                    <div class="rtest_heading"><strong>Score Card For  </strong><?php echo $fetch_Exam['exam_name']; ?></div>
                    <div class="table-responsive">
                     <table class="table">
                      <tr>
                       <td>Total No. of Questions</td>
                       <td><strong class="text-primary"><?=$fetch_Exam['total_questions'];?></strong></td>
                       <td>Correct Question</td>
                       <td><strong class="text-primary"><?php if(isset($correct_answer)){echo $correct_answer; }else{ echo "0";}?></strong>
                       </td>
                       <td>Incorrect Question</td>
                       <td><strong class="text-danger"><?php if(isset($incorrect_answer)){echo $incorrect_answer; }else{ echo "0";}?></strong></td>
                       <!-- <td>My Marks</td> -->
                       <td>Deducted Marks</td>
                       <td>
                        <strong class="text-primary">
                        <?php if(isset($finalMarks)){
                          if($finalMarks < 0){
                            echo "0";
                          }
                          else{ 
                            echo $finalMarks;
                          }
                        }?>
                            
                          </strong>
                      </td>

                     </tr>
                     <tr>
                       <td>Total Marks of Test</td>
                       <td><strong class="text-primary"><?=$fetch_Exam['total_marks'];?></strong></td>
                       <td>My Percentile</td>
                       <td><strong class="text-primary"><?php if(isset($myPercentage)){echo $myPercentage; }else{ echo "0";}?>%</strong></td>
                       <td>Right Marks</td>
                       <td><strong class="text-primary"><?php if(isset($myMarks)){echo $myMarks; }else{ echo "0";}?></strong></td>
                       <td>Negative Marks</td>
                       <td><strong class="text-danger"><?php if(isset($my_negativeMarks)){echo $my_negativeMarks; }else{ echo "0";}?></strong></td>
                     </tr>
                     <tr>

                    <!-- <td>Total Question in Test</td>
                     <td><strong class="text-primary">6</strong></td> -->
                     <td>Total Answered Question in Test</td>
                     <td><strong class="text-primary"><?php if(isset($count_totalAnsweredQuestions)){echo $count_totalAnsweredQuestions; }else{ echo "0";}?></strong></td>
                     <td>Left Question</td>
                     <td><strong class="text-danger"><?php if(isset($countNullRows)){echo $countNullRows; }else{ echo "0";}?></strong></td>
                     <td>Left Question Marks</td>
                     <td><strong class="text-danger"><?php if(isset($my_notAttemptedQuestMarks)){echo $my_notAttemptedQuestMarks; }else{ echo "0";}?></strong></td>
                     <td>Total Time of Test</td>
                     <td><strong class="text-primary"><?=$hours;?> Hours <?=$min;?> Mins </strong></td>
                   </tr>
                   <tr>
              <!-- <td>Total Time of Test</td>
               <td><strong class="text-primary"><?=$hours;?> Hours <?=$min;?> Mins </strong></td> -->
              <!-- <td>My Time</td>
              <td><strong class="text-primary">2 Mins 23 Sec</strong></td>
              <td>My Rank</td>
              <td><strong class="text-primary">77<sup>th</sup></strong></td> -->
              <td>Result</td>
              <td>
               <?php 
               if($myPercentage < $passMarks_ofExam){ ?>

                <button type="button" class="btn btn-danger " disabled>Failed</button>
                  <!-- <button class=" btn btn-danger ">
                    <span class="label label-danger text-danger">FAILED</span>
                  </button> -->
                <?php }elseif($myPercentage >= $passMarks_ofExam){ ?>

                  <button type="button" class="btn btn-success " disabled>Pass</button>

                <?php }
                ?>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>             

            </tr>                               
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div id="container3"></div>
        </div>
        <div class="col-md-6">
          <div id="container4"></div>
        </div>
      </div>

    </div>



    <!-------End score card For--------->

    <!-------Start Subject Report For--------->

          <!-- <div class="tab-pane" id="subject-report">
			<div class="rtest_heading"><strong>Subject Report For  </strong>Exam</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>Name</th>
						<th>Total Questions</th>
						<th>Correct Incorrect Question</th>
						<th>Marks Scored Negative Marks</th>
						<th>Unattempted Questions Marks</th>
						</tr>
										<tr>                                    
						<td class="text-primary"><strong>Chemistry</strong></td>
						<td>2</td>
						<td><span class="text-success">2</span>/<span class="text-danger">0</span></td>
						<td><span class="text-success">8.00</span>/<span class="text-danger">0</span></td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0</span></td>
					</tr>
										<tr>                                    
						<td class="text-primary"><strong>Maths</strong></td>
						<td>2</td>
						<td><span class="text-success">1</span>/<span class="text-danger">1</span></td>
						<td><span class="text-success">4.00</span>/<span class="text-danger">1.00</span></td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0</span></td>
					</tr>
										<tr>                                    
						<td class="text-primary"><strong>Physics</strong></td>
						<td>2</td>
						<td><span class="text-success">0</span>/<span class="text-danger">1</span></td>
						<td><span class="text-success">0</span>/<span class="text-danger">1.00</span></td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0</span></td>
					</tr>
										<tr>                                    
						<td class="text-primary"><strong>Grand Total</strong></td>
						<td>6</td>
						<td><span class="text-success">3</span>/<span class="text-danger">2</span></td>
						<td><span class="text-success">12.00</span>/<span class="text-danger">2.00</span></td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0.00</span></td>
					</tr>
				</table>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div id="container5"></div>
              </div>
            </div>

          </div> -->
          <!-------End Subject Report For--------->

          <!-------Start Time Management For Exam--------->

         <!--  <div class="tab-pane" id="time-management">
			<div class="rtest_heading"><strong>Time Management For  </strong>Exam</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>Name</th>
						<th>Total Questions</th>
						<th>Correct/ Incorrect Question</th>
						<th>Marks Scored/ Negative Marks</th>
						<th>Percentage</th>
						<th>Unattempted Questions/ Marks</th>
						<th>Total Time</th>
						</tr>
										<tr>                                    
						<td class="text-primary"><strong>Chemistry</strong></td>
						<td>2</td>
						<td><span class="text-success">2</span>/<span class="text-danger">0</span></td>
						<td><span class="text-success">8.00</span>/<span class="text-danger">0</span></td>
						 <td>100.00%</td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0</span></td>
						<td>17 Mins 5 Sec</td>
					</tr>
										<tr>                                    
						<td class="text-primary"><strong>Maths</strong></td>
						<td>2</td>
						<td><span class="text-success">1</span>/<span class="text-danger">1</span></td>
						<td><span class="text-success">4.00</span>/<span class="text-danger">1.00</span></td>
						 <td>37.50%</td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0</span></td>
						<td>3 Mins 32 Sec</td>
					</tr>
										<tr>                                    
						<td class="text-primary"><strong>Physics</strong></td>
						<td>2</td>
						<td><span class="text-success">0</span>/<span class="text-danger">1</span></td>
						<td><span class="text-success">0</span>/<span class="text-danger">1.00</span></td>
						 <td>-12.50%</td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0</span></td>
						<td>46 Sec</td>
					</tr>
										<tr>                                    
						<td class="text-primary"><strong>Grand Total</strong></td>
						<td>6</td>
						<td><span class="text-success">3</span>/<span class="text-danger">2</span></td>
						<td><span class="text-success">12.00</span>/<span class="text-danger">2.00</span></td>
						 <td>41.67%</td>
						<td><span class="text-warning">0</span>/<span class="text-danger">0.00</span></td>
						<td>21 Mins 23 Sec</td>
					</tr>
		     	</table>
            </div>

            <div class="row">
                <div class="col-md-12">
                  <div id="container6"></div>
                </div>
              </div>

            </div> -->

            <!-------Start Time Management For Exam--------->

            <div class="tab-pane" id="question-report">
             <div class="rtest_heading"><strong>Question Report For  </strong><?php echo $fetch_Exam['exam_name']; ?></div>
             <div class="table-responsive">
               <table class="table table-bordered">
                <tr>
                 <th>Q.No.</th>
                 <th>Question</th>
                 <th>Your Answer</th>
                 <th>Correct Answer</th>
                 <th>Max. Marks</th>
                 <th>Negative Marks</th>
                 <!-- <th>Your Time</th> -->
                 <th>Level</th>
               </tr>
               <?php

				 //"SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id WHERE eqt.exam_id = '$examId' AND ea.student_id = '$student_id' AND ea.exam_status"
               $selQuestion = $conn->query("SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id WHERE ea.student_id = '$student_id' AND ea.exam_id = '$examId' AND exam_attemp_counter = '$attemptNo'");
               $i = 1;
               if($numRows = mysqli_num_rows($selQuestion) == 0 ){
                echo "No Records found";
              }

              while($selQuestionRow = $selQuestion->fetch_assoc()){ ?>
                <tr class="text-info">            
                  <?php if($selQuestionRow['question_type'] == "objective"){ ?> 

                   <td><strong><?php echo $i++; ?></strong></td>
                   <td><?=$selQuestionRow['question'];?></td>
                   <td>
                    <?php if($selQuestionRow['stud_answer'] != $selQuestionRow['correct_answer']){
                     if($selQuestionRow['stud_answer'] == 1){?> 
                      <span class="text-danger"><?=$selQuestionRow['option_1'];?></span>
                    <?php }elseif($selQuestionRow['stud_answer'] == 2){ ?>

                      <span class="text-danger"><?=$selQuestionRow['option_2'];?></span>

                    <?php }elseif($selQuestionRow['stud_answer'] == 3){ ?>

                      <span class="text-danger"><?=$selQuestionRow['option_3'];?></span>

                    <?php }elseif($selQuestionRow['stud_answer'] == 4){ ?>

                      <span class="text-danger"><?=$selQuestionRow['option_4'];?></span>

                    <?php }elseif($selQuestionRow['stud_answer'] == ""){?>

                      <span class="text-danger"><?php echo "Not Attempt";?></span>

                    <?php }    
                    ?> 
                    <!-- <span class="text-danger"><?=$selQuestionRow['stud_answer'];?></span> -->
                  <?php }elseif($selQuestionRow['stud_answer'] = $selQuestionRow['correct_answer']){ 
                    if($selQuestionRow['stud_answer'] == 1){ ?>

                      <span class="text-success"><?=$selQuestionRow['option_1'];?></span>

                    <?php }elseif($selQuestionRow['stud_answer'] == 2){?>

                      <span class="text-success"><?=$selQuestionRow['option_2'];?></span>

                    <?php }elseif($selQuestionRow['stud_answer'] == 3){ ?>

                      <span class="text-success"><?=$selQuestionRow['option_3'];?></span>

                    <?php }elseif($selQuestionRow['stud_answer'] == 4){ ?> 
                      <span class="text-success"><?=$selQuestionRow['option_4'];?></span>
                    <?php }
                    ?>
                 <!-- <span class="text-success"><?=$selQuestionRow['stud_answer'];?></span> 
                 -->
               <?php } ?>
             </td>
             <td>
              <?php if($selQuestionRow['correct_answer']==1){

                echo $selQuestionRow['option_1'];
              }elseif($selQuestionRow['correct_answer']==2){                

                echo $selQuestionRow['option_2'];

              }elseif($selQuestionRow['correct_answer']==3){

                echo $selQuestionRow['option_3'];

              }elseif($selQuestionRow['correct_answer']==4){           

                echo $selQuestionRow['option_4'];
              }
              ?>                  

            </td>
            <td><?php echo $selQuestionRow['marks']; ?></td>
            <td><?php echo $selQuestionRow['negative_marks']; ?></td>
            <!-- <td>15 Mins 25 Sec</td> -->
            <td><?php echo $selQuestionRow['difficulty_level']; ?></td>

          <?php }elseif($selQuestionRow['question_type'] == "true_false"){ ?>

           <td><strong><?php echo $i++; ?></strong></td>
           <td><?=$selQuestionRow['question'];?></td>
           <td>
            <?php if($selQuestionRow['stud_answer'] != $selQuestionRow['correct_answer']){ ?> 
             <span class="text-danger">
              <?php if($selQuestionRow['stud_answer'] == 1){ 
               echo "True"; 
             }elseif($selQuestionRow['stud_answer'] == 2){
               echo "False";
             }?>                      
           </span>  


         <?php }else{ ?>
           <span class="text-success">
            <?php if($selQuestionRow['stud_answer'] == 1 ){ 
             echo "True";
           }elseif($selQuestionRow['stud_answer'] == 2 ){
            echo "False";
          }?>                 
        </span> 

      <?php }?>
    </td>
    <td>
      <?php 
      if($selQuestionRow['correct_answer'] == 1)
      {
       echo "True"; 
     }elseif($selQuestionRow['correct_answer'] == 2)
     {
       echo "False";
     } 
     ?>

   </td>
   <td><?php echo $selQuestionRow['marks']; ?></td>
   <td><?php echo $selQuestionRow['negative_marks']; ?></td>
   <!-- <td>15 Mins 25 Sec</td> -->
   <td><?php echo $selQuestionRow['difficulty_level']; ?></td>


            <?php }//Fill in the blanks and subjective question are left for currently.


           ?>
         </tr>

        <?php }

        ?>

      </table>
    </div>
  </div>
  <!-------End Time Management For Exam--------->

  <!-------Start Solution For Exam--------->

      <div class="container"id="solution-report">
        <div class="row">
          <div class="col-md-12">
            <div class="rtest_heading"><strong>Solution For <?php echo $fetch_Exam['exam_name']; ?> of </strong></div>

            <div class="exam-panel" id="solutions_report">
                <div class="table-responsive">
                  
                <table class="table table-bordered" id="question_data">
                <tr>
                    <th>Q.No.</th>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Solution Of Question</th>
                  </tr>
                  <?php

            //"SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id WHERE eqt.exam_id = '$examId' AND ea.student_id = '$student_id' AND ea.exam_status"
                   $selQuestion = $conn->query("SELECT * FROM questions eqt INNER JOIN exam_answers ea ON eqt.id = ea.question_id WHERE ea.student_id = '$student_id' AND ea.exam_id = '$examId' AND exam_attemp_counter = '$attemptNo'");
               $i = 1;
               if($numRows = mysqli_num_rows($selQuestion) == 0 ){
                echo "No Records found";
              }

              while($selQuestionRow = $selQuestion->fetch_assoc()){ ?>
                    <tr class="text-info">            
                      <?php if($selQuestionRow['question_type'] == "objective"){ ?> 

                      <td><strong><?php echo $i++; ?></strong></td>
                      <td><?php echo$selQuestionRow['question'];?></td>
                      <td><?php echo $selQuestionRow['correct_answer']; ?></td>
                      <td><?php echo $selQuestionRow['explanation']; ?></td>
              

              <?php }elseif($selQuestionRow['question_type'] == "true_false"){ ?>

              <td><strong><?php echo $i++; ?></strong></td>
              <td><?=$selQuestionRow['question'];?></td>
              <td>
              <?php if($selQuestionRow['correct_answer'] == 1)
              {
                echo "True"; 
              }elseif($selQuestionRow['correct_answer'] == 2)
              {
                echo "False";
              } 
              ?>
             </td>
             <td><?php echo $selQuestionRow['explanation']; ?></td>



                <?php }//Fill in the blanks and subjective question are left for currently.


              ?>
            </tr>

            <?php }
            // For Showing Data Enable & Disable... 
          ?>

          </table>





                </div> 
                
             </div>
             
          </div>

        </div>
      </div>

  <!-- <div class="container"id="solution-report">
    <div class="row">
      <div class="col-md-9">
        <div class="rtest_heading"><strong>Solution For </strong><?php echo $fetch_Exam['exam_name'];?></div>

        <div class="exam-panel" id="solution_report">
          <div class="table-responsive">
            <table class="table table-bordered">
             <tr class="text-success">
              <tr>
                <td colspan="3">
                  <strong>Question: 1</strong>&nbsp;&nbsp;The mass number of a nucleus is
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <p>1.  always more than the atomic weight</p>
                  <p>2.  always less than its atomic number</p><p>3.  a fraction</p><p>4. <img src="img/correct_icon.png" alt=""/> the sum of the number of protons and neutrons present in the nucleus</p>	
                </td>
              </tr>
              <tr>
                <td>
                  <strong class="text-warning">Attempt</strong>
                </td>
                <td>
                  <strong class="text-success">Correct</strong>
                </td>																
                <td>
                  <strong>Correct Answer :</strong>&nbsp;<strong class="text-success">Option4</strong>
                </td>			
              </tr>
                <tr>
                  <td>
                    <strong>Max Marks :</strong>&nbsp;&nbsp;4.00
                  </td>
                  <td>
                    <strong>Marks Scored :</strong>&nbsp;&nbsp;4.00
                  </td>
                  <td>
                    <strong>Time Taken :</strong>&nbsp;&nbsp;15 Mins 25 Sec
                  </td>
                </tr>
                <tr>
                  <td colspan="3"><strong>Solution :</strong>&nbsp;&nbsp;No answer description available for this question.
                  </td>
                </tr>					
              </table>
            </div> 

          </div>

        </div>
          <!-- <div class="col-md-3">
            <div class="rtest_heading">Chemistry</div>  
          
          </div> -->
        </div>
      </div> -->



      <!-------End Solution For Exam--------->


      <!-------Start Compare Report For Exam--------->

                <!-- <div class="container" id="compare-report">
                    <div class="rtest_heading"><strong>Compare Report For  </strong>Exam</div>
                    <div class="com-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="table-responsive">
                                <table class="table1">
                                    <tr>
                                        <td>Total Ques.</td>
                                        <td><strong>6</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Maximum Marks</td>
                                        <td><strong>24.00</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Attempted Ques.</td>
                                        <td><strong class="text-success">6</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Unattempted Ques.</td>
                                        <td><strong class="text-danger">0</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Correct Ques.</td>
                                        <td><strong class="text-success">3</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Incorrect Ques.</td>
                                        <td><strong class="text-danger">2</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="table-responsive">
                                <table class="table1">
                                    <tr>
                                        <td>Total Score</td>
                                        <td><strong class="text-primary">10.00/24.00</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Percentage</td>
                                        <td><strong>41.67%</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Percentile</td>
                                        <td><strong>97.75%</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Total Time</td>
                                        <td><strong>10 Mins 48 Sec</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Rank</td>
                                        <td valign="top" rowspan="2"><img src="img/User.png" width="60" height="70" class="img-thumbnail" alt=""/></td>
                                    </tr>
                                    <tr>
                                        <td><div class="rank">2<sup>nd</sup></div></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    
                           <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="table-responsive">
                                    <table class="table1">
                                        <tr>
                                            <td>Total Ques.</td>
                                            <td><strong>6</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Maximum Marks</td>
                                            <td><strong>24.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Attempted Ques.</td>
                                            <td><strong class="text-success">6</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Unattempted Ques.</td>
                                            <td><strong class="text-danger">0</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Correct Ques.</td>
                                            <td><strong class="text-success">3</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Incorrect Ques.</td>
                                            <td><strong class="text-danger">2</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="table-responsive">
                                    <table class="table1">
                                        <tr>
                                            <td>Total Score</td>
                                            <td><strong class="text-primary">10.00/24.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Percentage</td>
                                            <td><strong>41.67%</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Percentile</td>
                                            <td><strong>97.75%</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Total Time</td>
                                            <td><strong>10 Mins 48 Sec</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Rank</td>
                                            <td valign="top" rowspan="2"><img src="img/User.png" width="60" height="70" class="img-thumbnail" alt=""/></td>
                                        </tr>
                                        <tr>
                                            <td><div class="rank">3<sup>nd</sup></div></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>  
              </div> -->


              <!-------ENd Compare Report For Exam--------->


            </div>
            <!-- /#page-content-wrapper -->
          </div>
          <!-- /#wrapper -->

          <!-- Menu Toggle Script -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <!-- Menu Toggle Script -->

          <script>          
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#MenuIcon").click(function(){
        $(".ShowMenu").toggle();
        });
          </script>


          <!--Bootstrap Class CDN Link-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

          <!-----Start Gharph Chart 3 ----->
          <script>

           anychart.onDocumentReady(function () {
            var myMarks = '<?php echo $myMarks; ?>';
            var negMarks = '<?php echo $my_negativeMarks; ?>';
  // create data
  var data = [
  [myMarks],
  [negMarks],
  ];
// create a chart
var chart = anychart.column();

// create a column series and set the data
var series = chart.column(data);

// set the chart title
chart.title("Performance Report For Exam");

// set the titles of the axes
chart.xAxis().title("Manager");
chart.yAxis().title("Score");

 // set the titles of the axes
 var xAxis = chart.xAxis();
 xAxis.title("Student Performance");

// set the container id
chart.container("container3");

// initiate drawing the chart
chart.draw();
});

</script>
<!-----End Gharph Chart 3 ----->



<!-----Start Gharph Chart 4 ----->
<script>

  anychart.onDocumentReady(function () {
    var myMarks = '<?php echo $myMarks; ?>';
    var negMarks = '<?php echo $my_negativeMarks; ?>';


// create data
var data = [
{x: "A", value: myMarks},
{x: "B", value: negMarks},
  // {x: "C", value: 2},
  // {x: "D", value: 3},
  // {x: "E", value: 4}
  ];

// create a chart and set the data
var chart = anychart.pie(data);

// set the chart title
chart.title("Question & Marks Wise Report For Exam");

// set the container id
chart.container("container4");

// initiate drawing the chart
chart.draw();
});

</script>
<!-----End Gharph Chart 4 ----->

<!-----Start Gharph Chart 5 ----->
<script>

  anychart.onDocumentReady(function () {

         // create data
         var data = [
         [8],
         [9],
         [7],
         [3],
         [6],
         [-1],
         ];
       // create a chart
       var chart = anychart.column();
       
       // create a column series and set the data
       var series = chart.column(data);
       
       // set the chart title
       chart.title("Graphical Report For Exam");
       
       // set the titles of the axes
       chart.xAxis().title("Manager");
       chart.yAxis().title("Score");
       
        // set the titles of the axes
        var xAxis = chart.xAxis();
        xAxis.title("Student Performance");

       // set the container id
       chart.container("container5");
       
       // initiate drawing the chart
       chart.draw();
     });

   </script>
   <!-----End Gharph Chart 5 ----->

   <!-----Start Gharph Chart 6 ----->
   <script>

    anychart.onDocumentReady(function () {

      var myMarks = '<?php echo $myMarks; ?>';
      console.log(myMarks);
    // create data
    var data = [
    {x: "My Marks", value: myMarks},
    {x: "My Negative Marks", value: negMarks},
      // {x: "C", value: 2},
      // {x: "D", value: 3},
      // {x: "E", value: 4}
      ];

    // create a chart and set the data
    var chart = anychart.pie(data);
    
    // set the chart title
    chart.title("Subject Wise Time Taken");
    
    // set the container id
    chart.container("container6");
    
    // initiate drawing the chart
    chart.draw();
  });
    
</script>
<!-----End Gharph Chart 6 ----->

<!--Select attempt jquery code START-->
<script>
 $(document).ready(function(){
  $('#attempt_counter').on('change',function(e){
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var exam_id = '<?php echo $_SESSION['examId']; ?>';
    console.log(exam_id);
    console.log("Attempt : ",valueSelected);

    		  url = "view_result.php?exam_id=" + exam_id + "&attempt=" + valueSelected; // Takes the above variables and creates the query to send to your file.
         window.location = url; 

       });
});
</script>
<!--Select attempt jquery code START-->
</body>

</html>