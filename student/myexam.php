    <?php
include "header.php";
$student_id = $_SESSION['student']['id'];

$selStudentDetails = $conn->query("SELECT * FROM student_details WHERE id='$student_id'");
if($selStudentDetails->num_rows > 0){
    $studentData = $selStudentDetails->fetch_assoc();

}
?>

<head>
    <?php head();?>
    <!--jquery funtion calling-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!--SweetAlert CDN-->
    <script>
        $(document).ready(function () {
            $("#today_exam").css({ "background-color": "green", "color": "white" });

            $("#purchased_exam").click(function () {
                $("#today_exam,#expired_exam,#purchased_exam,#upcoming_exam").css({ "background-color": "", "color": "" })
                $(this).css({ "background-color": "green", "color": "white" });
                $("#today").hide();
                $(".purchased_exam").show();
                $("#expired").hide();
                $(".upcoming_exam").hide();
            });
            $("#upcoming_exam").click(function () {
                $("#today_exam,#expired_exam,#purchased_exam,#upcoming_exam").css({ "background-color": "", "color": "" })
                $(this).css({ "background-color": "green", "color": "white" });
                $("#today").hide();
                $("#purchased").hide();
                $("#expired").hide();
                $(".upcoming_exam").show();
            })
            $("#expired_exam").click(function () {
                $("#today_exam,#expired_exam,#purchased_exam,#upcoming_exam").css({ "background-color": "", "color": "" })
                $(this).css({ "background-color": "green", "color": "white" });
                $("#today").hide();
                $("#purchased").hide();
                $(".expired_exam").show();
                $(".upcoming_exam").hide();
            })
            $("#today_exam").click(function () {
                $("#today_exam,#expired_exam,#purchased_exam,#upcoming_exam").css({ "background-color": "", "color": "" })
                $(this).css({ "background-color": "green", "color": "white" });

                $("#today").show();
                $("#purchased").hide();
                $("#expired").hide();
                $(".upcoming_exam").hide();
            })
        });
    </script>
</head>

<!--Start Body Section-->
<div class="container">
    <div class="myexam">
        <h2 id="topheading">My Exams</h2>
        <div class="row">
            <diV class="col-md-3 col-sm-6 btn-group">
                <button type="button" id="today_exam" class="btn btn-default ExamButton">Todays Exam</button>
            </diV>
            <diV class="col-md-3 col-sm-6 btn-group">
                <button type="button" id="purchased_exam" class="btn btn-default ExamButton">Purchased Exam</button>
            </diV>
            <diV class="col-md-3 col-sm-6 btn-group">
                <button type="button" id="upcoming_exam" class="btn btn-default ExamButton">Upcoming Exam</button>
            </diV>
            <diV class="col-md-3 col-sm-6 btn-group">
                <button type="button" id="expired_exam" class="btn btn-default ExamButton">Expired Exam</button> <br>
            </diV>
        </div>
    </div>
</div>
<div class="today_exam" id="today">

    <div class="container mt-3">
        <h4 id="heading">Today Exams</h4>
        <table class="table table-bordered" id="Today_ExamTable">
            <thead class=" ">
                <tr>
                    <th>S.NO</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>Exam Date</th>
                    <th>End Date</th>
                    
                    <th>Amount</th>
                    <th>Total Attempts</th>
                    <th>Remaining Attempts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                $i = 1;               
            
                $fetchallExams = $conn->query("SELECT * FROM student_exams WHERE stud_id = '".$student_id."'");
                while($allExams = $fetchallExams->fetch_assoc()){            
                        //Now fetch todays exams by matching the exam id and today's date compare from stud_exams and exams table...
                    $today = date("Y-m-d"); 
                    $fetchtodayExams = $conn->query("SELECT * FROM exam WHERE id = '".$allExams['exam_id']."' AND exam_date = '".$today."'");
                    while($todayExams = $fetchtodayExams->fetch_assoc()){
                        //Store exam_id in session variable to directly get to attempt exam.php...
                        //$_SESSION['exam_details'] = $todayExams;                      

                     ?>                    
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $todayExams['id']; ?></td>
                            <td><?= $todayExams['exam_name'];?></td>
                            <td><?php if($todayExams['paid_exam'] =="yes"){echo "Paid";
                        }elseif($todayExams['paid_exam'] =="no"){echo "Free";
                    }?>
                </td>
                <td>
                    <?php 
                    $dateformatofDB = $todayExams['start_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);                       
                    // Creating new date format from that timestamp
                    $start_date = date("d-m-Y", $timestamp);
                    echo $start_date; // Outputs: 31-03-2019   
                    ?>
                    
                </td>

                <td>
                    <?php 
                    $dateformatofDB = $todayExams['exam_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);                       
                    // Creating new date format from that timestamp
                    $exam_date = date("d-m-Y", $timestamp);
                    echo $exam_date; // Outputs: 31-03-2019   
                    ?>
                    
                </td>
                <td>
                    <?php 
                    $dateformatofDB = $todayExams['end_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);                       
                    // Creating new date format from that timestamp
                    $end_date = date("d-m-Y", $timestamp);
                    echo $end_date; // Outputs: DD-MM-YYYY   
                    ?>
                </td>            
                <td><?=$todayExams['exam_amount'];?></td>
                <td><?= $todayExams['attempt'];?></td>
                <td>
                    <?php 
                     $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE stud_id='$student_id' AND exam_id = '".$allExams['exam_id']."'");
                     $count=mysqli_num_rows($selAttempt);
                     $attemptRem = $selAttempt->fetch_assoc();
                     echo $rem_atmpt = $todayExams['attempt'] - $attemptRem['attempt_count'];                     
                    ?>
                </td>
                <td>
                    <?php 
                        if($attemptRem['attempt_count'] < $todayExams['attempt']){ ?>
                        <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                    data-target="#myModal" data-placement="top" data-student_name="<?=$allExams['stud_name'];?>" data-exam_id="<?=$todayExams['id']?>" data-pass_percentage="<?=$todayExams['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$todayExams['negative_marking'];?>" data-subject_name="<?=$todayExams['subject_name'];?>" data-exam_duration="<?=$todayExams['exam_duration'];?>" data-exam_total_marks="<?=$todayExams['total_marks'];?>" title="View Details"> <i class='fa fa-edit'></i>
                    </button></a>
                   <!--  <a href="#"><button type="button" class="btn btn-success"data-toggle="modal" data-target="#myModal" 
                    data-toggle="tooltip" data-placement="top" title="Attempt Now"> <i class='fa fa-sign-out'></i></button></a> -->
                
                        <?php }elseif($attemptRem['attempt_count'] = $todayExams['attempt']){?>
                       
                   <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                    data-target="#exampleModal" data-placement="top" data-student_name="<?=$allExams['stud_name'];?>" data-exam_id="<?=$todayExams['id']?>" data-pass_percentage="<?=$todayExams['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$todayExams['negative_marking'];?>" data-subject_name="<?=$todayExams['subject_name'];?>" data-exam_duration="<?=$todayExams['exam_duration'];?>" data-exam_total_marks="<?=$todayExams['total_marks'];?>" title="View Details"> <i class='fa fa-edit'></i>
                    </button></a>
                    
                        </button>
                        <?php }
                    ?>                   
            </td>
        </tr>
        <?php  $i++; }
    }
    ?>

</tbody>
</table>
</div>

</div>

<!--Start Purchased_exam--->
<div class="purchased_exam" id="purchased">
    <div class="purchased_exam" id="purchased">
        <div class="container mt-3">
            <h4>Purchased Exam</h4>
            <table class="table table-bordered" id="purchased_ExamTable">
                <thead class=" ">
                    <tr>
                        <th>S.No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Start Date</th>
                        <th>Exam Date</th>
                        <th>End Date</th>
                        <th>Amount</th>
                        <th>Total Attempt</th>
                        <th>Remaining Attempt</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php 
                    $i = 1;                    
                    $fetchPaidExams = $conn->query("SELECT * FROM student_exams WHERE stud_id = '".$student_id."' AND exam_paid_unpaid_type = 'yes'");

                    while($allPaidExams = $fetchPaidExams->fetch_assoc()){
                             //Now fetch purchased exams by matching the exam id and  date compare from stud_exams and exams table...
                            //echo "SELECT * FROM exam WHERE id = '".$allPaidExams['exam_id']."' AND paid_exam = '".$allPaidExams['exam_paid_unpaid_type']."'";
                        $fetchPaidExam1 = $conn->query("SELECT * FROM exam WHERE id = '".$allPaidExams['exam_id']."' AND paid_exam = '".$allPaidExams['exam_paid_unpaid_type']."'");
                        while($paidExams = $fetchPaidExam1->fetch_assoc()){ ?>
                            <tr>
                                <td><?=$i++;?></td>
                                  <td><?=$paidExams['id'];?></td>
                                <td><?=$paidExams['exam_name'];?></td>
                                <td><?php if($paidExams['paid_exam'] == "yes"){ echo "Paid";}elseif($paidExams['paid_exam'] == "no"){ echo "Free";}?>
                            </td>
                            <td>
                                <?php 
                                    $dateformatofDB = $paidExams['start_date'];
                                    // Creating timestamp from given date
                                    $timestamp = strtotime($dateformatofDB);                       
                                    // Creating new date format from that timestamp
                                    $start_date = date("d-m-Y", $timestamp);
                                    echo $start_date; // Outputs: 31-03-2019   
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $dateformatofDB = $paidExams['exam_date'];
                                    // Creating timestamp from given date
                                    $timestamp = strtotime($dateformatofDB);                       
                                    // Creating new date format from that timestamp
                                    $exam_date = date("d-m-Y", $timestamp);
                                    echo $exam_date; // Outputs: 31-03-2019   
                                ?>
                            </td>
                            <td><?php 
                                $dateformatofDB = $paidExams['end_date'];
                                // Creating timestamp from given date
                                $timestamp = strtotime($dateformatofDB);                       
                                // Creating new date format from that timestamp
                                $end_date = date("d-m-Y", $timestamp);
                                echo $end_date; // Outputs: DD-MM-YYYY   
                                ?>                                    
                            </td>                           
                            <td><?=$paidExams['exam_amount'];?></td>
                             <td><?=$paidExams['attempt'];?></td>
                             <td>
                                <?php 
                                 $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE stud_id='$student_id' AND exam_id = '".$allPaidExams['exam_id']."'");
                                 $count=mysqli_num_rows($selAttempt);
                                 $attemptRem = $selAttempt->fetch_assoc();
                                 echo $rem_atmpt = $paidExams['attempt'] - $attemptRem['attempt_count'];
                                 
                                ?>
                            </td>
                            <!-- <td>                                
                                <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal" data-target="#purchasedExamModal"
                                data-placement="top" data-student_name="<?=$allPaidExams['stud_name'];?>" data-exam_id="<?=$paidExams['id']?>" data-pass_percentage="<?=$paidExams['pass_percentage'];?>" data-data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$paidExams['negative_marking'];?>" data-subject_name="<?=$paidExams['subject_name'];?>" data-exam_duration="<?=$paidExams['exam_duration'];?>"  title="View Details"> <i class='fa fa-edit'></i> </button></a>
                                <a href="#" button type="button" class="btn btn-success" data-toggle="tooltip"
                                data-placement="top" title="Attempt Now"> <i class='fa fa-sign-out'></i></button></a>
                            </td> -->

                             <td>
                                <?php if($attemptRem['attempt_count'] < $paidExams['attempt'] && $today <= $paidExams['end_date'] && $today >= $paidExams['exam_date']){
                                ?>
                                <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal" data-target="#purchasedExamModal"
                                data-placement="top" data-student_name="<?=$allPaidExams['stud_name'];?>" data-exam_id="<?=$paidExams['id']?>" data-pass_percentage="<?=$paidExams['pass_percentage'];?>" data-data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$paidExams['negative_marking'];?>" data-subject_name="<?=$paidExams['subject_name'];?>" data-exam_duration="<?=$paidExams['exam_duration'];?>"  title="View Details"> <i class='fa fa-edit'></i> </button></a>                                                        
                                <?php }elseif($today < $paidExams['exam_date']){ ?>
                       
                               <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                                data-target="#exampleModal1" data-placement="top" title="View Details"> <i class='fa fa-edit'></i>
                                </button></a>                               
                                   
                            <?php }elseif($attemptRem['attempt_count'] = $paidExams['attempt']){ ?>
                       
                               <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                                data-target="#exampleModal" data-placement="top" title="View Details"> <i class='fa fa-edit'></i>
                                </button></a>
                                
                                    
                            <?php } ?>                              
                            
                        </td>
                        </tr>

                    <?php }

                }?>

            </tbody>
        </table>
    </div>

</div>

</div>
<!--End Purchased_exam--->

<!--Start Upcoming exam--->
<div class="upcoming_exam">

    <div class="container mt-3">
        <h3>Upcoming Exams</h3>
        <table class="table table-bordered" id="upcoming_ExamTable">
            <thead class=" ">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>Exam Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    <th>Total Attempts</th>                   
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                $fetch_upcomingExams = $conn->query("SELECT * FROM student_exams WHERE stud_id = '".$student_id."'");
                while($upcomingExams = $fetch_upcomingExams->fetch_assoc()){
                    //Now fetch those exams that are upcoming in future by matching today's date with those date from exams table...
                    $today = date("Y-m-d");
                    //echo "SELECT * FROM exam WHERE id = '".$upcomingExams['exam_id']."' AND start_date > '".$today."'";
                    $upcomingExams1 = $conn->query("SELECT * FROM exam WHERE id = '".$upcomingExams['exam_id']."' AND exam_date > '".$today."'");
                    while($upcoming = $upcomingExams1->fetch_assoc()){ ?>
                        <tr>
                        <td>1</td>
                        <td><?=$upcoming['exam_name'];?></td>
                            <td><?php if($upcoming['paid_exam'] == "yes"){ echo "Paid";}elseif($upcoming['paid_exam'] == "no"){ echo "Free";}?></td>
                            <td>
                                <?php 
                                    $dateformatofDB = $upcoming['start_date'];
                                    // Creating timestamp from given date
                                    $timestamp = strtotime($dateformatofDB);                       
                                    // Creating new date format from that timestamp
                                    $start_date = date("d-m-Y", $timestamp);
                                    echo $start_date; // Outputs: DD-MM-YYYY   
                                    ?>
                                        
                            </td>
                            <td>                                
                                <?php 
                                $dateformatofDB = $upcoming['exam_date'];
                                // Creating timestamp from given date
                                $timestamp = strtotime($dateformatofDB);                       
                                // Creating new date format from that timestamp
                                $exam_date = date("d-m-Y", $timestamp);
                                echo $exam_date; // Outputs: DD-MM-YYYY   
                                ?>                    
                            </td>
                            
                            <td>                                
                                <?php 
                                $dateformatofDB = $upcoming['end_date'];
                                // Creating timestamp from given date
                                $timestamp = strtotime($dateformatofDB);                       
                                // Creating new date format from that timestamp
                                $end_date = date("d-m-Y", $timestamp);
                                echo $end_date; // Outputs: DD-MM-YYYY   
                                ?>                    
                            </td>
                            <td>
                                <?php 
                                echo $upcoming['exam_amount'];                                 
                                ?>     
                            </td>
                            <td><?=$upcoming['attempt'];?></td>
                            
                            
                            <td>
                            <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal" data-target="#upcomingExamModal"
                            data-placement="top" data-student_name="<?=$upcomingExams['stud_name'];?>" data-exam_id="<?=$upcoming['id']?>" data-pass_percentage="<?=$upcoming['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$upcoming['negative_marking'];?>" data-subject_name="<?=$upcoming['subject_name'];?>" data-exam_duration="<?=$upcoming['exam_duration'];?>" title="View Details"> <i class='fa fa-edit'></i> </button></a>
                        </td>
                    </tr>
                    <?php }

                } ?>


            </tbody>
        </table>
    </div>

</div>

<!--End Upcoming exam--->

<!--Start Expired exam--->
<div class="expired_exam" id="expired">

    <div class="container mt-3">
        <h3>Expired Exams</h3>
        <table class="table table-bordered" id="expired_ExamTable">
            <thead class=" ">
                <tr>
                    <th>S.No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>Exam Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    <th>Total Attempts</th>
                    <th>Remaining Attempts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                $i =1;
                $fetch_expiredExams = $conn->query("SELECT * FROM student_exams WHERE stud_id = '".$student_id."'");
                while($expirtedExams = $fetch_expiredExams->fetch_assoc()){
                    //Now fetch those exams that are upcoming in future by matching today's date with those date from exams table...
                    $today = date("Y-m-d");
                    //echo "SELECT * FROM exam WHERE id = '".$expirtedExams['exam_id']."' AND start_date < '".$today."'";
                    $expiredExams1 = $conn->query("SELECT * FROM exam WHERE id = '".$expirtedExams['exam_id']."' AND exam_date < '".$today."'");
                    while($expired = $expiredExams1->fetch_assoc()){ 
                            //$_SESSION['exam_details'] = $expired;
                        ?>
                        <tr>
                        <td><?=$i;?></td>
                        <td><?=$expired['id'];?></td>
                        <td><?=$expired['exam_name'];?></td>
                            <td><?php if($expired['paid_exam'] == "yes"){ echo "Paid";}elseif($expired['paid_exam'] == "no"){ echo "Free";}?></td>
                            <td>
                                <?php 
                                 $dateformatofDB = $expired['start_date'];
                                 // Creating timestamp from given date
                                 $timestamp = strtotime($dateformatofDB);                       
                                 // Creating new date format from that timestamp
                                 $start_date = date("d-m-Y", $timestamp);
                                 echo $start_date; // Outputs: DD-MM-YYYY   
                                ?>                                   
                            </td>
                            <td>
                                 <?php 
                                 $dateformatofDB = $expired['exam_date'];
                                 // Creating timestamp from given date
                                 $timestamp = strtotime($dateformatofDB);                       
                                 // Creating new date format from that timestamp
                                 $exam_date = date("d-m-Y", $timestamp);
                                 echo $exam_date; // Outputs: DD-MM-YYYY   
                                ?>  
                            </td>

                            <td>
                                 <?php 
                                 $dateformatofDB = $expired['end_date'];
                                 // Creating timestamp from given date
                                 $timestamp = strtotime($dateformatofDB);                       
                                 // Creating new date format from that timestamp
                                 $end_date = date("d-m-Y", $timestamp);
                                 echo $end_date; // Outputs: DD-MM-YYYY   
                                ?>  
                            </td>
                            
                            <td>
                                <?php 
                                 echo $exam_amount = $expired['exam_amount'];                       
                                ?>
                              </td>
                            <td><?=$expired['attempt'];?></td>
                            <td>
                                <?php 
                                 $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE stud_id='$student_id' AND exam_id = '".$expirtedExams['exam_id']."'");
                                 $count=mysqli_num_rows($selAttempt);
                                 $attemptRem = $selAttempt->fetch_assoc();
                                 echo $rem_atmpt = $expired['attempt'] - $attemptRem['attempt_count'];
                                 
                                ?>
                            </td>

                            <td>
                                <?php if($attemptRem['attempt_count'] < $expired['attempt'] && $today <= $expired['end_date']){
                                ?>
                                <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal" data-target="#expiredExamModal" 
                            data-placement="top" data-student_name="<?=$expirtedExams['stud_name'];?>"  data-exam_id="<?=$expired['id']?>" data-pass_percentage="<?=$expired['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$expired['negative_marking'];?>" data-subject_name="<?=$expired['subject_name'];?>" data-exam_duration="<?=$expired['exam_duration'];?>" title="View Details"><i class='fa fa-edit'></i> </button></a>                                
                                <?php }elseif($attemptRem['attempt_count'] = $expired['attempt']){?>
                       
                               <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                                data-target="#exampleModal" data-placement="top" title="View Details"> <i class='fa fa-edit'></i>
                                </button></a>
                                
                                    </button>
                        <?php }?>

                               
                            
                        </td>
                    </tr>
                    <?php $i++;}

                } ?>
            </tbody>
        </table>
    </div>

</div>

<!--Today Exams Box modal START-->
<div class="container">
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">My Exam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="row" id="exam-info">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Name : </strong><strong class="text-success"><span id="today_stud_name"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Passing Percentage : </strong><strong class="text-danger"><span id="today_pass_percentage"></span>%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Start Date : </strong><strong class="text-success"><span id="today_start_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>End Date : </strong><strong class="text-success"><span id="today_end_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Negative Marking : </strong><strong class="text-info"><span id="today_negative_marking"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Subject : </strong><strong class="text-danger"><span id="today_exam_subject"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Type : </strong><strong class="text-info">Preparation</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Duration : </strong><strong class="text-info"><span id="today_exam_duration"></span> Mins</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Total : </strong><strong class="text-info"><span id="today_exam_total_marks"></span> Marks</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">

                            <div class="container" id="image-cart">
                                <div class="card_img">
                                    <img class="card-img-top" src="../uploads/student-profile_pic/<?php if($studentData['student_photo'] == NULL){ echo "no-image.png";}else{ echo $studentData['student_photo'];}?>" id="img-user">
                                    <div class="card-body"> <br>
                                        <hr>
                                        <h5 class="userName" id="student_name_box_modal1"><?=$studentData['student_fname']." ".$studentData['student_lname'];?></h5>
                                        <!-- <p class="card-text">Some example text some example text.</p> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>                    


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="hidden" name="today_hidden_exam_id" id="today_hidden_exam_id">
                    <a href="instruction.php"  target="_blank"><button type="button" class="btn btn-success next" id="next-instraction" data-submit="modal">Next</button></a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>

</div>
<!--Today Exams Box modal END-->

<!--Purchased Exams Box modal START-->
<div class="container">
    <!-- The Modal -->
    <div class="modal" id="purchasedExamModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">My Purchased Exam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="row" id="exam-info">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Name : </strong><strong class="text-success"><span id="purchased_stud_name"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Passing Percentage : </strong><strong class="text-danger"><strong class="text-danger"><span id="purchased_pass_percentage"></span>%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Start Date : </strong><strong class="text-success"><span id="purchased_start_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>End Date : </strong><strong class="text-success"><span id="purchased_end_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Negative Marking : </strong><strong class="text-info"><span id="purchased_negative_mark"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Subject : </strong><strong class="text-danger"><span id="purchased_subject_name"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Type : </strong><strong class="text-info">Preparation</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Duration : </strong><strong class="text-info"><span id="purchased_exam_duration"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Total : </strong><strong class="text-info"><span id="purchased_exam_total_marks"></span> Marks</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">

                            <div class="container" id="image-cart">
                                <div class="card_img">
                                    <img class="card-img-top" src="../uploads/student-profile_pic/<?php if($studentData['student_photo'] == NULL){ echo "no-image.png";}else{ echo $studentData['student_photo'];}?>" id="img-user">
                                    <div class="card-body"> <br>
                                        <hr>
                                        <h5 class="userName" id="student_name_box_modal2">Rma Singh</h5>
                                        <!-- <p class="card-text">Some example text some example text.</p> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>                    


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="instruction.php"  target="_blank"><button type="button" class="btn btn-success" id="next-instraction" data-submit="modal">Next</button></a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>

</div>

<!--Purchased Exams Box modal END-->

<!--Upcoming Exams Box modal START-->
<div class="container">
    <!-- The Modal -->
    <div class="modal" id="upcomingExamModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">My Upcoming Exam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="row" id="exam-info">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Name : </strong><strong class="text-success"><span id="upcoming_stud_name"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Passing Percentage : </strong><strong class="text-danger"><strong class="text-danger"><span id="upcoming_pass_percentage"></span>%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Start Date : </strong><strong class="text-success"><span id="upcoming_start_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>End Date : </strong><strong class="text-success"><span id="upcoming_end_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Negative Marking : </strong><strong class="text-info"><span id="upcoming_negative_mark"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Subject : </strong><strong class="text-danger"><span id="upcoming_subject_name"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Type : </strong><strong class="text-info">Preparation</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Duration : </strong><strong class="text-info"><span id="upcoming_exam_duration"></span></strong></td>
                                </tr>
                               <tr>
                                    <td><strong>Total : </strong><strong class="text-info"><span id="upcoming_exam_total_marks"></span> Marks</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">

                            <div class="container" id="image-cart">
                                <div class="card_img">
                                    <img class="card-img-top" src="../uploads/student-profile_pic/<?php if($studentData['student_photo'] == NULL){ echo "no-image.png";}else{ echo $studentData['student_photo'];}?>" id="img-user">
                                    <div class="card-body"> <br>
                                        <hr>
                                        <h5 class="userName" id="student_name_box_modal3">Rma Singh</h5>
                                        <!-- <p class="card-text">Some example text some example text.</p> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>                    


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <a href="instruction.php"  target="_blank"><button type="button" class="btn btn-success" id="next-instraction" data-submit="modal">Next</button></a> -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>

</div>

<!--Upccoming Exams Box modal END-->

<!--Expired Exams Box modal START-->
<div class="container">
    <!-- The Modal -->
    <div class="modal" id="expiredExamModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">My Expired Exam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   
                    <div class="row" id="exam-info">
                        <div class="col-md-6">
                             <table class="table">
                                <tr>
                                    <td><strong>Name : </strong><strong class="text-success"><span id="expired_stud_name"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Passing Percentage : </strong><strong class="text-danger"><span id="expired_pass_percentage"></span>%</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Start Date : </strong><strong class="text-success"><span id="expired_start_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>End Date : </strong><strong class="text-success"><span id="expired_end_date"></span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Negative Marking : </strong><strong class="text-info"><span id="expired_negative_mark"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Subject : </strong><strong class="text-danger"><span id="expired_subject_name"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Type : </strong><strong class="text-info">Preparation</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Duration : </strong><strong class="text-info"><span id="expired_exam_duration"></span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Total : </strong><strong class="text-info"><span id="expired_exam_total_marks"></span> Marks</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">

                            <div class="container" id="image-cart">
                                <div class="card_img">
                                    <img class="card-img-top" src="../uploads/student-profile_pic/<?php if($studentData['student_photo'] == NULL){ echo "no-image.png";}else{ echo $studentData['student_photo'];}?>" id="img-user">
                                    <div class="card-body"> <br>
                                        <hr>
                                        <h5 class="userName" id="student_name_box_modal4"></h5>
                                        <!-- <p class="card-text">Some example text some example text.</p> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>                    


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="hidden" name="expired_hidden_exam_id" id="expired_hidden_exam_id">
                 <a href="instruction.php"  target="_blank"><button type="button" class="btn btn-success next_exp" id="next-instraction" data-submit="modal">Next</button></a>                
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>

</div>

<!--Expired Exams Box modal END-->

<!--End Expired exam--->
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <h5 class="modal-title" id="exampleModalLabel">No More Attempts left</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <h5 class="modal-title" id="exampleModalLabel">Exam Coming Soon!! Please Wait for exam date</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- </div>

            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2020 <a href="https://www.examin.com">Examin</a>.</strong> All rights
                reserved.
                <div class="float-right d-none d-sm-inline-block">
                   <b>Version</b> 3.1.0-rc
                </div>
            </footer>

        </div> -->

        <!--End Body Section-->

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

<!--For Table data Search-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#Today_ExamTable').DataTable();
         $("#Today_ExamTable").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden; overflow-x:scroll;'></div>"); 

          $('#purchased_ExamTable').DataTable();
         $("#purchased_ExamTable").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>");

          $('#upcoming_ExamTable').DataTable();
         $("#upcoming_ExamTable").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>");

         $('#expired_ExamTable').DataTable();
         $("#expired_ExamTable").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>");

            
    });
</script>
<!--For Table data Search End-->

<!--for Tooltrip Class-->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

     //This function will call when view exam detail button will be clicked.
     $('.view_details').on("click",function(){
        //alert("view exam button click ");
        //Get the value of data attributes when view details button is clicked..
        var student_name = $(this).data('student_name');
        var exam_id = $(this).data('exam_id');
        var pass_percentage = $(this).data('pass_percentage');
        var exam_date = $(this).data('exam_date');
        var end_date = $(this).data('end_date');
        var negative_marking = $(this).data('negative_marking');
        var subject_name = $(this).data('subject_name');
        var exam_duration = $(this).data('exam_duration');
        var exam_total_marks = $(this).data('exam_total_marks');

        //Assign the value of data attributes to relative box modals..
        $("#today_stud_name").text(student_name);
        $("#today_pass_percentage").text(pass_percentage);
        $("#today_start_date").text(exam_date);
        $("#today_end_date").text(end_date);
        $("#today_negative_marking").text(negative_marking);
        $("#today_exam_subject").text(subject_name);
        $("#today_exam_duration").text(exam_duration);
        $("#today_hidden_exam_id").val(exam_id);
        $("#today_exam_total_marks").text(exam_total_marks);
        $("#student_name_box_modal1").text(student_name);

        $("#purchased_stud_name").text(student_name);
        $("#purchased_pass_percentage").text(pass_percentage);
        $("#purchased_start_date").text(exam_date);
        $("#purchased_end_date").text(end_date);
        $("#purchased_negative_mark").text(negative_marking);
        $("#purchased_subject_name").text(subject_name);
        $("#purchased_exam_duration").text(exam_duration);
        $("#purchased_exam_total_marks").text(exam_total_marks);
        $("#student_name_box_modal2").text(student_name);

        $("#upcoming_stud_name").text(student_name);
        $("#upcoming_pass_percentage").text(pass_percentage);
        $("#upcoming_start_date").text(exam_date);
        $("#upcoming_end_date").text(end_date);
        $("#upcoming_negative_mark").text(negative_marking);
        $("#upcoming_subject_name").text(subject_name);
        $("#upcoming_exam_duration").text(exam_duration);
        $("#upcoming_exam_total_marks").text(exam_total_marks);
        $("#student_name_box_modal3").text(student_name);

        $("#expired_stud_name").text(student_name);
        $("#expired_pass_percentage").text(pass_percentage);
        $("#expired_start_date").text(exam_date);
        $("#expired_end_date").text(end_date);
        $("#expired_negative_mark").text(negative_marking);
        $("#expired_subject_name").text(subject_name);
        $("#expired_exam_duration").text(exam_duration);
        $("#expired_exam_total_marks").text(exam_total_marks);
        $("#student_name_box_modal4").text(student_name);
        $('#expired_hidden_exam_id').val(exam_id);

     });

$('.next').on("click",function(){
    var exam_id = $('#today_hidden_exam_id').val();
    //alert(exam_id);
    $.ajax({
        url: 'instruction.php',
        type: 'POST',
        data: {exam_id: exam_id },
        success: function(data){
            //alert(data);
        },
        error:function(err){
            console.log("ERROR: ",err);
        }
    });
 });

 $('.next_exp').on("click",function(){
    var exam_id = $('#expired_hidden_exam_id').val();
    //alert(exam_id);
    $.ajax({
        url: 'instruction.php',
        type: 'POST',
        data: {exam_id: exam_id },
        success: function(data){

        },
        error:function(err){
            console.log("ERROR: ",err);
        }
    });
 });  


});
</script>

<!--Bootstrap Class CDN Link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<?php 
if(isset($_GET['msg']) && $_GET['msg']=="success"){ ?>
   <script>

    swal({
      title: "<?php echo $_GET['msg']; ?>",
      text: "Exam is Submitted!",
      icon: "<?php echo 'success'; ?>",
      button: "OK, Done",
    });
    $('.swal-button--confirm').click(function(){
      window.location.href = 'myexam.php';
    });

  </script>

<?php }?>


</body>

</html>