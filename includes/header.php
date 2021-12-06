<?php 
require_once 'config.php';
function head(){ ?>
	<!-- ========== Meta Tags ========== -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Examin - Education and LMS Template">

	<!-- ========== Page Title ========== -->
	<title>e-AgriEdu</title>

	<!-- ========== Favicon Icon ========== -->
	 <!--<link rel="shortcut icon" href="https://influencorp.com/exam/includes/img/favicon.png" type="image/x-icon">-->

	<!-- ========== Start Stylesheet ========== -->

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/flaticon-set.css" rel="stylesheet" />
	<link href="assets/css/magnific-popup.css" rel="stylesheet" />
	<link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
	<link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
	<link href="assets/css/animate.css" rel="stylesheet" />
	<link href="assets/css/bootsnav.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet" />
	 <script src="assets/js/jquery-1.12.4.min.js"></script>
	<!-- ========== End Stylesheet ========== -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
  <![endif]-->

  <!-- ========== Google Fonts ========== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
  <script src="assets/js/jquery-1.12.4.min.js"></script>

   <!--SweetAlert CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
   $(document).ready(function(){
		$('#register_user').click(function(){
            var name = $('#su_name').val();
		    var email = $("#su_email").val();                  
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    // Mail Formate for email validation
            var su_mobile = $("#su_mobile").val();
            var pass = $("#su_pwd").val();
            var cnf_pwd = $("#su_cnfpwd").val();
            var su_class = $("#su_class").val();

           if(name == ""){
                $(".nameError").html("Please Enter your Name");
                $("#su_name").focus();
                return false;
          }else if(mailformat.test(email) == false){
               $(".AllError").html("");
               $(".emailError").html("Enter your valid email id");
               $("#su_email").focus();
                return false;
          }else if(su_mobile.length != 10){
                $(".AllError").html("");
                 $(".mobileError").html("Please Enter valid contact Number only 10 Digit");
                 $("#su_mobile").addClass("FieldError");
                 $("#su_mobile").focus();
                 return false;
          }else if(su_class == null){
                $(".AllError").html("");
                $(".classError").html("Please Select Class Name");
                $("#su_class").focus();
                return false;       
          }else if(pass == ""){
                $(".AllError").html("");
                $(".passError").html("Please Enter your password");
                $("#pass").focus();
                return false;
          }else if(cnf_pwd == ""){
                $(".AllError").html("");
                $(".re_passError").html("Please Enter Conform Password");
                $("#su_cnfpwd").focus();
                 return false; 
          }else if(cnf_pwd !== pass){
                $(".AllError").html("");
                $(".re_passError").html("Password & Conform Password is not mached");
                $("#su_cnfpwd").focus();
                 return false; 
          }else{
               $(".AllError").html("");
          }
               
	    	});
  	});	

  </script>


<?php } function header2(){ ?>


	<!-- Preloader Start -->
	<div class="se-pre-con"></div>
	<!-- Preloader Ends -->

    <!-- Start Header Top 
    	============================================= -->
    	<div class="top-bar-area address-two-lines bg-dark text-light">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-8 address-info">
    					<div class="info box">
    						<ul>
    							<li>
    								<span><i class="fas fa-map"></i> Address</span>California, TX 70240
    							</li>
    							<li>
    								<span><i class="fas fa-envelope-open"></i> Email</span>Info@gmail.com
    							</li>
    							<li>
    								<span><i class="fas fa-phone"></i> Contact</span>+123 456 7890
    							</li>
    						</ul>
    					</div>
    				</div>
            <?php 
              if(!isset($_SESSION['student']) || empty($_SESSION['student'])){ ?>
                <div class="user-login text-right col-md-4">
              <a class="popup-with-form" href="#register-form">
                <i class="fas fa-edit"></i> Register
              </a>
              <a  class="popup-with-form" href="#login-form">
                <i class="fas fa-user"></i> Login
              </a>
            </div>                
              <?php }elseif(isset($_SESSION['student']) || !empty($_SESSION['student'])){ ?>
                <div class="user-login text-right col-md-4">
                <a href="<?php echo web;?>student/index.php">
                 <i class="fas fa-edit"></i>Dashboard
               </a>
              <a href="logout.php">
                <i class="fas fa-user"></i>
                Logout
              </a>
             </div>

              <?php }
            ?>
    				<!-- <div class="user-login text-right col-md-4">
    					<a class="popup-with-form" href="#register-form">
    						<i class="fas fa-edit"></i> Register
    					</a>
    					<a  class="popup-with-form" href="#login-form">
    						<i class="fas fa-user"></i> Login
    					</a>
    				</div> -->
    			</div>
    		</div>
    	</div>
    	<!-- End Header Top -->

    <!-- Header 
    	============================================= -->
    	<header id="home">
    		<!-- Start Navigation -->
    		<nav class="navbar navbar-default navbar-sticky bootsnav">
    			<!-- Start Top Search -->
    			<div class="container">
    				<div class="row">
    					<div class="top-search">
    						<div class="input-group">
    							<form action="#">
    								<input type="text" name="text" class="form-control" placeholder="Search">
    								<button type="submit">
    									<i class="fas fa-search"></i>
    								</button>  
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Top Search -->

    			<div class="container">
    				<!-- Start Atribute Navigation -->
    				<div class="attr-nav">
    					<ul>
    						<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
    					</ul>
    				</div>        
    				<!-- End Atribute Navigation -->

    				<!-- Start Header Navigation -->
    				<div class="navbar-header">
    					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
    						<i class="fa fa-bars"></i>
    					</button>
    					<a class="navbar-brand" href="index.php">
    						<img src="assets/img/logo.png" class="logo" alt="Logo" style="height:80px !important; width:90px; margin-top: -14%;">
    					</a>
    				</div>
    				<!-- End Header Navigation -->

    				<!-- Collect the nav links, forms, and other content for toggling -->
    				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
						<li>
							<a href="index.php">Home</a>
						</li>

						<li class="dropdown megamenu-fw">
							<a href="exams.php">Exams</a>
            
							<!--<ul class="dropdown-menu megamenu-content" role="menu">
								<!--<li>
									<div class="row">
										<div class="col-menu col-md-3">
											<h6 class="title">Gallery</h6>
											<div class="content">
												<ul class="menu-col">
													<li><a href="gallery-2-colum.html">Gallery Two Colum</a></li>
													<li><a href="gallery-3-colum.html">Gallery Three Colum</a></li>
													<li><a href="gallery-4-colum.html">Gallery Four Colum</a></li>
													<li><a href="gallery-6-colum.html">Gallery Six Colum</a></li>
												</ul>
											</div>
										</div><!-- end col-3 -->
										<!--<div class="col-menu col-md-3">
											<h6 class="title">Advisor</h6>
											<div class="content">
												<ul class="menu-col">
													<li><a href="advisor-carousel.html">Advisor Carousel</a></li>
													<li><a href="advisor-2-colum.html">Advisor Two Colum</a></li>
													<li><a href="advisor-3-colum.html">Advisor Three Colum</a></li>
													<li><a href="advisor-carousel-2.html">Advisor Carousel Two</a></li>
												</ul>
											</div>
										</div><!-- end col-3 -->
										<!--<div class="col-menu col-md-3">
											<h6 class="title">User Pages</h6>
											<div class="content">
												<ul class="menu-col">
													<li><a href="profile.html">Profile</a></li>
													<li><a href="edit-profile.html">Edit Profile</a></li>
													<li><a href="login.html">login</a></li>
													<li><a href="register.html">register</a></li>
												</ul>
											</div>
										</div><!-- end col-3 -->
										<!--<div class="col-menu col-md-3">
											<h6 class="title">Other Pages</h6>
											<div class="content">
												<ul class="menu-col">
													<li><a href="about-us.php">About Us</a></li>
													<li><a href="faq.html">Faq</a></li>
													<li><a href="pricing-table.html">Pricing Table</a></li>
													<li><a href="contact.html">Contact</a></li>
													<li><a href="404.html">Error Page</a></li>
												</ul>
											</div>
										</div> end col-3 -->
									<!--</div>end row -->
								<!-- </li>
							</ul> -->
						</li>

                        <!----
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" >Courses</a>
                            <ul class="dropdown-menu">
                                <li><a href="courses.html">Courses Carousel One</a></li>
                                <li><a href="courses-2.html">Courses Grid One</a></li>
                                <li><a href="courses-3.html">Courses Grid Two</a></li>
                                <li><a href="courses-4.html">Courses Carousel Two</a></li>
                                <li><a href="course-details.html">Course Details</a></li>
                            </ul>
                        </li> -->
                        
                        <li class="dropdown">
                        	<a href="event.php">Event</a>
                        	<!-- <ul class="dropdown-menu">
                        		<li><a href="event.html">Event Mixed Colum</a></li>
                        		<li><a href="event-2.html">Event Grid Colum</a></li>
                        		<li><a href="event-3.html">Event Carousel</a></li>
                        	</ul> -->
                        </li>
                        <li class="dropdown">
                        	<a href="blog.php">Blog</a>
                        <!-- 	<ul class="dropdown-menu">
                        		<li><a href="blog-standard.html">Blog Standard</a></li>
                        		<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                        		<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                        		<li><a href="blog-single-standard.html">Single Standard</a></li>
                        		<li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                        		<li><a href="blog-single-right-sidebar.html">Single Right Sidebar</a></li>
                        	</ul> -->
                        </li>
                        <li>
                        	<a href="contact.php">contact Us</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>

<?php } function login_register_form(){ ?>

       <script type="text/javascript">
         $(document).ready(function(){
          $('#login_user_header').click(function(){ 

            var email = $("#stud_email_header").val();                  
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;      // Mail Formate for email validation

            var pass = $("#pass2").val();

            if(email == ""){               
                $(".emailError").html("Please Enter your Email");
                $("#stud_email_lgn").focus();
                return false;
            }
            else if(mailformat.test(email) == false){
            $(".AllError").html("");
            $(".emailError").html("Please Enter a valid email id");           
            $("#stud_email_lgn").focus();
            return false;
            } 
            else if(pass == ""){               
                $(".passError").html("Please Enter your Password");
                $("#pass1").focus();
                return false;
            }
            else{
                  console.log(email);
                  console.log(pass);
                  // $(".Error").html("");
                  // alert("Success");
                  
                  $.ajax({
                  type: 'post',
                  url: 'submit_login.php',
                  //data: $('#login-form').serialize(),
                  data:{login:"login",email:email,password:pass},
                  success: function(response){
                    var msg = '';
                    if(response == 1){
                      //alert("1")
                      window.location='student/index.php';
                      
                    }else if(response == 0){                      
                      alert("Invalid username and password");

                    }                   
                    $('#loginmessage').html(msg);
                     
                  },
                  error:function(err){
                    console.log(err);
                  }

                })         

              }
          });
         });
       </script>

       <script>
        var otpemailInput = "";

        $(document).ready(function(){
           $("#SendOTP").click(function(){
              otpemailInput = $("#otpemailInput").val();
               var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    // Mail Formate for email validation
          
                    if(mailformat.test(otpemailInput) == false){
                    //alert("Enter your valid email id");
                    $(".contactError").html("Enter your valid email id");
                    // $("input:text").val("Enter your valid email id");
                    $("#otpemailInput").focus();
                    return false;
                    }else{


                      $.ajax({
                        url: 'ajax/email-otp.php',
                        type: 'POST',
                        data: { email: otpemailInput},
                        beforeSend: function(){
                          // Show image container
                          $(".se-pre-con").show();
                         },
                        success: function(response){
                           if(response == 1){
                             $("#otpNumber").show();
                           }
                           else if(response == 0){
                            swal({
                              title: "BLOCKED",
                              text: "Something went wrong while sending the email",
                              icon: "warning",
                              button: "OK",
                            });
                            // $('.swal-button--confirm').click(function(){
                            // window.location.href = 'login.php';

                            //      }
                          }
                           else if(response == 2){
                            swal({
                              title: "Error",
                              text: "Email not exists!",
                              icon: "error",
                              button: "OK",
                            });
                            $('.swal-button--confirm').click(function(){
                             window.location.href = 'login.php';

                                })

                           
                          }


                        },
                        complete:function(data){
                          // Hide image container
                          $(".se-pre-con").hide();
                         },
                        error:function(err){
                          console.log("Error : ",err)
                        }
                     });

                      $(".Error").html("");
                      $("#contactNumber").hide();
                      $("#SendOTP").hide();
                      //$("#otpNumber").show();
                      $("#varifyOTP").show();
                    }                     

           });

           $("#varifyOTP").click(function(){
            var otpInput = $("#otpInput").val();
            var newPassord = $('#newPassord').val();
            var Confirm_newPassword = $('#Confirm_newPassword').val();

            if(otpInput.length != "6"){
              alert("Please Enter Valide OTP Number");
              //$(".otpError").html("Please Enter Valid OTP Number");
              $("#otpInput").focus();
              return false;
            }  
            
            if(newPassord != Confirm_newPassword || newPassord == ""){
              alert("Password & confirm password does not match");

            }
            else{

             $(".Error").html("");                                   
                    // console.log(otpemailInput);
                    // console.log(otpInput);
                    // console.log(newPassord);
                    $.ajax({
                        url: 'ajax/email-otp.php',
                        type: 'POST',
                        data: {otpemail: otpemailInput, otp:otpInput,newPassord:newPassord},
                        success: function(data){
                          console.log(data);
                         if(data == "Success"){
                          //location.reload();
                          swal({
                              title: "Success",
                              text: "Password reset Please login to continue!",
                              icon: "success",
                              button: "OK",
                            });
                            $('.swal-button--confirm').click(function(){
                             window.location.href = 'login.php';

                                })
                         }                           
                        },
                        error:function(err){
                          console.log("Error : ",err)
                        }
                     });

                    
                    //alert("verifyOTP");
            }
                
            });
        });
    </script>
		 <!-- Start Login Form 
		 	============================================= -->
		 	<form method="POST" id="login-form" class="mfp-hide white-popup-block">
		 		<!-- <div class="col-md-4 login-social">
		 			<h4>Login with social</h4>
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
		 			<h4>login to your registered account!</h4>
		 			<div class="col-md-12">
		 				<div class="row">
		 					<div class="form-group">
		 						 <input class="form-control" name="stud_email" id="stud_email_header" placeholder="Email*" type="email">
                <span class="emailError AllError" style="color: red;"></span>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="col-md-12">
		 				<div class="row">
		 					<div class="form-group">
		 						<input class="form-control" name="password" id="pass2" placeholder="Password*" type="password">
                <span class="passError AllError" style="color: red;"></span>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="col-md-12">
		 				<div class="row">
		 					<label for="login-remember"><input type="checkbox" id="login-remember">Remember Me</label>
		 					<a title="Lost Password" href="#" class="lost-pass-link" data-toggle="modal" data-target="#myModal">Forgot Password?</a>
		 				</div>
		 			</div>
		 			<div class="col-md-12">
		 				<div class="row">
		 					<button type="button" name="login_user_header" id="login_user_header" class="btn btn-warning">Login</button>
		 				</div>
		 			</div>
		 			<p class="link-bottom">Not a member yet? <a href="register.php">Register now</a></p>
		 		</div>
		 	</form>
		 	<!-- End Login Form -->

    <!-- Start Register Form 
    	============================================= -->


    	<?php }?>

       <!-----------------------Forgot Form Start------------------------------------->
           
                <div class="container">
                
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Forgot Password</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">                         

                            <div class="form-group" id="contactNumber">
                                <label>Email Address</label>
                                <input type="email" class="form-control" id="otpemailInput" placeholder="Please Enter Email">
                                <span class="contactError Error" style="color: red;"></span> 
                            </div>

                            <div class="form-group" id="otpNumber" style="display: none;">
                                <label>OTP Number</label>
                                <input type="number" class="form-control" id="otpInput" placeholder="Please Enter OTP Number Sent to Your Mail Address">
                                <span class="otpError Error" style="color: red;"></span> 

                                <label>New Password</label>
                                <input type="password" class="form-control" id="newPassord" placeholder="Please Enter New Password">
                                <!-- <span class=" Error" style="color: red;"></span>  -->

                                <label>Confirm New Password</label>
                                <input type="password" class="form-control" id="Confirm_newPassword" placeholder="Please Confirm New Password">
                                <!-- <span class="otpError Error" style="color: red;"></span>  -->
                            </div>

                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="SendOTP" data-submit="modal" >Send OTP</button>
                            <button type="button" class="btn btn-success" id="varifyOTP" data-submit="modal" style="display:none;">Varify OTP</button>
                            <button type="button" class="btn btn-danger" id="closebtn" data-dismiss="modal">Close</button>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    
                </div>

      <!-----------------------Forgot Form End------------------------------------->