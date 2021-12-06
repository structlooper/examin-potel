<?php 
require_once 'includes/header.php';
require_once 'includes/footer.php';
?>

<!DOCTYPE html>
 
<html lang="en">

<head>
    <?php head();?>
     <script type="text/javascript">
    $(document).ready(function(){
    $('#resend-otp').click(function(){            
            var email = $("#resend-otp-email").val();
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;    // Mail Formate for email validation

            if(mailformat.test(email) == false){
            $(".AllError").html("");
            $(".emailError").html("Enter your valid email id");
            // $("input:text").val("Enter your valid email id");
            $("#resend-otp-email").focus();
            return false;
            }               
        });
    }); 

  </script>

</head>

<body>

<?php header2();?>
 <!-- Login Register form section-->
<?php login_register_form(); ?>  

    <!-- Start Registration     
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form method="post" action="save-register.php" id="resend-Otpform" class="white-popup-block">               

                        <div class="col-md-12 login-custom">
                            <h4>Please Enter Your Email</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" name="resend-otp-email" id="resend-otp-email" placeholder="Email*" type="email" autocomplete="off">
                                        <span class="emailError AllError" style="color: red;"></span> 
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="resend-otp" value="Resend otp" class="btn btn-warning" id="resend-otp">                                                    
                           
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
    
   <?php footer();?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <!--Common javascript file are in footer.php in js function-->
    <?php js();?>

    <?php 
 //Call sweet alert popup on getting message on registration from save-register.php..
if(isset($_GET['msg']) && $_GET['msg']=="success"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Email Verified Succesfully!!! Please Login to continue",
    icon: "<?php echo 'success' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'login.php';
  });

</script>

<?php }if(isset($_GET['msg']) && $_GET['msg']=="email not exist"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Email Doesn't exis !! Please register",
    icon: "<?php echo 'error' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'register.php';
  });

</script>

<?php }if(isset($_GET['msg']) && $_GET['msg']=="incorrect-otp"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "incorrect-otp !! Please Enter Valid email-otp",
    icon: "<?php echo 'error' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'verify-email-otp.php';
  });

</script>

<?php }?>

</body>
</html>