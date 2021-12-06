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

    <!--Header function-->
    <!-- Start Header -->
    <?php  header2(); ?>  
    <!-- End Header --> 
   <!-- Login Register form section-->
    <?php login_register_form(); ?>
    <!-- End Header -->

    <!-- Start Breadcrumb 
    ============================================= -->
    <!-- <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/2440x1578.png);"> -->
        <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/event.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Event</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>                       
                        <li class="active">Event</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Event
    ============================================= -->
    <section id="event" class="event-area default-padding">
        <div class="container">
            <div class="row">
                <div class="event-items">
                    <!-- Single Item -->
                    <!-- <div class="item horizontal col-md-12">
                        <div class="col-md-6 thumb bg-cover" style="background-image: url(assets/img/1500x700.png);">
                            <div class="date">
                                <h4><span>12</span> Dec, 2018</h4>
                            </div>
                        </div>
                        <div class="col-md-6 info">
                            <h4>
                                <a href="#">Secondary Schools United Nations</a>
                            </h4>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i> 15 Oct, 2019</li>
                                    <li><i class="fas fa-clock"></i>  8:00 AM - 5:00 PM</li>
                                    <li><i class="fas fa-map"></i> California, TX 70240 </li>
                                </ul>
                            </div>
                            <p>
                                Early had add equal china quiet visit. Appear an manner as no limits either praise in. In in written on charmed justice is amiable farther besides. Law insensible middletons unsatiable for apartments boy delightful unreserved. 
                            </p>
                            <a href="#" class="btn btn-dark effect btn-sm">
                                <i class="fas fa-chart-bar"></i> Book Now
                            </a>
                            <a href="#" class="btn btn-gray btn-sm">
                                <i class="fas fa-ticket-alt"></i> 23 Available
                            </a>
                        </div>
                    </div> -->
                    <!-- Single Item -->


                    <?php 

                        
                        $sql = "SELECT * FROM tbl_events WHERE status = 1 order by event_date Asc";

                        $res = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res) > 0){
                        while($eventList = mysqli_fetch_assoc($res)){ ?>
                    <!-- Single Item -->
                    <div class="item vertical col-md-6">
                        <div class="thumb">
                           <!--  <img src="assets/img/800x600.png" alt="Thumb">-->
                           <img src="uploads/event-img/<?=$eventList['image'];?>" alt="Thumb">
                            <div class="date">                               
                                        <?php
                                        //Our YYYY-MM-DD date string.
                                        $date = $eventList['event_date'];

                                        //Convert the date string into a unix timestamp.
                                        $unixTimestamp = strtotime($date);

                                         ?>
                                <h4>
                                    <span><?=date("j",$unixTimestamp);?></span><?=date("M Y",$unixTimestamp);?>
                                </h4>
                            </div>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#"><?=$eventList['title'];?></a>
                            </h4>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i><?=date("j M Y",$unixTimestamp);?></li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <?php
                                            $time = $eventList['event_time'];
                                            //12 hour format with uppercase AM/PM
                                            echo date("g:i A", strtotime($time));
                                         ?>
                                    </li>
                                    <li><i class="fas fa-map"></i><?=$eventList['event_location'];?></li>
                                </ul>
                            </div>
                            <p>
                               <?php echo html_entity_decode($eventList['description']);?>
                            </p>
                          <!--   <a href="#" class="btn btn-dark effect btn-sm">
                                <i class="fas fa-chart-bar"></i> Book Now
                            </a>
                            <a href="#" class="btn btn-gray btn-sm">
                                <i class="fas fa-ticket-alt"></i> 54 Available
                            </a> -->
                        </div>
                    </div>
                <?php 

            }
        }else{ ?>
                            <!-- Start 404 
                            ============================================= -->
                            <div class="error-page-area default-padding">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2 text-center content">
                                            <h1>404</h1>
                                            <h2>Sorry No Event Found!</h2>
                                            <p>
                                                The page you are looking is not available or has been removed. Try going to Home Page by using the button below.
                                            </p>
                                            <a class="btn btn-dark effect btn-md" href="index.php">Back To Home</a>
                                            <a class="btn btn-dark border btn-md" href="contact.php">Contact Us</a>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End 404 -->

                        
                    <?php }?>                  

                </div>
            </div>
        </div>
    </section>
    <!-- End Event -->

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