<?php
        require_once 'header.php';
        $student_id = $_SESSION['student']['id'];
        $class_id = $_SESSION['student']['class_id'];
        $fetchstudenttransaction = $conn->query("SELECT * FROM student_details WHERE id = '$student_id'");
        while($allstudentdata= $fetchstudenttransaction->fetch_assoc()){
        $category_status = $allstudentdata['category_status'];
        }
        // if(isset($_GET['category_id']) && $_GET['category_id']!=''){
        //  $book_pdf = $_GET['book_pdf'];

        // }
   ?>
 <?php head(); ?>
 <style>
    .col-md-3{
      padding-left: 0px;
      padding-right: 0px;
      /* padding: 10px; */
      width: 100%;
    }
    .stydy_mat_heading{
        text-align: center;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 1.6rem;
        margin-top: 2%;
        background: #080829;
        color: #fff;
        padding: 5px;
    }
    .spacial_button{
      width: 175px;
      border-radius: 5px;
      outline: none;
      background: #8b8d8f;
      border: none !important;
      border-color:green;
      position: relative;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    #previous_year_question_paper{
       font-size: .8rem;
       padding:10px;
    }
   #notes_details h4, #previous_year_question_paper_details h4, #previous_year_question_paper_details h4, #syllabus_details h4, #reference_book_details h4{
    margin-left: 2%;
    padding-bottom: 15px;
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
   } 
   .card_class{
    margin:10px;
    height: 600px;
   }
   .data label{
    color: black;
    /* margin-top: -25px; */
    position: relative;
    font-size: 1.2rem;
    font-weight: 500;
    top:-20px
   }
   #email{
    margin-top: -15px;
   }
   #passLable{
    top: 8px;
    margin-bottom: 20px;
   }
   .forgot-pass{
    margin-bottom: 21px;
    margin-top: 20px;
   }
   .login{
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: none;
    background: #9f9ba7;
    width: 30%;
    padding: 2%;
    margin-top: 5%;
    border-radius: 10px;
   }
   @media (max-width:975px) {
   .spacial_button{
       margin-bottom: 20px;
       }
   }
.viewRecordTable{
    background:#4F4F4D;
    color: #fff;
    font-weight: 600;

} 
#download_book_here{
    display:none;
    top: 80%;
    left: 55%;
    position: absolute;
    transform: translate(-50%, -50%);
}
   </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#download_status").click(function(){
              $("#download_book_here").show();
            });
            $("#download_book_here").click(function(){
                $("#download_book_here").hide();
            })
        })
   </script> 

    <script>
    $(document).ready(function () {
        $("#reference_book").css({ "background-color": "green", "color": "white" });
        $("#notes_details").hide();
        $("#previous_year_question_paper_details").hide();
        $("#syllabus_details").hide();

        $("#notes").click(function () {
            $("#syllabus,#notes,#previous_year_question_paper,#reference_book").css({ "background-color": "", "color": "" })
            $(this).css({ "background-color": "green", "color": "white" });
            $("#previous_year_question_paper_details").hide();
            $("#notes_details").show();
            $("#syllabus_details").hide();
            $(".reference_book_details").hide();
        });
        $("#previous_year_question_paper").click(function () {
          $("#syllabus,#notes,#previous_year_question_paper,#reference_book").css({ "background-color": "", "color": "" })
            $(this).css({ "background-color": "green", "color": "white" });
            $("#previous_year_question_paper_details").show();
            $("#notes_details").hide();
            $("#syllabus_details").hide();
            $(".reference_book_details").hide();
        })
        $("#reference_book").click(function () {
            $("#syllabus,#notes,#previous_year_question_paper,#reference_book").css({ "background-color": "", "color": "" })
            $(this).css({ "background-color": "green", "color": "white" });
            $("#previous_year_question_paper_details").hide();
            $("#notes_details").hide();
            $("#syllabus_details").hide();
            $(".reference_book_details").show();
        })
        $("#syllabus").click(function () {
            $("#syllabus,#notes,#previous_year_question_paper,#reference_book").css({ "background-color": "", "color": "" })
            $(this).css({ "background-color": "green", "color": "white" });
            $("#previous_year_question_paper_details").hide();
            $("#notes_details").hide();
            $("#syllabus_details").show();
            $(".reference_book_details").hide();
        })
    });
</script>


    <h4 class="stydy_mat_heading">Study Material Details</h4>

          <!-- Buuton on click Funtion Call -->

     <div class="container" style="margin-bottom:25px;">
         <div class="row">
           <div class="col-md-3">
              <button type="button" id ="reference_book" class="btn btn-primary spacial_button">Reference book</button>
          </div>
          <div class="col-md-3">
               <button type="button" id ="syllabus" class="btn btn-primary spacial_button">Syllabus</button>
          </div>
          <div class="col-md-3">
               <button type="button" id ="notes" class="btn btn-primary spacial_button">Notes</button>
          </div>
          <div class="col-md-3">
               <button type="button" id ="previous_year_question_paper"class="btn btn-primary spacial_button">Previous year question paper</button>
         </div>
        </div>
       </div>


            <!-------Start Reference book ------->
            <div class="reference_book_details" id="reference_book_details">

            <h4 class="heading">Reference Book Details</h4>

            <diV class="cantainer viewproductDetail" style="width: 100%;" id="today">
        
            <table id="viewProducts" class="table table-striped table-bordered">
                <thead class="viewRecordTable">
                    <tr>
                        <th>S.N.</th>
                        <th>Product Name</th>
                        <th>Class Name</th>
                        <th>Subject Name</th>
                        <th>Product Type</th>
                        <th>Study Type</th>
                        <th>Download Here</th>
                    </tr>
                </thead>
                <tbody id="dataTableProduct">
                <?php 
                    $i = 1;
                    $fetchtransaction = $conn->query("SELECT * FROM study_material WHERE class_id = '$class_id' AND category_id = 1");
                    while($alldata= $fetchtransaction->fetch_assoc()){  
                ?>       
                <tr>
                        <td><?= $i; ?></td>
                        <td><?= $alldata['study_material_name'];?></td>
                        <td><?= $alldata['class_name'];?></td>
                        <td><?= $alldata['subject_name']; ?></td>
                        <td><?= $alldata['study_file'];?></td>
                        <td><?= $alldata['category_name'];?></td>
                        <td><a href="<?php echo $hostname; ?>/admin/study_material/<?php echo $alldata['study_file']; ?>" target="_blank" button type="button" class="btn btn-success btn-sm download_book">Open File</i></button></a></td>
                    </tr>
                    <?php  $i++; } ?>
                </tbody>
            </table>
        </diV>
    </div> 
    <!-------End Referance Book------->

         <!-------Start Syllabus Details ------->

        <div class="syllabus_details" id="syllabus_details">

        <h4 class="heading">Syllabus Details</h4>

        <diV class="cantainer viewproductDetail" style="width: 100%;" id="today">

        <table id="syllabus_data" class="table table-striped table-bordered">
            <thead class="viewRecordTable">
                <tr>
                    <th>S.N.</th>
                    <th>Product Name</th>
                    <th>Class Name</th>
                    <th>Subject Name</th>
                    <th>Product Type</th>
                    <th>Study Type</th>
                    <th>Download Here</th>
                </tr>
            </thead>
            <tbody id="dataTableProduct">
            <?php 
                $i = 1;
                $fetchtransaction = $conn->query("SELECT * FROM study_material WHERE class_id = '$class_id'  AND category_id = 2");
                while($alldata= $fetchtransaction->fetch_assoc()){   
            ?>       
            <tr>
                    <td><?= $i; ?></td>
                    <td><?= $alldata['study_material_name'];?></td>
                    <td><?= $alldata['class_name'];?></td>
                    <td><?= $alldata['subject_name']; ?></td>
                    <td><?= $alldata['study_file'];?></td>
                    <td><?= $alldata['category_name'];?></td>
                    <td><a href="<?php echo $hostname; ?>/admin/study_material/<?php echo $alldata['study_file']; ?>" target="_blank" button type="button" class="btn btn-success btn-sm download_book">Open File</i></button></a></td>
                </tr>
                <?php  $i++; } ?>
            </tbody>
        </table>
        </diV>
        </div> 
        <!-------End  Syllabus Details ------->`

       <!-------Start Notes Details ------->

       <div class="notes_details" id="notes_details">

        <h4 class="heading">Notes Details</h4>

        <diV class="cantainer viewproductDetail" style="width: 100%;" id="today">

        <table id="notes_data" class="table table-striped table-bordered">
            <thead class="viewRecordTable">
                <tr>
                    <th>S.N.</th>
                    <th>Product Name</th>
                    <th>Class Name</th>
                    <th>Subject Name</th>
                    <th>Product Type</th>
                    <th>Study Type</th>
                    <th>Download Here</th>
                </tr>
            </thead>
            <tbody id="dataTableProduct">
            <?php 
                if($category_status == 1){
                $i = 1;
                $fetchtransaction = $conn->query("SELECT * FROM study_material WHERE class_id = '$class_id'  AND category_id = 3");
                while($alldata= $fetchtransaction->fetch_assoc()){ 
            ?>       
            <tr>
                    <td><?= $i; ?></td>
                    <td><?= $alldata['study_material_name'];?></td>
                    <td><?= $alldata['class_name'];?></td>
                    <td><?= $alldata['subject_name']; ?></td>
                    <td><?= $alldata['study_file'];?></td>
                    <td><?= $alldata['category_name'];?></td>
                    <td><a href="<?php echo $hostname; ?>/admin/study_material/<?php echo $alldata['study_file']; ?>" target="_blank" button type="button" class="btn btn-success btn-sm download_book">Open File</i></button></a></td>

                 </tr>
                <?php  $i++; } } ?>
             </tbody>
          </table>
       </diV>
    </div> 
    <!-------End  Notes Details ------->

           <!-------Start Notes Details ------->

           <div class="previous_year_question_paper_details" id="previous_year_question_paper_details">

<h4 class="heading">Previous year question paper</h4>

<diV class="cantainer viewproductDetail" style="width: 100%;" id="today">

<table id="previous_year_question" class="table table-striped table-bordered">
    <thead class="viewRecordTable">
        <tr>
            <th>S.N.</th>
            <th>Product Name</th>
            <th>Class Name</th>
            <th>Subject Name</th>
            <th>Product Type</th>
            <th>Study Type</th>
            <th>Download Here</th>
        </tr>
    </thead>
    <tbody id="dataTableProduct">
    <?php 
       if($category_status == 1){
        $i = 1;
        $fetchtransaction = $conn->query("SELECT * FROM study_material WHERE class_id = '$class_id' AND category_id = 4");
        while($alldata= $fetchtransaction->fetch_assoc()){ 
    ?>       
    <tr>
            <td><?= $i; ?></td>
            <td><?= $alldata['study_material_name'];?></td>
            <td><?= $alldata['class_name'];?></td>
            <td><?= $alldata['subject_name']; ?></td>
            <td><?= $alldata['study_file'];?></td>
            <td><?= $alldata['category_name'];?></td>
            <td><a href="<?php echo $hostname; ?>/admin/study_material/<?php echo $alldata['study_file']; ?>" target="_blank" button type="button" class="btn btn-success btn-sm download_book">Open File</i></button></a></td>

         </tr>
        <?php  $i++; } } ?>
     </tbody>
  </table>
</diV>
</div> 
<!-------End  Notes Details ------->


  <script src="js/sweetalert.min.js"></script>    
  <?php 
   // if(isset($_SESSION['status']) && $_SESSION['status']!='')
    //{
  ?>
  <script>
    // swal({
    //   title: "<?php //echo $_SESSION['status']; ?>",
    //   //text: "You clicked the button!",
    //   icon: "<?php //echo $_SESSION['status_code']; ?>",
    //   button: "OK, Done",
    //  });
    //  $("#download_book_here").show();
  </script> 
   <?php 
  //  unset($_SESSION['status']);
    //}
   ?>

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!-----For Toggle Menu------->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>




    <!-----Model Popup box------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



       <!-----For Toggle SideBar Menu------->
       <script type="text/javascript">
        $(document).ready(function() {
            $("#result").click(function(){
               $("#result_all").toggle();
            });
              $("#MenuIcon").click(function(){
               $(".ShowMenu").toggle();
            });
        });
        </script>
        
     <!-----Data Table for------->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#viewProducts').DataTable({
                fixedHeader: true,
                language: {
                searchPlaceholder: "Search Here..."
            }
            });
            $("#viewProducts").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden; overflow-x: scroll;'></div>");
        });
    </script>
        <script>
        $(document).ready(function() {
            var table = $('#syllabus_data').DataTable({
                fixedHeader: true,
                language: {
                searchPlaceholder: "Search Here..."
            }
            });
            $("#syllabus_data").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden; overflow-x: scroll;'></div>");
        });
    </script>
        <script>
        $(document).ready(function() {
            var table = $('#notes_data').DataTable({
                fixedHeader: true,
                language: {
                searchPlaceholder: "Search Here..."
            }
            });
            $("#notes_data").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden; overflow-x: scroll;'></div>");
        });
    </script>
        <script>
        $(document).ready(function() {
            var table = $('#previous_year_question').DataTable({
                fixedHeader: true,
                language: {
                searchPlaceholder: "Search Here..."
            }
            });
            $("#previous_year_question").wrap("<div style='width:100%; overflow:scroll; overflow-y: hidden; overflow-x: scroll;'></div>");
        });
    </script>
    <!-----Data Table for------->
  
 
</body>

</html>