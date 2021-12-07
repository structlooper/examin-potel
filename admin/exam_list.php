<?php
require_once 'includes/header.php';
$msg ='';

if(isset($_GET['did']) && !empty($_GET['did'])){
    echo $id = $_GET['did'];
    $msg = deleteData('chapter',$id);
}

//Insert New Subject In subject class in database START...
if(isset($_POST['create_chapter'])){

    //send the field values to be clean for sql point of view...
    $chapter_name = get_safe_value($conn,$_POST['chapter_name']);
    $class_id = get_safe_value($conn,$_POST['class_list']);
    $subject_id = get_safe_value($conn,$_POST['subject_list']);

    //fetch class name from class table based on $class_id variable while add chapter to store in chapter table..
    $query = "SELECT * FROM classes WHERE id = '$class_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
        $class_data = mysqli_fetch_assoc($res);
        $class_name = $class_data['class_name'];

    }

    //fetch subject name from subject table based on $subject_id variable while add chapter to store in chapter table..
    $query = "SELECT * FROM subject WHERE id = '$subject_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
        $subject_data = mysqli_fetch_assoc($res);
        $subject_name = $subject_data['subject_name'];
    }

    //Check if subject_namen, class_name and also the chapter already exist in chapter table before insert operation if they already exist don't insert..
    $sql = "SELECT * FROM chapter WHERE chapter_name = '$chapter_name' AND class_id = '$class_id' AND subject_id = '$subject_id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
        // header("location:{$hostname}/add_subject.php");
        $msg = "Chapter name in this Subject and class already exist";

    }else{
        //Else Insert Data...
        $status = 1;
        $sql = "INSERT INTO chapter(chapter_name,class_name,class_id,subject_name,subject_id,status) VALUES('$chapter_name','$class_name','$class_id','$subject_name','$subject_id','$status')";
        if(mysqli_query($conn,$sql)){

            //header("location:{$hostname}/add_subject.php");
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

}

?>

<head>
    <!-- Update Popup box  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <link href="assets2/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets2/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets2/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets2/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets2/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets2/css/animate.css" rel="stylesheet" />
    <!--  <link href="assets/css/bootsnav.css" rel="stylesheet" /> -->
    <link href="assets2/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
    <!-- Update Popup box end -->

    <!-- Validation for Jquery -->
    <script>
        $(document).ready(function(){
            $(".save").click(function(){
                var formMaster = $(".form-master").val();
                var className = $("#className").val();
                var subjectName = $("#subjectName").val();

                if(className == null){
                    alert("Please select Class Name");
                    $("#className").focus();
                    return false;
                }
                else if(subjectName == null){
                    alert("Please select subject name");
                    $("#subjectName").focus();
                    return false;
                }
                else if(formMaster == ""){
                    alert("Enter chapter Name");
                    $(".form-master").focus();
                    return false;
                }
                // else{
                //   alert("Success");
                // }
            });

            // Delete Action code
            // $(".delete").click(function(){
            //   var a = confirm("Confirm to Delete");
            //    if(a) {
            //          alert( "Delete Success" );
            //      }
            //      })

            $('#delete_class').click(function(){

                var post_arr = [];

                // Get checked checkboxes
                $('.chk').each(function() {
                    if (jQuery(this).is(":checked")) {
                        var id = this.id;
                        var splitid = id.split('_');
                        var postid = splitid[1];

                        post_arr.push(postid);

                    }
                });

                if(post_arr.length > 0){

                    var isDelete = confirm("Do you really want to delete records?");
                    if (isDelete == true) {
                        // AJAX Request
                        console.log(post_arr);

                        $.ajax({
                            url: 'ajax/ajaxfile.php',
                            type: 'POST',
                            data: { id: post_arr, tableName:"chapter"},
                            success: function(response){
                                //console.log("RES : ",response)
                                $.each(post_arr, function( i,l ){
                                    $("#tr_"+l).remove();
                                });
                            },
                            error:function(err){
                                console.log("Error : ",err)
                            }
                        });
                    }
                }else{
                    var a = confirm("Please Select atleast one record to delete.");
                }
            });
            // Delete Action code end

        });
    </script>
    <!-- Validation for Jquery End -->

</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header ">
        <div class="container-fluid ">
            <div class="row mb-2 ">
                <div class="col-sm-6 ">
                    <a href= "#add_exam_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Exam</button></a>
                    <button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button>
                    <!-- <a href="#" button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button></a> -->
                </div>
                <h6 align="center" class="text-success" id="messageShow"><?=$msg;?></h6>
                <!-- <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right ">
                      <li class="breadcrumb-item "><a href="# ">Home</a></li>
                      <li class="breadcrumb-item active ">General Form</li>
                    </ol>
                  </div> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid ">
            <div class="row ">
                <!-- left column -->
                <div class="col-md-12 ">
                    <!-- form start -->
                    <table class="table" id="chapter_table">
                        <thead class="bg-primary ">
                        <tr>
                            <th scope="col ">Select</th>
                            <th scope="col ">id</th>
                            <th scope="col ">Exam Name</th>
                            <th scope="col ">Type</th>
                            <th scope="col ">Status</th>
                            <th scope="col ">Action</th>
                            <th scope="col ">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;

                        $res = mysqli_query($conn,"SELECT * FROM exam Order BY id DESC");

                        while($examList = mysqli_fetch_assoc($res)){ ?>
                            <tr id='tr_<?=$examList['id'];?>'>
                                <th scope="row ">

                                    <!-- checkbox -->
                                    <input type="checkbox" id='del_<?php echo $examList['id'];?>' name="delete[]" value="<?=$examList['id']; ?>" class="chk">
                                </th>
                                <td scope="row "><?=$i;?></td>
                                <td scope="row "><?=$examList['exam_name'];?></td>
                                <td scope="row ">Exam</td>

                                <?php
                                if($examList['status']==1){ ?>
                                    <td><a href="?type=status&operation=deactive&id=<?=$examList['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Active</a></td>
                                <?php }else{?>
                                    <td><a href="?type=status&operation=active&id=<?=$examList['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Deactive</a></td>
                                <?php }?>

                                <!--   <th scope="row ">Download</th> -->

                                <td>
                                    <a href="#update_exam_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_exam" data-exam_id="<?php echo $examList['id'];?>" data-exam_name="<?php echo $examList['exam_name']; ?>" data-class_id="<?php echo $examList['class_id'];?>" data-class_name="<?php echo $examList['class_name'];?>" data-subject_id="<?php echo $examList['subject_id'];?>" data-subject_name="<?php echo $examList['subject_name'];?>" data-chapter_id="<?php echo $examList['chapter_id'];?>" data-chapter_name="<?php echo $examList['chapter_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>

                                    </a>
                                </td>

                                <td class="delete"><a href="?did=<?php echo $examList['id'];?>" data-id="<?php echo $examList['id'];?>" id="<?php echo $examList['id'];?>"> <button class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
                                <!-- <td class="delete"><a href="#" button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td> -->
                            </tr>
                            <?php $i++;}
                        ?>


                        </tbody>
                    </table>
                    <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<form action="add-update-exam.php" method="post" id="update_exam_form" class="mfp-hide white-popup-block">
    <div class="col-md-12 login-custom">
        <h4>Update Exam Form </h4>
        <div class="card-body">

            <div class="form-group row">
                <div class="col-md-4">
                    <div class="form-group" align="center">
                        <select name="update_class_name" class="select_box" id="update_className">
                            <option value= "" selected disabled>Select Class </option>
                            <?php
                            $res = mysqli_query($conn,"SELECT * FROM classes ORDER BY class_name ASC");
                            while($class = mysqli_fetch_assoc($res)){ ?>
                                <option value="<?=$class['id'];?>"><?=$class['class_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group" align="center">
                        <select name= "subject" class="select_box" id="update_subjectName">
                            <option value= "" selected disabled>Select Subject Name </option>

                        </select>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group" align="center" >
                        <select name= "chapter" class="select_box" id="update_chapterName">
                            <option value= "" selected disabled>Select Chapter Name </option>

                        </select>
                    </div>

                </div>

            </div>


            <div class="form-group row update_question_list_div" style="display:block;" >
                <label lass="col-sm-12">Choose the questions from list for this exam</label>
                <div class="DropDownHead col-md-12" id="update_dropdowndHead">
                    <input type="text" class="InputDefault DropDownId" name="update_question_list" autocomplete="off">

                    <i class="fas fa-chevron-right DropDownChevron"></i>
                    <input type="text" readonly class="InputDefault ValidInputField DropDownData showData" name="update_question_ids" id="update_question_ids">

                    <div class="DropDownList" id="update_Question-list">
                        <br>


                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-12">Enter Name Of Exam</label>
            </div>
            <div class="form-group row">
                <div class="col-sm-12"><input type="hidden" id="exam_id" name="exam_id" value="<?=$exam_id;?>">
                    <input type="text" class="form-control" id="update_examName" name="update_examName" maxlength="100" autocomplete="off" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-12">Instruction</label>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea type="textarea" class="form-control" id="update_instruction" name="update_instruction" placeholder="Instruction*" rows="5"></textarea>
                    <div id="load_editor0">
                        <div id="Texteditor0">

                        </div>
                    </div>
                    <br>
                    <!--  <button id="showEditor" type="button" class="btn btn-light">Switch Editor</button> -->
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Exam Duration time*</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="update_exam_duration" name="update_exam_duration_min" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Attempt Count*</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="Attempt_count" name="update_attempts" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Start Time*</label>
                <div class="col-sm-8">
                    <input type="time" class="form-control" id="update_start_time" name="update_start_time" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Start Date*</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="update_start_date" value="" name="update_start_date" >
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Exam Date*</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="update_exam_date" name="update_exam_date" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">End Date*</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="update_end_date" value="" name="update_end_date" >
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Total Questions</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="update_totalQuestion" name="update_total_questions" value="" >
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Total Marks</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="update_total_marks" name="update_total_marks" value="" >
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Required Passsing Percentag*</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="update_required_passPercentage" name="update_required_passPercentage" value="" >
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Show Answer Sheet</label>
                <div class="redio_btn col-sm-4">
                    <label><input type="radio" class="redio_button" id="update_show_answer1" name="update_show_answer" value="yes" >&nbsp; Yes</label>
                </div>
                <div class="redio_btn col-sm-4">
                    <label><input type="radio" class="redio_button" id="update_show_answer2" name="update_show_answer" value="no"> &nbsp;No</label>
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Negative Marking</label>
                <div class="redio_btn col-sm-4">
                    <label><input type="radio" class="redio_button" id="update_negative_marking1" name="update_negative_marking" value="yes">&nbsp; Yes</label>
                </div>
                <div class="redio_btn col-sm-4">
                    <label><input type="radio" class="redio_button" id="update_negative_marking2" name="update_negative_marking" value="no">&nbsp; No</label>
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Paid Exam</label>
                <div class="redio_btn col-sm-4">
                    <label> <input type="radio" class="redio_button upd_paid_yes" id="update_paid_exam1" name="update_paid_exam" value="yes">&nbsp; Yes</label>
                </div>
                <div class="redio_btn col-sm-4">
                    <label> <input type="radio" class="redio_button upd_paid_no" id="update_paid_exam2" name="update_paid_exam" value="no">&nbsp; No</label>
                </div>
            </div>



            <div class="form-group row update_exam_ammount_show">
                <label for="colFormLabelSm" class="col-sm-4">Please Enter Amount</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="upd_exam_amaunt" name="upd_exam_amaunt" placeholder="Please Enter Ammount" >
                </div>
            </div>

            <!-- <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-4">Result After Finish</label>
              <div class="redio_btn col-sm-4">
                <label><input type="radio" class="redio_button" id="update_rslt_aftr_fnsh1" name="update_result" value="yes">&nbsp; Yes</label>
              </div>
              <div class="redio_btn col-sm-4">
                <label><input type="radio" class="redio_button" id="update_rslt_aftr_fnsh2" name="update_result" value="no">&nbsp; No</label>
              </div>
            </div>

            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-4">Instant Result</label>
              <div class="redio_btn col-sm-4">
                <label> <input type="radio" class="redio_button" id="update_instant_result1" name="update_instant_result" value="yes">&nbsp; Yes</label>
              </div>
              <div class="redio_btn col-sm-4">
                <label> <input type="radio" class="redio_button" id="update_instant_result2" name="update_instant_result" value="no">&nbsp; No</label>
              </div>
            </div>

            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-4">Option Shuffle</label>
              <div class="redio_btn col-sm-4">
                <label>  <input type="radio" class="redio_button" id="update_shuffle1" name="update_shuffle" value="yes">&nbsp; Yes</label>
              </div>
              <div class="redio_btn col-sm-4">
                <label> <input type="radio" class="redio_button" id="update_shuffle2" name="update_shuffle" value="no">&nbsp; No</label>
              </div>
            </div> -->

            <!-- /.card-body -->

            <div class="col-md-12">
                <div class="row">
                    <input type="hidden" name="exam_id" id="exam_hidden_id">
                    <button type="submit" name="update_exam">
                        Update
                    </button>
<!--                    <button type="button" name="close_class" class="mfp-close btn-sm ">-->
<!--                        X-->
<!--                    </button>-->
                </div>
            </div>

        </div>

    </div>
</form>


<!-- Start Add Class Form
    ============================================= -->
<form action="add-update-exam.php" method="post" id="add_exam_form" class="mfp-hide white-popup-block">
    <div class="col-md-12 login-custom">
        <h4>Add New Exam </h4>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-4">
                    <div class="form-group" align="center">
                        <select name= "class" class="select_box" id="className">
                            <option value= "" selected disabled>Select Class </option>
                            <?php
                            $res = mysqli_query($conn,"SELECT * FROM classes ORDER BY class_name ASC");
                            while($class = mysqli_fetch_assoc($res)){ ?>
                                <option value="<?=$class['id'];?>" ><?=$class['class_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group" align="center">
                        <select name= "subject" class="select_box" id="subjectName">
                            <option value= "" selected disabled>Select Subject Name </option>
                            <?php
                            $res = mysqli_query($conn,"SELECT * FROM subject ORDER BY subject_name ASC");
                            while($class = mysqli_fetch_assoc($res)){ ?>
                                <option value="<?=$class['id'];?>" ><?=$class['subject_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group" align="center" >
                        <select name= "chapter" class="select_box" id="chapterName">
                            <option value= "" selected disabled>Select Chapter Name </option>
                            <?php
                            $res = mysqli_query($conn,"SELECT * FROM chapter ORDER BY chapter_name ASC");
                            while($class = mysqli_fetch_assoc($res)){ ?>
                                <option value="<?=$class['id'];?>" ><?=$class['chapter_name']?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

            </div>


            <div class="form-group row question_list_div" >
                <label lass="col-sm-12">Choose the questions from list for this exam</label>
                <div class="DropDownHead col-md-12" id="dropdowndHead">
                    <div class="row">
                        <input type="text" class="InputDefault DropDownId col-md-6" name="question_list" autocomplete="off">

                        <i class="fas fa-chevron-right DropDownChevron"></i>
                        <input type="text" readonly class="InputDefault ValidInputField DropDownData showData col-md-6" name="question_ids">


                        <div class="DropDownList privisue_quest" id="Question-list">
                            <br>

                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-12">Enter Name Of Exam</label>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="examName" name="exam_name" placeholder="Enter Name Of Exam*" maxlength="100" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-12">Instruction</label>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea type="textarea" class="form-control" id="textarea" id="instruction" name="instruction" placeholder="Instruction*" rows="5" maxlength="1000" autocomplete="off" ></textarea>
                    <div id="load_editor0">
                        <div id="Texteditor0">

                        </div>
                    </div>
                    <br>
                    <!-- <button id="showEditor" type="button" class="btn btn-light">Switch Editor</button> -->
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Exam Duration time (Min.)*</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="ExamDuration" name="exam_duration_min" placeholder="Exam Duration min*" >
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Attempt Count*</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="attemptCount" name="attempt" placeholder="0 to Unlimited Attempt*">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm" id="startTime">Start Time*</label>
                <div class="col-sm-8">
                    <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Start time">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Start Date*</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Exam Date*</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="exam_date" name="exam_date" placeholder="Exam Date">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">End Date*</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End_Date*">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Total Questions</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="totalQuestion" name="total_questions" placeholder="Total Questions" >
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Total Marks</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="totalMarks" name="total_marks" placeholder="Total Marks" >
                </div>
            </div>

            <!-- <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-4">Required Passsing Percentag*</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="passPercentage" name="required_passPercentage" placeholder="Required Passsing Percentag" >
              </div>
            </div> -->

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Show Answer Sheet</label>
                <div class="redio_btn col-sm-4">

                    <input type="radio"  class="redio_button" name="show_answer" value="yes" checked>
                    <label>
                        Yes
                    </label>
                </div>
                <div class="redio_btn col-sm-4">
                    <input type="radio" class="redio_buttons" name="show_answer" value="no">
                    <lebel>No</lebel>
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Negative Marking</label>
                <div class="redio_btn col-sm-4">
                    <label>
                        <input type="radio"  class="redio_button" name="negative_marking" value="yes" checked>
                        Yes</label>
                </div>
                <div class="redio_btn col-sm-4">
                    <input type="radio" class="redio_button" name="negative_marking" value="no">
                    <lebel>No</lebel>
                </div>
            </div>


            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-4">Paid Exam</label>
                <div class="redio_btn col-sm-4">
                    <label>
                        <input type="radio" class="redio_button paid_yes" name="paid_exam" value="yes">Yes</label>
                </div>
                <div class="redio_btn col-sm-4">
                    <input type="radio" class="redio_button paid_no" name="paid_exam" value="no" checked>
                    <lebel>No</lebel>
                </div>
            </div>

            <div class="form-group row exam_ammount_show">
                <label for="colFormLabelSm" class="col-sm-4">Please Enter Amount</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="exam_amaunt" name="exam_amaunt" placeholder="Please Enter Ammount" >
                </div>
            </div>

            <!-- <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-4">Result After Finish</label>
              <div class="redio_btn col-sm-4">
               <label>
                 <input type="radio" class="redio_button" name="result" value="yes">Yes</label>
               </div>
               <div class="redio_btn col-sm-4">
                 <label>
                  <input type="radio" class="redio_button" name="result" value="no"checked>
                No</label>
              </div>
            </div> -->

            <!-- <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-4">Instant Result</label>
              <div class="redio_btn col-sm-4">
               <label>
                 <input type="radio" class="redio_button" name="instant_result" value="yes">
               Yes</label>
             </div>
             <div class="redio_btn col-sm-4">
               <label>
                <input type="radio" class="redio_button" name="instant_result" value="no" checked >No
              </label>
            </div>
          </div> -->

            <!-- <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-4">Option Shuffle</label>
              <div class="redio_btn col-sm-4">
               <label>
                <input type="radio" class="redio_button" name="shuffle" value="yes" checked>
              Yes</label>
            </div>
            <div class="redio_btn col-sm-4">
             <label>
               <input type="radio" class="redio_button" name="shuffle" value="no">
             No</label>
           </div>
           </div> -->

            <!-- /.card-body -->

            <div class="col-md-12">
                <div class="row">
                    <button type="submit" class="save" name="add_exam">
                        Save
                    </button>

<!--                    <button type="button" name="close_class" data-dismiss="modal" >-->
<!--                        Close-->
<!--                    </button>-->

                </div>
            </div>

        </div>

    </div>
</form>

<!-- End Add Class Form -->



<!----Edit and Updates Command ---->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title " id="exampleModalLongTitle">Update Class, Subject & Chapter Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group" align="center">
                    <select name= "class_list" class="select_box" id="class_Name">
                        <option value= "">Select Class Name </option>
                        <?php
                        $res = mysqli_query($conn,"SELECT * FROM classes");
                        while($row = mysqli_fetch_assoc($res)){ ?>
                            <option value="<?=$row['id'];?>" ><?=$row['class_name']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group" align="center">
                    <select name= "class_list" class="select_box" id="subject_Name">
                        <option value= "" selected disabled>Select Subject Name </option>
                        <!-- <?php
                        $res = mysqli_query($conn,"SELECT * FROM subject");
                        while($row = mysqli_fetch_assoc($res)){ ?>
                          <option value="<?=$row['id'];?>" ><?=$row['subject_name']?></option>
                          <?php } ?> -->
                    </select>
                </div>


                <div class="col-md-12" align="center">
                    <input type="hidden" name="" id="update_chapter_id">
                    <input class="form-master" type="text" placeholder="Please Update Chapter Name*" name="update_chapter" id="update_chapter_name">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mfp-close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_chapter" name="update_chapter">Update</button>
            </div>
        </div>
    </div>
</div>
<!----Edit and Updates Command ---->




<!-- /.content-wrapper -->
<footer class="main-footer ">
    <div class="float-right d-none d-sm-block ">
        <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="https://www.examin.com">eAgriEdu.com</a>.</strong> All rights reserved.
</footer>


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
    $(document).ready(function(){
        $('#chapter_table').DataTable();
    });
</script>

<script>
    window.onload = window.localStorage.clear();
    $('.label.ui.dropdown')
        .dropdown();

    $('.no.label.ui.dropdown')
        .dropdown({
            useLabels: false
        });

    $('.ui.button').on('click', function () {
        $('.ui.dropdown')
            .dropdown('restore defaults')
    })
</script>

<script type="text/javascript">

    const toggleQuestion = question_id => {
        let selected_questions = localStorage.getItem('selected_questions');
        let selected_questions_array=[];
        if (selected_questions == '' || selected_questions === undefined){

        }else {
            selected_questions_array = selected_questions.split(',');
        }
           if (selected_questions_array.includes(question_id)){
               // remove item
               selected_questions_array.splice(selected_questions_array.indexOf(question_id), 1);
               let selected_service = selected_questions_array.join(',');
               localStorage.setItem('selected_questions',selected_service);
               $('#update_question_ids').val(selected_service)
               // console.log('this',s)
           }else{
               // add item
              selected_questions_array.push(question_id);
               let selected_service = selected_questions_array.join(',');
               localStorage.setItem('selected_questions',selected_service);
               $('#update_question_ids').val(selected_service)
           }


    }


    $(document).ready(function(){

        var post_arr = [];
        $('.ItemsCheckBox').click(function(){
            alert('dfasdfs');
        });
        // Get checked checkboxes
        $('.ItemsCheckBox').each(function() {
            if (jQuery(this).is(":checked")) {
                alert("dfasdfsdf");
                var id = this.id;
                alert(id);
                var splitid = id.split('_');
                var postid = splitid[1];

                post_arr.push(postid);

            }
        });


        //Functions to be called when add new exams dropdown will be used to populate subject name and chapter name dropdown list these function are inter-related START..

        $('#className').on('change',function(){
            var classID = $(this).val();
            //console.log(classID);
            if(classID){
                $.ajax({
                    type:'POST',
                    url:'ajax/ajaxfile.php',
                    data:'class_id='+classID,
                    success:function(html){
                        $('#subjectName').html(html);
                        $('#chapterName').html('<option value="">Select Subject first</option>');
                    }
                });
            }else{
                $('#subjectName').html('<option value="">Select country first</option>');
                $('#chapterName').html('<option value="">Select state first</option>');
            }
        });


        $('#subjectName').on('change',function(){
            var subjectID = $(this).val();
            if(subjectID){
                $.ajax({
                    type:'POST',
                    url:'ajax/ajaxfile.php',
                    data:'subject_id='+subjectID,
                    success:function(html){
                        $('#chapterName').html(html);
                    }
                });
            }else{
                $('#chapterName').html('<option value="">Select subject first</option>');
            }
        });


        $('#chapterName').on('change',function(){
            var chapterID = $(this).val();
            if(chapterID){
                $.ajax({
                    type:'POST',
                    url:'ajax/ajaxfile.php',
                    data:'chapterID='+chapterID,
                    success:function(result){
                        //alert(html);
                        //$('.question_list_div').show();
                        // $('#Question-list').html(html);
                        let questionId = localStorage.getItem('questionsIds') ? JSON.parse(localStorage.getItem('questionsIds')):[];
                        let html;
                        JSON.parse(result).forEach(function(singleData,index)  {

                            singleData = JSON.parse(singleData)

                            let checkOrNot = '';
                            if (questionId.includes(singleData.questionId)) {
                                checkOrNot = 'checked';
                            }
                            let selected_ques = $('#selected_questions').val().split(',')
                            console.log('val',selected_ques)
                            html = `
                <label class='DropDownContainer'><span class='questionText  ${(selected_ques.includes(singleData.questionId))?'active_class':''}'>${singleData.question}</span>
                <input class='ItemsCheckBox ClearCheckBox' DropDownId='${singleData.questionId}' value='${singleData.question}' type='checkbox' ${checkOrNot} ><span class='checkmark'></span>
                </label>
            `
                            if (index === 0) {
                                $('#Question-list').html(html);
                            }else{
                                $('#Question-list').append(html)
                            }
                        })

                    }
                });
            }else{
                $('#Question-list').html('<option value="">Select Chapter first</option>');
            }
        });
        //Functions to be called when add new exams dropdown will be used to populate subject name and chapter name dropdown list these function are inter-related END..


        //Functions to be called when edit exams dropdown will be used to populate subject name and chapter name dropdown list these function are inter-related START..

        $('#update_className').on('change',function(){
            var classID = $(this).val();

            $.ajax({
                type:'POST',
                url:'ajax/ajaxfile.php',
                data:'class_id='+classID,
                success:function(html){
                    $('#update_subjectName').html(html);
                    // $("#update_subjectName").val(sid);
                }
            });

        });

        $('#update_subjectName').on('change',function(){
            var sub_id = $(this).val();
            $.ajax({
                type:'POST',
                url:'ajax/ajaxfile.php',
                data:'subject_id='+sub_id,
                success:function(html){
                    $('#update_chapterName').html(html);
                }
            });
        });

        // $('#update_chapterName').on('change',function(){
        //   var chapterID = $(this).val();
        //   $.ajax({
        //     type:'POST',
        //     url:'ajax/ajaxfile.php',
        //     data:'chapterID='+chapterID,
        //     success:function(html){
        //       //alert(html);
        //       $('#update_Question-list').html(html);
        //     }
        //   });
        // });

        $('#update_chapterName').on('change',function(){
            var chapterID = $(this).val();
            $.ajax({
                type:'POST',
                url:'ajax/ajaxfile.php',
                data:'chapterID='+chapterID,
                success:function(result){
                    //alert(html);
                    //$('.question_list_div').show();
                    // $('#Question-list').html(html);
                    let questionId = localStorage.getItem('questionsIds') ? JSON.parse(localStorage.getItem('questionsIds')):[];
                    let html;
                    JSON.parse(result).forEach(function(singleData,index)  {

                        singleData = JSON.parse(singleData)

                        let checkOrNot = '';
                        if (questionId.includes(singleData.questionId)) {
                            checkOrNot = 'checked';
                        }
                        console.log('checking',checkOrNot)
                        html = `
                <label class='DropDownContainer'><span class='questionText'>${singleData.question}</span>
                <input class='ItemsCheckBox ClearCheckBox' DropDownId='${singleData.questionId}' value='${singleData.question}' type='checkbox' ${checkOrNot} onclick="toggleQuestion('${singleData.questionId}')"><span class='checkmark'></span>
                </label>
            `
                        if (index === 0) {
                            $('#update_Question-list').html(html);
                        }else{
                            $('#update_Question-list').append(html)
                        }
                    })

                }
            });
        });

        function update_className(cid,sid){
            var classID = cid;
            if(classID){
                $.ajax({
                    type:'POST',
                    url:'ajax/ajaxfile.php',
                    data:'class_id='+classID,
                    success:function(html){
                        $('#update_subjectName').html(html);
                        $('#chapterName').html('<option value="">Select Subject first</option>');
                        $("#update_subjectName").val(sid);
                    }
                });
            }else{
                $('#subjectName').html('<option value="">Select Class first</option>');
                $('#chapterName').html('<option value="">Select Subject first</option>');
            }
        }

        function update_chapter(sid,cid){
            var subjectID = sid;

            //console.log(subjectID);
            if(subjectID){
                $.ajax({
                    type:'POST',
                    url:'ajax/ajaxfile.php',
                    data:'subject_id='+subjectID,
                    success:function(html){
                        $('#update_chapterName').html(html);
                        $("#update_chapterName").val(cid);
                        //$('#update_Question-list').html(html);
                    }
                });
            }else{
                $('#update_chapterName').html('<option value="">Select subject first</option>');
            }
        }

        function fetch_questions(question_IDs){
            var question_IDs = question_IDs;

            //console.log(subjectID);
            if(question_IDs){
                $.ajax({
                    type:'POST',
                    url:'ajax/ajaxfile.php',
                    data:'question_IDs='+question_IDs,
                    success:function(html){
                        console.log(html)
                        $('#update_Question-list').html(html);
                        //  $("#update_chapterName").val(cid);
                        //  $('#update_Question-list').html(html);
                    }
                });
            }else{
                $('#update_chapterName').html('<option value="">Select subject first</option>');
            }
        }


        //Get the data attribute all values like exam id, exam name, class id, class name, subject id, subject name, chapter id, chapter name to populate the fields related to these data...
        $('.edit_exam').click(function() {
            var exam_id = $(this).data('exam_id');
            //console.log(exam_id);
            // AJAX Request
            $.ajax({
                url: 'edit_exam.php',
                type: 'POST',
                data: {exam_id: exam_id},
                success: function(data){
                    //parse json data coming from edit_exam.php
                    var examData = JSON.parse(data);
                    //console.log(examData[0].attempt);

                    //get the values of json array and store in jquery variables..
                    var id = examData[0].id;
                    var class_name = examData[0].class_name;
                    var class_id = examData[0]. class_id;


                    var subject_name = examData[0].subject_name;
                    var subject_id = examData[0].subject_id;

                    var chapter_name = examData[0].chapter_name;
                    var chapter_id = examData[0].chapter_id;

                    $('#update_className').val(class_id);

                    update_className(class_id, subject_id);
                    update_chapter(subject_id, chapter_id);

                    var exam_name = examData[0].exam_name;
                    var instruction = examData[0].instruction;
                    var exam_duration = examData[0].exam_duration;
                    var attempt = examData[0].attempt;
                    var start_time = examData[0].start_time;
                    var start_date = examData[0].start_date;
                    var exam_date = examData[0].exam_date;
                    var end_date = examData[0].end_date;

                    var total_questions = examData[0].total_questions;
                    var questionIDS = examData[0].questions_ids;
                    // var array = questionIDS.split(',');
                    localStorage.setItem('selected_questions',questionIDS);
                    $('#update_question_ids').val(questionIDS)
                    if (questionIDS == ''){
                        $('#update_Question-list').html('')
                    }else{
                        fetch_questions(questionIDS);
                    }

                    //var array = questionIDS.split(",");
                    //for (i=0;i<array.length;i++){
                    //var value = array[i];
                    //console.log(value);
                    //$("input[name = question_chkbx][DropDownId="+value+"]").attr('checked', true);

                    //}

                    var total_marks = examData[0].total_marks;
                    var pass_percentage = examData[0].pass_percentage;
                    var show_answer_sheet = examData[0].show_answer_sheet;
                    var negative_marking = examData[0].negative_marking;
                    var paid_exam = examData[0].paid_exam;
                    var paid_exam = examData[0].paid_exam;
                    var exam_amt = examData[0].exam_amount;
                    var result_after_finish = examData[0].result_after_finish;
                    var instant_result = examData[0].instant_result;
                    var option_shuffle = examData[0].option_shuffle;

                    //Now assign the values to the fields of modal
                    $('#exam_hidden_id').val(id);
                    $('#update_examName').val(exam_name);
                    $('#update_instruction').val(instruction);
                    $('#update_exam_duration').val(exam_duration);
                    $('#Attempt_count').val(attempt);
                    $('#update_start_time').val(start_time);
                    $('#update_start_date').val(start_date);
                    $('#update_exam_date').val(exam_date);
                    $('#update_end_date').val(end_date);

                    $('#update_totalQuestion').val(total_questions);
                    $('#update_total_marks').val(total_marks);
                    $('#update_required_passPercentage').val(pass_percentage);

                    //make raidio button check uncheck logic....
                    if(show_answer_sheet == "yes"){
                        $("#update_show_answer1").prop("checked", true);
                    }else if(show_answer_sheet == "no"){
                        $("#update_show_answer2").prop("checked", true);
                    }

                    if(negative_marking == "yes"){
                        $("#update_negative_marking1").prop("checked", true);
                    }else if(show_answer_sheet == "no"){
                        $("#update_negative_marking2").prop("checked", true);
                    }

                    if(paid_exam == "yes"){
                        $("#update_paid_exam1").prop("checked", true);
                        $(".update_exam_ammount_show").show();
                        $('#upd_exam_amaunt').val(exam_amt);
                    }else if(paid_exam == "no"){
                        $("#update_paid_exam2").prop("checked", true);
                        $(".update_exam_ammount_show").hide();
                    }

                    if(result_after_finish == "yes"){
                        $("#update_rslt_aftr_fnsh1").prop("checked", true);
                    }else if(result_after_finish == "no"){
                        $("#update_rslt_aftr_fnsh2").prop("checked", true);
                    }

                    if(instant_result == "yes"){
                        $("#update_instant_result1").prop("checked", true);
                    }else if(instant_result == "no"){
                        $("#update_instant_result2").prop("checked", true);
                    }

                    if(option_shuffle == "yes"){
                        $("#update_shuffle1").prop("checked", true);
                    }else if(instant_result == "no"){
                        $("#update_shuffle2").prop("checked", true);
                    }


                }
            });

        });

// var uniqueStr = <?php// echo $uniqueStr; ?>
//                 var sp = uniqueStr.split(",")
//     console.log(sp);
//      for(var i=0; i<sp.length; i++){
//         $(".privisue_quest"+sp[i]).click();
//      }
    });
</script>

<?php
//Call sweet alert popup on getting success message on exam creation..
if(isset($_GET['msg']) && $_GET['msg']=="success"){ ?>
    <script>

        swal({
            title: "<?php echo $_GET['msg']; ?>",
            text: "Exam is Created!",
            icon: "<?php echo $_GET['msg']; ?>",
            button: "OK, Done",
        });
        $('.swal-button--confirm').click(function(){
            window.location.href = 'exam_list.php';
        });

    </script>

<?php }
?>

<!-- Only Exam Paid And Unpaid hide & Show -->
<script>
    $(document).ready(function(){
        $(".exam_ammount_show").hide();
        $(".paid_yes").click(function(){
            $(".exam_ammount_show").show();
        });
        $(".paid_no").click(function(){
            $(".exam_ammount_show").hide();
        });

        //Update paid yes/no
        $(".upd_paid_yes").click(function(){
            $(".update_exam_ammount_show").show();
        });
        $(".upd_paid_no").click(function(){
            $(".update_exam_ammount_show").hide();
        });
    });
</script>
</body>
</html>