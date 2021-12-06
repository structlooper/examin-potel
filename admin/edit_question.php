<?php 
require_once 'includes/header.php';
  $msg ='';
  $exam_id = ''; 
  //Getting this id from add_question.php on edit click...and getting here in $exam_id to fetch all the question related to this exam below..
  if(isset($_GET['exam_id']) && $_GET['exam_id']!=''){
      $exam_id = $_GET['exam_id'];

    }
    //
    if(isset($_GET['did']) && !empty($_GET['did'])){
      echo $id = $_GET['did'];
      $msg = deleteData('questions',$id);
    }

   
  ?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
  
  <script>
      $(function(){
        // var toolbarOption = [
        //   ['bold','italic','underline'],           // toggled buttons
        //   ['link'],  
        //   ['image'],
        //  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        //  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        //  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        //  //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        //  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        //  [{ 'color': [] }, { 'background': [] }],
        //  [{ 'font': [] }],
        //  [{ 'align': [] }],

        // ];
        // var editor0 = new Quill('#Texteditor0',{
        //   modules:{ toolbar:toolbarOption},
        //   theme:'snow'
        // });

        // var editor1 = new Quill('#Texteditor1',{
        //   modules:{ toolbar:toolbarOption},
        //   theme:'snow'
        // });

        // var editor2 = new Quill('#Texteditor2',{
        //   modules:{ toolbar:toolbarOption},
        //   theme:'snow'
        // });

        // var editor3 = new Quill('#Texteditor3',{
        //   modules:{ toolbar:toolbarOption},
        //   theme:'snow'
        // });


        // var editor4 = new Quill('#Texteditor4',{
        //   modules:{ toolbar:toolbarOption},
        //   theme:'snow'
        // });


        // var editor5 = new Quill('#Texteditor5',{
        //   modules:{ toolbar:toolbarOption},
        //   theme:'snow'
        // });


        // var editor6 = new Quill('#Texteditor6',{
        //   modules:{ toolbar:toolbarOption},
        //   theme:'snow'
        // });

      })
     

        $(document).ready(function(){

        $("#showEditor0").click(function(){
          $("#load_editor0").toggle();
         });

         $("#showEditor0").click(function(){
          $("#textarea0").toggle();
         });

         $("#showEditor1").click(function(){
          $("#load_editor1").toggle();
         });
         $("#showEditor1").click(function(){
          $("#textarea1").toggle();
         });

         $("#showEditor2").click(function(){
          $("#load_editor2").toggle();
         });
         $("#showEditor2").click(function(){
          $("#textarea2").toggle();
         });

         $("#showEditor3").click(function(){
          $("#load_editor3").toggle();
         });
         $("#showEditor3").click(function(){
          $("#textarea3").toggle();
         });

         $("#showEditor4").click(function(){
          $("#load_editor4").toggle();
         });
         $("#showEditor4").click(function(){
          $("#textarea4").toggle();
         });

         $("#showEditor5").click(function(){
          $("#load_editor5").toggle();
         });
         $("#showEditor5").click(function(){
          $("#textarea5").toggle();
         });

         $("#showEditor6").click(function(){
          $("#load_editor6").toggle();
         });
         $("#showEditor6").click(function(){
          $("#textarea6").toggle();
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

     // Delete Action code
     $(".delete").click(function(){
       var a = confirm("Confirm to Delete");
         
        if(a) {
              alert( "Delete Success" );
          }

          })
          
      // Delete Action code end

      });

    </script>



</head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <h4 align="center" class="text-success">
      <?php 
        if ( isset($_GET['success']) && $_GET['success'] == 1 )
          {
               // treat the succes case ex:
               echo "Question Updated";
          }
      ?>
    </h4>
    <!-- Main content -->
    <section class="content ">
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
                    <th scope="col ">Question</th>
                    <th scope="col ">Answer</th>
                    <th scope="col ">Action</th>
                    <th scope="col ">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    //fetch the data from question table based on edit_id which is exam id and is also stored in question table exam_id column...
                    $i = 1;
                    $query = "SELECT * FROM questions WHERE exam_id = '$exam_id'";
                    $question_list = mysqli_query($conn,$query);
                    
                    while($questionData = mysqli_fetch_assoc($question_list)){ 

                       $question;
                      //Find and seperate contactnated question and image coming from database..
                      $find = "img-";  
                          if(strpos($questionData['question'],$find) !== false){
                            
                            $last_space = strrpos($questionData['question'],'img-');
                            $last_word = substr($questionData['question'], $last_space);
                            $question = substr($questionData['question'], 0, $last_space);

                            $img_pos =  strrpos($last_word,'-');
                            $img_pos = $img_pos+1;
                            $img_name = substr($last_word, $img_pos);
                          }else{
                            $question = $questionData['question'];
                          }

                      if($questionData['question_type'] == "objective"){ ?>
                        <tr>
                          <th scope="row ">    
                            <!-- checkbox -->
                            <input type="checkbox" id="defaultCheck" name="example2">
                          </th>
                            <th scope="row "><?=$i;?></th>
                            <td> 
                              <div><?=$question;?></div>
                                <ul class="list-item ">
                                    <li class="list-item ">
                                       <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_1'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_1'],'img-');
                                        $last_word = substr($questionData['option_1'], $last_space);
                                         $option_1 = substr($questionData['option_1'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_1 = $questionData['option_1'];
                                      }

                                      echo $option_1;

                                      ?> 

                                    </li>
                                    <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_2'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_2'],'img-');
                                        $last_word = substr($questionData['option_2'], $last_space);
                                         $option_2 = substr($questionData['option_2'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_2 = $questionData['option_2'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_2?></li>

                                    <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_3'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_3'],'img-');
                                        $last_word = substr($questionData['option_3'], $last_space);
                                         $option_3 = substr($questionData['option_3'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_3 = $questionData['option_3'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_3;?></li>

                                     <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_4'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_4'],'img-');
                                        $last_word = substr($questionData['option_4'], $last_space);
                                         $option_4 = substr($questionData['option_4'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_4 = $questionData['option_4'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_4;?></li>

                                    <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_5'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_5'],'img-');
                                        $last_word = substr($questionData['option_5'], $last_space);
                                         $option_5 = substr($questionData['option_5'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_5 = $questionData['option_5'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_5;?></li>
                                  </ul>
                              </td>
                                <td><?=$questionData['correct_answer'];?></td>
                                <td>

                                  <a href="#edit_question_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_question" data-question_id="<?php echo $questionData['id'];?>" data-exam_id="<?php echo $questionData['exam_id'];?>" data-exam_name="<?php echo $questionData['exam_name']; ?>" data-class_id="<?php echo $questionData['class_id'];?>" data-class_name="<?php echo $questionData['class_name'];?>" data-subject_id="<?php echo $questionData['subject_id'];?>" data-subject_name="<?php echo $questionData['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>
                                </td>
                                <td class="delete">
                                  <a href="?did=<?php echo $questionData['id'];?>">
                                    <button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button>
                                  </a>
                                </td>
                            </tr>  
                     <?php  }
                        elseif($questionData['question_type']=="true_false"){ ?>

                          <tr>
                            <th scope="row ">    
                              <!-- checkbox -->
                              <input type="checkbox" id="defaultCheck" name="example2">
                            </th>
                            <th scope="row "><?=$i;?></th>
                            <td> 
                              <div><?=$question;?></div>
                                <ul class="list-item ">
                                    <li class="list-item "><!-- <?php if($questionData['is_true_or_false'] == 1){ echo "True";}else{echo "false";}?> -->True</li>
                                    <li class="list-item "><!-- <?php if($questionData['is_true_or_false'] == 1){ echo "True";}else{echo "false";}?> -->False</li>
                                    
                                  </ul>
                             </td>
                             <td><?php 

                                if($questionData['correct_answer']==1){
                                  echo "True";
                                }else{
                                  echo "False";
                                }

                             ?>

                                </td>
                              <td>
                                <a href="#edit_question_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_question" data-question_id="<?php echo $questionData['id'];?>" data-exam_id="<?php echo $questionData['exam_id'];?>" data-exam_name="<?php echo $questionData['exam_name']; ?>" data-class_id="<?php echo $questionData['class_id'];?>" data-class_name="<?php echo $questionData['class_name'];?>" data-subject_id="<?php echo $questionData['subject_id'];?>" data-subject_name="<?php echo $questionData['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>
                              </td>
                              <td class="delete">
                                <a href="?did=<?php echo $questionData['id'];?>">
                                  <button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button>
                                </a>
                              </td>
                            </tr>  

                        <?php }elseif($questionData['question_type']=="fill_in_blank"){ ?>
                            <tr>
                              <th scope="row ">    
                                <!-- checkbox -->
                                <input type="checkbox" id="defaultCheck" name="example2">
                              </th>
                                <th scope="row "><?=$i;?></th>
                                <td> 
                                  <div><?=$questionData['question'];?></div>
                                    <!-- <ul class="list-item ">
                                        <li class="list-item "><?=$questionData['fill_in_the_blanks'];?></li>                                     
                                        
                                      </ul> -->
                                    </td>
                                    <td><?=$questionData['fill_in_the_blanks'];?></td>
                                    <td><a href="#edit_question_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_question" data-question_id="<?php echo $questionData['id'];?>" data-exam_id="<?php echo $questionData['exam_id'];?>" data-exam_name="<?php echo $questionData['exam_name']; ?>" data-class_id="<?php echo $questionData['class_id'];?>" data-class_name="<?php echo $questionData['class_name'];?>" data-subject_id="<?php echo $questionData['subject_id'];?>" data-subject_name="<?php echo $questionData['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a></td>
                                    <td class="delete">
                                      <a href="?did=<?php echo $questionData['id'];?>">
                                        <button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button>
                                      </a>
                                    </td>
                                </tr>  
                        <?php }elseif($questionData['question_type']=="subjective"){ ?>
                          <tr>
                              <th scope="row ">    
                                <!-- checkbox -->
                                <input type="checkbox" id="defaultCheck" name="example2">
                              </th>
                                <th scope="row "><?=$i;?></th>
                                <td> 
                                  <div><?=$questionData['question'];?></div>                                  
                                </td>
                                <td></td>
                                    <td>
                                      <a href="#edit_question_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_question" data-question_id="<?php echo $questionData['id'];?>" data-exam_id="<?php echo $questionData['exam_id'];?>" data-exam_name="<?php echo $questionData['exam_name']; ?>" data-class_id="<?php echo $questionData['class_id'];?>" data-class_name="<?php echo $questionData['class_name'];?>" data-subject_id="<?php echo $questionData['subject_id'];?>" data-subject_name="<?php echo $questionData['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>
                                    </td>
                                    <td class="delete">
                                      <a href="?did=<?php echo $questionData['id'];?>">
                                        <button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button>
                                      </a>
                                    </td>
                                </tr> 

                        <?php }elseif($questionData['question_type'] == "match_the_following"){ ?>
                        <tr>
                          <th scope="row ">    
                            <!-- checkbox -->
                            <input type="checkbox" id="defaultCheck" name="example2">
                          </th>
                            <th scope="row "><?=$i;?></th>
                            <td> 
                              <div><?=$question;?>
                                 <div>
                                   <?php 
                                    if(!empty($img_name)){ 
                                      if(file_exists('../admin/images/'.$img_name)){ ?>
                                         <img src="../admin/images/<?=$img_name;?>" style="height:100%; width: 50%;">
                                      <?php }
                                    }                             

                                 ?>
                                 </div>           
                                
                              </div>
                                <ul class="list-item ">
                                    <li class="list-item ">
                                       <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_1'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_1'],'img-');
                                        $last_word = substr($questionData['option_1'], $last_space);
                                         $option_1 = substr($questionData['option_1'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_1 = $questionData['option_1'];
                                      }

                                      echo $option_1;

                                      ?> 

                                    </li>
                                    <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_2'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_2'],'img-');
                                        $last_word = substr($questionData['option_2'], $last_space);
                                         $option_2 = substr($questionData['option_2'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_2 = $questionData['option_2'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_2?></li>

                                    <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_3'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_3'],'img-');
                                        $last_word = substr($questionData['option_3'], $last_space);
                                         $option_3 = substr($questionData['option_3'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_3 = $questionData['option_3'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_3;?></li>

                                     <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_4'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_4'],'img-');
                                        $last_word = substr($questionData['option_4'], $last_space);
                                         $option_4 = substr($questionData['option_4'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_4 = $questionData['option_4'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_4;?></li>

                                    <?php 
                                         $find = "img-";  
                                        if(strpos($questionData['option_5'],$find) !== false){

                                        //seperate contactnated question and image coming from database..
                                        $last_space = strrpos($questionData['option_5'],'img-');
                                        $last_word = substr($questionData['option_5'], $last_space);
                                         $option_5 = substr($questionData['option_5'], 0, $last_space);

                                        $img_pos =  strrpos($last_word,'-');
                                        $img_pos = $img_pos+1;
                                        $img_name = substr($last_word, $img_pos);
                                      }else{
                                        $option_5 = $questionData['option_5'];
                                      }
                                      ?> 
                                    <li class="list-item "><?=$option_5;?></li>
                                  </ul>
                              </td>
                                <td><?=$questionData['correct_answer'];?></td>
                                <td>

                                  <a href="#edit_question_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_question" data-question_id="<?php echo $questionData['id'];?>" data-exam_id="<?php echo $questionData['exam_id'];?>" data-exam_name="<?php echo $questionData['exam_name']; ?>" data-class_id="<?php echo $questionData['class_id'];?>" data-class_name="<?php echo $questionData['class_name'];?>" data-subject_id="<?php echo $questionData['subject_id'];?>" data-subject_name="<?php echo $questionData['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>
                                </td>
                                <td class="delete">
                                  <a href="?did=<?php echo $questionData['id'];?>">
                                    <button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button>
                                  </a>
                                </td>
                            </tr>  
                     <?php  } ?>
                         

                   <?php $i++; } ?>
                               
                  
                </tbody>
              </table>
            <!-- /.card -->
    </section>
    
     <!--  <div id="edit_question_form_reload">
        
      </div> -->

      <form action="add_edit_questions.php" method="post" id="edit_question_form" class="mfp-hide white-popup-block">

<div class="col-md-12 login-custom">
    <h4>Update Question</h4>

      <div class="card-body">
              <div class="form-group row">
                  <div class="col-sm-12">
                     <label for="colFormLabelSm" class="Question-type col-sm-12">Question Type</label>  <br/><br/>
                 </div>
                  
                   <div class="redio_btn col-md-3">
                       <input type="radio" class="redio_button" id="quetion_objective" name="show_answer" value="objective" >
                       <lebel>Objective</lebel>
                   </div>
                    <div class="redio_btn col-md-3">
                        <input type="radio" class="redio_button" id="true_false" name="show_answer" value="true_false">
                        <lebel>True/False</lebel>
                    </div>
                    <div class="redio_btn col-md-3">
                          <input type="radio" class="redio_button" id="fill_in_blank" name="show_answer" value="fill_in_blank">
                          <lebel>Fill in the blanks</lebel>
                    </div>
                     <div class="redio_btn col-md-3">
                         <input type="radio" class="redio_button" id="subjective" name="show_answer" value="subjective">
                         <lebel>Subjective</lebel>
                     </div>

                      <div class="redio_btn col-md-3">
                         <input type="radio" class="redio_button" id="matchDfollowing" name="show_answer" value="match_the_following">
                         <lebel>Match the following</lebel>
                     </div>

                </div>



                <div class="quetion_objective row">
                      <div class="col-sm-1.7">
                            <button type="button" class="btn btn-light SelectOption" ShowField="QuestionSection" id="Ques_main">Question</button>
                     </div>
                      <div class="col-sm-1.7">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection1"  id="btn_Option1">Option1</button>
                      </div>
                       <div class="col-sm-1.7">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection2" id="btn_Option2">Option2</button>
                      </div>
                       <div class="col-sm-1.7">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection3" id="btn_Option3">Option3</button>
                       </div>
                       <div class="col-sm-1.7">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection4" id="btn_Option4">Option4</button>
                       </div>
                       <div class="col-sm-1.7">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection5" id="btn_Option5">Option5</button>
                       </div>
                       <div class="col-sm-1.7">
                             <button type="button" class="btn btn-light SelectOption" ShowField="OptionSection6" id="btn_currect_ans">Currect_Answers</button>
                       </div>
                 </div>
                  <br>
                 <div class="form-groups row">
                      <div class="col-md-12">

                      <div class="QuestionSection MainSection">
                        <textarea class="form-control textarea" id="textarea0" rows="5" name="question"></textarea>
                        <div id="load_editor0"> 
                        <div id="Texteditor0"><p>Editor 0</p> 
                      </div>
                     </div>
                        <br><button id="showEditor0" type="button" class="btn btn-light switch_editor">Switch Editor</button>
                      </div>

                      <div class="OptionSection1 MainSection">
                        <textarea  class="form-control textarea" id="textarea1" placeholder="Option1*" name="option1" rows="5"></textarea>
                        <div id="load_editor1"> 
                        <div id="Texteditor1"><p>Editor 1</p></div> </div>
                        <br><button id="showEditor1" type="button" class="btn btn-light switch_editor">Switch Editor</button>
                      </div>

                      <div class="OptionSection2 MainSection">
                        <textarea  class="form-control textarea" id="textarea2" name="option2" placeholder="Option2*" rows="5"></textarea>
                        <div id="load_editor2"> 
                        <div id="Texteditor2"><p>Editor 2</p></div></div>
                        <br><button id="showEditor2" type="button" class="btn btn-light switch_editor">Switch Editor</button>
                      </div>

                      <div class="OptionSection3 MainSection">
                        <textarea  class="form-control textarea" id="textarea3" name="option3" placeholder="Option3*" rows="5"></textarea>
                        <div id="load_editor3"> 
                        <div id="Texteditor3"><p>Editor 3</p></div></div>
                        <br><button id="showEditor3" type="button" class="btn btn-light switch_editor">Switch Editor</button>
                      </div>

                      <div class="OptionSection4 MainSection">
                        <textarea  class="form-control textarea" id="textarea4" name="option4" placeholder="Option4*" rows="5"></textarea>
                        <div id="load_editor4"> 
                        <div id="Texteditor4"><p>Editor 4</p></div></div>
                        <br><button id="showEditor4" type="button" class="btn btn-light switch_editor">Switch Editor</button>
                      </div>

                      <div class="OptionSection5 MainSection">
                        <textarea  class="form-control textarea" id="textarea5" name="option5" placeholder="Option5*" rows="5"></textarea>
                        <div id="load_editor5"> 
                        <div id="Texteditor5"><p>Editor 5</p></div></div>
                        <br><button id="showEditor5" type="button" class="btn btn-light switch_editor">Switch Editor</button>
                      </div>

                      <div class="OptionSection6 MainSection">
                        <div class="col-md-12">
                        <label> <input type="checkbox" id="defaultCheck" name="answer" value="1" class="defaultCheck2 CheckedBox1">Answer1</label>      
                        </div>
                        <div class="col-md-12">
                        <label><input type="checkbox" id="defaultCheck" name="answer" value="2" class="defaultCheck2 CheckedBox2"> Answer2</label>
                        </div>
                        <div class="col-md-12">
                        <label><input type="checkbox" id="defaultCheck" name="answer" value="3" class="defaultCheck2 CheckedBox3"> Answer3</label>  
                        </div>
                        <div class="col-md-12">
                        <label><input type="checkbox" id="defaultCheck" name="answer" value="4" class="defaultCheck2 CheckedBox4">Answer4</label>   
                        </div>
                        <div class="col-md-12">      
                        <label> <input type="checkbox" id="defaultCheck" name="answer" value="5" class="defaultCheck2 CheckedBox5">Answer5</label>     
                      </div>
                      </div>

                    </div>
                           <br>
                        
                     </div>
                 </div>

                 <div class="true_false row">
                 <div class="redio_btn col-md-4 true_false">
                    <lebel>True/False</lebel>
                  </div>
                    <div class="redio_btn col-md-4">
                       <input type="radio" class="redio_button" name="QuesCheck"  value="true">
                       <lebel>True</lebel>
                   </div>
                    <div class="redio_btn col-md-4">
                        <input type="radio" class="redio_button" name="QuesCheck"  value="false">
                        <lebel>False</lebel>
                    </div>
               </div>

               
               <div class="blank_space row">
                      <div class="col-md-12">
                      <textarea  class="form-control" id="blank_space" name="blank_space" rows="5"></textarea>       
                     </div>
                 </div>

                <br>
                 <div class="form-group row">
                     <label class="col-md-12">Explanation (optional)</label>
                </div>
                <div class="form-group row">
                      <div class="col-md-12">
                      <textarea  class="form-control" id="textarea6" name="explanation" placeholder="Instruction*" rows="5"></textarea>

                            <div id="load_editor6">
                                  <div id="Texteditor6"></div>
                             </div>
                           <br>
                         <button id="showEditor6" type="button" class="btn btn-light">Switch Editor</button>
                     </div>
                 </div>

                  <div class="form-group row">
                      <label for="colFormLabelSm" class="col-sm-3">Exam Name</label>
                  </div>
                  <div class="form-group" align="center">
                  <select class="select_exam" id="examName" name="exam_name">
                        <option value= "">Select Exam Name</option>
                        <?php 
                          $sql = mysqli_query($conn,"SELECT * FROM exam");
                          while($row = mysqli_fetch_assoc($sql)){ ?>
                            <option value="<?=$row['id'];?>"><?=$row['exam_name'];?></option>
                                                                
                          <?php }

                        ?>
                                                            
                  </select>
                  </div> 

                 <div class="form-group row">
                       <label for="colFormLabelSm" class="col-sm-12">Hint (Optional)</label>
                 </div>
                 <div class="form-group row">
                      <div class="col-sm-12">
                           <input type="text" class="form-control" id="hint" name="hint">
                     </div>
                 </div>

                 <div class="form-row">
                       <div class="col-md-4 mb-4">
                           <label class ="marks">Marks</label>
                           <input type="number" class="form-control" id="marks"  name="marks">

                     </div>

                      <div class="col-md-4 mb-4">
                           <label class ="marks">Negative Marks</label>
                           <input type="number" class="form-control" id="negative_marks" name="negative_marks" >

                      </div>

                      <div class="col-md-4 mb-4">
                            <label class ="marks">Difficulty Level</label>
                            <input type="text" class="form-control" id="difficulty" name="difficulty" value="">

                      </div>
                  </div>

               <div class="col-md-12">
                   <div class="row">
                    <input type="hidden" name="id" id="question_hidden_id">
                    <input type="hidden" id="hidden_answer" name="update_">
                       <button type="submit" class="save" name="update_question">
                            Save
                       </button>
                       <button type="close" name="close_class">
                            Close
                      </button>
                   </div>
              </div>
      </div>
  </div>
</form>
     <!----Edit and Updates Command ---->   

<!-- End Add Class Form -->



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
<script>
  $(document).ready(function(){

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

      var editor0 = new Quill('#Texteditor0',{
          modules:{ toolbar:toolbarOption},
          theme:'snow'
        });

    $('.edit_question').on("click",function(){
        var question_id = $(this).data('question_id');
        //console.log(qustion_id);

        //SET the values of different text editors START...
          function addBlogData(html){
            //alert(html);
             var TextData0 = editor0.clipboard.convert(html);
             //var TextDataString0 = editor0.setText(html);
             editor0.setContents(TextData0,'silent');
              }



        // AJAX Request
           $.ajax({
              url: 'edit-question.php',
              type: 'POST',
              data: { question_id: question_id},
              success: function(data){
                
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
                   var option_5 = finalData[i].option_5;
                   var correct_answer = finalData[i].correct_answer;
                   var is_true_or_false = finalData[i].is_true_or_false;
                   var fill_in_the_blanks = finalData[i].fill_in_the_blanks;
                   var explanation = finalData[i].explanation;
                   var exam_name = finalData[i].exam_name;
                   var exam_id = finalData[i].exam_id;
                   var class_name = finalData[i].class_name;
                   var class_id = finalData[i].class_id;
                   var subject_name = finalData[i].subject_name;
                   var subject_id = finalData[i]. subject_id;
                   var hint = finalData[i].hint;
                   var marks = finalData[i].marks;
                   var negative_marks = finalData[i].negative_marks;
                   var difficulty_level = finalData[i].difficulty_level;
                   
                   //Split the question text and image wherever it find img- in question string...
                   var arr = question.split("img-");
                   var question_text = arr[0];
                   var question_img = window.btoa(arr[1]);
                   console.log(arr[1]);
                   //var final_img = 
                   addBlogData(question_img);
                  //Split the question text and image wherever it find img- in question string...

                   $('#question_hidden_id').val(id);

                    if(question_type == "objective"){
                      $("#quetion_objective").prop("checked", true);

                    }else if(question_type == "true_false"){
                       $("#true_false").prop("checked", true);
                    }else if(question_type == "fill_in_blank"){
                        $("#fill_in_blank").prop("checked", true);
                    }else if(question_type == "subjective"){
                      $("#subjective").prop("checked", true);
                    }else if(question_type == "match_the_following"){
                      $("#matchDfollowing").prop("checked", true);
                    }

                    $('#textarea0').val(question_text);
                    $('#textarea1').val(option_1);
                    $('#textarea2').val(option_2);
                    $('#textarea3').val(option_3);
                    $('#textarea4').val(option_4);
                    $('#textarea5').val(option_5);

                    //console.log(correct_answer);
                    $('.CheckedBox'+correct_answer).prop("checked", true);


                    //$('#for_answer').val(correct_answer);
                    $('#textarea6').val(explanation); 
                    //$("#examName").val(exam_name);
                    $("#examName option[value="+exam_id+"]").attr('selected', 'selected');
                    //$('#examName').val(exam_name); 
                    $('#hint').val(hint);
                    $('#marks').val(marks);
                    $('#negative_marks').val(negative_marks);
                    $('#difficulty').val(difficulty_level);                    
                    
                  // }
                }

                //Function to get id of correct_answer check and concatenating it with options textarea ids so that that option value is get and passed as hidden answer while update click..
                $('.defaultCheck2').change(function(){
                var id=$(this).val();
                $('#hidden_answer').val(answer);              
                //console.log(id);

                // var answer = $('#textarea'+id).val();
                // $('#hidden_answer').val(answer);
                // console.log(answer);

                })
                
                // $('#messageShow').html(html);
                //  setTimeout(function(){// wait for 5 secs(2)
                //   location.reload(); // then reload the page.(3)
                // }, 2000); 
              },
              error:function(err){
                console.log("Error : ",err)
              }
           });
    });

  });

</script>

</body>
</html>