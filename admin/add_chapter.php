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
              url: 'ajax/delete_student.php',
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
          <a href="#add_chapter_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Chapter</button></a>
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
                <th scope="col ">S.No</th>
                <th scope="col ">id</th>
                <th scope="col ">Class Name</th>
                <th scope="col ">Subject Name</th>
                <th scope="col ">Chapter Name</th>
                <th scope="col ">Action</th>
                <th scope="col ">Action</th>
              </tr>
            </thead>
            <tbody>
                  <?php 
                    $i = 1;
                    // echo "SELECT subject.*,classes.class_name FROM subject INNER JOIN classes ON subject.classs_id = classes.id";
                    
                    $res = mysqli_query($conn,"SELECT * FROM chapter ORDER BY id DESC");

                    while($row = mysqli_fetch_assoc($res)){ ?>
                      <tr id='tr_<?=$row['id'];?>'>
                    <th scope="row ">    
                  
                      <!-- checkbox -->
                      <input type="checkbox" id='del_<?php echo $row['id'];?>' name="delete[]" value="<?=$row['id']; ?>" class="chk">
                    </th>
                    <td scope="row "><?=$i;?></td>
                    <td scope="row "><?=$row['id'];?></td>
                    <td scope="row "><?=$row['class_name'];?></td>
                    <td><?=$row['subject_name'];?></td>
                    <th scope="row "><?=$row['chapter_name'];?></th>

                    <td>
                      <a href="" data-toggle="modal" data-target="#exampleModalCenter">
                        <!-- <button type="button" class="btn btn-primary btn-sm edit_chapter" data-class_id="<?php echo $row['class_id'];?>" data-class_name="<?php echo $row['class_name'];?>" data-subject_id="<?php echo $row['id'];?>"  data-subject_name="<?php echo $row['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button> -->
                        <button type="button" class="btn btn-primary btn-sm edit_chapter" data-chapter_id="<?=$row['id'];?>" data-chapter_name="<?=$row['chapter_name'];?>" data-class_id="<?php echo $row['class_id'];?>" data-class_name="<?php echo $row['class_name'];?>" data-subject_id="<?php echo $row['subject_id'];?>"  data-subject_name="<?php echo $row['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button>
                      </a>
                    </td>

                    <td class="delete"><a href="?did=<?php echo $row['id'];?>" data-id="<?php echo $row['id'];?>" id="<?php echo $row['id'];?>"> <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
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

<!-- Start Add Class Form 
    ============================================= -->
<form action="#" method="post" id="add_chapter_form" class="mfp-hide white-popup-block">

  <div class="col-md-12 login-custom">
    <h4>Create a New Chapter </h4>

            <div class="form-group" align="center">
                        <select name= "class_list" class="select_box" id="className">
                        <option value= "" selected disabled>Select Class Name </option>
                        <?php 
                          $res = mysqli_query($conn,"SELECT * FROM classes");                  
                          while($row = mysqli_fetch_assoc($res)){ ?>                         
                          <option value="<?=$row['id'];?>" ><?=$row['class_name']?></option>                                    
                          <?php } ?>
                        </select>
                   </div>      

                   <div class="form-group" align="center">
                        <select name= "subject_list" class="select_box" id="subjectName">
                          <option value= "" selected disabled>Select Subject Name </option>
                         
                        </select>
                   </div>

    <div class="col-md-12" align="center">
      <input class="form-master" type="text" placeholder="Please Enter a Chapter Name*" name="chapter_name" maxlength="100" autocomplete="off">
    </div>
    <br>
    <div class="col-md-12">
      <div class="row">
        <button type="submit" class="save" name="create_chapter">
          Save
        </button>
        <button type="close" name="close">
          Close
        </button>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

<script>
 $(document).ready(function(){

  $('#className').on('change',function(){
        var classID = $(this).val();
        console.log(classID);

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

  
    $('.edit_chapter').on("click",function(){    
        var chapter_id = $(this).data('chapter_id');
        var chapter_name = $(this).data('chapter_name');
        var class_id = $(this).data('class_id');
        var class_name = $(this).data('class_name');

        var subject_id = $(this).data('subject_id');
        var subject_name = $(this).data('subject_name');
        
        $("#class_Name").val(class_id);
        $('#update_chapter_id').val(chapter_id);
        $("#update_chapter_name").val(chapter_name);
        subject_chang(subject_id);
    });


    $('#class_Name').on('change',function(){
        subject_chang();        
    });

    function subject_chang(id){
      var classID = $('#class_Name').val();
        console.log(id);
        if(classID){
            $.ajax({
                type:'POST',
                url:'ajax/ajaxfile.php',
                data:'class_id='+classID,
                success:function(html){
                    $('#subject_Name').html(html);
                    $('#chapterName').html('<option value="">Select Subject first</option>'); 

                    $("#subject_Name").val(id)
                }
            }); 
        }else{
            $('#subject_Name').html('<option value="">Select Class first</option>');          
        }
    }

    $('.update_chapter').on("click",function(){

      var dropdown_Class_id =  $( "#class_Name" ).val();
      var dropdown_Class_name = $('#class_Name option:selected').text();

      var dropdown_Subject_id =  $( "#subject_Name" ).val();
      var dropdown_Subject_name = $('#subject_Name option:selected').text();

      var update_chapter_id =  $( "#update_chapter_id" ).val();
      var update_chapter_name = $('#update_chapter_name').val();
      console.log(update_chapter_id);
      console.log(update_chapter_name);
      //  console.log(dropdown_Subject_id);
      // console.log(dropdown_Subject_name);


      $.ajax({
            url: 'ajax/ajaxfile.php',
            type: 'POST',
            data: { update_classid: dropdown_Class_id, className: dropdown_Class_name, subject1_id: dropdown_Subject_id, subject_name: dropdown_Subject_name, chapter_id: update_chapter_id, chapter_name: update_chapter_name, tableName:"chapter" },
              success: function(html){
                $('#messageShow').html(html);
                 setTimeout(function(){// wait for 3 secs(2)
                  location.reload(); // then reload the page.(3)
                }, 3000); 
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