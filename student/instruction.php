<?php 
require_once '../includes/config.php';
    
    $studentID = $_SESSION['student']['id'];
        
    if(isset($_POST['exam_id']) && $_POST['exam_id'] !=''){
        echo $examID = $_POST['exam_id'];
        //Fetch Data related to exam...
        $today = date("Y-m-d");                        
        $fetchExam = $conn->query("SELECT * FROM exam WHERE id = '$examID'");
        $Exams = $fetchExam->fetch_assoc();
        $_SESSION['exam_details'] = $Exams;
        print_r($Exams);
         die;
    }
        $examID = $_SESSION['exam_details']['id'];

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

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Basic Graph Chart -->
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-cartesian.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-base.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#next-btn").click(function(){
                $(".instruction-start").hide();
                $(".readyExam").show();

            });
            $("#checkbox").click(function(){
                    //  alert("checked")
                    if ($('#checkbox').is(":checked")){
                        $(".exam-start").addClass("exam-start_1");
                    }
                    else{
                        $(".exam-start").removeClass("exam-start_1");
                    }

                    // $(".exam-start").addClass("clickExam");
                });

        });
    </script>
</head>
    <body>


    <div class="instruction">

        <div class="title_inst"> My Exam</div>
        <div class="instruction-start">
            <div class="col-xs-12 col-sm-12 progress-container">
                <div class="progress active">
                    <div class="progress-bar progress-bar-success" style="width:0%"></div>
                </div>
            </div>

            <div id="slider">
                <div class="wrap">
                    <div class="panel">
                        <div class="instruction-heading">
                            <h4>Instruction 1</h4>
                        </div>
                        <div class="col-sm-10 col-xs-12 dg-content">Please close all of your chat windows,
                            screen-saver, and anti-virus programs before starting your test
                        </div>
                    </div>
                    <div class="panel">
                        <div class="instruction-heading">
                            <h4>Instruction 2</h4>
                        </div>
                        <div class="col-sm-10 col-xs-12 dg-content">
                            Please do not press "F5" during your test. This will finish your test and you
                            will not be able to re-open the test
                        </div>
                    </div>
                    <div class="panel">
                        <div class="instruction-heading">
                            <h4>Instruction 3</h4>
                        </div>
                        <div class="col-sm-10 col-xs-12 dg-content">
                            Your responses will be saved. If your test is disconnected for any reason, your
                            responses up until that point will be saved
                        </div>
                    </div>
                    <div class="panel">
                        <div class="instruction-heading">
                            <h4>Instruction 4</h4>
                        </div>
                        <div class="col-sm-12 col-xs-12 dg-content">
                            Please close all programs that upload or download files in the background For
                            example: Dropbox, torrent, etc<br />
                            <div class="nextInstrauction">
                                <a href="#">
                                    <!--<button type="button" id="next-btn" class="btn btn-info next_btn" data-exam_id="<?php echo $examID;?>" onclick="createSession();">Next</button>-->
                                  <button type="button" id="next-btn" class="btn btn-info next_btn" data-exam_id="<?php echo $examID;?>">Next</button>
                                </a>
                                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <div class="readyExam">
            <label> 
                <input type="checkbox" class="checkbox" id="checkbox" value="checked" onclick="enableButton(this)"> I am ready to begin
            </label>
            <br>
                <!-- <button type="button" class="btn btn-success exam-start" id="exam-start" onclick="redirect_on_new_window();">Exam Start</button> -->

           <!--  <a href="attempt_exam.php"> -->
                <button type="button" class="btn btn-success exam-start" id="exam-start" disabled="" >Exam Start</button>
           <!--  </a>  -->

             <!-- <a onclick="redirect_on_new_window();" >
                <button type="button" class="btn btn-success exam-start" id="exam-start" >Exam Start</button>
            </a>-->  
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- Prograss Bar -->

    <script>
            var currentIndex = -1;// store current pane index displayed
            var ePanes = $('#slider .panel'), // store panes collection
            time = 2000;

            function showPane(index) {// generic showPane
                // hide current pane
                ePanes.eq(currentIndex).stop(true, true).fadeOut();
                // set current index : check in panes collection length
                currentIndex = index;
                if (currentIndex < 0) currentIndex = ePanes.length - 1;
                else if (currentIndex >= ePanes.length) currentIndex = 0;
                // display pane
                ePanes.eq(currentIndex).stop(true, true).fadeIn();
            }
            function run() {
                if (currentIndex < 3) {
                    ePanes.hide();
                    showPane(currentIndex + 1);
                    setTimeout(function () { run() }, time);

                }
            }
            $(".progress-bar").animate({ width: "100%" }, time * 4 - time);
            run();
        </script>

        <script>
            function redirect_on_new_window(){
                window.open("http://localhost/softonic/examin/student/attempt_exam.php", "_blank", "toolbar=yes,scrollbars=no,resizable=no,top=500,left=500,width=1200,height=1000"); 
            }
            //Enable exam start button on checkbox checked START...
            function enableButton(CheckBox){
                //If the checkbox has been checked
                if(CheckBox.checked){
                    //Set the disabled property to FALSE and enable the button.
                    document.getElementById("exam-start").disabled = false;
                } else{
                    //Otherwise, disable the submit button.
                    document.getElementById("exam-start").disabled = true;
                }
            }
            //Enable exam start button on checkbox checked END...

            //On exam start button click call ajax pass paramenters and fetched session details related to student id and exam id, and concatante session on attempt_exam.php..
            //$('#exam-start').on('click',function(){
                    //alert(SID);
              //      window.location.href= 'attempt_exam.php?SID='+SID;
            //});

        </script>
      <script>

  $(document).ready(function () {
    var SID;
    $("#next-btn").click(function () {
        $('.readyExam').hide();
      $.ajax
        ({
          type: "POST",
           url: 'stud_ajax/exam_session.php',
           contentType: "application/json; charset=utf-8",
           dataType: "json",
          success: function (data) {
           SID = data;
           $('.readyExam').show();
        //   alert(SID);
          }
        });
    });
    $('#exam-start').on('click',function(){
    // alert(SID);
    window.location.href= 'attempt_exam.php?SID='+SID;
     
    });
  });
</script>

    </body>

    </html>