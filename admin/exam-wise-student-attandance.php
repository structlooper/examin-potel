  <?php 
  require_once 'includes/header.php';
  
  if(isset($_GET['exam_id']) && $_GET['exam_id'] != '' ){
    $exam_id = $_GET['exam_id'];
  }
  ?>

  <head>   
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
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
    //  $(".enable_disable").click(function(){
    //    var a = confirm("Confirm to Disable");

    //    if(a) {
    //     alert( "Delete Success" );
    //   }

    // })

        // Delete Action code end


        $('#enable_disable_class').click(function(){

      var post_arr = [];

    // Get checked checkboxes
    $('.chk').each(function() {
      if (jQuery(this).is(":checked")) {
        var id = this.id;
        var splitid = id.split('_');
        var postid = splitid[1];

        console.log(postid);

        post_arr.push(postid);
        
      }
    });

    if(post_arr.length > 0){

      var isDelete = confirm("Do you really want to Enable/Disable records?");
      if (isDelete == true) {
           // AJAX Request
           console.log(post_arr);

           // $.ajax({
           //  url: 'ajax/ajaxfile.php',
           //  type: 'POST',
           //  data: { id: post_arr, tableName:"exam"},
           //  success: function(response){
           //      //console.log("RES : ",response)
           //      $.each(post_arr, function( i,l ){
           //       $("#tr_"+l).remove();
           //     });
           //    },
           //    error:function(err){
           //      console.log("Error : ",err)
           //    }
           //  });
         } 
       }else{
        var a = confirm("Please Select atleast one record to Enable or disable."); 
      } 
    });
      // Enable/Disable on checkbox click Action code end

      //Check All on button click START..

      $('#selectAll').click(function(){
        if ($(this).hasClass('allChecked')) {

          $('input[type="checkbox"]', '#student_data').prop('checked', false);
        } else {
          $('input[type="checkbox"]', '#student_data').prop('checked', true);
        }
        $(this).toggleClass('allChecked');
      });

      //Check All on on button click END..

      //Do enable or disable of all checkboxes on enable_disable_action button click START...
      $('#enable_disable_action').click(function(){
         // Get All checked checkboxes

         var post_arr = [];
         var exam_arr = [];
         var examIDs = '<?php echo $exam_id ?>';
          $('.chk').each(function() {
            if (jQuery(this).is(":checked")) {
              var id = this.id;             
              var splitid = id.split('_');
               
              var postid = splitid[1]; 
              // console.log("row id is "+postid);
             
              // console.log("exam Id is "+examIDs);    


              post_arr.push(postid);
              
            }
          });

    if(post_arr.length > 0){

      var isDelete = confirm("Do you really want to Enable/Disable records?");
      if (isDelete == true) {
           // AJAX Request
           console.log(post_arr);

           $.ajax({
            url: 'ajax/enable-disable-result.php',
            type: 'POST',
            data: { id: post_arr, examID: examIDs, tableName:"exam_answers"},
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
        var a = confirm("Please Select atleast one record to Enable or disable."); 
      } 
      });

      //Do enable or disable of all checkebboxes on enable_disable_action button click END...
      });



    </script>

  </head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->

    <!-- Start Add Class Form  -->

    <div class="container mt-3">
      <h3>Student Attendence List</h3>

      <a href="top_scores.php?exam_id=<?=$exam_id?>">
        <button type="button " class="btn btn-info btn-sm" id="top_scores">Top 10 Scores</button>
      </a>
     <!--  <button type="button " class="btn btn-info btn-sm enable_disable" id="enable_disable_class">Enable/Diable Result</button>

      <button type="button" id="selectAll" class="btn btn-info btn-sm main enable_disable_all">Select All</button>

      <button type="button" id="enable_disable_action" class="btn btn-info btn-sm enable_disable_action">Enable/Disable All</button> -->
      <h6 align="center" class="text-success" id="update_message"></h6>

      <br>
      <table class="table table-bordered" id="student_data">
        <thead class="bg-primary ">
          <tr>
             <th>Select</th>
            <th>First Name</th>
            <th>Last Name</th>             
            <th>Email</th>
            <th>Contact No</th>
           <!--  <th>Type</th> -->            
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php 
            $fetch_students = "SELECT * FROM exam_answers WHERE exam_id = '$exam_id' GROUP BY student_id";
            $result = mysqli_query($conn,$fetch_students);
            while($studentsList = mysqli_fetch_assoc($result)){
    
                //Now fetch student details from student_details table to show student details in list format using the student_id.

                $fetch_details = "SELECT * FROM student_details WHERE id = '".$studentsList['student_id']."'";
                $result1 = mysqli_query($conn,$fetch_details);
                  
                while($student_details = mysqli_fetch_assoc($result1)){ ?>

                  <tr id='tr_<?=$student_details['id'];?>'>
                  <th scope="row ">
                      <!-- checkbox -->
                      <input type="checkbox" id='del_<?php echo $student_details['id'];?>' name="enable_disable[]" value="<?=$student_details['id']; ?>" class="chk">

                      <input type="hidden" id='examId_del_<?php echo $exam_id;?>' name="exam_ids[]" value="<?=$exam_id; ?>" class="examIDs">
                  </th>    
                <td><?=$student_details['student_fname']; ?></td>
                <td><?=$student_details['student_lname']; ?></td>
                <td><?=$student_details['student_email']; ?></td>
                <td><?=$student_details['contact']; ?></td>
               
                <td>
                  <a href="view_result.php?stud_id=<?php echo $student_details['id'];?>&exam_id=<?php echo $exam_id;?>"  type="button" class="btn btn-primary btn-sm">View Result &nbsp;<i class='fa fa-edit'></i></button>
                  </a>
                </td>
                <td class="delete"><a href="#" button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button>
                </a>
              </td>
              </tr> 
                
                <?php }

               ?>
              
            <?php }
          ?>
         
      </tbody>
    </table>
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
        var student_name = $(this).data('student_name');
        var student_email = $(this).data('student_email');        
        var student_contact = $(this).data('student_contact');

        //Now take these values to box modal input fields....
        $('#student_hidden_id').val(student_id);
        $('#stuName').val(student_name);
        $('#stuEmail').val(student_email);
        $('#stuMobile').val(student_contact);
      });

      //Sumbit box modal trought ajax call..
      $('#update_student_info').on("click",function(){
        //When update_student_info will be click get the model box values in these variable and call ajax and submit the data for update...
        var student_id = $( "#student_hidden_id" ).val();
        var student_name = $('#stuName').val();
        var student_email = $('#stuEmail').val();        
        var student_contact = $('#stuMobile').val();

          $.ajax({
            url: 'ajax/student-detail.php',
            type: 'POST',
            data: { studentID: student_id, studName: student_name, studEmail: student_email, studContact: student_contact },
              success: function(data){
                 if(data == "success"){
                   $('#update_message').val("Data Updated");  
                   console.log("success");
                 }
                
                 setTimeout(function(){// wait for 3 secs(2)
                  location.reload(); // then reload the page.(3)
                }, 3000); 
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