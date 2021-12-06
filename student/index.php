<?php
include "header.php";
$student_id = $_SESSION['student']['id'];
$class_id = $_SESSION['student']['class_id'];

$selStudentDetails = $conn->query("SELECT * FROM student_details WHERE id='$student_id'");
if($selStudentDetails->num_rows > 0){
    $studentData = $selStudentDetails->fetch_assoc();

$countMyExams = "SELECT Count(*) as total_exams FROM student_exams WHERE stud_id='$student_id'";
$res = mysqli_query($conn,$countMyExams);
$myExams = mysqli_fetch_assoc($res);

$MyGivenExams = "SELECT Count(*) as total_Given_exams FROM exam_attempt WHERE stud_id='$student_id'";
$res1 = mysqli_query($conn,$MyGivenExams);
$myGivnExams = mysqli_fetch_assoc($res1);

$MyprchdExams = "SELECT Count(*) as total_purchased_exams FROM student_exams WHERE stud_id='$student_id' AND exam_paid_unpaid_type = 'yes'";
$purchasedExam = mysqli_query($conn,$MyprchdExams);
$MypurchasedExam = mysqli_fetch_assoc($purchasedExam);

$MyfreeExams = "SELECT Count(*) as total_free_exams FROM student_exams WHERE stud_id='$student_id' AND exam_paid_unpaid_type = 'no'";
$FreeExam = mysqli_query($conn,$MyfreeExams);
$MyFreeExam = mysqli_fetch_assoc($FreeExam);

}

$book_comand = "SELECT COUNT(*) AS TOTAL FROM study_material WHERE class_id = '$class_id'";
$book_query = mysqli_query($conn, $book_comand) or die("Query Failed.");
if(mysqli_num_rows($book_query) > 0){
while($book_data = mysqli_fetch_assoc($book_query)){
$total_book_purchaged = $book_data['TOTAL'];
}
}else{
$total_book_purchaged = 0;
} 

?>

<!DOCTYPE html>
<html>
<head>
    <?php head(); ?>

   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 main_card">

                <div class="card" id="card">
                    <h3>My Exam Status</h3>
                    <div calss="card_body" id="card_body">
                        <table class="table">
                            <tr>
                                <td><strong>Total Exams : </strong><strong class="text-success"><?=$myExams['total_exams'];?> Exams</strong></td>                   
                            </tr>
                                <tr>
                                    <td><strong>Total Exam Given : </strong><strong class="text-danger"><?=$myGivnExams['total_Given_exams'];?> Exams</strong></td>                   
                                </tr>
                                <tr>
                                    <td><strong>Total Purchased Exams : </strong><strong class="text-success"><?=$MypurchasedExam['total_purchased_exams'];?> Exams</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Free Exams : </strong><strong class="text-info"><?=$MyFreeExam['total_free_exams'];?> Exams</strong></td>
                                </tr>
                                <!-- <tr>
                                    <td><strong>Total Mock Test : </strong><strong class="text-danger">2 Exams</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Average Percentage : </strong><strong class="text-info">3.91%</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Your Rank : </strong><strong class="text-info">3</strong></td>
                                </tr> -->
                        </table>
                    </div>

                </div>

            </div>


           <div class="col-md-8 container1" style="margin-top: 50px;">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-12">

                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?=$myExams['total_exams'];?></h3>
                                    
                                    <p>My Exam</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="myexam.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $myExams['total_exams']; ?><sup style="font-size: 20px"></sup></h3>

                                    <p>Result</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="result.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">

                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $total_book_purchaged; ?></h3>

                                    <p id="pColor">Study Material</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="study_material.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                    </div>
                    <!-- /.row -->

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-12">

                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>0<?php// echo $total_exam_count; ?></h3>

                                    <p>Payment</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">

                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>1<sup style="font-size: 20px"></sup></h3>

                                    <p>Help</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="help.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>1</h3>

                                    <p>My Profile</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="profile.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                             </div>
                          </div>

                      </div>

                  </div>
                <!-- /.container-fluid -->
             </section>
            <!-- /.content -->
          </div>


        <div class="container mt-3 exam_table">
            <h3>Today Exams</h3>
            <table class="table table-bordered" id="student_data">
                <thead class="table_data">
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
                    <!-- <th>Action</th> -->
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
                <!-- <td>
                    <?php 
                        if($attemptRem['attempt_count'] < $todayExams['attempt']){ ?>
                        <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                    data-target="#myModal" data-placement="top" data-student_name="<?=$allExams['stud_name'];?>" data-exam_id="<?=$todayExams['id']?>" data-pass_percentage="<?=$todayExams['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$todayExams['negative_marking'];?>" data-subject_name="<?=$todayExams['subject_name'];?>" data-exam_duration="<?=$todayExams['exam_duration'];?>" data-exam_total_marks="<?=$todayExams['total_marks'];?>" title="View Details"> <i class='fa fa-edit'></i>
                    </button></a>
                    <a href="#"><button type="button" class="btn btn-success"data-toggle="modal" data-target="#myModal" 
                    data-toggle="tooltip" data-placement="top" title="Attempt Now"> <i class='fa fa-sign-out'></i></button></a>
                
                        <?php }elseif($attemptRem['attempt_count'] = $todayExams['attempt']){?>
                       
                     <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                     data-target="#exampleModal" data-placement="top" data-student_name="<?=$allExams['stud_name'];?>" data-exam_id="<?=$todayExams['id']?>" data-pass_percentage="<?=$todayExams['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$end_date;?>" data-negative_marking="<?=$todayExams['negative_marking'];?>" data-subject_name="<?=$todayExams['subject_name'];?>" data-exam_duration="<?=$todayExams['exam_duration'];?>" data-exam_total_marks="<?=$todayExams['total_marks'];?>" title="View Details"> <i class='fa fa-edit'></i>
                     </button></a>
                    
                     </button>

                  <?php } ?>                   
               </td> -->
            </tr>
          <?php  $i++; }  }  ?>          
       </tbody>
     </table>
   </div>
 </div>

    <footer class="main-footer"><strong>Copyright &copy; <?=date("Y");?> <a href="https://www.examin.com">eAgriEdu.com</a>.</strong> All rights reserved.</footer>

    </div>
   </div>
  <!-- /#page-content-wrapper -->
 </div>
 <!-- /#wrapper -->

   <script src="dist/js/adminlte.js"></script>
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Menu Toggle Script -->

   <script>
       $(document).ready(function(){
        $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
        $("#MenuIcon").click(function(){
        $(".ShowMenu").toggle();
        });
       });

   </script>

     <!--For Table data Search-->
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

     <script>
         $(document).ready(function() {
            $('#student_data').DataTable(); 
        } );
    </script>
    <!--For Table data Search End-->

    <!--for Tooltrip Class-->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!--Bootstrap Class CDN Link-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>