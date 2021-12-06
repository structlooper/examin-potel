<?php 
require_once 'includes/header.php';

if(isset($_GET['did']) && !empty($_GET['did'])){
  $id = $_GET['did'];
  $query = "DELETE FROM study_material WHERE id ='$id'";
  $result = mysqli_query($conn,$query);
}

//Blog Status Active/Deactive START...
if(isset($_GET['id']) && $_GET['id']!=''){   
  $id = $_GET['id'];
  $operation = $_GET['operation'];
  if($operation == 'active'){
    $status = 1;
  }elseif($operation=='deactive'){
    $status = 0;
  }
  $query = "UPDATE study_material SET status='$status' WHERE id ='$id'";
  $result = mysqli_query($conn,$query);
}


?>

<head>
  <!-- Theme included stylesheets -->
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
  <style>
    form.white-popup-block input {
    text-align: left;
    }
 .select_category,.update_select_category{
    width: 100%;
    height: 35px;
    margin: auto;
    padding: auto;
    font-size: 1rem;
    font-weight: 500;
    box-shadow: inherit;
    border: 1px solid #e7e7e7;
}

  </style>
 

       <script>
            $(document).ready(function(){
            $(".add_study_mat").click(function(){
                var study_material = $("#study_material").val();
                var select_category = $("#select_category").val();
                var upload_pdf = $("#upload_pdf").val();
                var className = $("#className").val();
                var subjectName = $("#subjectName").val();

                if(study_material == ""){
                    $(".study_materialError").html("Please Enter Title of Study Material");
                        $("#study_material").focus();
                        return false;
                }else if(className == null){
                        $(".AllError").html("");
                        $(".classNameError").html("Please Select Class Name");
                        $("#className").focus();
                        return false;
                }else if(subjectName == null){
                        $(".AllError").html("");
                        $(".subjectNameError").html("Please Select Subject Name");
                        $("#subjectName").focus();
                        return false;  
                }else if(select_category == null){
                        $(".AllError").html("");
                        $(".select_categoryError").html("Please Select Category Name of Study Material");
                        $("#select_category").focus();
                        return false;             
                }else if(upload_pdf == ""){
                    $(".AllError").html("");
                    $(".upload_pdfError").html("Please Upload PDF File of Study Material");
                    $("#upload_pdf").focus();
                    return false;
                }else{
                    $(".AllError").html("");
                    // alert("Success");
                }
              });

           // for Update New Validation 
            $(".update_edit_study_material").click(function(){
                var update_study_material = $("#update_study_material").val();
                var update_select_category = $("#update_select_category").val();
                var update_className = $("#update_className").val();
                var update_subjectName = $("#update_subjectName").val();

                if(update_study_material == ""){
                        $(".update_study_materialError").html("Please Enter Title of Study Material");
                        $("#update_study_material").focus();
                        return false;
                }else if(update_className == null){
                        $(".AllError").html("");
                        $(".update_classNameError").html("Please Select Class Name");
                        $("#update_className").focus();
                        return false;
                }else if(update_subjectName == null){
                        $(".AllError").html("");
                        $(".update_subjectNameError").html("Please Select Subject Name");
                        $("#update_subjectName").focus();
                        return false;
                 }else if(update_select_category == null){
                        $(".AllError").html("");
                        $(".update_select_categoryError").html("Please Select Category Name of Study Material");
                        $("#update_select_category").focus();
                        return false;             
                 }else{
                    $(".AllError").html("");
                    // alert("Success");
                }
            });

            $('#upload_pdf').change(function () {
                var i = $(this).prev('label').clone();
                var file = $('#upload_pdf')[0].files[0].name;
               $(this).prev('label').text(file);
             }); 

            });
        </script>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
  <!-- Content Header (Page header) -->
  <section class="content-header ">
    <div class="container-fluid ">
      <div class="row mb-2 ">
        <div class="col-sm-6 ">
          <a href= "#add_blogcatForm" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add Study Material</button></a>
          <!-- <button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button> -->
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
                <th scope="col ">S.No</th>
                <th scope="col ">Title</th>
                <th scope="col ">Category Name</th>
                <th scope="col ">File Name</th>
                <th scope="col ">Date</th>
                <th scope="col ">Status</th>
                <th scope="col ">Action</th>
                <th scope="col ">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              $res = mysqli_query($conn,"SELECT * FROM study_material ORDER BY id DESC");

              while($categoryList = mysqli_fetch_assoc($res)){ ?>
                  <td scope="row "><?=$i;?></td>
                  <td scope="row "><?=$categoryList['study_material_name'];?></td>
                  <td scope="row "><?=$categoryList['category_name'];?></td>
                  <td scope="row "><?=$categoryList['study_file'];?></td>
                  <td scope="row "><?=$categoryList['created_date'];?></td>
                  <?php 
                  if($categoryList['status']==1){ ?>
                    <td><a href="?type=status&operation=deactive&id=<?=$categoryList['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Active</a></td>
                  <?php }else{?>
                    <td><a href="?type=status&operation=active&id=<?=$categoryList['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Deactive</a></td>
                  <?php }?>

                  <!--   <th scope="row ">Download</th> -->

                  <td>
                    <a href="#update_study_mat1" button type="button" class="popup-with-form btn btn-primary btn-sm edit_study_material1" data-study_material_id="<?php echo $categoryList['id'];?>" data-study_material_name="<?php echo $categoryList['study_material_name'] ?>" data-category_name="<?php echo $categoryList['category_name'] ?>" data-category_id="<?php echo $categoryList['category_id'] ?>"  data-study_file="<?php echo $categoryList['study_file'] ?>" data-class_id="<?php echo $categoryList['class_id'] ?>" data-class_name="<?php echo $categoryList['class_name'] ?>" data-subject_id="<?php echo $categoryList['subject_id'] ?>" data-subject_name="<?php echo $categoryList['subject_name'] ?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>

                  </a>
                </td>

                <td class="delete"><a href="delete_study_material.php?id=<?php echo $categoryList["id"];?>"> <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
                <!-- <td class="delete"><a href="#" button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td> -->
              </tr>
              <?php $i++;} ?>

            </tbody>
          </table>
          <!-- /.card -->
        </section>


       <!-- Start Add Class Form 
        ============================================= -->
        <form action="save_study_material.php" method="post" id="add_blogcatForm" class="mfp-hide white-popup-block" enctype="multipart/form-data">
         <div class="col-md-12 login-custom">           
          <h4>Add Study Material</h4>
          <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Study Material Title</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="study_material" name="study_material" placeholder="Enter Study Material Title" maxlength="100" autocomplete="off">
                <span class="study_materialError AllError" style="color: red;"></span>
             </div>
          </div>

          <div class="form-group row">
                <label class="col-sm-4 col-form-label">Select Class Name</label>
             <div class="col-sm-8">
             <select name= "className" class="select_category" id="className">
                      <option value= "" selected disabled>Select Class Name </option>
                      <?php
                          $sql = "SELECT * FROM classes ORDER BY class_name ASC";
                          $result = mysqli_query($conn, $sql) or die("Query Failed.");

                          if(mysqli_num_rows($result) > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                  echo "<option value='{$row['id']}'>{$row['class_name']}</option>";
                          
                              }
                          }
                        ?>
                    </select>
                <span class="classNameError AllError" style="color: red;"></span>
            </div>
         </div>

         <div class="form-group row">
                <label class="col-sm-4 col-form-label">Select Subject Name</label>
             <div class="col-sm-8">
             <select name= "subjectName" class="select_category" id="subjectName">
                      <option value= "" selected disabled>Select Sunject Name </option>
                      <?php
                          $sql = "SELECT * FROM subject";
                          $result = mysqli_query($conn, $sql) or die("Query Failed.");

                          if(mysqli_num_rows($result) > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                  echo "<option value='{$row['id']}'>{$row['subject_name']}</option>";
                          
                              }
                          }
                        ?>
                    </select>
                <span class="subjectNameError AllError" style="color: red;"></span>
            </div>
         </div>


           <div class="form-group row">
                <label class="col-sm-4 col-form-label">Select Category</label>
             <div class="col-sm-8">
             <select name= "select_category" class="select_category" id="select_category">
                    <option value= "" selected disabled>Select Category Name </option>
                    <?php
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                        
                            }
                        }
                      ?>
                    </select>
                <span class="select_categoryError AllError" style="color: red;"></span>
            </div>
         </div>



        <div class="form-group row">
             <label class="col-sm-4 col-form-label">Upload PDF File</label>
             <div class="col-sm-8">
              <label for="upload_pdf" class="btn btn-primary btn-block btn-outlined" value="" style="background: #fff; color: #2a2828; text-align:left; font-weight: 500;">Please Upload File PDF <i class="fas fa-upload" style="float: right;"></i></label>
              <input type="file" id="upload_pdf" class="InputField" name="upload_pdf" accept=".pdf" placeholder="PDF File Upload.."style="display: none">
              <span class="upload_pdfError AllError" style="color: red;"></span>
          </div>
        </div>
      </div>
    <!-- /.card-body -->

    <div class="col-md-12">
     <div class="row">
          <button type="submit" class="add_study_mat" name="add_study_mat">
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

<form action="save_study_material.php" method="post" id="update_study_mat1" class="mfp-hide white-popup-block" enctype="multipart/form-data">
  <div class="col-md-12 login-custom">                                
    <h4>Update Study Material</h4>
    <div class="card-body">

      <div class="form-group row">
                <label class="col-sm-4 col-form-label">Study Material Title</label>
              <div class="col-sm-8">
             <input type="hidden" id="update_study_material_id" name="hidden_study_material_id">
                <input type="text" class="form-control" id="update_study_material" name="update_study_material" placeholder="Enter Study Material Title" maxlength="100" autocomplete="off">
                <span class="update_study_materialError AllError" style="color: red;"></span>
             </div>
          </div>

          <div class="form-group row">
                <label class="col-sm-4 col-form-label">Select Class Name</label>
             <div class="col-sm-8">
             <select name= "update_className" class="select_category" id="update_className">
                            <option value= "" selected disabled>Select Class Name </option>
                            <?php
                                $sql = "SELECT * FROM classes ORDER BY class_name ASC";
                                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='{$row['id']}'>{$row['class_name']}</option>";
                                
                                    }
                                }
                        ?>
                    </select>
                <span class="update_classNameError AllError" style="color: red;"></span>
            </div>
         </div>

         <div class="form-group row">
                <label class="col-sm-4 col-form-label">Select Subject Name</label>
             <div class="col-sm-8">
             <select name= "update_subjectName" class="select_category" id="update_subjectName">
                            <option value= "" selected disabled>Select Sunject Name </option>
                            <?php
                                $sql = "SELECT * FROM subject";
                                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='{$row['id']}'>{$row['subject_name']}</option>";
                                
                                    }
                                }
                        ?>
                    </select>
                <span class="update_subjectNameError AllError" style="color: red;"></span>
            </div>
         </div>

          <div class="form-group row">
                <label class="col-sm-4 col-form-label">Select Category</label>
             <div class="col-sm-8">
             <select name= "update_select_category" class="update_select_category" id="update_select_category">
                            <option value= "" selected disabled>Select Category Name </option>
                            <?php
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                
                                    }
                                }
                        ?>
                    </select>
                <span class="update_select_categoryError AllError" style="color: red;"></span>
            </div>
         </div>

         <div class="form-group row">
            <label class="col-sm-4 col-form-label">Upload PDF File</label>
        <div class="col-sm-8">
            <label for="update_upload_pdf" class="btn btn-primary btn-block btn-outlined" value="" id="value_show" style="background: #fff; color: #2a2828; text-align:left; font-weight: 500;">Please upload File PDF <i class="fas fa-upload"></i></label>
            <input type="file" id="update_upload_pdf" class="InputField" name="update_upload_pdf" accept=".pdf" style="display: none">
            <span class="update_upload_pdfError AllError" style="color: red;"></span>
            <input type="hidden" name="old_pdf" id="old_pdf" value="">
        </div>
        </div>

    <div class="col-md-12">
      <div class="row">
        <button type="submit" class="update_edit_study_material" name="update_edit_study_material">
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
  <strong>Copyright &copy; <?php echo date("Y");?> <a href="https://www.examin.com">eAgriEdu.com</a>.</strong> All rights reserved.
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


<script type="text/javascript">
    $(document).ready(function(){
    //Functions to be called when add new exams dropdown will be used to populate subject name and chapter name dropdown list these function are inter-related START..
    
    $('#className').on('change',function(){
      var classID = $(this).val();
    //   console.log(classID);
      if(classID){
        $.ajax({
          type:'POST',
          url:'ajax/ajaxfile.php',
          data:'class_id='+classID,
          success:function(html){
            $('#subjectName').html(html);
            // $('#chapterName').html('<option value="">Select Subject first</option>'); 
          }
        }); 
      }else{
        $('#subjectName').html('<option value="">Select country first</option>');
       }
     });


    });
  </script>

<script type="text/javascript">
    $(document).ready(function(){
    //Functions to be called when add new exams dropdown will be used to populate subject name and chapter name dropdown list these function are inter-related START..
    
    $('#update_className').on('change',function(){
      var classID = $(this).val();
    //   console.log(classID);
      if(classID){
        $.ajax({
          type:'POST',
          url:'ajax/ajaxfile.php',
          data:'class_id='+classID,
          success:function(html){
            $('#update_subjectName').html(html);
            // $('#chapterName').html('<option value="">Select Subject first</option>'); 
          }
        }); 
      }else{
        $('#subjectName').html('<option value="">Select country first</option>');
       }
     });


    });
  </script>


<script type="text/javascript">
  $(document).ready(function(){

     //Get the data attribute all values like Package id, package name,to populate the fields related to these data...
     $('.edit_study_material1').click(function() {
      var study_material_id = $(this).data('study_material_id');   
      var study_material_name = $(this).data('study_material_name');
      var category_name = $(this).data('category_name');
      var category_id = $(this).data('category_id');
      var study_file = $(this).data('study_file');
      var class_id = $(this).data('class_id');
      var class_name = $(this).data('class_name');
      var subject_id = $(this).data('subject_id');
      var subject_name = $(this).data('subject_name');
    //   console.log(subject_id);

    $('#update_study_material_id').val(study_material_id);
    $("#update_study_material").val(study_material_name);

    $('#update_className').val(class_id);
    $('#update_subjectName').val(subject_id);
    $('#update_select_category').val(category_id);
 
    $('#value_show').text(study_file);
    $('#old_pdf').val(study_file);

    $('#update_upload_pdf').change(function () {
            var i = $(this).prev('label').clone();
            var file = $('#update_upload_pdf')[0].files[0].name;
            $(this).prev('label').text(file);
          }); 
 
   });

   });
 </script>

<?php 
    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
  ?>
  <script>
    swal({
      title: "<?php echo $_SESSION['status']; ?>",
      //text: "You clicked the button!",
      icon: "<?php echo $_SESSION['status_code']; ?>",
      button: "OK, Done",
     });
  </script> 
   <?php 
    unset($_SESSION['status']);
    }
   ?>

</body>
</html>