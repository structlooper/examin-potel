<?php 
require_once 'includes/header.php';

if(isset($_GET['did']) && !empty($_GET['did'])){
  $id = $_GET['did'];
  $query = "DELETE FROM blog WHERE id ='$id'";
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
  $query = "UPDATE blog SET status='$status' WHERE id ='$id'";
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

  <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">  

  <!-- <script type="text/javascript" src="assets2/js/custom_multiple_select.js"></script> -->
  <style>
    .select_box{
      width: 100% !important;
    }


  </style>
  <script>
      // Start Add Exam Form validate();

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
    });

    if(post_arr.length > 0){

      var isDelete = confirm("Do you really want to delete records?");
      if (isDelete == true) {
           // AJAX Request
           //console.log(post_arr);
           $.ajax({
            url: 'ajax/blog_ajax.php',
            type: 'POST',
            data: { blogid: post_arr, tableName:"blog"},
            success: function(response){
            alert(response);               
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
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
  <!-- Content Header (Page header) -->
  <section class="content-header ">
    <div class="container-fluid ">
      <div class="row mb-2 ">
        <div class="col-sm-6 ">
          <a href= "#add_blogForm" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Blog</button></a>
          <button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button>
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
                <th scope="col ">S.No</th>
                <th scope="col ">Title</th>
                <th scope="col ">Short Description</th>
                
                <th scope="col ">Status</th>
                <!-- <th scope="col ">Result</th> -->
                <th scope="col ">Action</th>
                <th scope="col ">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              $res = mysqli_query($conn,"SELECT * FROM blog");

              while($blogList = mysqli_fetch_assoc($res)){ ?>
                <tr id='tr_<?=$blogList['id'];?>'>
                  <th scope="row ">    

                    <!-- checkbox -->
                    <input type="checkbox" id='del_<?php echo $blogList['id'];?>' name="delete[]" value="<?=$blogList['id']; ?>" class="chk">
                  </th>
                  <td scope="row "><?=$i;?></td>
                  <td scope="row "><?=$blogList['title'];?></td>
                  <td scope="row "><?=$blogList['short_desc'];?></td>
                  
                  

                  <?php 
                  if($blogList['status']==1){ ?>
                    <td><a href="?type=status&operation=deactive&id=<?=$blogList['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Active</a></td>
                  <?php }else{?>
                    <td><a href="?type=status&operation=active&id=<?=$blogList['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Deactive</a></td>
                  <?php }?>

                  <!--   <th scope="row ">Download</th> -->

                  <td>
                    <a href="#update_blog_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_blog" data-blog_id="<?php echo $blogList['id'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>

                  </a>
                </td>

                <td class="delete"><a href="?did=<?php echo $blogList['id'];?>" data-id="<?php echo $blogList['id'];?>" id="<?php echo $blogList['id'];?>"> <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
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
        <form action="add_update_blog.php" method="post" id="add_blogForm" class="mfp-hide white-popup-block" enctype="multipart/form-data">
         <div class="col-md-12 login-custom">           
          <h4>Add New Blog</h4>
          <div class="card-body">

              <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-12">Choose Blog Category</label>
           </div>
          <div class="form-groupblog_category" align="center">
            <select name="blog_category" class="select_box" id="category_id">
              <option value= "" selected disabled>Select Category</option>
              <?php 
                $res = mysqli_query($conn,"SELECT * FROM blog_category WHERE status = 1");                  
                while($row = mysqli_fetch_assoc($res)){ ?>                         
                  <option value="<?=$row['id'];?>" ><?=$row['title']?></option>                                   
                <?php } ?>                                
            </select>
         </div>

          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-12">Enter Blog Title</label>
            </div>
            <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" class="form-control" id="blogName" name="title" placeholder="Enter Blog Title" maxlength="100" autocomplete="off">
            </div>
          </div>

              
    <br>

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-12">Short Description*</label>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <textarea type="textarea" class="form-control textarea" id="short_description" name="short_description" placeholder="Short Description" rows="5" maxlength="1000" autocomplete="off" ></textarea>    
        <div id="load_editor0">
          <div id="Texteditor0">

          </div>
        </div>
        <br>

      </div>
    </div>

     <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-12">Long Description*</label>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <textarea type="textarea" class="form-control textarea" id="logn_description" name="long_description" placeholder="Long Description" rows="5" maxlength="1000" autocomplete="off" ></textarea>    
        <div id="load_editor0">
          <div id="Texteditor0">

          </div>
        </div>
        <br>

      </div>
    </div>

    <div class="form-group row">
      <label for="file" class="col-sm-6">Image*</label>
      <div class="col-sm-6">
        <input type="file" class="InputField" id="imgfile" name="image" accept="image/*">
      </div>
    </div>

    <div class="form-group row">
      <label for="post_date" class="col-sm-6">Post Date</label>
      <div class="col-sm-6">
        <input type="date" class="InputField" id="post_date" name="post_date">
      </div>
    </div>

    <!-- /.card-body -->

    <div class="col-md-12">
     <div class="row">
      <button type="submit" class="add_blog" name="add_blog">
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

<form action="add_update_blog.php" method="post" id="update_blog_form" class="mfp-hide white-popup-block" enctype="multipart/form-data">
  <div class="col-md-12 login-custom">                                
    <h4>Update Blog </h4>
    <div class="card-body">


          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-12">Choose Blog Category</label>
           </div>
          <div class="form-group" align="center">
            <select name="upd_blog_cat" class="select_box" id="update_blogcat">
              <option value= "" selected disabled>Select Class Name </option>
              <?php 
                $res = mysqli_query($conn,"SELECT * FROM blog_category WHERE status= 1");                  
                while($row = mysqli_fetch_assoc($res)){ ?>                         
                  <option value="<?=$row['id'];?>" ><?=$row['title']?></option>                                   
                <?php } ?>                                
            </select>
         </div>

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-12">Blog Title</label>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <!-- input type="hidden" id="exam_id" name="exam_id" value="<?=$exam_id;?>"> -->

          <input type="text" class="form-control" id="update_blogName" name="update_blogName" maxlength="100" autocomplete="off" value="">
        </div>
      </div>
   

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-12">Short Description</label>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <textarea type="textarea" class="form-control" id="update_shortdescription" name="update_shortdescription" placeholder="Short Description*" rows="5"></textarea>    
        <div id="load_editor0">
          <div id="Texteditor0">

          </div>
        </div>
        <br>
      </div>
    </div>

      <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-12">Long Description</label>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <textarea type="textarea" class="form-control" id="update_longdescription" name="update_longdescription" placeholder="Short Description*" rows="5"></textarea>    
        <div id="load_editor0">
          <div id="Texteditor0">

          </div>
        </div>
        <br>
      </div>
    </div>

     <!-- <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-4">Image*</label>
      <div class="col-sm-8"> -->
        <!-- <input type="file" class="InputField" id="update_imgfile" name="image" accept="image/*"> -->
    
          <!-- <input name="image" type="file" id="file" />
          <input name="hidden_image" type="hidden" id="hiddenfile" class="hidden_img" />
          <img src="" width="100px" height="100px" class="imgData">
       </div>
    </div>    -->


    <div class="form-group row">
      <label for="file" class="col-sm-6">Image*</label>
      <div class="col-sm-6">
        <input type="file" class="InputField" id="update_imgfile" name="image" accept="image/*">
        <input name="hidden_image" type="hidden" id="hiddenfile" class="hidden_img" />
          <img src="" width="100px" height="100px" class="imgData">
      </div>
    </div>

    <div class="form-group row">
      <label for="post_date" class="col-sm-6">Post Date</label>
      <div class="col-sm-6">
        <input type="date" class="InputField" id="update_post_date" name="update_post_date">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="col-md-12">
      <div class="row">
        <input type="hidden" name="blog_id" id="blog_hidden_id">
        <button type="submit" name="update_blog">
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
     $('.edit_blog').click(function() {
      var blog_id = $(this).data('blog_id');
      console.log(blog_id);
     // AJAX Request
     $.ajax({
      url: 'edit_blog.php',
      type: 'POST',
      data: {blog_id:blog_id},
      success: function(data){

          //parse json data coming from edit_exam.php
          var blogData = JSON.parse(data);
          //console.log(packageData[0].package_id );

        //get the values of json array and store in jquery variables..
        var blog_id = blogData[0].id;
        var cat_id = blogData[0].blog_cat_id;
        var blog_title = blogData[0].title;
        var short_desc = blogData[0].short_desc;
        var long_desc = blogData[0].long_desc;
        var post_date = blogData[0].post_date;

        var image = blogData[0].image; 
        var imgUrl = '<?php echo web."uploads/blogs-img/";?>'+image;

        //Now assign the values to the fields of modal
        $('#blog_hidden_id').val(blog_id);
       
        //$('#update_className').val(class_id);     

        $('#update_blogcat').val(cat_id);
        $('#update_blogName').val(blog_title);
       // $('#update_shortdescription').val(short_desc);
        //$('#update_longdescription').val(long_desc);
        $('#update_shortdescription').summernote("code",short_desc);
        $('#update_longdescription').summernote("code",long_desc);

        $('.imgData').attr('src',imgUrl);
        $('.hidden_img').val(image);

        $('#update_post_date').val(post_date);
 
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
      text: "Blog is Created!",
      icon: "<?php echo $_GET['msg']; ?>",
      button: "OK, Done",
    });
    $('.swal-button--confirm').click(function(){
      window.location.href = 'blog.php';
    });

  </script>

<?php }

 if(isset($_GET['msg']) && $_GET['msg']=="updated"){ ?>
   <script>

    swal({
      title: "<?php echo $_GET['msg']; ?>",
      text: "Blog is updated!",
      icon: "<?php echo 'success'; ?>",
      button: "OK, Done",
    });
    $('.swal-button--confirm').click(function(){
      window.location.href = 'blog.php';
    });

  </script>

<?php }
?>

<script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>