<?php 
require_once 'includes/header.php';

if(isset($_GET['did']) && !empty($_GET['did'])){
  echo $id = $_GET['did'];
  $msg = deleteData('comming_soon',$id);
}

//Exam Status Active/Deactive START...
if(isset($_GET['id']) && $_GET['id']!=''){   
  $id = $_GET['id'];
  $operation = $_GET['operation'];
  if($operation == 'active'){
    $status = 1;
  }elseif($operation=='deactive'){
    $status = 0;
  }
  $query = "UPDATE comming_soon SET status='$status' WHERE id ='$id'";
  $result = mysqli_query($conn,$query);
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Examin| Online Exam</title>

  <!--- Validate jQuery---->

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
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css"> 
  <!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!--SweetAlert CDN-->

  <!-- <script type="text/javascript" src="assets2/js/custom_multiple_select.js"></script> -->
  
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
           console.log(post_arr);

           $.ajax({
            url: 'ajax/ajaxfile.php',
            type: 'POST',
            data: { id: post_arr, tableName:"tbl_events"},
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
          <a href= "#add_comingsoon_form" button type="button " class="popup-with-form btn btn-primary btn-sm ">Add New Coming Soon</button></a>
          <button type="button " class="btn btn-danger btn-sm delete" id="delete_class">Delete</button>

          <!-- <a href= "#" button type="close " class="btn btn-danger btn-sm delete">Delete</button></a> -->
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
                <th scope="col ">id</th>
                <th scope="col ">Title</th>
                 <th scope="col ">Image</th>                
                <th scope="col ">Status</th>
                <!-- <th scope="col ">Result</th> -->
                <th scope="col ">Action</th>
                <th scope="col ">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;

              $res = mysqli_query($conn,"SELECT * FROM comming_soon");

              while($cmgsnList = mysqli_fetch_assoc($res)){ ?>
                <tr id='tr_<?=$eventList['id'];?>'>
                  <th scope="row ">    

                    <!-- checkbox -->
                    <input type="checkbox" id='del_<?php echo $eventList['id'];?>' name="delete[]" value="<?=$eventList['id']; ?>" class="chk">
                  </th>
                  <td scope="row "><?=$i;?></td>
                  <td scope="row "><?=$cmgsnList['title'];?></td>
                    
                  <td>
                    <img src="../uploads/coming_soon/<?=$cmgsnList['image'];?>" height="75px" width="100px">
                  </td>              

                  <?php 
                  if($cmgsnList['status']==1){ ?>
                    <td><a href="?type=status&operation=deactive&id=<?=$cmgsnList['id'];?>" class="btn btn-success" data-toggle="tooltip" title="click for deactive">Active</a></td>
                  <?php }else{?>
                    <td><a href="?type=status&operation=active&id=<?=$cmgsnList['id'];?>" class="btn btn-warning" data-toggle="tooltip" title="click for active">Deactive</a></td>
                  <?php }?>

                  <!--   <th scope="row ">Download</th> -->

                  <td>
                    <a href="#update_exam_form" button type="button" class="popup-with-form btn btn-primary btn-sm edit_event" data-id="<?php echo $cmgsnList['id'];?>" data-event_name="<?php echo $cmgsnList['title']; ?>">Edit &nbsp;<i class='fa fa-edit'></i></button></a>

                  </a>
                </td>

                <td class="delete"><a href="?did=<?php echo $cmgsnList['id'];?>" data-id="<?php echo $cmgsnList['id'];?>" id="<?php echo $cmgsnList['id'];?>"> <button class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td>
                <!-- <td class="delete"><a href="#" button type="button" class="btn btn-danger btn-sm"> Delete &nbsp;<i class='fa fa-trash'></i></button></a></td> -->
              </tr>
              <?php $i++;}
              ?>


            </tbody>
          </table>
          <!-- /.card -->
        </section>


       <!-- Start Add comingsoon Form 
        ============================================= -->
        <form action="add_edit_comingsoon.php" method="post" id="add_comingsoon_form" class="mfp-hide white-popup-block" enctype="multipart/form-data">
         <div class="col-md-12 login-custom" >           
          <h4>Add New Coming Soon </h4>
          <div class="card-body">
           <div class="form-group row">

          </div>

         <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm" id="event_time">Coming Soon Title</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="comingSoontitle" name="comingSoontitle" placeholder="title">
            </div>
        </div>


      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm" id="event_time">Time*</label>
        <div class="col-sm-8">
          <input type="time" class="form-control" id="comingSoontime" name="comingSoontime" placeholder="time">
        </div>
      </div>

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-4">Date*</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" id="comingSoonDate" name="comingSoonDate" placeholder="Date">
        </div>
      </div>


      <div class="form-group row">
      <label for="file" class="col-sm-6">Image*</label>
      <div class="col-sm-6">
        <input type="file" class="InputField" id="imgfile" name="image" accept="image/*">
      </div>
    </div>
<!-- /.card-body -->

<div class="col-md-12">
 <div class="row">
  <button type="submit" class="save" name="add_comingSoon" id="add_comingSoon">
    Save
  </button>

<!--  <button type="close" name="close_class" data-dismiss="modal">-->
<!--    Close-->
<!--  </button> -->
  
</div>
</div>

</div>

</div>
</form>
<!-- End Add Class Form -->           

              <form action="add_edit_comingsoon.php" method="post" id="update_exam_form" class="mfp-hide white-popup-block" enctype="multipart/form-data">
                <div class="col-md-12 login-custom">                                
                  <h4>Update Comming Soon</h4>
                  <div class="card-body">                  


                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm" id="event_time">Coming Soon Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="updcomingSoontitle" name="comingSoontitle" placeholder="title">
                    </div>
                </div>
                
                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4">Time*</label>
                    <div class="col-sm-8">
                      <input type="time" class="form-control" id="updcommingsoontime" name="update_time" value="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4">Date*</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="updcommingsoondate" value="" name="update_date" >
                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="file" class="col-sm-4">Image*</label>
                    <div class="col-sm-6">
                      <input type="file" class="InputField" id="update_imgfile" name="image" accept="image/*">
                      <input name="hidden_image" type="hidden" id="hiddenfile" class="hidden_img" />
                        <img src="" width="100px" height="100px" class="imgData">
                    </div>
                  </div>

                  <!-- /.card-body -->

                  <div class="col-md-12">
                    <div class="row">
                      <input type="hidden" id="event_id" name="event_id">
                      <button type="submit" name="update_comningsoon">
                       Update
                     </button>
<!--                     <button type="close" name="close_class">-->
<!--                       Close-->
<!--                     </button>-->
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


     //Get the data attribute all values like exam id, exam name, class id, class name, subject id, subject name, chapter id, chapter name to populate the fields related to these data...
     $('.edit_event').click(function() {
       var comingSoon_id = $(this).data('id');
       //alert(id);
     // AJAX Request
     $.ajax({
      url: 'ajax/edit_coming_soon.php',
      type: 'POST',
      data: {comming_soon_id: comingSoon_id},
      success: function(data){
        
          //parse json data coming from edit_exam.php
          var eventData = JSON.parse(data);          
          console.log(eventData);

        //get the values of json array and store in jquery variables..
        var id = eventData[0].id;        
        var title = eventData[0].title;
        var image = eventData[0].image;
        var imgUrl = '<?php echo web."uploads/coming_soon/";?>'+image;

        var coming_date = eventData[0].coming_date;
        var comming_time = eventData[0].comming_time;        
       
        //Now assign the values to the fields of modal
        $('#event_id').val(id);
        $('#updcomingSoontitle').val(title);        
        
        $('#updcommingsoontime').val(comming_time);
        $('#updcommingsoondate').val(coming_date);        

        $('.imgData').attr('src',imgUrl);
        $('#hiddenfile').val(image);

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
    text: "Record Created!",
    icon: "<?php echo $_GET['msg']; ?>",
    button: "OK, Done",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'coming-soon.php';
  });


</script>

<?php }

if(isset($_GET['msg']) && $_GET['msg']=="updated"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Record updated!",
    icon: "success",
    button: "OK, Done",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'coming-soon.php';
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

<script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>