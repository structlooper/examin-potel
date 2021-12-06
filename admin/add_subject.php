<?php 
  require_once 'includes/header.php';
  $msg ='';

if(isset($_GET['did']) && !empty($_GET['did'])){
    echo $id = $_GET['did'];
    $msg = deleteData('subject',$id);
  }

  //Insert New Subject In subject class in database START...
if(isset($_POST['create_subject'])){

    $subject_name = get_safe_value($conn,$_POST['subject_name']);
    $class_id = get_safe_value($conn,$_POST['class_list']);

    //fetch class name from class table based on $class_id variable while add subject to store in subject table..
    $query = "SELECT * FROM classes WHERE id = '$class_id'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0){
      $class_data = mysqli_fetch_assoc($res);
      $class_name = $class_data['class_name'];
      
    }

    //Check if subject_name and also the class already exist in subject table before insert operation..
    // $sql = "SELECT * FROM subject WHERE subject_name = '$subject_name' AND class_name = '$class_name'";

    $sql = "SELECT * FROM subject WHERE subject_name = '$subject_name' AND classs_id = '$class_id'";

    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
      // header("location:{$hostname}/add_subject.php");
    $msg = "subject name in this class already exist";
      
    }else{
      //Else Insert Data...
      $status = 1;
      $sql = "INSERT INTO subject(subject_name,class_name,classs_id,status) VALUES('$subject_name','$class_name','$class_id','$status')";
      
      if(mysqli_query($conn,$sql)){
        if($conn->affected_rows == 1){
          $msg = "Subject Added";
        }
        //header("location:{$hostname}/add_subject.php");
      }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }

  //Insert New Subject In subject class in database END...

?> 

<head> 
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
     <!--SweetAlert CDN-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
   <!--SweetAlert CDN-->


   <script>
      $(document).ready(function(){
         $(".saveSub").click(function(){
           var formMaster =$(".form-master").val();
           var select_box = $("#className").val();
           
           if(select_box == null){
             alert("Please select Class Name");
             $("#className").focus();
             return false;
           }

           else if(formMaster == ""){
             alert("Enter Subject Name");
             $(".form-master").focus();
             return false;
           }          
           // else{
           //   alert("Success");
           // }
         })

 //Delete Subject with checkbox checked START...

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
              url: 'ajax/ajaxfile.php',
              type: 'POST',
              data: { id: post_arr, tableName:"subject"},
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

       //Delete subject name with checkbox checked End...
     </script>

  </head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid ">
        <div class="row mb-2 ">
            <div class="col-sm-6 ">
              <a href= "#add_subject_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Subject</button></a>
            <button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button>
                <!-- <a href= "#add_subject_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Subject</button></a>
                <a href= "#" button type="button " class="btn btn-danger btn-sm delete">Delete</button></a> -->
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
              <table class="table" id="subject_table">
                <thead class="bg-primary ">
                  <tr>
                    <th scope="col ">Select</th>
                    <th scope="col ">S.No</th>
                    <th scope="col ">id</th>
                    <th scope="col ">Class Name</th>
                    <th scope="col ">Subject Name</th>
                    <th scope="col ">Action</th>
                    <th scope="col ">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    // echo "SELECT subject.*,classes.class_name FROM subject INNER JOIN classes ON subject.classs_id = classes.id";
                    
                    $res = mysqli_query($conn,"SELECT subject.*,classes.class_name,classes.id as class_id FROM subject INNER JOIN classes ON subject.classs_id = classes.id");

                    while($row = mysqli_fetch_assoc($res)){ ?>
                      <tr id='tr_<?=$row['id'];?>'>
                    <th scope="row ">    
                  
                      <!-- checkbox -->
                      <input type="checkbox" id='del_<?php echo $row['id'];?>' name="delete[]" value="<?=$row['id']; ?>" class="chk">
                    </th>
                    <td scope="row "><?=$i;?></td>
                    <td scope="row "><?=$row['id'];?></td>
                    <td><?=$row['class_name'];?></td>
                    <th scope="row "><?=$row['subject_name'];?></th>

                    <td>
                      
                      <a data-toggle="modal" data-target="#exampleModalCenter">
                        <button type="button" class="btn btn-primary btn-sm edit_subject" data-class_id="<?php echo $row['class_id'];?>" data-class_name="<?php echo $row['class_name'];?>" data-subject_id="<?php echo $row['id'];?>"  data-subject_name="<?php echo $row['subject_name'];?>">Edit &nbsp;<i class='fa fa-edit'></i></button>
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
    <form action="" method="post" id="add_subject_form" class="mfp-hide white-popup-block">
         <div class="col-md-12 login-custom">
             <h4>Create a New Subject </h4>
               <div class="form-group" align="center">
                  <select name="class_list" class="select_box" id="className">
                    <option value= "" selected disabled>Select Class Name </option>
                    <?php 
                      $res = mysqli_query($conn,"SELECT * FROM classes");                  
                      while($row = mysqli_fetch_assoc($res)){ ?>                         
                        <option value="<?=$row['id'];?>" ><?=$row['class_name']?></option>                                   
                      <?php } ?>                                
                  </select>
               </div>
            
             <div class="col-md-12" align="center">
                  <input class="form-master" type="text" name="subject_name" placeholder="Please Enter a Subject Name*" name="add_subject" maxlength="100" autocomplete="off">
             </div>
             <br>
             <div class="col-md-12">
                 <div class="row">
                     <button type="submit" class="saveSub" name="create_subject">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Update Class & Subject Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">        
      <div class="col-md-12">
            <form>
                  <div class="form-group" align="center">
                        <select name= "class_list" class="select_box" id="class_Name">
                        <option value= "" selected disabled>Select Class Name </option>
                        <?php 
                          $res = mysqli_query($conn,"SELECT * FROM classes");                  
                          while($row = mysqli_fetch_assoc($res)){ ?>                         
                          <option value="<?=$row['id'];?>" ><?=$row['class_name']?></option>                                    
                          <?php } ?>
                        </select>
                   </div> 
                  <br>
                  <div class="col-md-12" align="center">
                    <!-- <input type="hidden" name="" id="class_id"> -->
                    <input type="hidden" name="" id="update_subject_id">
                    <input class="form-master" type="text" placeholder="Please Update Subject Name*" name="update_subject" id="update_subject_name">
                  </div>   
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary update_subject" name="update_subject">Update</button>
                </div>
            </form>
        </div>
          
    </div>
  </div>
</div>
  <!----Edit and Updates Command ---->  




   
  <!-- End Body Section-->
                        

  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer ">
    <div class="float-right d-none d-sm-block ">
     <!-- <b>Version</b> 3.1.0-rc   -->
    </div>
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="https://www.examin.com">eAgriEdu.com</a>.</strong> All rights reserved.
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
     $('#subject_table').DataTable();
  });
</script>

<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script>
  $(document).on("click",".edit_subject",function(){
    var class_id = $(this).data('class_id');
    var class_name = $(this).data('class_name');
    var subject_id = $(this).data('subject_id');    
    var subject_name = $(this).data('subject_name');
    // console.log(class_id);
    // console.log(class_name);
    // console.log(subject_id);
    // console.log(subject_name);
    
    //console.log(class_name);
    $('#class_id').val(class_id);
    $("#class_Name").val(class_id);
    $("#update_class_name").val(class_name);
      $('#update_subject_id').val(subject_id);
    $('#update_subject_name').val(subject_name);
  });

  $(document).on("click",".update_subject",function(){
      //get class dropdown value..
     var dropdown_Class_id =  $( "#class_Name" ).val();
     var dropdown_Class_name = $('#class_Name option:selected').text();
     // console.log(dropdown_Class_id);
     // console.log(dropdown_Class_name);


    var update_subject_id = $("#update_subject_id").val();
    var update_subject_name = $("#update_subject_name").val();

      $.ajax({
            url: 'ajax/ajaxfile.php',
            type: 'POST',
            data: { classid: dropdown_Class_id, className: dropdown_Class_name, update_subject_id: update_subject_id, subject_name: update_subject_name, tableName:"subject" },
              success: function(response){
                //$('#messageShow').html(html);
                  if(response == 0){
                    swal({
                      title: "subject name in this class already exist",
                      text: "subject name in this class already exist",
                      icon: "warning",
                      button: "OK",
                    });
                    $('.swal-button--confirm').click(function(){
                    window.location.href = 'add_subject.php';
                  });
                }else if(response == 1){
                    swal({
                      title: "Subject Updated",
                      text: "Subject Updated Successfully",
                      icon: "success",
                      button: "OK",
                    });
                    $('.swal-button--confirm').click(function(){
                    window.location.href = 'add_subject.php';
                  });
                }
                    
                //  setTimeout(function(){// wait for 3 secs(2)
                //   location.reload(); // then reload the page.(3)
                // }, 2000); 
              },
            error:function(err){
              console.log("Error : ",err)
            }
          });
  });

  
</script>
<?php
if($msg == "Data delete"){?>
<script>
swal({
    title: "Subject Deleted Successfully",
    text: "Subject Deleted Successfully",
    icon: "success",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
  window.location.href = 'add_subject.php';
});
</script>
<?php }

if($msg == "Subject Added"){?>
<script>
swal({
    title: "Subject Added Successfully",
    text: "Subject Added Successfully",
    icon: "success",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
  window.location.href = 'add_subject.php';
});
</script>
<?php }
?>
</body>
</html>