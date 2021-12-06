  <?php 
  require_once 'includes/header.php';

  //Student Status Active/Deactive START...
if(isset($_GET['id']) && $_GET['id']!=''){   
  $id = $_GET['id'];
  $operation = $_GET['operation'];
  if($operation == 'active'){
    $status = 1;
    
  }elseif($operation=='deactive'){
   $status = 0;   
  }
  $query = "UPDATE student_details SET status='$status' WHERE id='$id'";
  $result = mysqli_query($conn,$query);
}

//Student Verify/Unverify START...
if(isset($_GET['vid']) && $_GET['vid']!=''){   
  $id = $_GET['vid'];
  $operation = $_GET['operation'];
  if($operation == 'verify'){
    $code = 1;
  }elseif($operation=='unverify'){
    $code = 0;
  }
  $query = "UPDATE student_details SET code='$code' WHERE id='$id'";
  $result = mysqli_query($conn,$query);
}


  ?>

  <head>   
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!--SweetAlert CDN-->
    <style>
      input[type=text],
      [type=email],
      [type=number],
      select,
      textarea {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 8px;
        resize: vertical;
      }
    </style>
    <script>
      $(document).ready(function() {
     // Delete Action code
     $(".delete").click(function(){
       var a = confirm("Confirm to Delete");
       let student_id = $(this).attr('st_id');
       if(a) {
           $.ajax({
               url: 'ajax/delete_student.php',
               type: 'POST',
               data: { student_id:student_id, delete_student:"1"},
               success: function(response){
                   if (response){
                       window.location.reload();
                   }else{
                       alert('something went wrong, Please try again later!')
                   }

               },
               error:function(err){
                   console.log("Error : ",err)
               }
           });
      }

    })

        // Delete Action code en
      });
    </script>

  </head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->

    <!-- Start Add Class Form  -->

    <div class="container mt-3">
      <h3>Student Details</h3>
      <h6 align="center" class="text-success" id="update_message"></h6>

      <br>
      <table class="table table-bordered" id="student_data">
        <thead class="bg-primary ">
          <tr>
            <th>S no.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Status</th>
            <th>Email Verification</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $i = 1;
            //$fetch_studentData = "SELECT * FROM students";
           $fetch_studentData = "SELECT * FROM student_details ORDER BY id DESC";
            $result = mysqli_query($conn,$fetch_studentData);

            $num_rows = mysqli_num_rows($result);
            
            while($studentsList = mysqli_fetch_assoc($result)){ ?>
              <tr>    
                <td><?=$i ?></td>
                <td><?=$studentsList['student_fname']; ?></td>
                <td><?=$studentsList['student_lname']; ?></td>
                <td><?=$studentsList['student_email']; ?></td>
                <td><?=$studentsList['contact']; ?></td>
                <?php 
                  if($studentsList['status']==1){ ?>
                    <td><a href="?type=status&operation=deactive&id=<?=$studentsList['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Active</a></td>
                  <?php }else{?>
                    <td><a href="?type=status&operation=active&id=<?=$studentsList['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Deactive</a></td>
                  <?php }?>

                  <?php 
                  if($studentsList['code']==1){ ?>
                    <td><a href="?type=status&operation=unverify&vid=<?=$studentsList['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Verified</a></td>
                  <?php }else{?>
                    <td><a href="?type=status&operation=verify&vid=<?=$studentsList['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Not Verified</a></td>
                  <?php }?>
                <td>
                  <a href="#" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary btn-sm edit_student_details" data-student_id="<?php echo $studentsList['id']; ?>" data-student_fname="<?php echo $studentsList['student_fname'];?>" data-student_lname="<?php echo $studentsList['student_lname'];?>" data-student_email="<?php echo $studentsList['student_email']; ?>" data-student_contact="<?php echo $studentsList['contact']; ?>">Edit &nbsp;<i class='fa fa-edit'></i></button>
                  </a>
                </td>
                <td class="delete" st_id="<?= $studentsList['id']; ?>"><a href="#" button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button>
                </a>
              </td>
              </tr> 
            <?php $i++;}
          ?>
         
      </tbody>
    </table>
  </div>

  <div class="container">
    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Student Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">          
                  <!-- <div class="container" id="addDetails">
                                  <h4>Add Collage Details</h4>
                                  <form action="#"> -->
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Student First Name</label>
                <div class="col-sm-8">
                  <input type="text" id="stuName" class="InputField" name="stuName" placeholder="Student Name..">
                  <span class="stuNameError AllError" style="color: red;"></span> 
                </div>

              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Student Last Name</label>
                <div class="col-sm-8">
                  <input type="text" id="stuLName" class="InputField" name="stuLName" placeholder="Student Name..">
                  <span class="stuNameError AllError" style="color: red;"></span> 
                </div>

              </div>  

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Student Email</label>
                <div class="col-sm-8">
                  <input type="text" id="stuEmail" class="InputField" name="stueEmail" placeholder="Student Email..">
                  <span class="stuEmailError AllError" style="color: red;"></span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Mobile No</label>
                <div class="col-sm-8">
                 <input type="number" id="stuMobile" class="InputField" name="stuMobile" placeholder="Student Mobile No..">
                 <span class="stuMobileError AllError" style="color: red;"></span>
               </div>
             </div>

             <!-- <div class="form-group row">
              <label class="col-sm-4 col-form-label">Exam Type</label>
              <div class="col-sm-8">
                <select name="examType" id="examType" class="multipleSelection InputField" form="StudentDetails">
                  <option value= "" selected disabled style="color: #807e7e;">Select Exam Type</option>
                  <option value="free">Free</option>
                  <option value="paid">Paid</option>
                </select>
                <span class="examTypeError AllError" style="color: red;"></span>
              </div>
            </div> -->
            <!-- <input type="submit" class="submit" value="Submit"> -->
            <!-- <input type="close" class="close" value="Close" data-dismiss="modal"> -->
          </form>
          <!-- </div> -->

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
           <input type="hidden" name="id" id="student_hidden_id">
          <button type="submit" name="update_student_info" id="update_student_info" class="btn btn-success" data-dismiss="submit">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</div>

<!-- End Add Class Form -->

<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--footer File--->
<?php require_once 'includes/footer.php';?>
<!--footer File--->
</div>
<!-- ./wrapper -->

<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js "></script>

<!-- Page specific script -->
<script src="https://code.jquery.com/jquery-3.5.1.js "></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>         

  $(document).ready(function() {
    $('#student_data').DataTable();
    $("#student_data").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden;'></div>");

    $('.edit_student_details').on("click",function(){
      //store student details in variable which is coming through data attributes of edit button..
        var student_id = $(this).data('student_id');
        var student_fname = $(this).data('student_fname');
        var student_lname = $(this).data('student_lname');
        var student_email = $(this).data('student_email');        
        var student_contact = $(this).data('student_contact');

        //Now take these values to box modal input fields....
        $('#student_hidden_id').val(student_id);
        $('#stuName').val(student_fname);
        $('#stuLName').val(student_lname);
        $('#stuEmail').val(student_email);
        $('#stuMobile').val(student_contact);
      });

      //Sumbit box modal trought ajax call..
      $('#update_student_info').on("click",function(){
        //When update_student_info will be click get the model box values in these variable and call ajax and submit the data for update...
        var student_id = $( "#student_hidden_id" ).val();
        var student_name = $('#stuName').val();
        var student_lname = $('#stuLName').val();
        var student_email = $('#stuEmail').val();        
        var student_contact = $('#stuMobile').val();

          $.ajax({
            url: 'ajax/student-detail.php',
            type: 'POST',
            data: { studentID: student_id, studName: student_name,student_lname: student_lname, studEmail: student_email, studContact: student_contact },
              success: function(data){                
                 if(data = "success"){                  
                    swal({
                      title: "success",
                      text: "Student Info is updated!",
                      icon: "success",
                      button: "OK, Done",
                    });
                    $('.swal-button--confirm').click(function(){
                      window.location.href = 'student_info.php';
                    });                   
                 }                
              },
            error:function(err){
              console.log("Error : ",err)
            }
          });
      
      });

  } );
</script>

</body>
</html>