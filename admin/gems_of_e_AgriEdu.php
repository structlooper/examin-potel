<?php 
require_once 'includes/header.php';

if(isset($_GET['did']) && !empty($_GET['did'])){
  $id = $_GET['did'];
  $query = "DELETE FROM gems_e_agriedu WHERE id ='$id'";
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
  $query = "UPDATE gems_e_agriedu SET status='$status' WHERE id ='$id'";
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

  </style>
 

       <script>
            $(document).ready(function(){
            $(".gems_e_agriedu_save").click(function(){
                var Gems_e_AgriEdu = $("#Gems_e_AgriEdu").val();
                var upload_image = $("#upload_image").val();
                var postion_title = $("#postion_title").val();

                if(Gems_e_AgriEdu == ""){
                    $(".Gems_e_AgriEduError").html("Please Enter Gems of e_AgriEdu Title Name");
                        $("#Gems_e_AgriEdu").focus();
                        return false;
               }else if(postion_title == ""){
                    $(".AllError").html("");
                    $(".postion_titleError").html("Please Enter Position Title");
                    $("#postion_title").focus();
                    return false;        
                }else if(upload_image == ""){
                    $(".AllError").html("");
                    $(".upload_imageError").html("Please Select Image File");
                    $("#upload_image").focus();
                    return false;
                }else{
                    $(".AllError").html("");
                    // alert("Success");
                }
              });

           // for Update New Validation 
            $(".update_news").click(function(){
                var update_Gems_e_AgriEdu = $("#update_Gems_e_AgriEdu").val();
                var update_postion_title = $("#update_postion_title").val();
                
                if(update_Gems_e_AgriEdu == ""){
                        $(".update_Gems_e_AgriEduError").html("Please Enter News Title Name");
                        $("#update_Gems_e_AgriEdu").focus();
                        return false;
                 }else if(update_postion_title == ""){
                    $(".AllError").html("");
                    $(".update_postion_titleError").html("Please Enter Position Title");
                    $("#update_postion_title").focus();
                    return false;       
                 }else{
                    $(".AllError").html("");
                    // alert("Success");
                }
            });

            $('#upload_image').change(function () {
                var i = $(this).prev('label').clone();
                var file = $('#upload_image')[0].files[0].name;
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
          <a href= "#add_blogcatForm" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add Gems of e-AgriEdu</button></a>
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
                <th scope="col ">Position</th>
                <th scope="col ">Created Date</th>
                <th scope="col ">Update Date</th>
                <th scope="col ">File Name</th>
                <th scope="col ">Status</th>
                <th scope="col ">Action</th>
                <th scope="col ">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              $res = mysqli_query($conn,"SELECT * FROM gems_e_agriedu ORDER BY id DESC");
              
              while($categoryList = mysqli_fetch_assoc($res)){ ?>
                  <td scope="row "><?=$i;?></td>
                  <td scope="row "><?=$categoryList['gems_e_agriedu_title'];?></td>
                  <td scope="row "><?=$categoryList['position'];?></td>
                  <td scope="row "><?=$categoryList['created_date'];?></td>
                  <td scope="row "><?=$categoryList['update_date'];?></td>
                  <td scope="row "><?=$categoryList['gems_e_agriedu_file'];?></td>
                  <?php 
                  if($categoryList['status']==1){ ?>
                    <td><a href="?type=status&operation=deactive&id=<?=$categoryList['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Active</a></td>
                  <?php }else{?>
                    <td><a href="?type=status&operation=active&id=<?=$categoryList['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Deactive</a></td>
                  <?php }?>

                  <!--   <th scope="row ">Download</th> -->

                  <td>
                    <a href="#update_latest_news" button type="button" class="popup-with-form btn btn-primary btn-sm edit_gems_e_agriedu" data-gems_e_agriedu_id="<?php echo $categoryList['id']; ?>" data-gems_e_agriedu_title="<?php echo $categoryList['gems_e_agriedu_title'] ?>" data-position="<?php echo $categoryList['position'] ?>" data-gems_e_agriedu_file="<?php echo $categoryList['gems_e_agriedu_file'] ?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>
                </td>

                <td class="delete"><a href="delete_gems_of_e_agriedu.php?id=<?php echo $categoryList["id"];?>"> <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
                <!-- <td class="delete"><a href="#" button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td> -->
              </tr>
              <?php $i++;} ?>

            </tbody>
          </table>
          <!-- /.card -->
        </section>


       <!-- Start Add Class Form 
        ============================================= -->
        <form action="save_gems_of_e_AgriEdu.php" method="post" id="add_blogcatForm" class="mfp-hide white-popup-block" enctype="multipart/form-data">
         <div class="col-md-12 login-custom">           
          <h4>Add Gems of e-AgriEdu</h4>
          <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Gems of e-AgriEdu Title</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="Gems_e_AgriEdu" name="Gems_e_AgriEdu" placeholder="Enter Gems of e-AgriEdu Title" maxlength="100" autocomplete="off">
                <span class="Gems_e_AgriEduError AllError" style="color: red;"></span>
             </div>
          </div>

          <div class="form-group row">
                <label class="col-sm-4 col-form-label">Postion</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="postion_title" name="postion_title" placeholder="Enter Postion Title" maxlength="100" autocomplete="off">
                <span class="postion_titleError AllError" style="color: red;"></span>
             </div>
          </div>

        <div class="form-group row">
             <label class="col-sm-4 col-form-label">Upload Image File</label>
         <div class="col-sm-8">
            <label for="upload_image" class="btn btn-primary btn-block btn-outlined" value="" style="background: #fff; color: #2a2828; text-align:left; font-weight: 500;">Please Upload Image File <i class="fas fa-upload" style="float: right;"></i></label>
            <input type="file" id="upload_image" class="InputField" name="upload_image" accept="image/*" placeholder="Image File Upload.."style="display: none">
            <span class="upload_imageError AllError" style="color: red;"></span>
         </div>
      </div>
    <!-- /.card-body -->

    <div class="col-md-12">
     <div class="row">
          <button type="submit" class="gems_e_agriedu_save" name="gems_e_agriedu_save">
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

<form action="save_gems_of_e_AgriEdu.php" method="post" id="update_latest_news" class="mfp-hide white-popup-block" enctype="multipart/form-data">
  <div class="col-md-12 login-custom">                                
    <h4>Update Gems of e-AgriEdu Title</h4>
    <div class="card-body">

      <div class="form-group row">
                <label class="col-sm-4 col-form-label">Gems of e-AgriEdu Title</label>
              <div class="col-sm-8">
             <input type="hidden" id="update_Gems_e_AgriEdu_id" name="hidden_Gems_e_AgriEdu_id">
                <input type="text" class="form-control" id="update_Gems_e_AgriEdu" name="update_Gems_e_AgriEdu" placeholder="Enter Gems of e-AgriEdu Title" maxlength="100" autocomplete="off">
                <span class="update_news_titleError AllError" style="color: red;"></span>
             </div>
          </div>

          <div class="form-group row">
                <label class="col-sm-4 col-form-label">Postion</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="update_postion_title" name="update_postion_title" placeholder="Enter Postion Title" maxlength="100" autocomplete="off">
                <span class="update_postion_titleError AllError" style="color: red;"></span>
             </div>
          </div>

       <div class="form-group row">
              <label class="col-sm-4 col-form-label">Upload New File</label>
         <div class="col-sm-8">
              <label for="update_upload_image" class="btn btn-primary btn-block btn-outlined" value="" id="value_show" style="background: #fff; color: #2a2828; text-align:left; font-weight: 500;">Please upload File <i class="fas fa-upload"></i></label>
              <input type="file" id="update_upload_image" class="InputField" name="update_upload_image" accept="image/*" style="display: none">
              <span class="update_upload_imageError AllError" style="color: red;"></span>
              <input type="hidden" name="old_image" id="old_image" value="">
         </div>
       </div>

    <div class="col-md-12">
      <div class="row">
        <button type="submit" class="update_news" name="update_category">
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

     //Get the data attribute all values like Package id, package name,to populate the fields related to these data...
     $('.edit_gems_e_agriedu').click(function() {
      var gems_e_agriedu_id = $(this).data('gems_e_agriedu_id');
      var gems_e_agriedu_title = $(this).data('gems_e_agriedu_title');
      var gems_e_agriedu_file = $(this).data('gems_e_agriedu_file');
      var position = $(this).data('position');
      // console.log(gems_e_agriedu_title);

    $('#update_Gems_e_AgriEdu_id').val(gems_e_agriedu_id);
    $("#update_Gems_e_AgriEdu").val(gems_e_agriedu_title);
    $("#update_postion_title").val(position);

    $('#value_show').text(gems_e_agriedu_file);
    $('#old_image').val(gems_e_agriedu_file);

    $('#update_upload_image').change(function () {
            var i = $(this).prev('label').clone();
            var file = $('#update_upload_image')[0].files[0].name;
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