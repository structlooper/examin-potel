<?php 
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

<body>
    <!--Header function-->
    <!-- End Header -->
    <?php  header2(); ?>   
   <!-- Login Register form section-->
    <?php login_register_form(); ?>

    <div class="banner" id="inner-banner" style="background-image: url('uploads/background.jpg');">
        sdafasfdasfasfdasfdasdfs
    </div>

    <!-- Start About 
    ============================================= -->
    <div class="about-area default-padding">
        <div class="container">
            <div class="row">
                <div class="about-info">
                    <div class="col-md-6 thumb">
                        <img src="assets/img/800x800.png" alt="Thumb">
                    </div>
                    <div class="col-md-6 info">
                        <h5>Introduction</h5>
                        <h2>Welcome to the beigest online learning source of Eduka</h2>
                        <p>
                            Alteration literature to or an sympathize mr imprudence. Of is ferrars subject as enjoyed or tedious cottage. Procuring as in resembled by in agreeable. Next long no gave mr eyes. Admiration advantages no he celebrated so pianoforte unreserved. Not its herself forming charmed amiable. Him why feebly expect future now. 
                        </p>
                        <p>
                            Curiosity incommode now led smallness allowance. Favour bed assure son things yet. She consisted consulted elsewhere happiness disposing household any old the. Widow downs. Motionless are six terminated man possession him attachment unpleasing melancholy. Sir smile arose one share. No abroad in easily relied an whence lovers temper by. Looked wisdom common he an be giving length mr. Dissuade ecstatic and properly saw entirely sir why laughter. frequently apartments off all discretion 
                            devonshire.
                        </p>
                        <a href="#" class="btn btn-dark border btn-md">Read More</a>
                    </div>
                </div>
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    
    <!-- Start Footer 
    ============================================= -->
    <?php footer(); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
   <?php js();?>
</body>
</html>