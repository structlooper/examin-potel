<?php 
require_once 'includes/header.php';

//Exam result Status enable/Disable START...
$exam_id = "";
  if(isset($_GET['exam_id']) && $_GET['exam_id']!=''){ 
        $exam_id = $_GET['exam_id'];
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
    <!-- Main row -->
        <div class="row ml-4 mt-5">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              
             
                <div id="chartContainer" style="height: 300px; width: 100%;">

            </section>
            <!-- /.Left col -->           
        </div>
    <!-- /.row (main row) -->

    <div class="today_exam_event" id="todayExams">
        <div class="container mt-3">
          <h3>Top Scorer</h3>
          <table class="table table-bordered" id="todayExam_data">
            <thead class=" ">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Exam</th>
                <th>Score</th>                
              </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                $i = 1;
                
                $fetch_TopScorers = $con->query("SELECT * FROM top_scores WHERE exam_id = '".$exam_id."' ORDER BY score desc limit 10");
                while($TopScorers = $fetch_TopScorers->fetch_assoc()){
                    //Fetch names
                    $fetchStdNames = $con->query("SELECT * FROM student_details WHERE id = '".$TopScorers['student_id']."'");
                while($stdData = $fetchStdNames->fetch_assoc()){ 
                    $fetchExamData = $con->query("SELECT * FROM exam where id = '".$TopScorers['exam_id']."'");
                    while($ExamData = $fetchExamData->fetch_assoc()){ 

                    ?>
                    <tr>
                    <td><?= $i;?></td>
                    <td><?= $stdData['student_fname']." ".$stdData['student_lname'];?></td>
                    <td><?= $stdData['student_email'];?></td>
                    <td><?= $stdData['contact'];?></td>
                    <td><?= $ExamData['exam_name'];?></td>
                    <td><?= $TopScorers['score'];?></td>

                </tr>
                <?php }
                    }
            $i++; } 
                 ?>
              </tbody>
        </table>
      </div>
    </div>
   <!--End Today Exams-->

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

<!-- Menu Toggle Script -->
<script src="../student/vendor/jquery/jquery.min.js"></script>
<script src="../student/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Menu Toggle Script -->

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!--For Table data Search-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!--page specific script-->
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
<script src="assets/js/count-to.js"></script>
<script src="assets/js/loopcounter.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
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
<script>
  $(document).ready(function(){
    $.ajax({
      Type:'GET',
      url: 'ajax/data.php',
      datatype: 'json',
      data: {exam_id:<?=$exam_id?>},
      success:function(result){
        var count = result.length;        
            var chart = new CanvasJS.Chart("chartContainer", {
                title:{
                      text: "Top "+count+" Scores"
                    },
                    data: [
                        {
                            dataPoints: result
                        }
                    ]
                });

                chart.render();
      },
      error:function(err){
        console.log(err);
      }
    });
  });

</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>