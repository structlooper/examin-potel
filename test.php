<?php 
//session_start();
// include "include/config.php";
// include 'header.php';
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
require_once 'functions.php';

 ?> 
<head>
  <?php head();?>
   <style>
    .col-md-3{
      padding-left: 0px;
      padding-right: 0px;
      / padding: 10px; /
      width: 100%;
    }
    .spacial_button{
      width: 160px;
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
   #paid_exam_all h4, #combo_exam_all h4, #free_exam_all h4{
    margin-left: 2%;
    padding-bottom: 15px;
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    /* background:#fff;
    padding-top:10px; */
   } 
   .card_class{
    margin:10px;
    height: 410px;
   }
  .card_class1{
    margin:10px;
    height: 560px;
   }
   .data label{
    color: black;
    / margin-top: -25px; /
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
   .view_details{
    top: 50%;
    left: 50%;
    position: relative;
    transform: translate(-50%, -50%);
    margin-top: 14%;
    margin-bottom: 9%;
   }
   </style>
   <script>
    $(document).ready(function () {
        $("#free_exam").css({ "background-color": "green", "color": "white" });
        $("#paid_exam_all").hide();
        $("#combo_exam_all").hide();
        
        $("#free_exam").click(function () {
            $("#free_exam,#paid_exam,#combo_exam").css({ "background-color": "", "color": "" })
            $(this).css({ "background-color": "green", "color": "white" });
            $("#free_exam_all").show();
            $("#combo_exam_all").hide();
            $("#paid_exam_all").hide();
        });
        $("#paid_exam").click(function () {
            $("#free_exam,#paid_exam,#combo_exam").css({ "background-color": "", "color": "" })
            $(this).css({ "background-color": "green", "color": "white" });
            $("#free_exam_all").hide();
            $("#paid_exam_all").show();
            $("#combo_exam_all").hide();

        })
        $("#combo_exam").click(function () {
            $("#free_exam,#paid_exam,#combo_exam").css({ "background-color": "", "color": "" })
            $(this).css({ "background-color": "green", "color": "white" });
            $("#free_exam_all").hide();
            $("#paid_exam_all").hide();
            $("#combo_exam_all").show();
        })
    });
</script>
</head>
  
       <div class="card border border-dark ml-5 mr-5 mt-5 mb-5" style="box-shadow: 5px 5px 5px 5px gray; background-color: #fdf9a9!important;">
         <h2 class="text-center mb-5 pt-2 pb-2" style="background: green;
         color: white; font-weight: bold;">ONLINE EXAMS</h2>

      <!-- Buuton on click Funtion Call -->

      <div class="container" style="margin-bottom:25px;">
        <div class="row">
          <div class="col-md-4">
              <button type="button" id ="free_exam" class="btn btn-primary spacial_button">Free Exams</button>
          </div>
          <div class="col-md-4">
             <button type="button" id ="paid_exam" class="btn btn-primary spacial_button">Paid Exams</button>
          </div>
          <div class="col-md-4">
             <button type="button" id ="combo_exam" class="btn btn-primary spacial_button">Combo Exams</button>
         </div>    
        </div>
      </div>


   <!-- For Free Exam All  Details -->

       <div class="free_exam_all" id="free_exam_all">     
        <h4>Free Exams Details </h4>      
         <div class="container">
         <div class="row">
         <?php
          //$fetchalldata = $conn->query("SELECT * FROM exam WhERE paid_exam = 'No'");
            //while($alldata = $fetchalldata->fetch_assoc()){  
              
          ?> 
          <div class="col-md-3">
          <div class="card card_class">
            <img class="card-img-top" src="images/online_exam.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
              <form action="buy_exams.php" method ="POST" style="background:#fff; padding: 0px; color: #000;">
              <input type="hidden" name="exam_id" value="<?php echo $alldata['exam_id']; ?>">
              <input type="hidden" name="exam_type" value="free">
              <h4 class="card-title" style="color:green; font-size: 1.2rem; font-weight: bold;"><?php //echo $alldata['create_exam']; ?> of <?php //echo $alldata['exam_name']; ?></h4>
              <p class="card-text" style="font-size: 1rem; font-weight: bold;">Class : <?php //echo $alldata['class_name']; ?></p>
              <p class="card-text" style="font-size: 1rem; font-weight: bold;">Subject : <?php //echo $alldata['subject_name']; ?></p>
              <hr>
              <?php //if(isset($_SESSION['student_login']['email'])){ ?>
                <div class="buy_btn">
                <button type="submit" class="btn btn-primary stretched-link" name="buy_now">BUY NOW</button>
                <h4 class="price_details" style="float: right;">FREE</h4>
              </div>
              <?php //}else{ ?> 
              <div class="buy_btn">
              <a href="#" class="btn btn-primary stretched-link" data-toggle="modal" data-target="#myModal">BUY NOW</a>
              <h4 class="price_details" style="float: right;">FREE</h4>
              </div>
              <?php //} ?> 
             
            </form>
            </div>
          </div>
          </div>
          <?php //} ?>
         </div>
         </div>
        </div>

  <!-- For Paid Exam All  -->
 
  <div class="paid_exam_all" id="paid_exam_all"> 
  <h4>Paid Exams Details </h4>          
   <div class="container">
         <div class="row">

         <?php
          //$fetchalldata = $conn->query("SELECT * FROM exam WhERE paid_exam = 'Yes'");
            //while($alldata = $fetchalldata->fetch_assoc()){    
          ?> 
          <div class="col-md-3">
          <div class="card card_class">
            <img class="card-img-top" src="images/online_exam.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
              <form action="buy_exams.php" method ="POST" style="background:#fff; padding: 0px; color: #000;">
              <input type="hidden" name="exam_id" value="<?php //echo $alldata['exam_id']; ?>">
              <h4 class="card-title" style="color:green; font-size: 1.2rem; font-weight: bold;"><?php //echo $alldata['create_exam']; ?> of <?php //echo $alldata['exam_name']; ?></h4>
              <p class="card-text" style="font-size: 1rem; font-weight: bold;">Class : <?php //echo $alldata['class_name']; ?></p>
              <p class="card-text" style="font-size: 1rem; font-weight: bold;">Subject :<?php //echo $alldata['subject_name']; ?></p>
              <hr>
              <?php //if(isset($_SESSION['student_login']['email'])){ ?>
                <div class="buy_btn">
                <button type="submit" class="btn btn-primary stretched-link" name="buy_now">BUY NOW</button>
                <h4 class="price_details" style="float: right;"><?php //echo $alldata['exam_fee']; ?></h4>
              </div>
              <?php //}else{ ?> 
              <div class="buy_btn">
              <a href="#" class="btn btn-primary stretched-link" data-toggle="modal" data-target="#myModal">BUY NOW</a>
              <h4 class="price_details" style="float: right;">₹ <?php //echo $alldata['exam_fee']; ?></h4>
              </div>
              <?php //} ?> 
              
            </form>
            </div>
          </div>
          </div>
          <?php //} ?>
         </div>
         </div>
        </div>
        



    <!-- For Combo Exam All Start  -->

    <div class="combo_exam_all" id="combo_exam_all">   

    <h4>Combo Exams Details</h4> 
     <div class="container">
         <div class="row">
         <?php
          //$fetchallproduct = $conn->query("SELECT * FROM package ORDER BY package_id");
           // while($allproductdata = $fetchallproduct->fetch_assoc()){
             // $all_exam_id = $allproductdata['exam_id']; 
      
          ?> 
          <div class="col-md-3">
          <div class="card card_class1">
            <img class="card-img-top" src="<?php //echo $hostname;?>/admin/upload/combo_exam/<?php //echo $allproductdata['combo_img']; ?>" alt="Card image" style="width:100%">
            <div class="card-body">
              <form action="buy_exams.php" method ="POST" style="background:#fff; padding: 0px; color: #000;">
              <input type="hidden" name="package_id" value="<?php //echo $allproductdata['package_id']; ?>">
              <h4 class="card-title" style="color:green; font-size: 1.2rem; font-weight: bold;"><?php //echo $allproductdata['package_name']; ?></h4>
              <?php
               // $i=1;
               //  $all_exam = "SELECT * FROM exam WHERE exam_id IN ($all_exam_id)";
               //  $all_exam_query = mysqli_query($conn, $all_exam) or die("Query Faild!");
               //      if(mysqli_num_rows($all_exam_query) > 0){
               //      while($allexamdata = mysqli_fetch_assoc($all_exam_query)){
                ?>      
               <h5 class="card-text" style="color:green; font-size: 1rem; font-weight: bold;">Exam -<?php //echo $i; ?> : <?php //echo $allexamdata['create_exam']; ?></h5>
              <p class="card-text" style="font-size: 1rem; font-weight: bold;">Class  : <?php //echo $allexamdata['class_name']; ?></p>
              <p class="card-text" style="font-size: 1rem; font-weight: bold;">Subject : <?php //echo $allexamdata['subject_name']; ?></p>
              <hr>
              <?php //$i++; } } ?>
              <?php //if(isset($_SESSION['student_login']['email'])){ ?>
                <div class="buy_btn">
                <button type="submit" class="btn btn-primary stretched-link" name="combo_buy_now">BUY NOW</button>
                <h4 class="price_details" style="float: right;">₹ <?php //echo $allproductdata['combo_amount']; ?></h4>
              </div>
              <?php //}else{ ?> 
              <div class="buy_btn">
              <a href="#" class="btn btn-primary stretched-link" data-toggle="modal" data-target="#myModal">BUY NOW</a>
              <h4 class="price_details" style="float: right;">₹ <?php //echo $allproductdata['combo_amount']; ?></h4>
              </div>
              <?php //} ?> 
              
            </form>
            </div>
          </div>
          </div>
          <?php //} ?>
         </div>
         </div>
        </div>


           <br>

  

           <img src="images/last.svg" class="img-fluid mb-3 special_img_add" alt="pattern" width="100%">
       </div>
    

      <!-- Login Popup  -->

      <div class="container">

      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="margin-left: 36px;">Login Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">

            <div class="container" id="loginForm">

               <form action="buy_login.php" method ="POST" style="background:#fff;">

                  <div class="data">
                      <label>Email or Phone</label>
                      <input type="text" name="email"  id="email" class="form-control" placeholder="Enter Email" >
                      <span class="emailError Error" style="color: red;"></span> 
                  </div>

                  <div class="data">
                      <label id="passLable">Password</label>
                      <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
                        <span class="passError Error" style="color: red;"></span> 
                  </div>

                  <div class="forgot-pass"><a href="forgot_password.php" style="text-decoration:none;">Forgot Password?</a>
                  <a href="student_registration.php" style="float:right; text-decoration:none;">Register Now</a></div>

                  <div class="login_btn">
                      <button type="submit" class="login" name="exam_login">login</button>
                  </div>

                  </form>
               </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
               <!-- <button type="button" class="btn btn-success" data-submit="modal">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
            </div>
            
          </div>
        </div>
      </div>
      
    </div>


  <!-- for Combo exam View Details -->


   <!--Today Exams Box modal START-->
<div class="container">
    <!-- The Modal -->
    <div class="modal" id="combo_details">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">My Exam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="row" id="exam-info">
                        <div class="col-md-6">
                            <h4>Combo Pack Name: <strong class="text-success"><span class="combo_pack_name"></span> </h4>
                            <table class="table">
                                 <tr>
                                    <td><strong>Exam Name : </strong><strong class="text-success"><span class="exam_name_pack"></span> </strong></td>
                                 </tr>
                                 <tr>
                                    <td><strong>Class Name: </strong><strong class="text-danger"><span class="class_name_pack"></span> </strong></td>
                                 </tr>
                                 <tr>
                                    <td><strong>Subject Name: </strong><strong class="text-success"><span class="subject_name_pack"></span> </strong> </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                        <?php
                        // $sql = "SELECT * FROM registration WHERE id = '$student_id'";
                        //  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        //    if(mysqli_num_rows($result) > 0){
                              //  while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="container" id="image-cart">
                                <div class="card_img">
                                    <!-- <img class="card-img-top" src="../admin/upload/<?php //echo $row['stud_img']; ?>" id="img-user"> -->
                                    <div class="card-body"> <br>
                                        <hr>
                                        <h5 class="userName" id="student_name_box_modal1"></h5>
                                        <!-- <p class="card-text">Some example text some example text.</p> -->

                                    </div>
                                </div>
                            </div>
                            <?php
                              //  }
                              // }
                               ?>
                        </div>
                    </div>                    


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <input type="hidden" name="today_hidden_exam_id" id="today_hidden_exam_id">
                    <!-- <a href="instruction.php"  target="_blank"><button type="button" class="btn btn-success next" id="next-instraction" data-submit="modal">Next</button></a> -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</div>
<!--Today Exams Box modal END-->





<script>
    $(document).ready(function () {
        //This function will call when view exam detail button will be clicked.
     $('.view_details').on("click",function(){
        //alert("view exam button click ");
        //Get the value of data attributes when view details button is clicked..
        var package_id = $(this).data('package_id');
        var package_name = $(this).data('package_name');
        var exams_id = $(this).data('exam_id');
        var combo_amount = $(this).data('combo_amount');
        var combo_img = $(this).data('combo_img');

        // console.log(combo_img);

        // Value Selected Show in Check box Start

        // var sp = exams_id.split(",")
        //   console.log(sp);
        //   for(var i=0; i<sp.length; i++){
        //      $(".exam_name_pack").text(sp[i]);

        //   }


        //Assign the value of data attributes to relative box modals..
        // $("#today_stud_name").text(student_name);
        // $("#today_pass_percentage").text(pass_percentage);
        // $("#today_start_date").text(exam_date);
        // $("#today_end_date").text(end_date);
        // $("#today_negative_marking").text(negative_marking);
        // $("#today_exam_subject").text(subject_name);
        // $("#today_exam_duration").text(exam_duration);
        // $("#today_hidden_exam_id").val(exam_id);
        // $("#today_exam_total_marks").text(exam_total_marks);
        // $("#student_name_box_modal1").text(student_name);

    });

    $('.next').on("click",function(){
    var exam_id = $('#today_hidden_exam_id').val();
    //alert(exam_id);
    $.ajax({
        url: 'instruction.php',
        type: 'POST',
        data: {exam_id: exam_id },
        success: function(data){

        },
        error:function(err){
            console.log("ERROR: ",err);
        }
    });
  });

});
</script>



     <!------------------------------------------------ ------------footer-------------------------------------------------------- -->
     <?php footer(); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
   <?php js();?>