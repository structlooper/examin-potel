<?php 

function buyPackage(){
 ?>
 <script type="text/javascript">
         $(document).ready(function(){
          $('#purchasePackage_login').click(function(){

            var email = $("#stud_email_package").val();                  
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;      // Mail Formate for email validation
            var pass = $("#package_pass").val();
            var package_id = $('#package_id_modal').val();

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
                  $.ajax({
                  type: 'post',
                  url: 'ajax/submit_package_login.php',
                  //data: $('#login-form').serialize(),
                  data:{login:"login",email:email,password:pass,packageId:package_id},
                  success: function(response){
                    var msg = '';
                    if(response == 1){
                      alert("Package Added to your list");
                      window.location='student/index.php';
                      
                    }else if(response == 2){                      
                      alert("Email Address doesn't exist in database");
                       $("#stud_email_package").focus();
                      return false;

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


    <form method="POST" id="buyPackage" class="mfp-hide white-popup-block">
                <div class="col-md-12 login-custom">
                    <h4>login to your registered account!</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                 <input class="form-control" name="stud_email" id="stud_email_package" placeholder="Email*" type="email">
                <span class="emailError AllError" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <input class="form-control" name="password" id="package_pass" placeholder="Password*" type="password">
                <span class="passError AllError" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="row">
                        <input type="hidden" id="package_id_modal" name="package_id_modal" value="" />
                            <button type="button" name="purchasePackage_login" id="purchasePackage_login" class="btn btn-warning">Login</button>
                        </div>
                    </div>                    
                </div>
            </form>
            <!-- End Login Form -->
<?php } function buySingleExam(){
 ?>
 <script type="text/javascript">
         $(document).ready(function(){
          $('#purchaseSingleExam_login').click(function(){

            var email = $("#stud_email_singleEx").val();                  
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;      // Mail Formate for email validation
            var pass = $("#sngleEx_pass").val();
            var exam_id = $('#exam_id_modal').val();

            if(email == ""){               
                $(".emailError").html("Please Enter your Email");
                $("#stud_email_singleEx").focus();
                return false;
            }
            else if(mailformat.test(email) == false){
            $(".AllError").html("");
            $(".emailError").html("Please Enter a valid email id");           
            $("#stud_email_singleEx").focus();
            return false;
            } 
            else if(pass == ""){               
                $(".passError").html("Please Enter your Password");
                $("#sngleEx_pass").focus();
                return false;
            }
            else{                  
                  $.ajax({
                  type: 'post',
                  url: 'ajax/submit_singleExam_login.php',
                  //data: $('#login-form').serialize(),
                  data:{login:"login",email:email,password:pass,examId:exam_id},
                  success: function(response){
                    var msg = '';
                    if(response == 1){
                      alert("Exam Added to your list");
                      window.location='student/index.php';
                      
                    }else if(response == 2){                      
                      alert("Email Address doesn't exist in database");
                       $("#stud_email_singleEx").focus();
                      return false;

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


    <form method="POST" id="buyPackage" class="mfp-hide white-popup-block">
                <div class="col-md-12 login-custom">
                    <h4>login to your registered account!</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                 <input class="form-control" name="stud_email" id="stud_email_singleEx" placeholder="Email*" type="email">
                <span class="emailError AllError" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <input class="form-control" name="password" id="sngleEx_pass" placeholder="Password*" type="password">
                <span class="passError AllError" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="row">
                        <input type="hidden" id="exam_id_modal" name="exam_id_modal" value="" />
                            <button type="button" name="purchaseSingleExam_login" id="purchaseSingleExam_login" class="btn btn-warning">Login</button>
                        </div>
                    </div>                    
                </div>
            </form>
            <!-- End Login Form -->

<?php } function footer(){ ?>
  <footer class="bg-dark default-padding-top text-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 item">
                        <div class="f-item">
                            <!-- <img src="assets/img/logo-light.png" alt="Logo"> -->
                             <img src="assets/img/logo.png" class="logo" alt="Logo" style="height:100px; width:100px;">
                            <p>
                                <!-- Excellence decisively nay man yet impression for contr
                                asted remarkably. There spoke happy for you are out. Fertile how old address did showing because sitting replied six. Had arose guest visit going off child she new. -->
                            </p>
                            <p class="text-italic">
                                Please write your email and get our amazing updates, news and support
                            </p>
                            <div class="subscribe">
                                <form action="#">
                                    <div class="input-group stylish-input-group">
                                        <input type="email" placeholder="Enter your e-mail here" class="form-control" name="email">
                                        <button type="submit">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 item">
                        <div class="f-item link">
                            <h4>Links</h4>
                            <ul>
                                <li>
                                    <a href="#">Courses</a>
                                </li>
                                <li>
                                    <a href="#">Event</a>
                                </li>
                                <li>
                                    <a href="#">Gallery</a>
                                </li>
                                <li>
                                    <a href="#">Faqs</a>
                                </li>
                                <li>
                                    <a href="#">Teachers</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 item">
                        <div class="f-item link">
                            <h4>Support</h4>
                            <ul>
                                <li>
                                    <a href="#">Documentation</a>
                                </li>
                                <li>
                                    <a href="#">Forums</a>
                                </li>
                                <li>
                                    <a href="#">Language Packs</a>
                                </li>
                                <li>
                                    <a href="#">Release Status</a>
                                </li>
                                <li>
                                    <a href="#">LearnPress</a>
                                </li>
                                <li>
                                    <a href="#">Feedback</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="f-item address">
                            <h4>Address</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-envelope"></i> 
                                    <p>Email <span><a href="mailto:support@e-AgriEdu.com">support@e-AgriEdu.com</a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i> 
                                    <p>Office <span>123 6th St. Melbourne, FL 32904</span></p>
                                </li>
                            </ul>
                            <div class="opening-info">
                                <h5>Opening Hours</h5>
                                <ul>
                                    <li> <span> Mon - Tues :  </span>
                                      <div class="pull-right"> 6.00 am - 10.00 pm </div>
                                    </li>
                                    <li> <span> Wed - Thurs :</span>
                                      <div class="pull-right"> 8.00 am - 6.00 pm </div>
                                    </li>
                                    <li> <span> Sun : </span>
                                      <div class="pull-right closed"> Closed </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>&copy; Copyright 2019. All Rights Reserved by <a href="#">e-AgriEdu</a></p>
                        </div>
                        <div class="col-md-6 text-right link">
                            <ul>
                                <li>
                                    <a href="#">Terms of user</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>

<?php } function js(){?> 
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

<?php }?>