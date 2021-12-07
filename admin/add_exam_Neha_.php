<?php 
require_once 'includes/header.php';

if(isset($_GET['did']) && !empty($_GET['did'])){
  echo $id = $_GET['did'];
  $msg = deleteData('exam',$id);
}

//Exam Status Active/Deactive START...
if(isset($_GET['id']) && $_GET['id']!=''){   
  $id = $_GET['id'];
  $operation = $_GET['operation'];
  if($operation == 'active'){
    $status = 1;
  }elseif($operation=='deactive'){
    $status = 0;
  }
  $query = "UPDATE exam SET status='$status' WHERE id ='$id'";
  $result = mysqli_query($conn,$query);
}


?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Examin| Online Exam</title>

  <!--- Validate jQuery---->

  <!-- Main Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

  <!-- Theme included stylesheets -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

  <!-- iCheck -->
  <link href="assets2/css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets2/css/flaticon-set.css" rel="stylesheet" />
  <link href="assets2/css/magnific-popup.css" rel="stylesheet" />
  <link href="assets2/css/owl.carousel.min.css" rel="stylesheet" />
  <link href="assets2/css/owl.theme.default.min.css" rel="stylesheet" />
  <link href="assets2/css/animate.css" rel="stylesheet" />
  <!--  <link href="assets/css/bootsnav.css" rel="stylesheet" /> -->
  <link href="assets2/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets2/css/style2.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

  <link href="assets2/css/multiple_selection.css"  rel="stylesheet" type="text/css" />

  <!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!--SweetAlert CDN-->

  <!-- <script type="text/javascript" src="assets2/js/custom_multiple_select.js"></script> -->

  <script>
      // Start Add Exam Form validate();

      $(document).ready(function() {

        $(".save").click(function(){
          var className = $("#className").val();
          var subjectName = $("#subjectName").val();
          var chapterName = $("#chapterName").val();
          var examName = $("#examName").val();
          var textArea = $("#textarea").val();
          var ExamDuration = $("#ExamDuration").val();
          var attemptCount = $("#attemptCount").val();
       // var startTime =$("#startTime").val();
       var start_date = $("#start_date").val();
       var end_date = $("#end_date").val();

       if(className == null){
         alert("Please Select Class Name");
         $("#className").focus();
         return false;
       }
       else if(subjectName == null){
        alert("Please Select Subject Name");
        $("#subjectName").focus();
        return false;
      }
      else if(chapterName == null){
       alert("Please Select Chapter Name");
       $("#chapterName").focus();
       return false;
     }
     else if(examName == ""){
      alert("Enter Exam Name");
      $("#examName").focus();
      return false;  
    }
    else if(textArea == ""){
      alert("Enter Instruction");
      $("#textarea").focus();
      return false;
    }
    else if(ExamDuration == ""){
      alert("Enter Exam Duration Time");
      $("#ExamDuration").focus();
      return false;  
    }
    else if(ExamDuration <= "1"){
      alert("Please Enter a Valide time duration");
      $("#ExamDuration").focus();
      return false;  
    }
    else if(attemptCount <= "0"){
      alert("Enter Attempt Count Time");
      $("#attemptCount").focus();
      return false;  
    }
        // else if(startTime == ""){
        //   alert("Please Select Start time");
        //   $("#startTime").focus();
        //   return false;  
        // }
        else if (start_date == ""){
          alert("Please select start date");
          $("#start_date").focus();
          return false;
        }
        else if (end_date == ""){
          alert("Please select end date");
          $("#end_date").focus();
          return false;
        }
        // else{
        //   alert("Success");  
        // }

      })

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
            data: { id: post_arr, tableName:"exam"},
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

    //$("#add_exam_form").validate();
  </script>


  <script>

    $(function(){
      var toolbarOption = [
          ['bold','italic','underline'],           // toggled buttons
          ['link'],  
          ['image'],
         [{ 'header': 1 }, { 'header': 2 }],               // custom button values
         [{ 'list': 'ordered'}, { 'list': 'bullet' }],
         [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
         //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
         [{ 'color': [] }, { 'background': [] }],
         [{ 'font': [] }],
         [{ 'align': [] }],

         ];
         var editor = new Quill('#Texteditor0',{
          modules:{ toolbar:toolbarOption},
          theme:'snow'
        });



         $("#showEditor").click(function(){
          $("#load_editor0").toggle();
        });

         $("#showEditor").click(function(){
          $("#textarea").toggle();
        });

       })

     </script>

     <script type="text/javascript">

      $(function(){

        $(document).on("click", ".DropDownData", function(res){
          var DivHead = res.target.parentNode;
          $(DivHead).find(".DropDownList").toggleClass("DropDownToggleList");
          $(DivHead).find(".DropDownChevron").toggleClass("DropDownChevronToggle");
        })

        $(document).on("click", ".ItemsCheckBox", function(res){
          var DivHead = res.target.parentNode.parentNode.parentNode;
          var data = [];
          var datas = [];
          var id=[];
          var ids=[];
          var totalSelected;
          $.each($(DivHead).find(".ItemsCheckBox:checked"), function(){
            data.push($(this).val());
            totalQuestionSelected = data.length;
            $('#totalQuestion').val(totalQuestionSelected);
            $('#update_totalQuestion').val(totalQuestionSelected)
            id.push($(this).attr("DropDownId"));
          })
          for(var i=0; i<data.length; i++){
            datas[i] = data[i]+"";
            ids[i] = id[i]+"";
          }
          FinalItem = data.toString();

          $(".DropDownId").val(datas);
          $(".showData").val(ids);
  }) // Select CheckBox Close   

}) // Open CheckBox List Close

</script>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
  <!-- Content Header (Page header) -->
  <section class="content-header ">
    <div class="container-fluid ">
      <div class="row mb-2 ">
        <div class="col-sm-6 ">
          <a href= "#add_exam_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Exam</button></a>
          <button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button>

          <!-- <a href= "#" button type="close " class="btn btn-danger btn-sm delete">Delete</button></a> -->
        </div>         
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid ">
      <div class="row ">
        <!-- left column -->
        <div class="col-md-12 ">
          <!-- form start -->
          <table class="table ">
            <thead class="bg-primary ">
              <tr>
                <th scope="col ">Select</th>
                <th scope="col ">id</th>
                <th scope="col ">Exam Name</th>
                <th scope="col ">Type</th>
                <th scope="col ">Status</th>
                <!-- <th scope="col ">Result</th> -->
                <th scope="col ">Action</th>
                <th scope="col ">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              $res = mysqli_query($conn,"SELECT * FROM exam");

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

                </select>
              </div>
            </div>
            <div class="col-md-4">

              <div class="form-group" align="center" >
                <select name= "chapter" class="select_box" id="chapterName">
                  <option value= "" selected disabled>Select Chapter Name </option>

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
              <input type="text" readonly class="InputDefault ValidInputField DropDownData showData col-md-6" name="question_ids" style="display: none;">


              <div class="DropDownList" id="Question-list">
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
          <button id="showEditor" type="button" class="btn btn-light">Switch Editor</button>
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

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-4">Required Passsing Percentag*</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="passPercentage" name="required_passPercentage" placeholder="Required Passsing Percentag" >
        </div>
      </div>

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-4">Show Answer Sheet</label>
        <div class="redio_btn col-sm-4">
         <label>
           <input type="radio"  class="redio_button" name="show_answer" value="yes" checked> Yes</label>
         </div>
         <div class="redio_btn col-sm-4">
          <input type="radio" class="redio_buttons" name="show_answer" value="no">
          <label>No</label>
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
       <label>No</label>
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
       <label>No</label>
     </div>
   </div>

     <div class="form-group row exam_ammount_show">
        <label for="colFormLabelSm" class="col-sm-4">Please Enter Amount</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="exam_amaunt" name="exam_amaunt" placeholder="Please Enter Ammount" >
        </div>
    </div>

   <div class="form-group row">
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
   </div>

   <div class="form-group row">
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
 </div>

 <div class="form-group row">
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
</div>

<!-- /.card-body -->

<div class="col-md-12">
 <div class="row">
  <button type="submit" class="save" name="add_exam">
    Save
  </button>

  <button type="close" name="close_class" data-dismiss="modal">
    Close
  </button> 
  
</div>
</div>

</div>

</div>
</form>
<!-- End Add Class Form -->
            <!-- Start Update Exam Form
              ============================================= -->
              <!-- ################Load the edit button throught ajax call in this div section ##################
              <div id="edit_exam_form">

              </div> -->

              <form action="add-update-exam.php" method="post" id="update_exam_form" class="mfp-hide white-popup-block">
                <div class="col-md-12 login-custom">                                
                  <h4>Update Exaam Form </h4>
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
                     <div class="DropDownHead col-md-12 col-lg-8" id="update_dropdowndHead">
                      <input type="text" class="InputDefault DropDownId" name="update_question_list" autocomplete="off">
                      <button class="btn btn-secondary btn-sm InputDefault ValidInputField DropDownData showData dropdown-toggle" type="button" id="update_Question-list" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LIST</button>
                      <div class="dropdown-menu" aria-labelledby="update_Question-list">
                      <input type="text" readonly class="InputDefault ValidInputField DropDownData showData" name="update_question_ids" style="display: none;" >

                      <div class="DropDownList" id="update_Question-list">
                        <br>

                      </div>
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
                      <button id="showEditor" type="button" class="btn btn-light">Switch Editor</button>
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
                      <label> <input type="radio" class="redio_button" id="update_paid_exam1" name="update_paid_exam" value="yes">&nbsp; Yes</label>
                    </div>
                    <div class="redio_btn col-sm-4">
                      <label> <input type="radio" class="redio_button" id="update_paid_exam2" name="update_paid_exam" value="no">&nbsp; No</label>
                    </div>
                  </div>

                  <div class="form-group row">
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
                  </div>

                  <!-- /.card-body -->

                  <div class="col-md-12">
                    <div class="row">
                      <input type="hidden" name="exam_id" id="exam_hidden_id">
                      <button type="submit" name="update_exam">
                       Update
                     </button>
                     <button type="close" name="close_class">
                       Close
                     </button>
                   </div>
                 </div>

               </div>

             </div>
           </form>
           <!--################Load the edit button throught ajax call in this div section ##################-->                               
           <!-- End Update Exam form -->
           <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer ">
          <div class="float-right d-none d-sm-block ">
            <b>Version</b> 3.1.0-rc
          </div>
          <strong>Copyright &copy; 2014-2020 <a href="https://www.examin.com">Examin</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark ">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      <!--  <script src="plugins/jquery/jquery.min.js "></script> -->
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

      <script>
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
        $(document).ready(function(){

          var post_arr = [];
          $('.ItemsCheckBox').click(function(){
            alert('dfasdfs');
          });
          // Get checked checkboxes
          $('.ItemsCheckBox ').each(function() {
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
        url:'ajax/ajaxFile.php',
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
        url:'ajax/ajaxFile.php',
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
        url:'ajax/ajaxFile.php',
        data:'chapterID='+chapterID,
        success:function(html){
          //alert(html);
          $('.question_list_div').show();
          $('#Question-list').html(html);
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
        url:'ajax/ajaxFile.php',
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
        url:'ajax/ajaxFile.php',
        data:'subject_id='+sub_id,
        success:function(html){
          $('#update_chapterName').html(html);
        }
      }); 
    });

    $('#update_chapterName').on('change',function(){
      var chapterID = $(this).val();
      $.ajax({
        type:'POST',
        url:'ajax/ajaxFile.php',
        data:'chapterID='+chapterID,
        success:function(html){
          //alert(html);
          $('#update_Question-list').html(html);
        }
      }); 
    });
    
    function update_className(cid,sid){
      var classID = cid;
      if(classID){
        $.ajax({
          type:'POST',
          url:'ajax/ajaxFile.php',
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
          url:'ajax/ajaxFile.php',
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
        fetch_questions(questionIDS);

        var array = questionIDS.split(",");
        for (i=0;i<array.length;i++){
          var value = array[i];
          console.log(value);
          $("input[name = question_chkbx][DropDownId="+value+"]").attr('checked', true);
        
        }
          
          var total_marks = examData[0].total_marks;
          var pass_percentage = examData[0].pass_percentage;
          var show_answer_sheet = examData[0].show_answer_sheet;
          var negative_marking = examData[0].negative_marking;
          var paid_exam = examData[0].paid_exam;
          var paid_exam = examData[0].paid_exam;
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
     }else if(paid_exam == "no"){
      $("#update_paid_exam2").prop("checked", true);
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
 });
</script>
</body>
</html>