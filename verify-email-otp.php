<?php 
require_once 'includes/header.php';
require_once 'includes/footer.php';
?>

<!DOCTYPE html>
 
<html lang="en">

<head>
    <?php head();?>

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
                    <form action="save-register.php" method ="POST" id="register-form1" class="white-popup-block">
                     <?php //include('errors.php'); ?>

                        <div class="col-md-12 login-custom">
                            <h4>Verify Your OTP</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" name="email-otp" placeholder="OTP*" type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="verify" value="Verify otp" class="btn btn-warning">                                       
                                                               
                           
                             <!-- <p class="link-bottom">Are you a member? <a href="login.php">Login now</a></p> -->
                             <p class="link-bottom">Click to resend otp <a href="resend-otp.php">Resend OTP</a>
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

<?php }if(isset($_GET['msg']) && $_GET['msg']=="otpexpired"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Otp Expired !! Please click on resend otp button to get new otp",
    icon: "<?php echo 'warning' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'verify-email-otp.php';
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