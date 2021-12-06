<?php include "includes/header.php";?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <?php 
                            $count_class = "SELECT Count(*) as total_class FROM classes;";
                            $res = mysqli_query($conn,$count_class);
                            $class = mysqli_fetch_assoc($res);
                        ?>
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $class['total_class'];?></h3>
                                <p>Class</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="add_class.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <?php 
                            $count_subject = "SELECT Count(*) as total_subjects FROM subject;";
                            $res = mysqli_query($conn,$count_subject);
                            $subjects = mysqli_fetch_assoc($res);
                        ?>
                            <div class="inner">
                                <?php ?>
                                <h3><?=$subjects['total_subjects'];?></h3>

                                <p>Subject</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="add_subject.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <?php 
                            $count_chapters = "SELECT Count(*) as total_chapters FROM chapter;";
                            $res = mysqli_query($conn,$count_chapters);
                            $chapters = mysqli_fetch_assoc($res);
                        ?>
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?=$chapters['total_chapters'];?></h3>

                                <p>Chapter</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="add_chapter.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <?php 
                            $count_questions = "SELECT Count(*) as total_questions FROM questions;";
                            $res = mysqli_query($conn,$count_questions);
                            $questions = mysqli_fetch_assoc($res);
                        ?>
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $questions['total_questions'];?></h3>

                                <p>Create New Question</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="add_question.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                </div>
                <!-- /.row -->

                <!-- Small boxes (Stat box) -->
                <div class="row">


                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <?php 
                            $count_exams = "SELECT Count(*) as total_exams FROM exam;";
                            $res = mysqli_query($conn,$count_exams);
                            $exams = mysqli_fetch_assoc($res);
                        ?>
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?=$exams['total_exams'];?></h3>

                                <p>Create New Exam</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="exam_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->


                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Result</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="pages/forms/exam_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->



                <!-- Main row -->
                    <!-- <div class="row"> -->
                        <!-- Left col -->
                        <!-- <section class="col-lg-7 connectedSortable">
                          
                         
                            <div id="chartContainer" style="height: 300px; width: 100%;">

                        </section> -->
                        <!-- /.Left col -->

                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <!-- <section class="col-lg-5 connectedSortable">

                            <div id="container4"></div>  
     
                        </section> -->
                        <!-- right col -->
                    <!-- </div> -->
                    <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php require_once 'includes/footer.php'; ?>

            <!-- <script type="text/javascript">
                    window.onload = function () {
                      var chart = new CanvasJS.Chart("chartContainer",
                      {
                        title:{
                          text: "Top Oil Reserves"
                        },
                        data: [
                  
                        {
                          dataPoints: [
                          { x: 1, y: 297571, label: "Venezuela"},
                          { x: 2, y: 267017,  label: "Saudi" },
                          { x: 3, y: 175200,  label: "Canada"},
                          { x: 4, y: 154580,  label: "Iran"},
                          { x: 5, y: 116000,  label: "Russia"},
                          { x: 6, y: 97800, label: "UAE"},
                          { x: 7, y: 20682,  label: "US"},
                          { x: 8, y: 20350,  label: "China"}
                          ]
                        }
                        ]
                      });
                  
                      chart.render();
                    }
                    </script> -->
                    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>