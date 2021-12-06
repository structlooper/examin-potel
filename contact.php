<?php
error_reporting(1); 
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  head();?>

</head>
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
<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    <!--Header function-->
    <!-- Start Header -->
    <?php  header2(); ?>  
    <!-- End Header --> 
   <!-- Login Register form section-->
    <?php login_register_form(); ?>

    <!-- Start Breadcrumb 
    ============================================= -->
    <!-- <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/2440x1578.png);"> -->
        <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(uploads/contact-us-banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact Info
    ============================================= -->
    <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Contact Info -->
                <div class="contact-info">
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Call Us</h4>
                                <span>+324 119 2343</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Address</h4>
                                <span>+324 119 2343</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4>Email Us</h4>
                                <span>info@yourdomain.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Contact Info -->

                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>

                <!-- Start Maps & Contact Form -->
                <div class="maps-form">
                    <div class="col-md-6 maps">
                        <h3>Our Location</h3>
                        <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 form">
                        <div class="heading">
                            <h3>Contact Us</h3>
                            <p>
                                Occasional terminated insensible and inhabiting gay. So know do fond to half on. Now who promise was justice new winding
                            </p>
                        </div>
                         <form action="ajax/mail/contact.php" method="POST" class="contact-form">                           
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Tell Me About Courses *" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="submit" id="submit">
                                        Send Message <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-md-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Maps & Contact Form -->

            </div>
        </div>
    </div>
    <!-- End Contact Info -->

     <!-- Start Footer 
    ============================================= -->
    <?php footer(); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <?php js();?>

    <form action="save-register.php" method="post" id="register-form" class="mfp-hide white-popup-block">
    	<!-- 	<div class="col-md-4 login-social">
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
                            <input class="form-control InputField" placeholder="Name*" id="su_name" name="stud_name" type="text" autocomplete="off">
                            <span class="nameError AllError" style="color: red;"></span> 
                        </div>
                    </div>
                </div>

    			<div class="col-md-12">
    				<div class="row">
    					<div class="form-group">
    						<input class="form-control InputField" placeholder="Email*" id="su_email" name="stud_email" type="email" autocomplete="off">
                <span class="emailError AllError" style="color: red;"></span> 
    					</div>
    				</div>
    			</div>

            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control InputField" placeholder="Mobile*" id="su_mobile" name="stud_mobile" type="number">
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

    			<!-- <div class="col-md-12">
    				<div class="row">
    					<div class="form-group">
    						<input class="form-control" placeholder="Username*" id="su_name" name="stud_username" type="text">
    					</div>
    				</div>
    			</div> -->
    			<div class="col-md-12">
    				<div class="row">
    					<div class="form-group">
    						<input class="form-control InputField" placeholder="Password*" id="su_pwd" name="password" type="password">
                <span class="passError AllError" style="color: red;"></span> 
    					</div>
    				</div>
    			</div>
    			<div class="col-md-12">
    				<div class="row">
    					<div class="form-group">
    						<input class="form-control InputField" placeholder="Repeat Password*" id="su_cnfpwd" name="confirm_password" type="password">
                <span class="re_passError AllError" style="color: red;"></span> 
    					</div>
    				</div>
    			</div>
    			<div class="col-md-12">
    				<div class="row">
    					<input type="submit" id="register_user" name="register_student" class="btn btn-warning">
    						Sign up
    					
    				</div>
    			</div>
    			<p class="link-bottom">Are you a member? <a href="login.php">Login now</a></p>
    		</div>
    	</form>
    	<!-- End Register Form -->

</body>
</html>