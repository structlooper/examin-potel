<?php 
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
require_once 'functions.php';

if(isset($_GET['packID']) AND $_GET['packID']!=''){
    $packID = $_GET['packID'];
}


//Fetch package details according to packID...
$selectPackDetail = $conn->query("SELECT * FROM exam_packages WHERE package_id = '$packID'");
$packDetail = $selectPackDetail->fetch_assoc();
$featured_exam = $packDetail['featured_exams'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php  head();?> 
    <style>
.main_section{
    margin-bottom: 35px;
}
.packege_details{
    border-radius: 3px;
    background-color: #f2f2f2;
    /*padding: 20px;*/
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
    resize: vertical;
    background-color: #eee;
}
.package_img{
    border-radius: 3px;
    background-color: #f2f2f2;
    /*padding: 20px;*/
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
    resize: vertical;
    background-color: #eee;
    height: 202px;
}
        body {
  font-family: 'open sans';
  overflow-x: hidden; }

        img {
  max-width: 100%; }

        .card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

  .preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column; }


  .preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -ms-flex-positive: 1;
  flex-grow: 1; }

  .tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

    .product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }
    </style>  
</head>

<body>
    <!--Header function-->
    <!-- End Header -->
    <?php  header2(); ?>   
   <!-- Login Register form section-->
    <?php login_register_form(); ?>


    <div class="banner" style="background-image: url('uploads/background.jpg'); height: 200px; width: 100%;  background-repeat: no-repeat; background-size: cover;" >
        
    </div>
    <!-- Start About 
    ============================================= -->
    <!-- <div class="about-area default-padding">
        <div class="container">
            <div class="row">
                <div class="about-info">
                    
                    <div class="col-md-6 info">
                        
                        <h2><?php echo $packDetail['package_name'];?></h2>
                        <p>
                            <?php echo $packDetail['discription'];?>
                        </p>                       
                       
                    </div>

                    <div class="col-md-6 thumb">
                        <img src="uploads/package-img/<?php echo $packDetail['image']; ?>" alt="Thumb" class="img-responsive">
                    </div>
                </div>
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End About -->


<!-- <div class="container-fluid main_section">
  <h1><?php echo $packDetail['package_name'];?></h1>
  <p><?php echo $packDetail['discription'];?>.</p>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-8 packege_details">
       <form action="/action_page.php"> 
                <?php
            $fetchExamList = $conn->query("SELECT * FROM exam WHERE id IN($featured_exam)");
            while($row = $fetchExamList->fetch_assoc()){?>
                <input type="checkbox" id="vehicle1" name="vehicle1" value="<?=$row['id'];?>">
                <label for="vehicle1"><?=$row['exam_name'];?></label><br>
            <?php }
         ?>
         <!--  <button>Submit</button> -->
       <!--  </form> 

      </div>
      <div class="col-sm-9 col-md-4 package_img">        
        <div class="preview-pic tab-content">
          <div class="tab-pane active" id="pic-1">
            <img src="uploads/package-img/<?php echo $packDetail['image']; ?>" />
        </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

 <!-- Start Popular Courses 
    ============================================= -->
    <div class="popular-courses bg-gray circle carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Exams Covered In <span style="color:red;"><?=$packDetail['package_name'];?></span> Package</h2>
                        <p>
                            <?=$packDetail['discription'];?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="popular-courses-items popular-courses-carousel owl-carousel owl-theme">
                      <?php 
                         $fetchExamList = $conn->query("SELECT * FROM exam WHERE id IN($featured_exam)");
                         while($row = $fetchExamList->fetch_assoc()){ ?>
                    
                          <div class="container section-plan">
                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="row plan-box plan-danger text-center items">
                                  <div class="col-md-12 section1">
                                    <h2><?=$row['exam_name'];?></h2>
                                  </div>
                                  <div class="col-md-12 section2">
                                    <h3>Rs. <?=$row['exam_amount'];?></h3>
                                  </div>
                                  <div class="col-md-12 section3">
                                    <p>Course <?=$row['class_name']?></p>
                                    <p>Subject <?=$row['subject_name']?></p>
                                    <p>Chapter <?=$row['chapter_name']?></p>
                                  </div>
                                  <div class="col-md-12 section4">
                                    <?php
                                     if(empty($_SESSION['student'])){ ?>
                                   <!--  <button class="btn btn-danger btn-block"> <i class="fas fa-shopping-cart"></i> Buy Now</button> -->
                                   <a class="btn btn-danger btn-block popup-with-form buy_exam_package" href="#buyPackage" data-exam_id="<?php echo $row['id']; ?>" data-exam_name="<?php echo $row['exam_name']; ?>" >
                                    <i class="fa fa-shopping-cart" aria-hidden="true"  ></i> Buy Now
                                  </a>
                                  <?php }else{

                                    $studentID = $_SESSION['student']['id'];
                                    $purchased_exm = $conn->query("SELECT count(*) as aready_purchased FROM student_exams WHERE stud_id = '".$studentID."' AND exam_id = '".$row['id']."'");
                                    $purchased_examList = $purchased_exm->fetch_assoc();
                                    if($purchased_examList['aready_purchased'] > 0){ ?>

                                      <a  class="popup-with-form btn btn-success">
                                      <i class="fa fa-check" aria-hidden="true"></i> Purchased
                                      </a>

                                   <?php 
                                    }else{ ?>
                                      <a class="buy_single_exam btn btn-danger btn-block" data-exam_id="<?php echo $row['id']; ?>" data-exam_name="<?php echo $row['exam_name']; ?>" >
                                      <i class="fa fa-shopping-cart" aria-hidden="true"  ></i> Buy Now
                                  </a>
                                  <?php }
                                  } ?>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        <!-- End Single Item -->               
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Courses -->


















    <!-- <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">
                          <div class="tab-pane active" id="pic-1">
                            <img src="uploads/package-img/<?php echo $packDetail['image']; ?>" />
                        </div>
                          <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                          <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                          <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                          <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
                        </div>
                        
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?php echo $packDetail['package_name'];?></h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description"><?php echo $packDetail['discription'];?></p>
                        <h4 class="price">current price: <span>Rs.<?php echo $packDetail['amount'];?></span></h4>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                        <h5 class="sizes">sizes:
                            <span class="size" data-toggle="tooltip" title="small">s</span>
                            <span class="size" data-toggle="tooltip" title="medium">m</span>
                            <span class="size" data-toggle="tooltip" title="large">l</span>
                            <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                        </h5>
                        <h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                        </h5>
                        <div class="action">
                            <!-- <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->
           <!--              </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<?php buySingleExam();?>
    
    <!-- Start Footer 
    ============================================= -->
    <?php footer(); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
   <?php js();?>

   <script>
     $(document).on("click",".buy_exam_package",function(){
    var exam_id = $(this).data('exam_id');
   $("#exam_id_modal").val(exam_id);
        
   });

       $(document).on("click",".buy_single_exam",function(){
    //alert("fsadfsdf");
    var exam_id = $(this).data('exam_id');
    //console.log(package_id);
      $.ajax({
      type: 'post',
      url: 'ajax/submit_singleExam_login.php',
      data:{exam_Id:exam_id},
      success: function(response){
        //alert(response);
        var msg = '';
        if(response == 1){
          //alert("1")
          //window.location='student/index.php';
          swal({
            title: "Success",
            text: "Exam Added to your account",
            icon: "success",
            button: "OK",
          });
          $('.swal-button--confirm').click(function(){
            window.location.href = 'student/myexam.php';
          });
          
        }else if(response == 0){                      
          swal({
            title: "Success",
            text: "Exam Not Added to your account, There was problem",
            icon: "error",
            button: "OK",
          });
          $('.swal-button--confirm').click(function(){
            window.location.href = 'student/myexam.php';
          });

        }
         
      },
      error:function(err){
        console.log(err);
      }

    })      
  
        
   });

   </script>
</body>
</html>