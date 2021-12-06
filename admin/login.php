<?php 
  // require_once 'includes/config.php';
require_once '../includes/config.php';
  if(isset($_SESSION['admin'])){
      echo "<script>window.location='index.php'</script>";
    
    }else{
      
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>eAgriEdu.com</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="css/custom.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                 function myFunction() {
                      if(contactInput.length > 10){
                          return false;
                      }
                    
                   }
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
                        url: 'email-otp.php',
                        type: 'POST',
                        data: { email: otpemailInput},
                        success: function(response){
                            
                        },
                        error:function(err){
                          console.log("Error : ",err)
                        }
                     });

                      $(".Error").html("");
                      $("#contactNumber").hide();
                      $("#SendOTP").hide();
                      $("#otpNumber").show();
                      $("#varifyOTP").show();
                    }  
                    

              // if(contactInput.length != 10){
              //     //alert("Please Enter valid contact Number");
              //     $(".contactError").html("Please Enter valid contact Number");
              //      $("#contactInput").focus();
              //      return false;
              //      }
              // else{
              //     $(".Error").html("");
              //     $("#contactNumber").hide();
              //     $("#SendOTP").hide();
              //     $("#otpNumber").show();
              //     $("#varifyOTP").show();
              //     }
           });

           $("#varifyOTP").click(function(){
            var otpInput = $("#otpInput").val();
            var newPassord = $('#newPassord').val();
            var Confirm_newPassword = $('#Confirm_newPassword').val();

            if(otpInput.length != "6"){
              // alert("Please Enter Valide OTP Number");
              $(".otpError").html("Please Enter Valide OTP Number");
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
                        url: 'email-otp.php',
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
                         // if(data == "Success"){
                         //  location.reload();
                         // }                           
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

    <!-----------------------Login-------------------------------------->
    <!--  -->
      
    </div>
    <div class="center">
        <div class="container" id="loginForm">

            <!-- <label for="" class="close-btn fas fa-times" title="close"></label> -->

            <div class="text">Login <span id="heading">Form</span></div>
              <h5 id="loginmessage" class="text-danger"></h5>
            <!-- <form action="admin/index.php" method ="POST" id="admin-login" name="admin-login"> -->
              <form method ="POST" id="admin-login" name="admin-login">
                <div class="data">
                    <label>Email</label>
                    <input type="text" name="username"  id="email" class="form-control" placeholder="Enter Email" >
                    <span class="emailError Error" style="color: red;"></span> 
                </div>

                <div class="data">
                    <label id="passLable">Password</label>
                    <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
                      <span class="passError Error" style="color: red;"></span> 
                </div>

                <div class="forgot-pass"><a href="#" data-toggle="modal" data-target="#myModal">Forgot Password?</a></div>

                <div class="login_btn">
                    <button type="submit" class="login" name="login">login</button>
                </div>

            </form>
                 
         </div>
    
     </div>
     <!-----------------------Login Form- End------------------------------------->

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
                              
                             <!-- <div class="form-group" id="contactNumber">
                                <label>Contact Number</label>
                                <input type="number" class="form-control" id="contactInput" placeholder="Please Enter Mobile Number" onkeypress="myFunction()">
                                <span class="contactError Error" style="color: red;"></span> 
                            </div> -->

                            <div class="form-group" id="contactNumber">
                                <label>Email Address</label>
                                <input type="email" class="form-control" id="otpemailInput" placeholder="Please Enter Email">
                                <span class="contactError Error" style="color: red;"></span> 
                            </div>

                            <div class="form-group" id="otpNumber">
                                <label>OTP Number</label>
                                <input type="number" class="form-control" id="otpInput" placeholder="Please Enter OTP Number">
                                <span class="otpError Error" style="color: red;"></span> 

                                <label>New Password</label>
                                <input type="number" class="form-control" id="newPassord" placeholder="Please Enter New Password">
                                <!-- <span class=" Error" style="color: red;"></span>  -->

                                <label>Confirm New Password</label>
                                <input type="number" class="form-control" id="Confirm_newPassword" placeholder="Please Confirm New Password">
                                <!-- <span class="otpError Error" style="color: red;"></span>  -->
                            </div>

                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="SendOTP" data-submit="modal" >Send OTP</button>
                            <button type="button" class="btn btn-success" id="varifyOTP" data-submit="modal" >Varify OTP</button>
                            <button type="button" class="btn btn-danger" id="closebtn" data-dismiss="modal">Close</button>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    
                </div>

      <!-----------------------Forgot Form End------------------------------------->


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>