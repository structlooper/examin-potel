<?php 
require_once 'includes/header.php';

if(isset($_GET['did']) && !empty($_GET['did'])){
  $id = $_GET['did'];
  $query = "DELETE FROM exam_packages WHERE package_id ='$id'";
  $result = mysqli_query($conn,$query);
}

//Package Status Active/Deactive START...
if(isset($_GET['id']) && $_GET['id']!=''){   
  $id = $_GET['id'];
  $operation = $_GET['operation'];
  if($operation == 'active'){
    $status = 1;
  }elseif($operation=='deactive'){
    $status = 0;
  }
  $query = "UPDATE exam_packages SET status='$status' WHERE package_id ='$id'";
  $result = mysqli_query($conn,$query);
}


?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Examin| Online Exam</title>

  <!--- Validate jQuery---->

  <!-- Main Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

  <!-- Theme included stylesheets -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

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
    .select_box{
      width: 100% !important;
    }


  </style>
  <script>
      // Start Add Exam Form validate();

      $(document).ready(function() {

        $(".add_package").click(function(){
          var package_name = $("#packageName").val();
          var packageAmount = $("#packageAmount").val();
          var packageValidity = $("#packageValidity").val();
          var description = $("#description").val();

          if(package_name == null){
           alert("Please Enter Package Class Name");
           $("#packageName").focus();
           return false;
         }
         else if(subjectName == null){
          alert("Please Select Subject Name");
          $("#subjectName").focus();
          return false;
        }
        else if(chapterName == null){
         alert("Please Select Chapter Name");
         $("#chapterName").focus();
         return false;
       }
       else if(examName == ""){
        alert("Enter Exam Name");
        $("#examName").focus();
        return false;  
      }
      else if(textArea == ""){
        alert("Enter Instruction");
        $("#textarea").focus();
        return false;
      }
      else if(ExamDuration == ""){
        alert("Enter Exam Duration Time");
        $("#ExamDuration").focus();
        return false;  
      }
      else if(ExamDuration <= "1"){
        alert("Please Enter a Valide time duration");
        $("#ExamDuration").focus();
        return false;  
      }
      else if(attemptCount <= "0"){
        alert("Enter Attempt Count Time");
        $("#attemptCount").focus();
        return false;  
      }
        // else if(startTime == ""){
        //   alert("Please Select Start time");
        //   $("#startTime").focus();
        //   return false;  
        // }
        else if (start_date == ""){
          alert("Please select start date");
          $("#start_date").focus();
          return false;
        }
        else if (end_date == ""){
          alert("Please select end date");
          $("#end_date").focus();
          return false;
        }
        // else{
        //   alert("Success");  
        // }

      })

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
            url: 'ajax/package_ajax.php',
            type: 'POST',
            data: { packageid: post_arr, tableName:"exam_packages"},
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
      // Delete Action code end

    });

    //$("#add_exam_form").validate();
  </script>

  <script type="text/javascript">

    $(function(){

      $(document).on("click", ".DropDownData", function(res){
        var DivHead = res.target.parentNode;
        $(DivHead).find(".DropDownList").toggleClass("DropDownToggleList");
        $(DivHead).find(".DropDownChevron").toggleClass("DropDownChevronToggle");
      })

      $(document).on("click", ".ItemsCheckBox", function(res){
        var DivHead = res.target.parentNode.parentNode.parentNode;
        var data = [];
        var datas = [];
        var id=[];
        var ids=[];
        $.each($(DivHead).find(".ItemsCheckBox:checked"), function(){
          data.push($(this).val());
          id.push($(this).attr("DropDownId"));
        })
        for(var i=0; i<data.length; i++){
          datas[i] = data[i]+"";
          ids[i] = id[i]+"";
        }
        FinalItem = data.toString();

        $(".DropDownId").val(datas);
        $(".showData").val(ids);
  }) // Select CheckBox Close   

}) // Open CheckBox List Close

</script>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
  <!-- Content Header (Page header) -->
  <section class="content-header ">
    <div class="container-fluid ">
      <div class="row mb-2 ">
        <div class="col-sm-6 ">
          <a href= "#add_package_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Plan</button></a>
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
                <th scope="col ">Plan Name</th>
                
                <th scope="col ">Status</th>
                <!-- <th scope="col ">Result</th> -->
                <th scope="col ">Action</th>
                <th scope="col ">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              $res = mysqli_query($conn,"SELECT * FROM exam_packages");

              while($PackageList = mysqli_fetch_assoc($res)){ ?>
                <tr id='tr_<?=$PackageList['package_id'];?>'>
                  <th scope="row ">    

                    <!-- checkbox -->
                    <input type="checkbox" id='del_<?php echo $PackageList['package_id'];?>' name="delete[]" value="<?=$PackageList['package_id']; ?>" class="chk">
                  </th>
                  <td scope="row "><?=$i;?></td>
                  <td scope="row "><?=$PackageList['package_name'];?></td>
                  

                  <?php 
                  if($PackageList['status']==1){ ?>
                    <td><a href="?type=status&operation=deactive&id=<?=$PackageList['package_id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Active</a></td>
                  <?php }else{?>
                    <td><a href="?type=status&operation=active&id=<?=$PackageList['package_id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Deactive</a></td>
                  <?php }?>

                  <!--   <th scope="row ">Download</th> -->

                  <td>
                    <a href="#update_exam_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_exam_package" data-package_id="<?php echo $PackageList['package_id'];?>" data-package_name="<?php echo $PackageList['package_name'] ?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>

                  </a>
                </td>

                <td class="delete"><a href="?did=<?php echo $PackageList['package_id'];?>" data-id="<?php echo $PackageList['package_id'];?>" id="<?php echo $$PackageList['package_id'];?>"> <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
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
        <form action="add-update-examPackage.php" method="post" id="add_package_form" class="mfp-hide white-popup-block" enctype="multipart/form-data">
         <div class="col-md-12 login-custom">           
          <h4>Add New Package </h4>
          <div class="card-body">

          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-12">Choose Class Name</label>
           </div>
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
            <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-12">Enter Package Name</label>
           </div>
           <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" class="form-control" id="packageName" name="package_name" placeholder="Enter Package Name*" maxlength="100" autocomplete="off">
            </div>
          </div>

          <div class="form-group row question_list_div" style="display:block;" >
           <label lass="col-sm-12">Choose the Featured Exams from the list for this Package</label>
           <div class="DropDownHead col-md-12" id="dropdowndHead">
            <div class="row">

              <input type="text" class="InputDefault DropDownId col-md-10" name="question_list" autocomplete="off">

              <!-- <i class="fas fa-chevron-right DropDownChevron"></i> -->
              <!-- <div> -->
               <span class="InputDefault ValidInputField DropDownData DropDownChevron arrow"><i class="fas fa-angle-right"></i></span>
              <input type="hidden" readonly class="InputDefault ValidInputField showData col-md-2" name="exam_ids">
              <!-- </div> -->

              <div class="DropDownList" id="Exams-list" >
                <br>
                <?php 
                $res = mysqli_query($conn,"SELECT * FROM exam WHERE status = 1");
                if($count = mysqli_num_rows($res) > 0){
                  while($examList = mysqli_fetch_assoc($res)){ ?>
                  <label class="DropDownContainer" style="text-transform:none;"><span class="quest-text"><?=$examList['exam_name'];?></span>
                 
                  <input class='ItemsCheckBox ClearCheckBox' DropDownId="<?=$examList['id'];?>" value="<?=$examList['exam_name']?>" type='checkbox'> <span class='checkmark'></span>
                   <!-- <div style='float: right; margin:0px 10px;' ><?=$examList['exam_amount'];?> Rs.</div> -->
                   <div style='float: right; margin:0px 10px;' ><?php if($examList['exam_amount']==""){ echo "0";}else{ echo $examList['exam_amount']; } ?> Rs.</div>
               <!--  <div style='float: right'> <img class='DropDownImageStyle' src='/UploadedFiles/SeatItemImages/'+data[i].image+'>
                </div> -->
              </label>
              <?php } 
                }else{ ?>
                  <label class="DropDownContainer" style="text-transform:none;"><span class="quest-text">No Data Foud</span>
                <?php } ?>                 
                

          </div>
        </div>
      </div>
    </div>      
    <br>

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-12">Description*</label>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <textarea type="textarea" class="form-control" id="description" name="description" placeholder="Description*" rows="5" maxlength="1000" autocomplete="off" ></textarea>    
        <div id="load_editor0">
          <div id="Texteditor0">

          </div>
        </div>
        <br>

      </div>
    </div>

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-4">Amount*</label>
      <div class="col-sm-8">
        <input type="number" class="form-control" id="packageAmount" name="package_amount" placeholder="Package Amount*" >
      </div>
    </div>

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-4">Package Validity in Months*</label>
      <div class="col-sm-8">
        <input type="number" class="form-control" id="packageValidity" name="package_validity" placeholder="Package Validity in Months*">
      </div>
    </div>

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-4">Image*</label>
      <div class="col-sm-8">
        <input type="file" class="InputField" id="imgfile" name="image" accept="image/*">
      </div>
    </div>

    <!-- /.card-body -->

    <div class="col-md-12">
     <div class="row">
      <button type="submit" class="add_package" name="add_package">
        Save
      </button>

<!--      <button type="close" name="close_class" data-dismiss="modal">-->
<!--        Close-->
<!--      </button> -->

    </div>
  </div>

</div>

</div>
</form>
<!-- End Add Class Form -->

<form action="add-update-examPackage.php" method="post" id="update_exam_form" class="mfp-hide white-popup-block" enctype="multipart/form-data">
  <div class="col-md-12 login-custom">                                
    <h4>Update Package </h4>
    <div class="card-body">


          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-12">Choose Class Name</label>
           </div>
          <div class="form-group" align="center">
            <select name="upd_class_list" class="select_box" id="update_className">
              <option value= "" selected disabled>Select Class Name </option>
              <?php 
                $res = mysqli_query($conn,"SELECT * FROM classes");                  
                while($row = mysqli_fetch_assoc($res)){ ?>                         
                  <option value="<?=$row['id'];?>" ><?=$row['class_name']?></option>                                   
                <?php } ?>                                
            </select>
         </div>

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-12">Enter Package Name</label>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <!-- input type="hidden" id="exam_id" name="exam_id" value="<?=$exam_id;?>"> -->

          <input type="text" class="form-control" id="update_packageName" name="update_packageName" maxlength="100" autocomplete="off" value="">
        </div>
      </div>

      <div class="form-group row question_list_div" style="display:block;" >
       <label lass="col-sm-12">Choose the Featured Exams from the list for this Package</label>
       <div class="DropDownHead col-md-12" id="dropdowndHead">
        <div class="row">

          <input type="text" class="InputDefault DropDownId col-md-6" id="update_ExammList" name="update_ExammList" autocomplete="off">

          <i class="fas fa-chevron-right DropDownChevron"></i>
          <input type="text" readonly class="InputDefault ValidInputField DropDownData showData col-md-6" id="updateExam_ids" name="updateExam_ids">


          <div class="DropDownList" id="Exams-list">
            <br>
            <?php 
            $res = mysqli_query($conn,"SELECT * FROM exam WHERE status = 1");                  
            while($examList = mysqli_fetch_assoc($res)){ ?>
              <label class="DropDownContainer"><?=$examList['exam_name'];?>
              <input class='ItemsCheckBox ClearCheckBox' DropDownId="<?=$examList['id'];?>" value="<?=$examList['exam_name']?>" type='checkbox' name="exam_chkbx"><span class='checkmark'></span>
                <!-- <div style='float: right'> <img class='DropDownImageStyle' src='/UploadedFiles/SeatItemImages/'+data[i].image+'>
                </div> -->
              </label>
            <?php } ?> 

          </div>
        </div>
      </div>
    </div>   

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-12">Description</label>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <textarea type="textarea" class="form-control" id="update_description" name="update_description" placeholder="Description*" rows="5"></textarea>    
        <div id="load_editor0">
          <div id="Texteditor0">

          </div>
        </div>
        <br>
      </div>
    </div>


    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-4">Amount*</label>
      <div class="col-sm-8">
        <input type="number" class="form-control" id="update_package_amount" name="update_package_amount">
      </div>
    </div>

    <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-4">Package Validity in Months*</label>
      <div class="col-sm-8">
        <input type="number" class="form-control" id="update_package_validity" name="update_package_validity">
      </div>
    </div>

     <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-4">Image*</label>
      <div class="col-sm-8">
        <!-- <input type="file" class="InputField" id="update_imgfile" name="image" accept="image/*"> -->
    
          <input name="image" type="file" id="file" />
          <input name="hidden_image" type="hidden" id="hiddenfile" class="hidden_img" />
          <img src="" width="100px" height="100px" class="imgData">
       </div>
    </div>   
    <!-- /.card-body -->

    <div class="col-md-12">
      <div class="row">
        <input type="hidden" name="package_id" id="package_hidden_id">
        <button type="submit" name="update_package">
         Update
       </button>
<!--       <button type="close" name="close_class">-->
<!--         Close-->
<!--       </button>-->
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

<script>
  $('.label.ui.dropdown')
  .dropdown();

  $('.no.label.ui.dropdown')
  .dropdown({
    useLabels: false
  });

  $('.ui.button').on('click', function () {
    $('.ui.dropdown')
    .dropdown('restore defaults')
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){

     //Get the data attribute all values like Package id, package name,to populate the fields related to these data...
     $('.edit_exam_package').click(function() {
      var package_id = $(this).data('package_id');
       //console.log(package_id);
     // AJAX Request
     $.ajax({
      url: 'edit_package.php',
      type: 'POST',
      data: {package_id: package_id},
      success: function(data){
          //parse json data coming from edit_exam.php
          var packageData = JSON.parse(data);
          //console.log(packageData[0].package_id );

        //get the values of json array and store in jquery variables..
        var package_id = packageData[0].package_id;
        var package_name = packageData[0].package_name;
        var amount = packageData[0].amount;
        var validity = packageData[0].validity;
        var featured_exams = packageData[0].featured_exams;

        var discription = packageData[0].discription;
        var class_id = packageData[0].class_id;
        var class_name = packageData[0].class_name;

        var image = packageData[0].image; 
        var imgUrl = '<?php echo web."uploads/package-img/";?>'+image;


        //Now assign the values to the fields of modal
        $('#package_hidden_id').val(package_id);
       
        $('#update_className').val(class_id);     


        $('#update_packageName').val(package_name);
        $('#update_description').val(discription);
        $('#update_package_amount').val(amount);
        $('#update_package_validity').val(validity);
        $('#updateExam_ids').val(featured_exams);

        $('.imgData').attr('src',imgUrl);
         $('.hidden_img').val(image);

        var array = featured_exams.split(",");
        for (i=0;i<array.length;i++){
          var value = array[i];
          console.log(value);

          $("input[name = exam_chkbx][dropdownid=" + value + "]").attr('checked', true);
        }    
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
      text: "Package is Created!",
      icon: "<?php echo $_GET['msg']; ?>",
      button: "OK, Done",
    });
    $('.swal-button--confirm').click(function(){
      window.location.href = 'packages.php';
    });

  </script>

<?php }

 if(isset($_GET['msg']) && $_GET['msg']=="updated"){ ?>
   <script>

    swal({
      title: "<?php echo $_GET['msg']; ?>",
      text: "Package is updated!",
      icon: "<?php echo 'success'; ?>",
      button: "OK, Done",
    });
    $('.swal-button--confirm').click(function(){
      window.location.href = 'packages.php';
    });

  </script>

<?php }
?>

<!-- Only Exam Paid And Unpaid hide & Show -->
<script>
 $(document).ready(function(){
   $(".exam_ammount_show").hide();
   $(".paid_yes").click(function(){
    $(".exam_ammount_show").show();
  });
   $(".paid_no").click(function(){
    $(".exam_ammount_show").hide();
  });
 });
</script>
</body>
</html>