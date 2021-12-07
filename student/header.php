    <?php 
    require_once '../includes/config.php';
    if(!isset($_SESSION['student'])){
      // echo "<script>window.location='../index.php'</script>";
  echo "<script>window.location='login.php'</script>";      
}else{
    $student_id = $_SESSION['student']['id'];


    }


    function head(){ ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-AgriEdu</title>

    <!--My CSS-->
    <link href="css/style.css" rel="stylesheet" />

    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">



    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Basic Graph Chart -->
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-cartesian.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-base.min.js"></script>
<?php } ?>
    

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">

            <!-- <div class="sidebar-heading" id="sidebar-heading">Examin</div> -->

            <div class="list-group list-group-flush" style="background:#4F4F4D !important;">
                <div class="info" align="center">
                     <a href="index.php" class="list-group-item list-group-item-action">Hello <?php echo $_SESSION["student"]['student_fname']." ".$_SESSION["student"]['student_lname']; ?></a>
               </div>
                    <a href="index.php" class="list-group-item list-group-item-action"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Dashboard</a>
                    <a href="profile.php" class="list-group-item list-group-item-action"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Profile</a>
                    <a href="myexam.php" class="list-group-item list-group-item-action"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;My Exam</a>
                    <a href="result.php" class="list-group-item list-group-item-action"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;Result</a>
<!--                    <a href="study_material.php" class="list-group-item list-group-item-action"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;Study Material</a>-->
                    <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;Payment</a>
                    <a href="transaction.php" class="list-group-item list-group-item-action"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;Transaction History</a>
                    <a href="help.php" class="list-group-item list-group-item-action"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;Help</a>
            </div>

            <!-- <div class="sidebar_logout">
                <a href="logout.php" button type="button" id="logout_btn" class="btn"><i class='fa fa-sign-out'></i>&nbsp;Logout
                    </button></a>
            </div> -->


        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

                <button class="main-menu" id="menu-toggle"><i class='fa fa-bars'></i></button>



                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0"> -->

                        <!-- <a href="#"><button type="button" id="balance" class="btn balance"><i
                                class="fa fa-inr"></i>&nbsp; Balance : 12000 </button></a> -->
                        <!-- <a href="logout.php" button type="button" id="toplogout" class="btn logout"><i
                                class='fa fa-sign-out'></i>&nbsp;Logout </button></a> -->
<!-- 
                    </ul>
                </div> -->
                <div class="collapse navbar-collapse dropdown">
                <img src="<?php
                $image = $_SESSION['student']['student_photo'] ? $hostname.'/uploads/student-profile_pic/'.$_SESSION['student']['student_photo'] : 'img/profile.png';
//                $image = 'img/profile.png';
                echo $image;
                ?>" id="MenuIcon" class="navbar-nav ml-auto mt-2 mt-lg-0" style="border-radius: 200px">
             
                <div class="ShowMenu">
                   <a href="<?php echo $hostname; ?>"> <div id="home"><i class="fas fa-home"></i>&nbsp;&nbsp;Homepage</div></a>
                    <a href="index.php"> <div id="home"><i class="fas fa-home"></i>&nbsp;&nbsp;Dashboard</div></a>
                    <a href="profile.php"> <div id="profile"><i class="fas fa-user"></i>&nbsp;&nbsp;Profile</div></a>
                    <a href="changePass.php"><div id="changePass"><i class="fas fa-wrench"></i>&nbsp; Change Password</div></a>
                    <a href="logout.php"><div id="logout"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</div></a>
                </div>

              </div>

            </nav>
            <!--End Nav Bar-->
