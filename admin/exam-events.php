<?php 
require_once 'includes/header.php';

//Exam result Status enable/Disable START...
  if(isset($_GET['exam_id']) && $_GET['exam_id']!=''){   
        $exam_id = $_GET['exam_id'];
        $operation = $_GET['operation'];
        if($operation == 'enable'){
          $status = 1;
        }elseif($operation=='disable'){
          $status = 0;
        }
      // $query = "UPDATE exam_attempt SET result_status='$status' WHERE exam_id='$exam_id'";
      $query = "UPDATE exam SET result_status='$status' WHERE id='$exam_id'";
      $result = mysqli_query($conn,$query);
  }
?>
<head>
    <!--My CSS-->
    <link href="<?=web;?>student/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?=web;?>student/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="<?=web;?>student/css/simple-sidebar.css" rel="stylesheet">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery funtion calling-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#today_exam").css({ "background-color": "green", "color": "white" });

            $("#upcoming_exam").click(function () {
                $("#today_exam,#expired_exam,#purchased_exam,#upcoming_exam").css({ "background-color": "", "color": "" })
                $(this).css({ "background-color": "green", "color": "white" });
                $("#todayExams").hide();
                $("#expired").hide();
                $(".upcoming_exam_event").show();
            })
            $("#expired_exam").click(function () {
                $("#today_exam,#expired_exam,#purchased_exam,#upcoming_exam").css({ "background-color": "", "color": "" })
                $(this).css({ "background-color": "green", "color": "white" });
                $("#todayExams").hide();
                $(".expired_exam_event").show();
                $(".upcoming_exam_event").hide();
            })
            $("#today_exam").click(function () {
                $("#today_exam,#expired_exam,#purchased_exam,#upcoming_exam").css({ "background-color": "", "color": "" })
                $(this).css({ "background-color": "green", "color": "white" });

                $("#todayExams").show();
                $("#expired").hide();
                $(".upcoming_exam_event").hide();
            })
        });
    </script>
</head>


 <div class="content-wrapper ">
    <!--Start Body Section-->
    <div class="container">
        <div class="myexam">
            <h2 id="topheading">Exam Events</h2>
            <div class="row">
                <diV class="col-md-4 col-sm-6 btn-group">
                    <button type="button" id="today_exam" class="btn btn-default ExamButton">Todays Exam</button>
                </diV>
                <diV class="col-md-4 col-sm-6 btn-group">
                    <button type="button" id="upcoming_exam" class="btn btn-default ExamButton">Upcoming Exam</button>
                </diV>
                <diV class="col-md-4 col-sm-6 btn-group">
                    <button type="button" id="expired_exam" class="btn btn-default ExamButton">Expired Exam</button> <br>
                </diV>
            </div>
        </div>
    </div>

   <!--Start Today Exam-->
    <div class="today_exam_event" id="todayExams">
        <div class="container mt-3">
          <h3>Today Exams</h3>
          <table class="table table-bordered" id="todayExam_data">
            <thead class=" ">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>Exam Date</th>
                <th>End Date</th>
                <th>Attempts</th>
                <th>Amount</th>
                <th>Result Status</th>
                <th>View attandance</th>
              </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $i = 1;
                $todayDate = date("Y-m-d");
//                $todayDate = '2021-05-01';
                $query_to_get = "SELECT * FROM exam WHERE exam_date = '".$todayDate."'";


                 $fetch_TodaysExams = $conn->query($query_to_get);
                while($TodaysExams = $fetch_TodaysExams->fetch_assoc()){ ?>
                    <tr>
                    <td><?= $i;?></td>
                    <td><?= $TodaysExams['exam_name'];?></td>
                    <td><?php if($TodaysExams['paid_exam'] =="yes"){echo "Paid";
                        }elseif($TodaysExams['paid_exam'] =="no"){echo "Free";
                    }?></td>

                    <td>
                    <?php
                    $dateformatofDB = $TodaysExams['start_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $start_date = date("d-m-Y", $timestamp);
                    echo $start_date; // Outputs: 31-03-2019
                    ?>
                    </td>

                    <td>
                    <?php
                    $dateformatofDB = $TodaysExams['exam_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $exam_date = date("d-m-Y", $timestamp);
                    echo $exam_date; // Outputs: 31-03-2019
                    ?>
                    </td>

                    <td>
                    <?php
                    $dateformatofDB = $TodaysExams['end_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $exam_end_date = date("d-m-Y", $timestamp);
                    echo $exam_end_date; // Outputs: DD-MM-YYYY
                    ?>

                    </td>
                    <td><?= $TodaysExams['attempt'];?></td>
                    <!-- <td><?=$TodaysExams['exam_amount'];?></td> -->
                    <td>
                        <?php
                        if($TodaysExams['paid_exam']=="no" AND $TodaysExams['exam_amount']==""){
                            echo "0";
                        }else{
                            echo $TodaysExams['exam_amount'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        //Fetch data from exam_attempt table for enabling and disabling exam result status...
                        $sql = $conn->query("SELECT * FROM exam WHERE id = '".$TodaysExams['id']."'");
                        while($row = $sql->fetch_assoc()){
                         if($row['result_status']==0){ ?>
                           <a href="?type=status&operation=enable&exam_id=<?=$row['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for enable">Result Disabled</a>
                        <?php  }elseif($row['result_status']==1){?>
                            <a href="?type=status&operation=disable&exam_id=<?=$row['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for disable">Result Enabled</a>
                        <?php }
                        ?>

                    <?php }
                    ?>
                    </td>
                    <td>
                        <a href="exam-wise-student-attandance.php?exam_id=<?=$TodaysExams['id'];?>">
                            <button type="button" class="btn btn-primary view_details" data-toggle="modal" data-target="#expiredModal" data-placement="top" data-student_name="<?=$allExams['stud_name'];?>" data-exam_id="<?=$TodaysExams['id']?>" data-pass_percentage="<?=$TodaysExams['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$exam_end_date;?>" data-negative_marking="<?=$TodaysExams['negative_marking'];?>" data-subject_name="<?=$TodaysExams['subject_name'];?>" data-exam_duration="<?=$TodaysExams['exam_duration'];?>" title="View Details"> <i class='fa fa-edit'></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php }?>


            </tbody>
        </table>
      </div>
    </div>
   <!--End Today Exams-->

   <!--Start Upcoming Exams-->

    <div class="upcoming_exam_event" id="upcomingExams" style="display:none;">
        <div class="container mt-3">
          <h3>Upcoming Exams</h3>
          <table class="table table-bordered" id="upcomingExam_data">
            <thead class=" ">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>Exam Date</th>
                <th>End Date</th>
                <th>Attempts</th>
                <th>Amount</th>
                <!-- <th>View attandance</th> -->
              </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $i = 1;
                $todayDate = date("Y-m-d");

                 $fetch_UpcomingExams = $conn->query("SELECT * FROM exam WHERE exam_date > '".$todayDate."'");
                while($UpcomingExams = $fetch_UpcomingExams->fetch_assoc()){ ?>
                    <tr>
                    <td><?= $i;?></td>
                    <td><?= $UpcomingExams['exam_name'];?></td>
                    <td><?php if($UpcomingExams['paid_exam'] =="yes"){echo "Paid";
                        }elseif($UpcomingExams['paid_exam'] =="no"){echo "Free";
                    }?></td>

                    <td>
                    <?php
                    $dateformatofDB = $UpcomingExams['start_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $start_date = date("d-m-Y", $timestamp);
                    echo $start_date; // Outputs: 31-03-2019
                    ?>
                    </td>

                    <td>
                    <?php
                    $dateformatofDB = $UpcomingExams['exam_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $exam_date = date("d-m-Y", $timestamp);
                    echo $exam_date; // Outputs: 31-03-2019
                    ?>
                    </td>

                    <td>
                    <?php
                    $dateformatofDB = $UpcomingExams['end_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $exam_end_date = date("d-m-Y", $timestamp);
                    echo $exam_end_date; // Outputs: DD-MM-YYYY
                    ?>

                    </td>
                    <td><?= $UpcomingExams['attempt'];?></td>
                    <!-- <td><?= $UpcomingExams['exam_amount'];?></td>  -->
                    <td>
                        <?php
                        if($UpcomingExams['paid_exam']=="no" AND $upcomingExam['exam_amount']==""){
                            echo "0";
                        }else{
                            echo $upcomingExam['exam_amount'];
                        }
                        ?>
                    </td>
                    <!-- <td>
                        <a href="exam-wise-student-attandance.php?exam_id=<?=$TodaysExams['id'];?>">
                            <button type="button" class="btn btn-primary view_details" data-toggle="modal" data-target="#expiredModal" data-placement="top" data-student_name="<?=$allExams['stud_name'];?>" data-exam_id="<?=$TodaysExams['id']?>" data-pass_percentage="<?=$TodaysExams['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$exam_end_date;?>" data-negative_marking="<?=$TodaysExams['negative_marking'];?>" data-subject_name="<?=$TodaysExams['subject_name'];?>" data-exam_duration="<?=$TodaysExams['exam_duration'];?>" title="View Details"> <i class='fa fa-edit'></i>
                            </button>
                        </a>

                    </td> -->
                </tr>
                <?php }?>


            </tbody>
        </table>
      </div>
    </div>
   <!--END Upcoming Exams-->

    <!--Start Expired exam--->
    <div class="expired_exam_event" id="expired" style="display:none;">
        <div class="container mt-3">
          <h3>Expired Exams</h3>
          <table class="table table-bordered" id="expiredExam_data">
            <thead class=" ">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>Exam Date</th>
                <th>End Date</th>
                <th>Attempts</th>
                <th>Amount</th>
                <th>Result Status</th>
                <th>View attandance</th>
              </tr>
            </thead>
            <tbody id="myTable2">
                <?php
                $i = 1;
                $todayDate = date("Y-m-d");

                 $fetch_expiredExams = $conn->query("SELECT * FROM exam WHERE exam_date < '".$todayDate."'");
                while($expiredExams = $fetch_expiredExams->fetch_assoc()){ ?>
                    <tr>
                    <td><?= $i;?></td>
                    <td><?= $expiredExams['exam_name'];?></td>
                    <td><?php if($expiredExams['paid_exam'] =="yes"){echo "Paid";
                        }elseif($expiredExams['paid_exam'] =="no"){echo "Free";
                    }?></td>
                    <td>
                    <?php
                    $dateformatofDB = $expiredExams['start_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $start_date = date("d-m-Y", $timestamp);
                    echo $start_date; // Outputs: 31-03-2019
                    ?>

                    </td>
                    <td>
                    <?php
                    $dateformatofDB = $expiredExams['exam_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $exam_date = date("d-m-Y", $timestamp);
                    echo $exam_date; // Outputs: DD-MM-YYYY
                    ?>

                    </td>
                    <td>
                    <?php
                    $dateformatofDB = $expiredExams['end_date'];
                    // Creating timestamp from given date
                    $timestamp = strtotime($dateformatofDB);
                    // Creating new date format from that timestamp
                    $end_date = date("d-m-Y", $timestamp);
                    echo $end_date; // Outputs: DD-MM-YYYY
                    ?>

                    </td>
                    <td><?= $expiredExams['attempt'];?></td>
                    <!-- <td><?= $expiredExams['exam_amount'];?></td>-->
                    <td>
                        <?php
                        if($expiredExams['paid_exam']=="no" AND $expiredExams['exam_amount']==""){
                            echo "0";
                        }else{
                            echo $expiredExams['exam_amount'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        //Fetch data from exam_attempt table for enabling and disabling exam result status...
                        // $sql = $conn->query("SELECT * FROM exam_attempt WHERE exam_id = '".$expiredExams['id']."'");
                         $sql = $conn->query("SELECT * FROM exam WHERE id = '".$expiredExams['id']."'");
                        while($row = $sql->fetch_assoc()){ 
                         if($row['result_status']==0){ ?>
                           <a href="?type=status&operation=enable&exam_id=<?=$row['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for enable">Result Disabled</a>
                        <?php  }elseif($row['result_status']==1){?>
                            <a href="?type=status&operation=disable&exam_id=<?=$row['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for disable">Result Enabled</a>
                        <?php }
                        ?>

                    <?php }
                    ?>
                    </td>
                    <td>
                        <a href="exam-wise-student-attandance.php?exam_id=<?=$expiredExams['id'];?>">
                            <button type="button" class="btn btn-primary view_details" data-toggle="modal" data-target="#expiredModal" data-placement="top" data-student_name="<?=$allExams['stud_name'];?>" data-exam_id="<?=$todayExams['id']?>" data-pass_percentage="<?=$todayExams['pass_percentage'];?>" data-exam_date="<?=$exam_date;?>" data-end_date="<?=$exam_end_date;?>" data-negative_marking="<?=$todayExams['negative_marking'];?>" data-subject_name="<?=$todayExams['subject_name'];?>" data-exam_duration="<?=$todayExams['exam_duration'];?>" title="View Details"> <i class='fa fa-edit'></i>
                            </button>
                        </a>                       
                    </td>
                </tr>
                <?php }?>


            </tbody>
        </table>
      </div>
    </div>
<!--End Expired exam--->
</div>

            <footer class="main-footer">
                <strong>Copyright &copy; <?php echo date("Y");?> <a href="https://www.examin.com">eAgriEdu.com</a>.</strong> All rights
                reserved.
                <div class="float-right d-none d-sm-inline-block">
                   <b>Version</b> 3.1.0-rc
                </div>
            </footer>

         </div>

<!--End Body Section-->

</div>
<!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js "></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js "></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js "></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js "></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js "></script>
<!-- Page specific script -->


<script src="assets/js/jquery-1.12.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/equal-height.min.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/modernizr.custom.13711.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>

<script src="assets/js/bootsnav.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
      var table = $('#todayExam_data').DataTable({
      fixedHeader: true,
      language: {
      searchPlaceholder: "Search Here..."
  }
  });
  $("#todayExam_data").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>");  

  var table = $('#upcomingExam_data').DataTable({
      fixedHeader: true,
      language: {
      searchPlaceholder: "Search Here..."
  }
  });
  $("#upcomingExam_data").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>");
  
  var table = $('#expiredExam_data').DataTable({
      fixedHeader: true,
      language: {
      searchPlaceholder: "Search Here..."
  }
  });
  $("#expiredExam_data").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>"); 
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

     


    });
</script>

<!--Bootstrap Class CDN Link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>