<?php 
require_once 'header.php';
$student_id = $_SESSION['student']['id'];

?>
<?php head(); ?>
<div class="container mt-3 exam_table">
    <h3 id="topheader">My Result</h3>
    <table class="table table-bordered" id="student_data">
        <thead class="table_data">
            <tr>
                <th>S.No.</th>
                <th>Exam Name</th>
                <th>Exam Date</th>
                <th>Toatal Exam Marks</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php 
            $i = 1;
           
            $selAttemptExams = $conn->query("SELECT * FROM exam ex INNER JOIN exam_attempt ea ON ex.id = ea.exam_id WHERE stud_id = '$student_id' ORDER BY ea.id");
            if($selTakenExam=mysqli_num_rows($selAttemptExams) > 0 ){
                while($selTakenExamRow = $selAttemptExams->fetch_assoc()){ ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?php echo $selTakenExamRow['exam_name']; ?></td>
                        <td><?php echo $selTakenExamRow['exam_date']; ?></td>
                        <td><?php echo $selTakenExamRow['total_marks']; ?></td>
                        <td>
                            <?php 
                            if($selTakenExamRow['result_status']==1){ ?>
                                <a href="view_result.php?exam_id=<?= $selTakenExamRow['exam_id'];?>" button type="button" class="btn" style="background-color: #e9e9e9;" data-toggle="tooltip" data-placement="top" title="View Result"> <i class='fa fa-edit'></i> </button></a>
                                <!-- <a href="#" button type="button" class="btn" style="background-color: #e9e9e9;" data-toggle="tooltip" data-placement="top" title="Print" onclick="myFunction()"> <i class='fa fa-print'></i></button></a> -->
                            <?php }elseif($selTakenExamRow['result_status']==0){ ?>

                               <a href="#"><button type="button" class="btn btn-primary view_details" data-toggle="modal"
                                data-target="#exampleModal" data-placement="top" title="View Result"> <i class='fa fa-edit'></i>
                            </button></a>

                        <?php }?>                        
                        <!-- <a href="#" button type="button" class="btn" style="background-color: #e9e9e9;" data-toggle="tooltip" data-placement="top" title="Print" onclick="myFunction()"> <i class='fa fa-print'></i></button></a> -->
                    </td>
                </tr>
                <?php  $i++;}

            }else{
                echo "No Record Found";
            }
            ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
         <h5 class="modal-title" id="exampleModalLabel">Exam Result not published!! Please Contact Admin</h5>
     </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>
<!-- </div>


</div>-->
<!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

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
<!-----For print document as open a new tab------>
<script>
    function myFunction() {
      window.open("print.html");
  }
</script>

<!--Bootstrap Class CDN Link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>