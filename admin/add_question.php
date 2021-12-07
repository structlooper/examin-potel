<?php 
require_once 'includes/header.php';
//$_SESSION['ref'] = $_SERVER['SCRIPT_NAME'];
$msg =''; 
if(isset($_GET['did']) && !empty($_GET['did'])){
  echo $id = $_GET['did'];
  $msg = deleteData('questions',$id);
}

//Exam result Status enable/Disable START...
  if(isset($_GET['ques_id']) && $_GET['ques_id']!=''){   
        $ques_id = $_GET['ques_id'];
        $operation = $_GET['operation'];
        if($operation == 'enable'){
          $status = 1;
        }elseif($operation=='disable'){
          $status = 0;
        }
      // $query = "UPDATE exam_attempt SET result_status='$status' WHERE exam_id='$exam_id'";
      $query = "UPDATE questions SET status='$status' WHERE id='$ques_id'";
      $result = mysqli_query($conn,$query);
  }
?>
?>

<head>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/css/flaticon-set.css" rel="stylesheet" />
  <link href="assets/css/magnific-popup.css" rel="stylesheet" />
  <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
  <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
  <link href="assets/css/animate.css" rel="stylesheet" />
  <link href="assets/css/bootsnav.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet" />

  
  <!-- Main Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

  <!-- Theme included stylesheets -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--KATEX Library-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.css" integrity="sha384-AfEj0r4/OFrOo5t7NnNe46zW/tFgW6x/bCJG8FqQCEo3+Aro6EYUG4+cU+KJWu/X" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.js"   integrity="sha384-g7c+Jr9ZivxKLnZTDUhnkOnsh30B4H0rpLUpJ4jAIKs4fnJI+sEnkvrMWph2EDg4" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/contrib/auto-render.min.js" integrity="sha384-mll67QQFJfxn0IYznZYonOWZ644AWYC+Pt2cHqMaRhXVrursRwvLnLaebdGIlYNa" crossorigin="anonymous"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        renderMathInElement(document.body, {
          // customised options
          // • auto-render specific keys, e.g.:
          delimiters: [
               {left: "$$", right: "$$", display: true},
               {left: '$', right: '$', display: false},
               {left: "\\(", right: "\\)", display: false},
               {left: "\\begin{equation}", right: "\\end{equation}", display: true},
               {left: "\\begin{split}", right: "\\end{split}", display: true},
               {left: "\\begin{align}", right: "\\end{align}", display: true},
               {left: "\\begin{alignat}", right: "\\end{alignat}", display: true},               
               {left: "\\begin{gather}", right: "\\end{gather}", display: true},
               {left: "\\begin{CD}", right: "\\end{CD}", display: true},
               {left: "\\[", right: "\\]", display: true}
          ],
          // • rendering keys, e.g.:
          throwOnError : true
        });
    });
</script>

  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <!--SweetAlert CDN-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>


   <!--SweetAlert CDN-->

  <style type="text/css">
   #load_editor0{
    display: block;
  }

  #load_editor1{
    display: block;
  }
  #load_editor2{
    display: block;
  }
  #load_editor3{
    display: block;
  }
  #load_editor4{
    display: block;
  }

  #load_editor5{
    display: block;
  }


   #update_load_editor0{
    display: block;
  }

  #update_load_editor1{
    display: block;
  }
  #update_load_editor2{
    display: block;
  }
  #update_load_editor3{
    display: block;
  }
  #update_load_editor4{
    display: block;
  }

  #update_load_editor5{
    display: block;
  }
</style>

<script>
  var editor0;
  var editor1;
  var editor2;
  var editor3;
  var editor4;
  // var editor5;
  var editor6;


  $(function(){
    var toolbarOption = [
          ['bold','italic','underline'],          // toggled buttons
          ['image'],
          [{ 'font': [] }],
          ['formula'],

          ];

          editor0 = new Quill('#Texteditor0',{
            modules:{
              formula: true,
              toolbar:toolbarOption
            },
            theme:'snow'
          });

          editor1 = new Quill('#Texteditor1',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });


          editor2 = new Quill('#Texteditor2',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });



          editor3 = new Quill('#Texteditor3',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });


          editor4 = new Quill('#Texteditor4',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });


          // editor5 = new Quill('#Texteditor5',{
          //   modules:{ toolbar:toolbarOption},
          //   theme:'snow'
          // });


          editor6 = new Quill('#Texteditor6',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });
        });


  $(document).ready(function(){

      // $("#showEditor0").click(function(){
      //   $("#load_editor0").toggle();
      // });

      // $("#showEditor0").click(function(){
      //   $("#textarea0").toggle();
      // });

      // $("#showEditor1").click(function(){
      //   $("#load_editor1").toggle();
      // });
      // $("#showEditor1").click(function(){
      //   $("#textarea1").toggle();
      // });

      // $("#showEditor2").click(function(){
      //   $("#load_editor2").toggle();
      // });
      // $("#showEditor2").click(function(){
      //   $("#textarea2").toggle();
      // });

      // $("#showEditor3").click(function(){
      //   $("#load_editor3").toggle();
      // });
      // $("#showEditor3").click(function(){
      //   $("#textarea3").toggle();
      // });

      // $("#showEditor4").click(function(){
      //   $("#load_editor4").toggle();
      // });
      // $("#showEditor4").click(function(){
      //   $("#textarea4").toggle();
      // });

      // $("#showEditor5").click(function(){
      //   $("#load_editor5").toggle();
      // });
      // $("#showEditor5").click(function(){
      //   $("#textarea5").toggle();
      // });

      // $("#showEditor6").click(function(){
      //   $("#load_editor6").toggle();
      // });
      // $("#showEditor6").click(function(){
      //   $("#textarea6").toggle();
      // });
   

    });

  $(document).ready(function(){

    var classID;
      var subjectID;
      var chapterID;
      $('#className').change(function(){
            classID = $(this).val();            
          });

      $('#subject-list').change(function(){
            subjectID = $(this).val();        
          });

      $('#chapter-list').change(function(){
            chapterID = $(this).val();           
      });


      //Function to be called when form will be submitted...
      $(".update_save_button").click(function(){

          //Get the values of different text editors START...
          var TextData0 = editor0.getContents();
          var TextDataString0 = editor0.getText()
          var QuillHtml0 = editor0.root.innerHTML.trim();
          //console.log(TextData0);          

          var TextData1 = editor1.getContents();
          var TextDataString1 = editor1.getText();
          var QuillHtml1 = editor1.root.innerHTML.trim();

          var TextData2 = editor2.getContents();
          var TextDataString2 = editor2.getText();
          var QuillHtml2 = editor2.root.innerHTML.trim();

          var TextData3 = editor3.getContents();
          var TextDataString3 = editor3.getText();
          var QuillHtml3 = editor3.root.innerHTML.trim();
      
          var TextData4 = editor4.getContents();
          var TextDataString4 = editor4.getText();
          var QuillHtml4 = editor4.root.innerHTML.trim();

          // var TextData5 = editor5.getContents();
          // var TextDataString5 = editor5.getText();
          // var QuillHtml5 = editor5.root.innerHTML.trim();

          var question_type = $('input[name=show_answer]:checked', 
            '#add_question_form').val();
          console.log(question_type);

          var answer = $('input[name=answer]:checked', 
            '#add_question_form').val();

          var QuesCheck = $('input[name=QuesCheck]:checked', 
            '#add_question_form').val();

          var blank_space = $('#blank_space').val();

          var explanation = $('#textarea6').val();
          var exam_id = $('#examName').val();
          var hint = $('.hint').val();
          var marks = $('#mark').val();
          var negativeMark = $('#negativeMark').val();
          var difficulty = $('#difficulty').val();
          
          $.ajax({
            url: 'add_edit_questions.php',
            method: 'POST',
            data:{save:"save",class_id:classID, subject_id:subjectID, chapter_id:chapterID,   question_type:question_type, editorContent0:QuillHtml0,editorContent1:QuillHtml1, editorContent2:QuillHtml2, editorContent3:QuillHtml3, editorContent4:QuillHtml4,answer:answer, QuesCheck:QuesCheck, blank_space:blank_space, explanation:explanation,exam_id:exam_id,hint:hint, marks:marks, negativeMark:negativeMark, difficulty:difficulty },
            success: function(data){
                if(data.status == 'success'){
                //     alert("Exam Created!");
                //     $('#add_question_form').hide();

                // }else if(data.status == 'error'){
                //     alert("Error on query!");
                // }
              }
            },
              error:function(err){
                console.log("Error : ",err)
              }
          })


        });

    });

  </script>

  <script>
    $(function(){
      $(".SelectOption").click(function(){
        var ShowField = $(this).attr("ShowField");
        $(".MainSection").hide(200);
        $("."+ShowField).show(200);
      })
  })// function close  
    
  // $(function(){
  //     $(".switch_editor").click(function(){
  //       var ShowEditor = $(this).attr("ShowEditor");
  //       $(".textarea").hide(500);
  //       $("."+ShowEditor).show(500);
  //     })
  // }) //funtion close
</script>


<script>
 $(document).ready(function(){
   $("#true_false").click(function(){
     $(".quetion_objective").hide();
     $(".blank_space").hide();
     $(".true_false").show();
     $("#showEditor0").show();
     $("#showEditor1").hide();
     $("#showEditor2").hide();
     $("#showEditor3").hide();
     $("#showEditor4").hide();
     $("#showEditor5").hide();

     
   });

   $("#quetion_objective").click(function(){
     $(".true_false").hide();
     $(".blank_space").hide();
     $(".quetion_objective").show();
     $(".currect_ans").hide();


   });

   $("#fill_in_blank").click(function(){
     $(".true_false").hide();
     $(".quetion_objective").hide();
     $(".blank_space").show();
     $(".currect_ans").hide();

   });

   $("#subjective").click(function(){
     $(".true_false").hide();
     $(".quetion_objective").hide();
     $(".blank_space").hide();
     $(".currect_ans").hide();
     
   });

   $("#matchDfollowing").click(function(){
     $(".true_false").hide();
     $(".quetion_objective").show();
     $(".blank_space").hide();
     $(".currect_ans").hide();
     
   });


   //Radio button click events of update question form START...

     $("#true_false_update").click(function(){
     $("#Ques_main_update").show();
     $("#btn_Option1_update").hide();
     $("#btn_Option2_update").hide();
     $("#btn_Option3_update").hide();
     $("#btn_Option4_update").hide();
     $("#btn_Option5_update").hide();
      $("#btn_currect_ans_update").hide();

     $(".blank_space_update").hide();
     $(".true_false_update").show();
     

     
   });

   $("#quetion_objective_update").click(function(){
     $(".true_false_update").hide();
     $(".blank_space_update").hide();
     $(".quetion_objective_update").show();
     $("#btn_Option1_update").show();
     $("#btn_Option2_update").show();
     $("#btn_Option3_update").show();
     $("#btn_Option4_update").show();
     $("#btn_Option5_update").show();
      $("#btn_currect_ans_update").show();
    


   });

   $("#matchDfollowing_update").click(function(){
    $(".true_false_update").hide();
     $(".quetion_objective_update").show();
     $(".blank_space").hide();
     $(".currect_ans").hide();
     $(".quetion_objective_update").show();
     $("#btn_Option1_update").show();
     $("#btn_Option2_update").show();
     $("#btn_Option3_update").show();
     $("#btn_Option4_update").show();
     $("#btn_Option5_update").show();
      $("#btn_currect_ans_update").show();
     
   });

   //Radio button click events of update question form END..

 });

</script>
<script>
      // Start Add Exam Form validate();
      // var tf ="true"
      $(document).ready(function() {
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
      console.log(post_arr);
    });

    if(post_arr.length > 0){

      var isDelete = confirm("Do you really want to delete records?");
      if (isDelete == true) {
           // AJAX Request
           console.log(post_arr);

           $.ajax({
            url: 'ajax/ajaxfile.php',
            type: 'POST',
            data: { id: post_arr, tableName:"questions"},
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

</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header ">
    <div class="container-fluid ">
      <div class="row mb-2 ">
        <div class="col-sm-6 ">
          <a href= "#add_question_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Question</button></a>
          <a href= "" button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button></a>
        </div>

        <div class="col-sm-6">
          <div class="breadcrumb float-sm-right">
              
                <div class="form-group"> <a href="../uploads/questionCsvfiles/sample.csv">Download sample file </a>

            <a href= "#" button type="button " class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">Upload CSV File</button></a>
          </div>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content " style="width:100%;">
      <div class="container-fluid ">
        <div class="row ">
          <!-- left column -->
          <div class="col-md-12">
            <!-- form start -->
            <table class="table" id="question_table">
              <thead class="bg-primary ">
                <tr>
                  <th scope="col">Select</th>
                  <th scope="col">Question ID</th>
                  <th scope="col">Question Type</th>
                  <th scope="col">Question</th>
                  <th scope="col">Class Name</th>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Chapter Name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 1;                  
                $res = mysqli_query($conn,"SELECT * FROM questions ORDER BY id DESC");

                while($Question_list = mysqli_fetch_assoc($res)){ 
                    $question;
                      //Find and seperate contactnated question and image coming from database..
                      $find = "img-";  
                      if(strpos($Question_list['question'],$find) !== false){
                        
                        $last_space = strrpos($Question_list['question'],'img-');
                        $last_word = substr($Question_list['question'], $last_space);
                        $question = substr($Question_list['question'], 0, $last_space);

                        $img_pos =  strrpos($last_word,'-');
                        $img_pos = $img_pos+1;
                        $img_name = substr($last_word, $img_pos);
                      }else{
                        $question = $Question_list['question'];
                      }

                  ?>
                 <tr id='tr_<?=$Question_list['id'];?>'>
                  <th scope="row ">    
                    <!-- checkbox -->
                    <input type="checkbox" id='del_<?php echo $Question_list['id'];?>' name="delete[]" value="<?=$Question_list['id']; ?>" class="chk">
                  </th>
                  <th scope="row"><?=$Question_list['id'];?></th>
                  <td><?=$Question_list['question_type'];?></td>
                  <td><?=$question;?></td>
                  <td><?=$Question_list['class_name'];?></td>
                  <td><?=$Question_list['subject_name'];?></td>
                  <td><?=$Question_list['chapter_name'];?></td>
                  <!-- <td>Uploaded</td>-->
                  <td>
                        <?php                          
                         if($Question_list['status']==0){ ?>
                           <a href="?type=status&operation=enable&ques_id=<?=$Question_list['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for enable">Inactive</a>
                        <?php  }elseif($Question_list['status']==1){?>
                            <a href="?type=status&operation=disable&ques_id=<?=$Question_list['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for disable">Active</a>
                        <?php }               
                    ?>
                    </td>
                  <td>
                    <!-- <a href="edit_question.php?question_id=<?php echo $Question_list['id']; ?>">
                     <button type="button" class="btn btn-primary btn-sm ">Edit &nbsp;<i class='fa fa-edit'></i>
                     </button>
                   </a> -->
                  <!--  <a href="#edit_question_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_question" data-question_id="<?php echo $Question_list['id'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button>
                   </a> -->
                   <a href="#"> <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm edit_question" data-question_id="<?php echo $Question_list['id'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button>
                   </a>
                 </td>
                 <td class="delete">
                  <a href="?did=<?php echo $Question_list['id'];?>">
                    <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"> Delete &nbsp;<i class='fa fa-trash'></i>
                    </button>
                  </a>
                </td>
              </tr>

            <?php }?>
            
            
            
          </tbody>
        </table>
        <!-- /.card -->
      </section>


        <!-- Start Add Question Form 
          ============================================= -->
          <!-- <form action="add_edit_questions.php" method="post" id="add_question_form" class="mfp-hide white-popup-block"> -->
        <form action="" method="post" id="add_question_form" class="mfp-hide white-popup-block">
         <div class="col-md-12 login-custom">         
           <div class="card-body">
             <div class="form-group row">

              <div class="col-md-4">
                <div class="form-group" align="center">
                  <select name= "class" class="select_box" id="className" onchange="getSubject(this.value)">
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
                  <select name= "subject" class="select_box" id="subject-list" onChange="getChapter(this.value);">
                    <option value= "" selected disabled>Select Subject Name </option>

                  </select>
                </div>
              </div>
              <div class="col-md-4">

                <div class="form-group" align="center" >
                  <select name= "chapter" class="select_box" id="chapter-list">
                    <option value= "" selected disabled>Select Chapter Name </option>

                  </select>
                </div>

              </div>



              <?php echo $msg; ?>
              <div class="col-sm-12">
                <label for="colFormLabelSm" class="Question-type col-sm-12">Question Type</label>  <br/><br/>
              </div>
              <div class="redio_btn col-md-3">
                <label>
                  <input type="radio" class="redio_button" id="quetion_objective" name="show_answer" value="objective" checked>Objective</label>   
                </div>
                <div class="redio_btn col-md-3">
                 <label>
                  <input type="radio" class="redio_button" id="true_false" name="show_answer" value="true_false">True/False
                </label>
              </div>
              <!-- <div class="redio_btn col-md-3">
               <label><input type="radio" class="redio_button" id="fill_in_blank" name="show_answer" value="fill_in_blank" > Fill in the blanks</label>
             </div>
             <div class="redio_btn col-md-3">
               <label><input type="radio" class="redio_button" id="subjective" name="show_answer" value="subjective">Subjective</label> 
             </div> -->

             <!-- <div class="redio_btn col-md-3">
               <label><input type="radio" class="redio_button" id="matchDfollowing" name="show_answer" value="match_the_following">Match the following </label> 
             </div> -->
           </div>



           <div class="quetion_objective row">
            <div class="col-sm-2">
              <button type="button" class="btn btn-light SelectOption" ShowField="QuestionSection" id="Ques_main">Question</button>
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection1"  id="btn_Option1">Option1</button>
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection2" id="btn_Option2">Option2</button>
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection3" id="btn_Option3">Option3</button>
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection4" id="btn_Option4">Option4</button>
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection6" id="btn_currect_ans">Correct Answer</button>
            </div>
          </div>
          <br>
          <div class="form-groups row">
            <div class="col-md-12">

              <div class="QuestionSection MainSection">
               <!--  <textarea class="form-control textarea" id="textarea0" name="question" placeholder="Type your question here*" rows="5"></textarea> -->

               <div id="load_editor0" val=''> 
                <div id="Texteditor0" name="questions" value=""><p>Type Your Question Here...</p> 
                </div>                
              </div>
              <p>To enter formulas please refer <a href="https://katex.org/docs/supported.html" target="_blank">This page for math functions</a></p>
              

              <br>
             <!--  <button id="showEditor0" type="button" class="btn btn-light switch_editor">Switch Editor
             </button> -->
           </div>

           <div class="OptionSection1 MainSection">
             <!--  <textarea  class="form-control textarea" id="textarea1" name="option1" placeholder="Option1*" rows="5"></textarea> -->
             <div id="load_editor1"> 
              <div id="Texteditor1">
                <p></p>
              </div> 
            </div>


            <br>
               <!--  <button id="showEditor1" type="button" class="btn btn-light switch_editor">Switch Editor
               </button> -->
             </div>

             <div class="OptionSection2 MainSection">
               <!--  <textarea  class="form-control textarea" id="textarea2" name="option2" placeholder="Option2*" rows="5"></textarea> -->
               <div id="load_editor2"> 
                <div id="Texteditor2">
                  <p></p>
                </div>
              </div>



              <br>
              <!-- <button id="showEditor2" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
            </div>

            <div class="OptionSection3 MainSection">
              <!-- <textarea  class="form-control textarea" id="textarea3" name="option3" placeholder="Option3*" rows="5"></textarea> -->
              <div id="load_editor3"> 
                <div id="Texteditor3">
                  <p></p>
                </div>
              </div>


              <br>
              <!--  <button id="showEditor3" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
            </div>

            <div class="OptionSection4 MainSection">
             <!--  <textarea  class="form-control textarea" id="textarea4" name="option4" placeholder="Option4*" rows="5"></textarea> -->
             <div id="load_editor4"> 
              <div id="Texteditor4">
                <p></p></div>
              </div>


              <br>
              <!--  <button id="showEditor4" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
            </div>
                          <div class="OptionSection6 MainSection">
                           <div class="col-md-12">
                             <label> <input type="radio" id="defaultCheck" name="answer" value="1" class="defaultCheck2">Answer1</label>      
                           </div>
                           <div class="col-md-12">
                             <label><input type="radio" id="defaultCheck" name="answer" value="2" class="defaultCheck2"> Answer2</label>
                           </div>
                           <div class="col-md-12">
                             <label><input type="radio" id="defaultCheck" name="answer" value="3" class="defaultCheck2"> Answer3</label>  
                           </div>
                           <div class="col-md-12">
                             <label><input type="radio" id="defaultCheck" name="answer" value="4" class="defaultCheck2">Answer4</label>   
                           </div>
                         </div>
                       </div> 
                       <br>              
                     </div>
                   </div>
                   <div class="true_false">
                     <label><div class="redio_btn col-md-4 true_false">True/False</label>       
                     </div>
                     <div class="redio_btn col-md-4">
                      <label><input type="radio" class="redio_button TrueFalseCheck" name="QuesCheck"  value="true"> True</label>
                    </div>
                    <div class="redio_btn col-md-4">
                      <label><input type="radio" class="redio_button TrueFalseCheck" name="QuesCheck" value="false">False</label>
                    </div>
                  </div>

                  
                  <div class="blank_space">
                   <div class="col-md-12">
                     <textarea  class="form-control" id="blank_space" name="blank_space"  placeholder="Blank_Space*" rows="5"></textarea>       
                   </div>
                 </div> <br>

                 <div class="form-group row">
                  <label class="col-md-12">Explanation (optional)</label>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <textarea  class="form-control" id="textarea6" name="explanation" placeholder="Explanation*" rows="5"></textarea>
                    <div id="load_editor6">
                     <div id="Texteditor6"></div>
                   </div> <br>
                   <!-- <button id="showEditor6_update" type="button" class="btn btn-light">Switch Editor</button> -->
                 </div>
               </div>

              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-12">Hint (Optional)</label>
              </div>
              <div class="form-group row">
               <div class="col-sm-12">
                 <input type="text" class="form-control hint" name="hint"  placeholder="Hint to help answer currectly*">
               </div>
             </div>
             <div class="form-row">
              <div class="col-md-4 mb-4">
                <label class ="marks">Marks</label>
                <input type="number" class="form-control" id= "mark" name="marks" placeholder="Marks">
              </div>
              <div class="col-md-4 mb-4">
                <label class ="marks">Negative Marks</label>
                <input type="number" class="form-control" id= "negativeMark" name="negative_marks" placeholder="without minus sign">
              </div>
              <div class="col-md-4 mb-4">
                <label class ="marks">Difficulty Level</label>
                <input type="text" class="form-control" placeholder="difficulty Level" id="difficulty" name="difficulty" value="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <input type="hidden" id="hidden_answer" name="answer">
                <!-- <button type="submit" class="update_save" name="save">Save</button> -->
                <button type="submit" class="update_save_button">Submit</button>
                <button type="close" name="close_class">Close</button>   
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- End Add Class Form -->

      <!-- /.content -->
    </div>

    <!--START UPDATE QUESTION FORM-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" id="edit_question_form">

      <div class="col-md-12 login-custom">
        <h4>Update Question</h4>

      <div class="card-body">
              <div class="form-group row">
                <div class="col-md-4">
                <div class="form-group" align="center">
                  <select name= "class" class="select_box" id="update_className" name="update_className" onchange="getSubject(this.value)">
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

                  <select name= "subject" class="select_box update_subject" id="update_subject-list" onChange="getChapter(this.value);">
                    <option value= "" selected disabled>Select Subject Name </option>

                  </select>
                </div>
              </div>
              <div class="col-md-4">

                <div class="form-group" align="center" >
                  <select name= "chapter" class="select_box" id="update_chapter-list">
                    <option value= "" selected disabled>Select Chapter Name </option>

                  </select>
                </div>

              </div>
              </div>

              <div class="form-group row">
                  <div class="col-sm-12">
                     <label for="colFormLabelSm" class="Question-type col-sm-12">Question Type</label>  <br/><br/>
                 </div>
                  
                   <div class="redio_btn col-md-3">
                       <input type="radio" class="redio_button" id="quetion_objective_update" name="update_show_answer" value="objective" >
                       <label>Objective</label>
                   </div>
                    <div class="redio_btn col-md-3">
                        <input type="radio" class="redio_button" id="true_false_update" name="update_show_answer" value="true_false">
                        <label>True/False</label>
                    </div>
                   <!--  <div class="redio_btn col-md-3">
                          <input type="radio" class="redio_button" id="fill_in_blank_update" name="update_show_answer" value="fill_in_blank">
                          <label>Fill in the blanks</label>
                    </div>
                     <div class="redio_btn col-md-3">
                         <input type="radio" class="redio_button" id="subjective_update" name="update_show_answer" value="subjective">
                         <label>Subjective</label>
                     </div> -->

                     <!--  <div class="redio_btn col-md-3">
                         <input type="radio" class="redio_button" id="matchDfollowing_update" name="update_show_answer" value="match_the_following">
                         <label>Match the following</label>
                     </div> -->

                </div>



                <div class="quetion_objective_update row">
                      <div class="col-sm-1.7">
                            <button type="button" class="btn btn-light SelectOption" ShowField="QuestionSection" id="Ques_main_update">Question</button>
                     </div>
                      <div class="col-sm-2">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection1"  id="btn_Option1_update">Option1</button>
                      </div>
                       <div class="col-sm-2">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection2" id="btn_Option2_update">Option2</button>
                      </div>
                       <div class="col-sm-2">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection3" id="btn_Option3_update">Option3</button>
                       </div>
                       <div class="col-sm-2">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection4" id="btn_Option4_update">Option4</button>
                       </div>                       
                       <div class="col-sm-2">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection6" id="btn_currect_ans_update">Correct Answer</button>
                       </div>
                 </div>
                  <br>
                 <div class="form-groups row">
                      <div class="col-md-12">

                      <div class="QuestionSection MainSection">
                       <!--  <textarea class="form-control textarea" id="textarea0_update" rows="5" name="question"></textarea> -->
                        <div id="update_load_editor0"> 
                        <div id="update_Texteditor0"> 
                      </div>
                     </div>
                     <p>To enter formulas please refer <a href="https://katex.org/docs/supported.html" target="_blank">This page for math functions</a></p>
                        <br>
                      <!--   <button id="update_showEditor0" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
                      </div>

                      <div class="OptionSection1 MainSection">
                       <!--  <textarea  class="form-control textarea" id="textarea1_update" placeholder="Option1*" name="option1" rows="5"></textarea> -->
                        <div id="update_load_editor1"> 
                          <div id="update_Texteditor1">
                            <p>Editor 1</p>
                          </div> 
                        </div>
                        <br>
                        <!-- <button id="update_showEditor1" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
                        </div>

                      <div class="OptionSection2 MainSection">
                       <!--  <textarea  class="form-control textarea" id="textarea2_update" name="option2" placeholder="Option2*" rows="5"></textarea> -->
                        <div id="update_load_editor2"> 
                        <div id="update_Texteditor2">
                          <p>Editor 2</p>
                        </div>
                      </div>
                        <br>
                        <!-- <button id="update_showEditor2" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
                      </div>

                      <div class="OptionSection3 MainSection">
                       <!--  <textarea  class="form-control textarea" id="textarea3_update" name="option3" placeholder="Option3*" rows="5"></textarea> -->
                        <div id="update_load_editor3"> 
                        <div id="update_Texteditor3"><p>Editor 3</p></div></div>
                        <br>
                       <!--  <button id="showEditor3" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
                      </div>

                      <div class="OptionSection4 MainSection">
                       <!--  <textarea  class="form-control textarea" id="textarea4_update" name="option4" placeholder="Option4*" rows="5"></textarea> -->
                        <div id="update_load_editor4"> 
                        <div id="update_Texteditor4"><p>Editor 4</p></div></div>
                        <br>
                        <!-- <button id="showEditor4" type="button" class="btn btn-light switch_editor">Switch Editor</button> -->
                      </div>
<!-- 
                      <div class="OptionSection6 MainSection">
                        <div class="col-md-12">
                        <label> <input type="checkbox" id="defaultCheck" name="update_answer" value="1" class="defaultCheck2_update CheckedBox1">Answer1</label>      
                        </div>
                        <div class="col-md-12">
                        <label><input type="checkbox" id="defaultCheck" name="update_answer" value="2" class="defaultCheck2_update CheckedBox2"> Answer2</label>
                        </div>
                        <div class="col-md-12">
                        <label><input type="checkbox" id="defaultCheck" name="update_answer" value="3" class="defaultCheck2_update CheckedBox3"> Answer3</label>  
                        </div>
                        <div class="col-md-12">
                        <label><input type="checkbox" id="defaultCheck" name="update_answer" value="4" class="defaultCheck2_update CheckedBox4">Answer4</label>   
                        </div>
                        <div class="col-md-12">      
                        <label> <input type="checkbox" id="defaultCheck" name="update_answer" value="5" class="defaultCheck2_update CheckedBox5">Answer5</label>     
                      </div>
                      </div> -->

                      <div class="OptionSection6 MainSection">                      
                         <div class="col-md-12">
                           <label> <input type="radio" id="defaultCheck" name="update_answer" value="1" class="defaultCheck2_update">Answer1</label>      
                         </div>
                         <div class="col-md-12">
                           <label><input type="radio" id="defaultCheck" name="update_answer" value="2" class="defaultCheck2_update">Answer2</label>
                         </div>
                         <div class="col-md-12">
                           <label><input type="radio" id="defaultCheck" name="update_answer" value="3" class="defaultCheck2_update">Answer3</label>  
                         </div>
                         <div class="col-md-12">
                           <label><input type="radio" id="defaultCheck" name="update_answer" value="4" class="defaultCheck2_update">Answer4</label>   
                         </div>
                      </div>

                    </div>
                           <br>
                        
                     </div>
                 </div>

                 <div class="true_false_update row">
                 <div class="redio_btn col-md-4 true_false">
                    <label>True/False</label>
                  </div>
                    <div class="redio_btn col-md-4">
                       <input type="radio" class="redio_button" name="update_QuesCheck"  value="true" id="upd_true">
                       <label>True</label>
                   </div>
                    <div class="redio_btn col-md-4">
                        <input type="radio" class="redio_button" name="update_QuesCheck"  value="false" id="upd_false">
                        <label>False</label>
                    </div>
               </div>

               
               <div class="blank_space_update row">
                      <div class="col-md-12">
                      <textarea  class="form-control" id="blank_space_update" name="blank_space_update" rows="5"></textarea>       
                     </div>
                 </div>

                <br>
                 <div class="form-group row">
                     <label class="col-md-12">Explanation (optional)</label>
                </div>

                <div class="form-group row">
                      <div class="col-md-12">
                      <!-- <textarea  class="form-control" id="textarea6_update" name="explanation" placeholder="Instruction*" rows="5"></textarea> -->

                            <div id="update_load_editor6">
                                  <div id="update_Texteditor6"></div>
                             </div>
                           <br>
                         <!-- <button id="showEditor6" type="button" class="btn btn-light">Switch Editor</button> -->
                     </div>
                 </div>


                 <div class="form-group row">
                       <label for="colFormLabelSm" class="col-sm-12">Hint (Optional)</label>
                 </div>
                 <div class="form-group row">
                      <div class="col-sm-12">
                           <input type="text" class="form-control" id="hint_update" name="hint">
                     </div>
                 </div>

                 <div class="form-row">
                       <div class="col-md-4 mb-4">
                           <label class ="marks">Marks</label>
                           <input type="number" class="form-control" id="update_marks"  name="marks">

                     </div>

                      <div class="col-md-4 mb-4">
                           <label class ="marks">Negative Marks</label>
                           <input type="number" class="form-control" id="update_negative_marks" name="negative_marks" >

                      </div>

                      <div class="col-md-4 mb-4">
                            <label class ="marks">Difficulty Level</label>
                            <input type="text" class="form-control" id="update_difficulty" name="difficulty" value="">

                      </div>
                  </div>

               <div class="col-md-12">
                   <div class="row">
                    <input type="hidden" name="id" id="question_hidden_id">
                    <input type="hidden" id="update_hidden_answer" name="update_">
                       <button type="submit" class="save update_questions_data" name="update_question">
                            Save
                       </button>
                       <button type="close" name="close_class">
                            Close
                      </button>
                   </div>
              </div>
      </div>
  
</form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
 
    <!--END UPDATE QUESTION FORM-->

     <!-- Modal box for csv file upload -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="upload_csv.php" role="form" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
         <div class="col-md-4">
            <div class="form-group" align="center">
              <select name= "class" class="select_box" id="clss4csv" onchange="getCsvSubject(this.value)">
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
              <select name= "subject" class="select_box" id="subject4CSV" onChange="getcsvChapter(this.value);">
                <option value= "" selected disabled>Select Subject Name </option>

              </select>
            </div>
          </div>
          <div class="col-md-4">

            <div class="form-group" align="center" >
              <select name= "chapter" class="select_box" id="chapter4Csv">
                <option value= "" selected disabled>Select Chapter Name </option>

              </select>
            </div>

          </div>
             
                <div class="card-body"> 
                         
                  <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label for="data_name">Name</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <input class="form-control" type="text" name="data_name" value="" placeholder=" Data Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="manage_image">Image</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <div class="custom-file">
                      <div id="filediv">                       
                        <input type="file" name="file_csv">

                      </div>
                    </div>
                  </div>
                </div>
              </div>          

              </div>
             
            <!-- /.card-body -->
             
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

      </div>
       </form>
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer ">   
  <strong>Copyright &copy; <?=date("Y");?> <a href="https://www.examin.com">eAgriEdu.com</a>.</strong> All rights reserved.
</footer>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark ">
 <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
 <script src="assets/js/count-to.js"></script>
 <script src="assets/js/loopcounter.js"></script>
 <script src="assets/js/jquery.nice-select.min.js"></script>
 <script src="assets/js/bootsnav.js"></script>
 <script src="assets/js/main.js"></script>
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

 <!-----For Toggle SideBar Menu------->
 <script type="text/javascript">
  $(document).ready(function () {
    $("#venderSides").click(function(){
      $("#vendorSide").toggle();
    });
    $("#productSide").click(function(){
      $("#Product_stock").toggle();
    });
    $("#Machine").click(function(){
      $("#MachineManagement").toggle();
    });
    $("#saleside").click(function(){
      $("#sale").toggle();
    });
    $("#machin2").click(function(){
      $("#MachineManagement2").toggle();
    });

    //$('#question_table').DataTable();

      $('#question_table').DataTable({
      fixedHeader: true,
      language: {
      searchPlaceholder: "Search Here..."
  }
  });
  $("#question_table").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>");
  });
</script>

<script>
$(document).ready(function(){


  $('#checkbox1').change(function() {
    $('#textbox1').val($(this).is(':checked'));
  });
  $('.defaultCheck2').change(function(){

    var id=$(this).val();              
//console.log(id);
$('#hidden_answer').val(id);
// var answer = $('#textarea'+id);
// $('#hidden_answer').val(answer);
// //console.log(answer);

})
});
</script>

<script>
  function getSubject(val) {
  $.ajax({
    type: "POST",
    url:'ajax/ajaxfile.php',
    data:'class_id='+val,
    success:function(html){
      $('#subject-list').html(html);
      $('#update_subject-list').html(html);
      $('#chapter-list').html('<option value="">Select Subject first</option>'); 
    }
  });
}

function getChapter(val) {  
  $.ajax({
    type: "POST",
    url:'ajax/ajaxfile.php',
    data:'subject_id='+val,
   success:function(html){
          $('#chapter-list').html(html);
          $('#update_chapter-list').html(html);

        }
  });
}
</script>


<script>
  function getCsvSubject(val) {
  $.ajax({
    type: "POST",
    url:'ajax/ajaxfile.php',
    data:'class_id='+val,
    success:function(html){
      $('#subject4CSV').html(html);
      $('#update_subject-list').html(html);
      $('#chapter-list').html('<option value="">Select Subject first</option>'); 
    }
  });
}

function getcsvChapter(val) {
  $.ajax({
    type: "POST",
    url:'ajax/ajaxfile.php',
    data:'subject_id='+val,
   success:function(html){
          $('#chapter4Csv').html(html);
          $('#update_chapter-list').html(html);

        }
  });
}
</script>

<script>
  $(document).ready(function(){
      var question_id;
      var update_editor0;
      var update_editor1;
      var update_editor2;
      var update_editor3;
      var update_editor4;
      var update_editor5;
      var update_editor6;


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
         ['formula'],

        ];

      var question_id;
      var update_classID;
      var update_subjectID;
      var update_chapterID;
     function update_className(cid,sid){
      var classID = cid;
      if( classID){
        $.ajax({
          type:'POST',
          url:'ajax/ajaxfile.php',
          data:'class_id='+classID,
          success:function(html){
            $('#update_subject-list').html(html);
            $('#chapterName').html('<option value="">Select Subject first</option>'); 
            $("#update_subject-list").val(sid);
          }
        }); 
      }else{
        $('#update_subject-list').html('<option value="">Select Class first</option>');
        $('#update_chapter-list').html('<option value="">Select Subject first</option>'); 
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
            $('#update_chapter-list').html(html);
            $("#update_chapter-list").val(cid);
           }
         }); 
      }else{
        $('#update_chapterName').html('<option value="">Select subject first</option>');         
      }
    } 

      //editores of update Question form START
          update_editor0 = new Quill('#update_Texteditor0',{
            modules:{
              formula: true,
              toolbar:toolbarOption
            },
            theme:'snow'
          });

          update_editor1 = new Quill('#update_Texteditor1',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });

          update_editor2 = new Quill('#update_Texteditor2',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });

          update_editor3 = new Quill('#update_Texteditor3',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });

          update_editor4 = new Quill('#update_Texteditor4',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });

          update_editor6 = new Quill('#update_Texteditor6',{
            modules:{ toolbar:toolbarOption},
            theme:'snow'
          });

          //editores of update Question form END


    $(document).on("click", '.edit_question',function(){
     
        var question_id = $(this).data('question_id'); 
        //console.log(question_id);       

          //SET the Contents of different text editors START...
          function addBlogData0(html){            
             var TextData0 = update_editor0.clipboard.convert(html);             
             update_editor0.setContents(TextData0,'silent');
          }

          function addBlogData1(html){
            
             var TextData1 = update_editor1.clipboard.convert(html);             
             update_editor1.setContents(TextData1,'silent');
          }

          function addBlogData2(html){            
             var TextData2 = update_editor2.clipboard.convert(html);            
             update_editor2.setContents(TextData2,'silent');
          }

           function addBlogData3(html){            
             var TextData3 = update_editor3.clipboard.convert(html);             
             update_editor3.setContents(TextData3,'silent');
          }

          function addBlogData4(html){            
             var TextData4 = update_editor4.clipboard.convert(html);             
             update_editor4.setContents(TextData4,'silent');
          }

          function addBlogData6(html){            
             var TextData6 = update_editor6.clipboard.convert(html);            
             update_editor6.setContents(TextData6,'silent');
          }


        // AJAX Request
           $.ajax({
              url: 'edit-question.php',
              type: 'POST',
              data: { question_id: question_id},
              success: function(data){               

                //$('#edit_question_form_reload').html(html);
                var finalData = JSON.parse(data);                
                //console.log(finalData);
                var len = finalData.length;               

                for(var i=0; i<len; i++){
                   var id = finalData[i].id;                                      
                   var question_type = finalData[i].question_type;

                   var question = finalData[i].question;
                   var option_1 = finalData[i].option_1;
                   var option_2 = finalData[i].option_2;
                   var option_3 = finalData[i].option_3;                  
                   var option_4 = finalData[i].option_4;

                   var correct_answer = finalData[i].correct_answer;
                   var is_true_or_false = finalData[i].is_true_or_false;                  
                   var fill_in_the_blanks = finalData[i].fill_in_the_blanks;
                   var explanation = finalData[i].explanation;
                   // var exam_name = finalData[i].exam_name;
                   // var exam_id = finalData[i].exam_id;

                   var class_name = finalData[i].class_name;
                   var class_id = finalData[i].class_id;

                   var subject_name = finalData[i].subject_name;
                   var subject_id = finalData[i]. subject_id;

                   var chapter_name = finalData[i].chapter_name;                  
                   var chapter_id = finalData[i]. chapter_id;

                   $('#update_className').val(class_id);
                  update_className(class_id, subject_id);
                  update_chapter(subject_id, chapter_id);

                   $('#question_hidden_id').val(id);

                   $("#update_className").val(class_id);

                   $("#update_subject-list").val(subject_id);
                   $("#update_chapter-list").val(chapter_id);


                   var hint = finalData[i].hint;
                   var marks = finalData[i].marks;
                   var negative_marks = finalData[i].negative_marks;
                   var difficulty_level = finalData[i].difficulty_level;
                   console.log(hint);
                   console.log(marks);
                   console.log(negative_marks);
                   console.log(difficulty_level);                 

                    if(question_type == "objective"){

                      $(".true_false_update").hide();
                      $(".blank_space_update").hide();
                      $(".quetion_objective_update").show();
                      $("#btn_Option1_update").show();
                      $("#btn_Option2_update").show();
                      $("#btn_Option3_update").show();
                      $("#btn_Option4_update").show();
                      $("#btn_Option5_update").show();
                      $("#btn_currect_ans_update").show();
                      $("#quetion_objective_update").prop("checked", true);

                    }else if(question_type == "true_false"){
                       $("#Ques_main_update").show();
                       $("#btn_Option1_update").hide();
                       $("#btn_Option2_update").hide();
                       $("#btn_Option3_update").hide();
                       $("#btn_Option4_update").hide();
                       $("#btn_Option5_update").hide();
                        $("#btn_currect_ans_update").hide();

                       $(".blank_space_update").hide();
                       $(".true_false_update").show();

                       $("#true_false_update").prop("checked", true);
                       if(is_true_or_false == 1){
                         $("#upd_true").prop("checked", true);
                       }else if(is_true_or_false == 2){
                        $("#upd_false").prop("checked", true);
                       }
                    }else if(question_type == "fill_in_blank"){
                        $("#fill_in_blank_update").prop("checked", true);
                    }else if(question_type == "subjective"){
                      $("#subjective_update").prop("checked", true);
                    }else if(question_type == "match_the_following"){
                      $("#matchDfollowing_update").prop("checked", true);
                    }

                  //Call following functions to load data to editors...
                   addBlogData0(question);
                   addBlogData1(option_1);
                   addBlogData2(option_2);
                   addBlogData3(option_3);
                   addBlogData4(option_4);
                   //Call following functions to load data to editors end...

                    var value = correct_answer;
                    $("input[name=update_answer][value=" + value + "]").attr('checked', 'checked');
                   
                    addBlogData6(explanation);                   
                   
                    //$('#examName').val(exam_name); 
                    $('#hint_update').val(hint);
                    $('#update_marks').val(marks);
                    $('#update_negative_marks').val(negative_marks);
                    $('#update_difficulty').val(difficulty_level);               
                  
                }

                //Function to get id of correct_answer check and concatenating it with options textarea ids so that that option value is get and passed as hidden answer while update click..
                $('.defaultCheck2_update').change(function(){
                var id=$(this).val();              
                $('#update_hidden_answer').val(id);

                })
              },
              error:function(err){
                console.log("Error : ",err)
              }
           });
    });

      //Function to be called when update form will be submitted...
      $(".update_questions_data").click(function(){

          var question_id = $('#question_hidden_id').val();
          var update_classID = $('#update_className').val();
          var update_subjectID = $('#update_subject-list').val();
          var update_chapterID = $('#update_chapter-list').val();
          
          //Get the values of different text editors START...
          var TextData0 = update_editor0.getContents();
          var TextDataString0 = update_editor0.getText();
          var QuillHtml0 = update_editor0.root.innerHTML.trim();
          //console.log("EditorData0_contents_:"+QuillHtml0);          

          var TextData1 = update_editor1.getContents();
          var TextDataString1 = update_editor1.getText();
          var QuillHtml1 = update_editor1.root.innerHTML.trim();
          //console.log("EditorData1_contents :"+QuillHtml1); 

          var TextData2 = update_editor2.getContents();
          var TextDataString2 = update_editor2.getText();
          var QuillHtml2 = update_editor2.root.innerHTML.trim();
          //console.log("EditorData2_contents :"+QuillHtml2); 

          var TextData3 = update_editor3.getContents();
          var TextDataString3 = update_editor3.getText();
          var QuillHtml3 = update_editor3.root.innerHTML.trim();
          //console.log("EditorData3_contents :"+QuillHtml3); 

          var TextData4 = update_editor4.getContents();
          var TextDataString4 = update_editor4.getText();
          var QuillHtml4 = update_editor4.root.innerHTML.trim();
          //console.log("EditorData4_contents :"+QuillHtml4); 

          var question_type = $('input[name=update_show_answer]:checked', 
            '#edit_question_form').val();
          //console.log(question_type);

          var answer = $('input[name=update_answer]:checked', 
            '#edit_question_form').val();          

          var QuesCheck = $('input[name=update_QuesCheck]:checked', 
            '#edit_question_form').val();

          var blank_space = $('#blank_space_update').val();

          var TextData6 = update_editor6.getContents();
          var TextDataString5 = update_editor6.getText();
          var QuillHtml6 = update_editor6.root.innerHTML.trim();
          //console.log("EditorData5_contents :"+QuillHtml6); 

          var hint = $('#hint_update').val();
          var marks = $('#update_marks').val();
          var negativeMark = $('#update_negative_marks').val();
          var difficulty = $('#update_difficulty').val();

          $.ajax({
            url: 'add_edit_questions.php',
            method: 'POST',
           data:{update_question:"update_question", question_id:question_id, class_id:update_classID, subject_id:update_subjectID, chapter_id:update_chapterID, question_type:question_type, editorContent0:QuillHtml0,editorContent1:QuillHtml1, editorContent2:QuillHtml2, editorContent3:QuillHtml3, editorContent4:QuillHtml4,answer:answer, QuesCheck:QuesCheck, blank_space:blank_space, explanation:QuillHtml6, hint:hint, marks:marks, negativeMark:negativeMark, difficulty:difficulty },
            success: function(data){
                if(data.status == 'success'){
                //     alert("Question Created!");
                //     $('#add_question_form').hide();

                // }else if(data.status == 'error'){
                //     alert("Error on query!");
                // }
              }
            },
              error:function(err){
                console.log("Error : ",err)
              }
          })
        });
  });

</script>
<?php 
if(isset($_GET['msg']) && $_GET['msg']=="fileuploaded"){ ?>
  <script>
     swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Your Question File Uploaded Successfully",
    icon: "<?php echo 'success' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'add_question.php';
  });
  </script>
<?php }

?>

</body>
</html>