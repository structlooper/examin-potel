
 <?php
error_reporting(1); 
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
require_once 'functions.php';
?>
   
<!DOCTYPE html>
 
<html lang="en">
<style>
.nice-select ul{
  width: 100% !important;
  height: auto !important;
}
.option{
  width: 100% !important;
  margin-bottom: 0px !important;
}
</style>
<head>
     <?php  head();?>
    <!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!--SweetAlert CDN-->
    <script type="text/javascript">
   $(document).ready(function(){
        $('#register_user1').click(function(){
            var name = $('#stud_name1').val();
            var email = $("#stud_email").val();                  
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;  // Mail Formate for email validation
            var su_mobile = $("#stud_mobile").val();
            var pass = $("#pass").val();
            var cnf_pwd = $("#cnf_pwd").val();
            var su_class = $("#su_class").val();

            if(name == ""){
               // $(".AllError").html("");
                $(".nameError").html("Please Enter your Name");
                $("#stud_name1").focus();
                return false;
            }
            else if(mailformat.test(email) == false){
            $(".AllError").html("");
            $(".emailError").html("Enter your valid email id");
            // $("input:text").val("Enter your valid email id");
            $("#stud_email").focus();
            return false;
            }  
             else if(su_mobile.length != 10){
                $(".AllError").html("");
                // $(".InputField").removeClass("FieldError");
                 $(".mobileError").html("Please Enter valid contact Number only 10 Digit");
                 $("#stud_mobile").addClass("FieldError");
                 $("#stud_mobile").focus();
                 return false;
            }else if(su_class == null){
                $(".AllError").html("");
                $(".classError").html("Please Select Class Name");
                $("#su_class").focus();
                return false; 
            } else if(pass == ""){
                $(".AllError").html("");
                // $(".InputField").remove
                $(".passError").html("Please Enter your password");
                $("#pass").focus();
                return false;
            }
              else if(cnf_pwd == ""){
              $(".AllError").html("");
               //$(".InputField").removeClass("FieldError");
                $(".re_passError").html("Please Enter Conform Password");
                $("#cnf_pwd").addClass("FieldError");
                $("#cnf_pwd").focus();
                 return false; 
           }

            else if(cnf_pwd !== pass){
              $(".AllError").html("");
               //$(".InputField").removeClass("FieldError");
                $(".re_passError").html("Password & Conform Password is not mached");
                $("#cnf_pwd").addClass("FieldError");
                $("#cnf_pwd").focus();
                 return false; 
           }
               
        });

    });
        

  </script>

</head>

<body>

<!--Header function-->
    <!-- Start Header -->
    <?php  header2(); ?>  
    <!-- End Header --> 
   <!-- Login Register form section-->
    <?php login_register_form(); ?>
    

  

    <!-- Start Registration 
    
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="save-register.php" method ="POST" id="register-form" class="white-popup-block">
                     <?php include('errors.php'); ?>
                        <!-- <div class="col-md-4 login-social">
                            <h4>Register with social</h4>
                            <ul>
                                <li class="facebook">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="linkedin">
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="col-md-12 login-custom">
                            <h4>Register a new account</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="stud_name1" name="stud_name" placeholder="Name*" type="text">
                                        <span class="nameError AllError" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="stud_email" name="stud_email" placeholder="Email*" type="email">
                                        <span class="emailError AllError" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                       <input class="form-control InputField" placeholder="Mobile*" id="stud_mobile" name="stud_mobile" type="number">
                                        <span class="mobileError AllError" style="color: red;"></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                    <select name= "stud_class" class="" id="su_class">
                                    <option value= "" selected disabled >Select Class Name </option>
                                    <?php

                                        $sql = "SELECT * FROM classes ORDER BY class_name ASC";
                                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){ ?>
                                                <option value='<?php echo $row['id']; ?>'><?php echo $row['class_name']; ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                        <!-- <input class="form-control InputField" placeholder="Class*" id="su_class" name="stud_class" type="text"> -->
                                        <span class="classError AllError" style="color: red;"></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="pass" name="password" placeholder="Password*" type="password">
                                        <span class="passError AllError" style="color: red;"></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="cnf_pwd" name="confirm_password" type="password" placeholder="Repeat Password*">
                                        <span class="re_passError AllError" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <input type="submit" name="register_student" id="register_user1" class="btn btn-warning">
                                       
                                    
                                </div>
                            </div>
                            <p class="link-bottom">Are you a member? <a href="login.php">Login now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End Login Area -->

    <!-- Start Footer 
    ============================================= -->
   <?php footer(); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
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

<?php 
 //Call sweet alert popup on getting message on registration from save-register.php..
if(isset($_GET['msg']) && $_GET['msg']=="Email Already Exist"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Email already Exist",
    icon: "<?php echo 'error' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'register.php';
  });

</script>

<?php }elseif(isset($_GET['msg']) && $_GET['msg']=="Problem in sending email"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Problem in sending email.",
    icon: "<?php echo 'error' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'register.php';
  });

</script>

<?php }elseif(isset($_GET['msg']) && $_GET['msg']=="success"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Registration Successful!! Please Varify the otp sent to your email to continue.",
    icon: "<?php echo 'success' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'verify-email-otp.php';
  });

</script>

<?php }
?>

</body>
</html>