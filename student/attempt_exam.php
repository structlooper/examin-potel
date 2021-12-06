<?php
ob_start();
require_once '../includes/config.php';
if(!isset($_SESSION['student'])){
// echo "<script>window.location='../index.php'</script>";
echo "<script>window.location='login.php'</script>";
}else{
$student_id = $_SESSION['student']['id'];
}

if(isset($_GET['SID']) && $_GET['SID'] !=''){
	$SessionID = $_GET['SID'];

	//Fetch this session data if status is 0 redirect to another page, if status is 1 means session is valid and stay on this page.
	$selSessionData = $conn->query("SELECT * FROM exam_sessions WHERE session_id = '$SessionID'");
	$sessionData = $selSessionData->fetch_assoc();
	$sessionStatus = $sessionData['status'];
	if($sessionStatus == 0){
		echo "sadfasfdasfasfdasfdasfdasfdasfdsf";
		//Redirect
		header('location:myexam.php');
		exit;
	}else{

	}
}


if(isset($_SESSION['exam_details']) && !empty($_SESSION['exam_details'])){
$exam_id = $_SESSION['exam_details']['id'];
$subject_name = $_SESSION['exam_details']['subject_name'];
$exam_duration = $_SESSION['exam_details']['exam_duration'];
$_SESSION['duration'] = $exam_duration;

$questions_List = $_SESSION['exam_details']['questions_ids'];
}else{
echo "You have not select any exam to attempt";
}

//Fetch some basic details like total number of questions related to this exam..
//echo "SELECT count(*) as total_questions FROM questions WHERE id IN($questions_List)";
$total_questions = $conn->query("SELECT count(*) as total_questions FROM questions WHERE id IN($questions_List)");
$total = $total_questions->fetch_assoc();
$total_questions = $total['total_questions'];

//Fetch session related data..
$exam_sessions = $conn->query("SELECT * FROM exam_sessions WHERE student_id = '$student_id' AND exam_id = '$exam_id'");
$exam_session1 = $exam_sessions->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!--My CSS-->
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="jquery-3.5.1.min.js"></script> -->

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Basic Graph Chart -->
<script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-cartesian.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-base.min.js"></script>

<!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!--SweetAlert CDN-->

</head>
<body onmousedown="return false" onselectstart="return false">

<div class="container-flued" id="Attempt_exam">

<div class="container-flued">
<div class="row">
<!-- For Exam Perpouse -->
<div class="col-md-8">
<div class="sub-title">
<h4>Subject Name : </strong><strong class="text-success"><?=$subject_name; ?></strong></h4>
<div>Time Left <span id="time">00:00</span> minutes!</div>
</div>
<div class="container">
<div class="question">
<div class="all_question">
<form id="exam_question_form" method="post" action="submit-exam.php">
<?php
$i = 1;
$all_question_list = $conn->query("SELECT * FROM questions WHERE id IN($questions_List)");
while($question_list = $all_question_list->fetch_assoc()){

if(strtolower($question_list['question_type']) == "objective"){
	$question = strip_tags($question_list['question']);?>

		<!-- <div class="row"> -->
		<div class="question_class specific_<?=$i;?>" style="height:300px;">
			<div>

			<span class="question_title" ><strong style=" margin-top: 10px !important;">Q.<?php echo $i; ?> :- </strong><span class="question_list_detail_p"><?php echo $question_list['question'];?></span></span>

			<!-- <form id="exam_question_form" method="post" action="submit-exam.php"> -->

			<input type="hidden" name="question_id[<?=$i;?>]" value="<?=$question_list['id']; ?>">
			<input type="hidden" name="question[<?=$i;?>]" value="<?=$question;?>">
			</div>
		<!-- <div class="col-md-2 radio"> -->

		<label class="option_exam col-md-2">A
            <input type="checkbox" qid="<?=$i;?>"  op_id="1" id="ans_1<?= $i; ?>" name="answer[<?=$i;?>]" class="option_<?=$i;?> common_class " value="1">
            <span class="option_list_all " > <?= $question_list['option_1'];?></span>
        </label>
		<!-- </div> -->

		<!-- <div class="col-md-2 radio"> -->
		<label class="option_exam col-md-2">B
            <input type="checkbox" qid="<?=$i;?>" op_id="2"  id="ans_2<?= $i; ?>" name="answer[<?=$i;?>]" class="option_<?=$i;?> common_class" value="2">
            <span class="option_list_all" > <?= $question_list['option_2'];?> </span></label>
		<!-- </div> -->

		<!-- <div class="col-md-2 radio"> -->
		<label class="option_exam col-md-2">C
            <input type="checkbox" qid="<?=$i;?>" op_id="3"  id="ans_3<?= $i; ?>" name="answer[<?=$i;?>]" class="option_<?=$i;?> common_class" value="3">
            <span class="option_list_all special_3_row"  ><?=$question_list['option_3'];?></span></label>
		<!-- </div> -->

		<!-- <div class="col-md-2 radio"> -->
		<label class="option_exam col-md-2">
        D <input type="checkbox" qid="<?=$i;?>" op_id="4"   id="ans_4<?= $i; ?>" name="answer[<?=$i;?>]" class="option_<?=$i;?> common_class" value="4">
        <span class="option_list_all" > <?=$question_list['option_4'];?>
        </span></label>
		<!-- </div> -->

		</div>
		<style>
		.p, p{
		margin-top: -25px;
		}
         .option_list_all{
         width: 90% !important;
         position: absolute;
         white-space: break-spaces;
         margin-left: 5px;
          }
         .special_3_row p{
           margin-block: auto;
          }
		label{
		margin-top: 30px;
		}
		p img{
		margin-top: 2%;
		}
		.question_list_detail_p p{
			position: relative;
            margin-left: 45px;
            padding: 10px;
            top: -8px;
            white-space: break-spaces;
		}
		</style>

<?php }elseif(strtolower($question_list['question_type']) == "true_false"){
 ?>
<div class=" question_class specific_<?=$i;?> " style="height:200px;">
	<div>
	<!-- <strong>Q.<?php echo $i; ?> :- </strong><?php echo $question_list['question'];?> -->
	<span class="question_title" ><strong style=" margin-top: 10px !important;">Q.<?php echo $i; ?> :- </strong> <?php echo $question_list['question'];?></span>

<input type="hidden" name="question_id[<?=$i;?>]" value="<?=$question_list['id']; ?>">
<input type="hidden" name="question[<?=$i;?>]" value="<?php echo strip_tags($question_list['question']);?>">
</div>


<label>A <input type="checkbox" qid="<?=$i;?>" name="answer[<?=$i;?>]" value="1" qid="<?=$i;?>" class="option_<?=$i;?> common_class"> True</label>


<label>B <input type="checkbox" qid="<?=$i;?>" name="answer[<?=$i;?>]" value="2" qid="<?=$i;?>" class="option_<?=$i;?> common_class"> False</label>


</div>

<?php }

elseif(strtolower($question_list['question_type']) == "fill_in_blank"){ ?>

<div class="question_class specific_<?=$i;?>" style="height:200px;">
<p><strong>Q.<?php echo $i; ?> :- </strong><?= $question;?></p>
<input type="hidden" name="question_id[<?=$i;?>]" value="<?=$question_list['id']; ?>">
<input type="hidden" name="question[<?=$i;?>]" value="<?=$question;?>">
<div class="radio">
<label style="width: 100%;"><input type="text" qid="<?=$i;?>" name="answer[<?=$i;?>]" class="common_class option_<?=$i;?>" style="height:100px; width: 100%; resize: none;"></label>
</div>
</div>

<?php }elseif($question_list['question_type']=="subjective"){ ?>
<div class="question_class specific_<?=$i;?>" style="height:200px;">
<p><strong>Q.<?php echo $i; ?> :- </strong><?= $question;?></p>

<input type="hidden" name="question_id[<?=$i;?>]" value="<?=$question_list['id']; ?>">
<input type="hidden" name="question[<?=$i;?>]" value="<?=$question;?>">
<div class="radio">
<label> Answer should be 500 charecters</label>
<input type="text" qid="<?=$i;?>" class="common_class option_<?=$i;?>" name="answer[<?=$i;?>]" style="height:100px; width: 100%; resize: none;">
</div>
</div>

<!-- <input type="hidden" name="student_id" value="<?=$student_id; ?>">
<input type="hidden" name="exam_id" value="<?=$exam_id; ?>">
</form> -->

<?php }?>

<?php $i++; } ?>

<input type="hidden" name="exam_submit">
</form>
</div>
</div>

</div>

<div class="next-prev">
<button type="button" class="btn btn-success prev" id="prev">Prev</button>
<button type="button" class="btn btn-success next" id="next">Next</button>
<button type="submit" class="btn btn-success submit" id="submit">Submit</button>
</div>


</div>
<!-- End Question Section -->

<!-- Display Question Details -->
<div class="col-md-4" id="Qdetails">
<div class="sub-title">
<h4>Total
: </strong><strong class="text-success">Attempt Details</strong></h4>
</div>


<?php
$i= 1;
//Qestion list exam_id wise...
$fetch_quest = $conn->query("SELECT * FROM questions WHERE id IN($questions_List)");
while($question_list = $fetch_quest->fetch_assoc()){?>

<button type="button" class="ques sidebar_q_<?=$i;?>" id="ques_<?=$i;?>"><?php echo $i; ?></button>

<?php $i++; }?>

<hr>
<div class="attemptHint">
<h5>Quetion Hint </h5>
<label><button type="button" class="ques" id="ques49"></button>Not Viewed &nbsp;&nbsp;</label>
<label><button type="button" class="ques btn-success" id="ques49"></button>Attended</label> <br>
<label><button type="button" class="ques btn-warning" id="ques49"></button>Not Attended</label>
<label><button type="button" class="ques btn-info" id="ques49"></button>Marked</label>
</div>

</div>
</div>

</div>



</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>

$(document).ready(function(){
	document.addEventListener('contextmenu', event => event.preventDefault());
$('.prev').hide();
$('#submit').hide();
var i = 1;
var arr = [];
var arrJson = {};
var check = false;

$('.sidebar_q_'+i).css("background-color","#17a2b8");//Sky blue


var total_questions = "<?php echo $total_questions;?>";
//console.log("Total Questiona are: "+total_questions);

$('.question_class').hide();
$('.specific_'+i).show();

//Check the types of radio or input answer fiels then assign i to arrjson...
$('.common_class').click(function(){
var qid = $(this).attr("qid");
check = true;
var type = $(this).attr("type");
if(type == "checkbox"){
    if($(this).is(':checked')){
        $('.option_'+i).prop('checked',false)
        $(this).prop('checked',true)
    }
    // $(this).prop('checked', false);
    if($(this).is(':checked')){
        arrJson[i] = i;
    }else{
        delete arrJson[i];
    }

}
else if(type == "text"){
$(this).keypress(function(){
if($(this).val().length > 0){
arrJson[i] = i;
}
})
}

//arr.push(arrJson);
//console.log(arrJson);
})


//###########This code will be run when next button will be click########
$('.next').on('click',function(){
$('.prev').show();


if(arrJson[i]){
$('.sidebar_q_'+i).css("background-color","#1e7e34");//Green
}else{
$('.sidebar_q_'+i).css("background-color","#ffc107"); //orange not attended
}

check = false;

i = i+1;


$('.question_class').hide();
$('.specific_'+i).show();

//when next will be clicked the question will be skyblue untill any option is selected once the option is select the next code block will change the color..
$('.sidebar_q_'+i).css("background-color","#17a2b8"); //skyblue

if(i >= total_questions){
//$('.next').prop('disabled',true);
$('.next').attr('disabled', 'disabled');
$('#submit').show();
}
$('.prev').removeAttr('disabled');

});



//###########This code will be run when next button will be click END ########

//#########Previous button logic START ############
$('.prev').on('click',function(){
//i = i-1;
//console.log(i);

if(arrJson[i]){
$('.sidebar_q_'+i).css("background-color","#1e7e34");//Green
}else{
$('.sidebar_q_'+i).css("background-color","#ffc107"); //orange not attended
}

i = i-1;
$('.question_class').hide();
$('.specific_'+i).show();
$('.sidebar_q_'+i).focus().css("background-color","#17a2b8");;
$('.next').removeAttr("disabled");

//check if this is the 1st question or not if it is 1st question then disable previous button.
if(i <= 1){
$('.prev').attr('disabled', 'disabled')
}
});

//#########Previous button logic END ############

/*#################### Form submission logic ####################*/

$('.submit').click(function(){

//console.log($('#exam_question_form').serialize());
// var form = document.getElementById("exam_question_form");
// console.log(form);
$.ajax({
type: 'post',
url: 'submit-exam.php',
data: $('#exam_question_form').serialize(),
success: function(response){
// setTimeout(function(){// wait for 5 secs(2)
// location.reload(); // then reload the page.(3)
// }, 1000);

var msg = '';
if(response == 1){
//alert("1")
//window.location = 'index.php'
 sessionStorage.clear();
swal({
title: "Exam Submitted Successfully",
//text: "You clicked the button!",
icon: "success",
button: "OK, Done",
});
$('.swal-button--confirm').click(function(){
  window.location.href = 'result.php';
});

}else if(respons ==0){
//alert("2")
//msg = "Something went wrong while submitting the exam";
swal({
title: "Something went wrong while submitting the exam",
//text: "You clicked the button!",
icon: "error",
button: "OK, Done",
});
$('.swal-button--confirm').click(function(){
  window.location.href = 'myexam.php';
});
}
$('#loginmessage').html(msg);
},
error:function(err){
console.log(err);
}

});

// $('#submit').hide();
});
});
/*#################### Form submission logic END ####################*/
</script>

<script>

if(sessionStorage.getItem("total_seconds")){
    var total_seconds = sessionStorage.getItem("total_seconds");
} else {
    var total_seconds = 60 * '<?=$exam_duration?>';
}
var minutes = parseInt(total_seconds/60);
var seconds = parseInt(total_seconds%60);

function countDownTimer(){
    if(seconds < 10){
        seconds= "0"+ seconds ;
    }if(minutes < 10){
        minutes= "0"+ minutes ;
    }

    document.getElementById("time").innerHTML =minutes+":"+seconds;
    if(total_seconds <= 0){
        setTimeout("document.quiz.submit()",1);
        alert("time out")
        sessionStorage.clear();
        	$.ajax({
			type: 'post',
				url: 'submit-exam.php',
				data: $('#exam_question_form').serialize(),
				success: function(response){
				if(response == 1){

					swal({
					title: "Exam Submitted Successfully",
					//text: "You clicked the button!",
					icon: "success",
					button: "OK, Done",
					});
					$('.swal-button--confirm').click(function(){
					  window.location.href = 'myexam.php';
					});
				}else{
					msg = "Invalid username and password";
				}
				},
				error:function(err){
					console.log(err);
				}

			});
    } else {

          $.ajax({
                type: 'POST',
                url: 'stud_ajax/checkTimeout.php',
                data:{sessionID:'<?php echo $SessionID;?>'},
                success: function(data) {
                 total_seconds = data;
                 //console.log(total_seconds);
                },
                error: function(xhr, statusText, err) {
                  alert("error"+xhr.status);
                },

            });
        //total_seconds = total_seconds -1 ;
        minutes = parseInt(total_seconds/60);
        seconds = parseInt(total_seconds%60);
        // sessionStorage.setItem("total_seconds",total_seconds);
        setTimeout("countDownTimer()",1000);
    }
}
setTimeout("countDownTimer()",1000);

</script>

<?php
if(isset($_SESSION['status']) && $_SESSION['status']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status']; ?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code']; ?>",
button: "OK, Done",
});
</script>
<?php
unset($_SESSION['status']);
//header('location: http://localhost/softonic/examin/student/');
}
?>


</body>
</html>