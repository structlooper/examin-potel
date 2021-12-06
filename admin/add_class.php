<?php
error_reporting(0);
 require_once 'includes/header.php';
 $page_name = "add_class.php";
 $msg ='';

  if(isset($_GET['did']) && !empty($_GET['did'])){
    $id = $_GET['did'];
    $msg = deleteData('classes',$id);

  }

  if(isset($_POST['create_class'])){
    $class_name = get_safe_value($conn,$_POST['add_class']);

    //Check if class_name already exist in classess table before insert operation..
    $sql = "SELECT * FROM classes WHERE class_name = '$class_name'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
      $msg = "class name already exist";
      header("location:{$hostname}/add_class.php");
    }else{
      $status = 1;
      $created_on = date("Y-m-d h:i:s");
      $sql = "INSERT INTO classes(class_name,status,created_on) VALUES('$class_name','$status','$created_on')";
      if(mysqli_query($conn,$sql)){      
        //header("location:{$hostname}/add_class.php");
      }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if($conn->affected_rows == 1){
        $msg = "Class Added Succesfully";
      }
    }


    // $data = array("class_name" => $class_name,"status" => 1,"date" => date("Y:m:d H:i:s"));
    // $msg = addData('classes',$data);
  }
?>
 
<head>
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
    <!--SweetAlert CDN-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
   <!--SweetAlert CDN-->
   <script>
        $(document).ready(function(){
          $(".save").click(function(){
            var masterForm = $(".form-master").val();
             if(masterForm == ""){
               alert("Enter class name");
               $(".form-master").focus();
               return false;
               }
             else{
               //alert("Success");
             }
          })
          
    //Delete class name with checkbox checked START...
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
           $.ajax({
              url: 'ajax/ajaxfile.php',
              type: 'POST',
              data: { id: post_arr, tableName:"classes"},
              success: function(response){
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
        });
    
          
      // Delete Action code end

    //Delete class name with checkbox checked END...

  </script>

 </head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid ">
        <div class="row mb-2 ">
          <div class="col-sm-6 ">
            <a href= "#add_class_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Class</button></a>
            <button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button>
            <!-- <a href= "#add_class_form"><button type="button " class=" btn btn-primary btn-sm ">Add New Class</button></a>
            <input type="button" value="Delete" id="delete_class" class="btn btn-danger btn-sm "> -->
            <!-- <a href= "#delete_class" id="delete_class"><button type="button " class="btn btn-danger btn-sm ">Delete</button></a> -->
         </div>
         <h6 align="center" class="text-danger" id="messageShow"><?=$msg;?></h6>
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
              <table class="table" id="class_table">
                <thead class="bg-primary ">
                  <tr>
                    <th scope="col ">Select</th>
                    <th scope="col ">#</th>
                    <th scope="col ">id</th>
                    <th scope="col ">Class Name</th>
                    <th scope="col ">Action</th>
                    <th scope="col ">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i=1;
                    $table_name = "classes";
                    //Get Class data from classes table in database..                     
                    $data = getData($table_name);
                    foreach($data as $classList){ ?>
                      <tr id='tr_<?=$classList['id'];?>'>
                      </div>
                       <th scope="row ">    
                           <!-- checkbox -->
                           <input type="checkbox" id='del_<?php echo $classList['id'];?>' name="delete[]" value="<?=$classList['id']; ?>" class="chk">
                       </th>
                        <th scope="row "><?=$i;?></th>
                        <th scope="row "><?=$classList['id'];?></th>
                        <td><?=$classList['class_name'];?></td>
                        <td><!-- <a href ="?class_id=<?php echo $classList['id'];?>"> <button type="button" class="popup-with-form btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModalCenter">Edit &nbsp;<i class='fa fa-edit'></i></button></a> -->
                          <a href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter" data-class_id="<?=$classList['id'];?>" data-class_name="<?=$classList['class_name'];?>" class="addattribut"> Edit</a>
                        </td>

                        <td class="delete"><a href="?did=<?php echo $classList['id'];?>" data-id="<?php echo $classList['id'];?>" id="<?php echo $classList['id'];?>">
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
                      </tr>
                    <?php $i++;}
                  ?>                  

                </tbody>
              </table>
            <!-- /.card -->
    </section>


       <!-- Start Add Class Form 
    ============================================= -->
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="add_class_form" class="mfp-hide white-popup-block">

        <div class="col-md-12 login-custom">
            <h4>Add New Class </h4>
            
                <div class="col-md-12" align="center">
                  <input class="form-master" type="text" id="className" placeholder="Please Enter Class Name*" name="add_class" maxlength="100" autocomplete="off">
               </div>

            <div class="col-md-12">
                <div class="row">
                    <button type="submit" class="save" name="create_class">
                        Save
                    </button>
                    <button type="close" name="close_class">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Update Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <!--  <form method="post">   -->    
      <div class="modal-body">
          <br>  
           <div class="col-md-12" align="center">
                  <!-- <input class="form-master" type="text" placeholder="Please Update Class Name*" name="add_subject" value="<?=$class_data['id'];?>"> -->
                  <input type="hidden" id="classId" name="hidden_class_id">
                  <input class="form-master" type="text" id="updateclassName" name="update_class_name">
               </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit_class" class="btn btn-primary update" >Update</button>
       <!--  <input type="submit" name="edit_class" value="Update"> -->
      </div>
   <!--  </form> -->
    </div>
  </div>
</div> 
  <!----Edit and Updates Command -- --> 

  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer ">
    <div class="float-right d-none d-sm-block ">
     <!-- <b>Version</b> 3.1.0-rc   -->
    </div>
    <strong>Copyright &copy; <?=date("Y");?> <a href="https://www.examin.com">eAgriEdu.com</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar  -->
  <aside class="control-sidebar control-sidebar-dark "> 
    <!-- Control sidebar content goes here  -->
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
<script>
  $(document).ready(function(){
     $('#class_table').DataTable();
  });
</script>

<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

<script>
    //This function will call when edit button will be click to get class id and class_name...
    $('.addattribut').click(function() {
    var id = $(this).data('class_id');
    
     //console.log(id)      
    var name = $(this).data('class_name');
    // console.log(name);

    $('#classId').val(id);  
    $('#updateclassName').val(name);
    } );

    //jQuery to submit update class through ajax....
    $('.update').click(function(){
      var id = $('#classId').val();
      var name = $('#updateclassName').val();

      console.log("id is"+id);
      console.log("name is "+name);
      // AJAX Request
           $.ajax({
              url: 'add_edit_class.php',
              type: 'POST',
              data: { class_id: id, class_name: name},
              success: function(html){
                $('#messageShow').html(html);
                 setTimeout(function(){// wait for 5 secs(2)
                  location.reload(); // then reload the page.(3)
                }, 2000); 
              },
              error:function(err){
                console.log("Error : ",err)
              }
           });

    });
 </script>

</body>
</html>