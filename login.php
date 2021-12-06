<?php 
   require_once 'includes/header.php';
   require_once 'includes/footer.php';
    ?> 

   <!DOCTYPE html>    
   <html lang="en">
   
   <head>
       <?php  head();?>
       <!--SweetAlert CDN-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
   <!--SweetAlert CDN-->

   <script>
           $(document).ready(function(){
               $(".login").click(function(){
                   var email = $("#email").val();
                   var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    // Mail Formate for email validation
                   var pass = $("#pass").val();

                    if(mailformat.test(email) == false){
                    // alert("Enter your valid email id");
                    $(".emailError").html("Enter your valid email id");
                    // $("input:text").val("Enter your valid email id");
                    $("#email").focus();
                    return false;
                    }  
                    else if(pass == ""){
                        $(".Error").html("");
                        $(".passError").html("Please Enter your password");
                        $("#pass").focus();
                        return false;
                    }
                    else{
                        // $(".Error").html("");
                        // alert("Success");
                        $('#admin-login').submit(function(e){
                          $.ajax({
                          type: 'post',
                          url: 'admin-login.php',
                          data: $('#admin-login').serialize(),
                          success: function(response){  
                            //alert('form submitted');
                            //console.log("Return :",response);

                            var msg = '';
                            if(response == 1){
                              // alert("1")
                              // window.location = 'index.php'
                               swal({
                                  title: "Login",
                                  text: "Login Successfully",
                                  icon: "success",
                                  button: "OK",
                                });
                                $('.swal-button--confirm').click(function(){
                                window.location.href = 'index.php';
                              });
                            }else if(response == 0){
                              //alert(response)
                              //msg = "Invalid username and password";
                                 swal({
                                 title: "Invalid Email or password",
                                 text: "Email Id or password doesn't match in database record.",
                                 icon: "error",
                                 button: "OK",
                                });
                              //   $('.swal-button--confirm').click(function(){
                              //   window.location.href = 'index.php';
                              // });   
                            }                   
                            //$('#loginmessage').html(msg);
                          },
                          error:function(err){
                            console.log(err);
                          }

                        })
                          e.preventDefault();
                      })
                        

                    }
               });
           })
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
   </head>
   
   <body>   
       <!--Header function-->
    <!-- End Header -->
    <?php  header2(); ?> 
    <!-- Login Register form section-->
    <?php login_register_form(); ?>


       <!-- Start Login 
       
       ============================================= -->
    <!-- Start Login Form 
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form method ="POST" id="login-form" class="white-popup-block">
                     <?php //include('errors.php'); ?>
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
            <h4>login to your registered account!</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" name="stud_email" id="stud_email_lgn" placeholder="Email*" type="email">
                        <span class="emailError AllError" style="color: red;"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" name="password" id="pass1" placeholder="Password*" type="password">
                         <span class="passError AllError" style="color: red;"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <label for="login-remember"><input type="checkbox" id="login-remember">Remember Me</label>
                    <a title="Forgot Password" href="#" class="lost-pass-link" data-toggle="modal" data-target="#myModal">Forgot password?</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <button type="button" name="login_user" id="login_user" class="btn btn-warning">Login</button>        
                </div>
            </div>
            <p class="link-bottom">Not a member yet? <a href="register.php">Register now</a></p>
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End Login Form -->


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
   
       <!-- Start Footer 
       ============================================= -->
      <?php footer(); ?>
       <!-- End Footer -->
   
       <!-- jQuery Frameworks
       ============================================= --> 
       <script src="assets/js/jquery-1.12.4.min.js"></script>
       <?php js();?>
       
       <script type="text/javascript">
         $(document).ready(function(){
          $('#login_user').click(function(){
            var email = $("#stud_email_lgn").val();                  
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;      // Mail Formate for email validation

            var pass = $("#pass1").val();

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
                      //window.location='student/index.php';
                      swal({
                        title: "Login",
                        text: "Login Successfully",
                        icon: "success",
                        button: "OK",
                      });
                      $('.swal-button--confirm').click(function(){
                      window.location.href = 'student/index.php';
                    });
                      
                    }else if(response == 0){                      
                      //alert("You are blocked");
                      swal({
                        title: "BLOCKED",
                        text: "You Are Blocked by admin! Please Contact Admin",
                        icon: "warning",
                        button: "OK",
                      });
                      $('.swal-button--confirm').click(function(){
                      window.location.href = 'login.php';
                    });

                    }else if(response == 2){                      
                      swal({
                        title: "Invalid Email or password",
                        text: "Email Id or password doesn't match in database.",
                        icon: "error",
                        button: "OK",
                      });
                      $('.swal-button--confirm').click(function(){
                      window.location.href = 'login.php';
                    });

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
   </body>
   </html>