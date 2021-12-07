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
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

#timer{
    height:62px;
    padding:9px;
    background-color: beige;
}
.days{
    font-size:19px;
    color:green;
}

.hours{
    font-size:19px;
    color:red;
}

.minutes{
    font-size:19px;
}
.nice-select ul{
  width: 100% !important;
  height: auto !important;
}
.option{
  width: 100% !important;
  margin-bottom: 0px !important;
}
</style>
</head>

<body>
    <!--Header function-->
    <!-- End Header -->
    <?php  header2(); ?>
   <!-- Login Register form section-->
    <?php login_register_form(); ?>

    <!-- Start Banner
    ============================================= -->
    <div class="banner-area content-top-heading less-paragraph text-normal">
        <div id="bootcarousel" class="carousel slide animate_text carousel-fade" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom">
                <div class="item active">
                    <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/eagripics.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">Reach you career</h3>
                                            <h1 data-animation="animated slideInUp">Learn from best online training course</h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="#">Learn more</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="#">View Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/eagripics1.png);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">We're glade to see you</h3>
                                            <h1 data-animation="animated slideInUp">explore our brilliant graduates</h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="#">Learn more</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="#">View Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url(assets/img/eagripic2.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">The goal of education</h3>
                                            <h1 data-animation="animated slideInUp">Join the bigest community of eduka</h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light border btn-md" href="#">Learn more</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-md" href="#">View Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <!-- End Banner -->

    <!-- Start About
    ============================================= -->
    <div class="about-area default-padding">
        <div class="container">
            <div class="row">
                <div class="about-info">
                    <div class="col-md-6 thumb">
                        <img src="assets/img/eagri_about_us.png" alt="Thumb">
                    </div>
                    <div class="col-md-6 info">
                        <h5>Introduction</h5>
                      <h2>Welcome to the beigest online learning source of <span style="color:red;">eagriedu.com</span></h2>
                        <p>
                         <strong>eagriEdu.com</strong> is a website for students related to agriculture field. The supreme purpose of the website is to provide question papers containing multiple choice questions for agricultural competitive exams like JRF, BHU-PET, SRF etc. Registered students will get weekly quizzes on various disciplines of agriculture. The quizzes will be covering the entire syllabus unit wise for each discipline. Besides, study materials related to several topics will also be made available to the registered students. Recent updates on agriculture worldwide as well as within the country will also be available on the website.
                        </p>
                         <p>
                            This is an initiative taken by the agricultural students of different reputed universities to spread their knowledge and help boost the enthusiastic students to move ahead and to evaluate themselves through the exams. The recent updated information and unique conceptual questions prepared by the members of this website will surely attract the attention of budding future agricultural experts. The registration fees charged from the students are for the maintenance, operation, design and other miscellaneous costs of the website.
                        </p>
                        <a href="about-us.php" class="btn btn-dark border btn-md">Read More</a>
                    </div>
                </div>
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
                <div class="our-features">
                    <div class="col-md-4 col-sm-4">
                        <div class="item mariner">
                            <div class="icon">
                                <i class="flaticon-faculty-shield"></i>
                            </div>
                            <div class="info">
                                <h4>Expert faculty</h4>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item java">
                            <div class="icon">
                                <i class="flaticon-book-2"></i>
                            </div>
                            <div class="info">
                                <h4>Online learning</h4>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item malachite">
                            <div class="icon">
                                <i class="flaticon-education"></i>
                            </div>
                            <div class="info">
                                <h4>Scholarship</h4>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Why Chose Us
    ============================================= -->
    <div class="wcs-area bg-dark text-light">
        <div class="container-full">
            <div class="row">
                <div class="col-md-6 thumb bg-cover" style="background-image: url(assets/img/why_choose_us.jpg);"></div>
                <div class="col-md-6 content">
                    <div class="site-heading text-left">
                        <h2>Why chose us</h2>
                        <p>
                            eAgriedu group is whole heartedly committed to help students to reach their goals by offering correct guidance for agriculture-based exams, providing test series and interactive platform to clear any doubts.
                        </p>
                    </div>

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-trending"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Attention to Details</a>
                            </h4>
                            <p>
                                It’s our responsibility to cover each and every concept in detail and schedule test at proper time to keep the students under continuous practice. This makes us stand out from the rest. We are creative in our approach and content while keeping close eye on the calender of performance of student,s progress.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-books"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">A Plan for Success</a>
                            </h4>
                            <p>
                                You want results. We have found that the best way to get them is to practice. eAgriedu group cover whole syllabus of the exams.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-professor"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Dedicated teams</a>
                            </h4>
                            <p>
                                We have dedicated team of students from reputed institutes all over the country who are committed to help the students in every possible way.
                            </p>
                            <p>
                                Join us, and you’ll work with seasoned professionals – vigilant of deadlines, and committed to exceeding students expectations.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Why Chose Us -->

    <!-- Start Featured Courses
    ============================================= -->
    <div id="featured-courses" class="featured-courses-area left-details default-padding">
        <div class="container">
            <div class="row">
                <div class="featured-courses-carousel owl-carousel owl-theme">
                    <!-- Start Single Item -->
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="assets/img/software-programming.jpg" alt="Thumb">
                                <div class="live-view">
                                    <a href="assets/img/software-programming.jpg" class="item popup-link">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=vQqZIFCab9o">
                                        <i class="fa fa-video"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                <a href="#">Codecademy software programming</a>
                            </h2>
                            <h4>featured courses</h4>
                            <p>
                                Both rest of know draw fond post as. It agreement defective to excellent. Feebly do engage of narrow. Extensive repulsive belonging depending if promotion be zealously as. Preference inquietude ask
                            </p>
                            <h3>Learning outcomes</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Over 37 lectures and 55.5 hours of content!</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Testing Training Included.</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Course content designed by considering current software testing</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Practical assignments at the end of every session.</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>
                            <div class="bottom-info align-left">
                                <div class="item">
                                    <h4>Author</h4>
                                    <a href="#">
                                        <span>Devid Honey</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <h4>Students enrolled</h4>
                                    <span>5455</span>
                                </div>
                                <div class="item">
                                    <h4>Rating</h4>
                                    <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Start Single Item -->
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <!--<img src="assets/img/700x800.png" alt="Thumb">-->
                              <img src="assets/img/data-analysis.jpeg" alt="Thumb">
                                <div class="live-view">
                                    <a href="assets/img/data-analysis.jpeg" class="item popup-link">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=vQqZIFCab9o">
                                        <i class="fa fa-video"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                <a href="#">Data analysis and data science</a>
                            </h2>
                            <h4>featured courses</h4>
                            <p>
                                Both rest of know draw fond post as. It agreement defective to excellent. Feebly do engage of narrow. Extensive repulsive belonging depending if promotion be zealously as. Preference inquietude ask
                            </p>
                            <h3>Learning outcomes</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Over 37 lectures and 55.5 hours of content!</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Testing Training Included.</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Course content designed by considering current software testing</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Practical assignments at the end of every session.</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>
                            <div class="bottom-info align-left">
                                <div class="item">
                                    <h4>Author</h4>
                                    <a href="#">
                                        <span>Devid Honey</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <h4>Students enrolled</h4>
                                    <span>5455</span>
                                </div>
                                <div class="item">
                                    <h4>Rating</h4>
                                    <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Start Single Item -->
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="assets/img/graphic_design.jpeg" alt="Thumb">
                                <div class="live-view">
                                    <a href="assets/img/graphic_design.jpeg" class="item popup-link">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=vQqZIFCab9o">
                                        <i class="fa fa-video"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                <a href="#">Graphic and interactive design</a>
                            </h2>
                            <h4>featured courses</h4>
                            <p>
                                Both rest of know draw fond post as. It agreement defective to excellent. Feebly do engage of narrow. Extensive repulsive belonging depending if promotion be zealously as. Preference inquietude ask
                            </p>
                            <h3>Learning outcomes</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Over 37 lectures and 55.5 hours of content!</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Testing Training Included.</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Course content designed by considering current software testing</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <span>Practical assignments at the end of every session.</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>
                            <div class="bottom-info align-left">
                                <div class="item">
                                    <h4>Author</h4>
                                    <a href="#">
                                        <span>Devid Honey</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <h4>Students enrolled</h4>
                                    <span>5455</span>
                                </div>
                                <div class="item">
                                    <h4>Rating</h4>
                                    <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Featured Courses -->

    <!-- Start Popular Courses
    ============================================= -->
    <div class="popular-courses bg-gray circle carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Popular Exams</h2>
                        <p>
                            Discourse assurance estimable applauded to so. Him everything melancholy uncommonly but solicitude inhabiting projection off. Connection stimulated estimating excellence an to impression.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="popular-courses-items popular-courses-carousel owl-carousel owl-theme">
                        <!-- Single Item -->
                        <?php
                        //Fetch plan details..
                        $fetch_package = $conn->query("SELECT * FROM exam_packages WHERE status = 1");
                        while($package = $fetch_package->fetch_assoc()){ ?>
                        <div class="item popular-course-item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="uploads/package-img/<?php echo $package['image'];?>" alt="Thumb" id="course-img" >
                                </a>
                                <div class="price">Price: <?php echo $package['amount'];?> Rs.</div>
                            </div>
                            <div class="info">
                                <div class="author-info">
                                    <div class="others">
                                        <a href="#"><?php echo $package['package_name'];?></a>
                                    </div>
                                </div>

<!--                                <ul class="package">-->
                                <?php
                                // Query to fetch exams in this package...
                                // $featured_exams = $package['featured_exams'];
                                // $all_exam = "SELECT * FROM exam WHERE id IN ($featured_exams)";
                                // $all_exam_query = mysqli_query($conn, $all_exam) or die("Query Faild!");
                                // if(mysqli_num_rows($all_exam_query) > 0){
                                //   while($allexamdata = mysqli_fetch_assoc($all_exam_query)){ ?>
                                    <!-- <li><a href="#"><?php //echo $allexamdata['exam_name'];?></a></li>     -->
                                 <?php // } } ?>
<!--                                </ul>-->
                                <p class="description">
                                    <?php
                                   echo substr($package['discription'],0,40)."...";

                                    ?>
                                </p>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user"></i> 6,690
                                        </li>
                                    </ul>
                                    <br><br>
                                    <div class="row course_button">
                                        <a href="view-packageDetails.php?packID=<?php echo $package['package_id'];?>">View Details</a>
                                        <?php
                                           if(empty($_SESSION['student'])){ ?>
                                                <a  class="popup-with-form buy_exam_package" href="#buyPackage" data-package_id="<?php echo $package['package_id']; ?>" data-package_name="<?php echo $package['package_name']; ?>" >
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"  ></i> Buy Now
                                                </a>
                                            <?php }else{
                                               $studentID = $_SESSION['student']['id'];
                                                $purchase_pckge = $conn->query("SELECT count(*) as aready_purchased FROM student_exams WHERE stud_id = '".$studentID."' AND package_id = '".$package['package_id']."'");
                                               $purchase_package = $purchase_pckge->fetch_assoc();

                                                if($purchase_package['aready_purchased'] > 0){ ?>
                                                    <a  class="popup-with-form">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Purchased
                                                </a>
                                                <?php }else{ ?>
                                                    <a class="buy_exam_package1" data-package_id="<?php echo $package['package_id']; ?>" data-package_name="<?php echo $package['package_name']; ?>" >
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"  ></i> Buy Now
                                                </a>
                                                <?php }  } ?>
                                    </div>

                                 </div>
                              </div>
                           </div>
                        <?php }?>
                        <!-- End Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Courses -->

    <!-- Start Top Categories
    ============================================= -->
    <div id="top-categories" class="top-cat-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Top Courses</h2>
                        <p>
                            Discourse assurance estimable applauded to so. Him everything melancholy uncommonly but solicitude inhabiting projection off. Connection stimulated estimating excellence an to impression.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="top-cat-items">
                    <?php
                        $selclasses = $conn->query("SELECT * FROM classes");
                        while($classList = $selclasses->fetch_assoc()){
                            $selSubject = $conn->query("SELECT Count(*) as total_subject FROM subject WHERE classs_id='".$classList['id']."'");
                            while($subjectList = $selSubject->fetch_assoc()){
                                $selChapter = $conn->query("SELECT Count(*) as total_chapter FROM chapter WHERE class_id='".$classList['id']."'");
                                while($chapterList = $selChapter->fetch_assoc()){ ?>
                                     <div class="col-md-3 col-sm-6 equal-height">
                                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                                            <a href="#">
                                                <i class="flaticon-feature"></i>
                                                <div class="info">
                                                    <h4><?=$classList['class_name'];?></h4>
                                                    <span><?=$subjectList['total_subject'];?> Subjects</span>
                                                    <span><?=$chapterList['total_chapter'];?> Topics</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php }
                            }
                        }

                            ?>



                    <!-- <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-feature"></i>
                                <div class="info">
                                    <h4>software engineering</h4>
                                    <span>(1,226) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div> -->
                   <!--  <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-interaction"></i>
                                <div class="info">
                                    <h4>Interactive Programming</h4>
                                    <span>(2,366) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-conveyor"></i>
                                <div class="info">
                                    <h4>Quantum Mechanics</h4>
                                    <span>(766) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-education"></i>
                                <div class="info">
                                    <h4>Preventing Dementia</h4>
                                    <span>(4,500) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-potential"></i>
                                <div class="info">
                                    <h4>Hidden Potential</h4>
                                    <span>(975) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-print"></i>
                                <div class="info">
                                    <h4>Introduction Programming</h4>
                                    <span>(3,340) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-translate"></i>
                                <div class="info">
                                    <h4>Machine Learning</h4>
                                    <span>(7,800) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item" style="background-image: url(assets/img/800x600.png);">
                            <a href="#">
                                <i class="flaticon-firewall"></i>
                                <div class="info">
                                    <h4>Maintaining a Mindful</h4>
                                    <span>(24,80) Topics</span>
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Categories -->

    <!-- Start Advisor Area
    ============================================= -->
    <section id="advisor" class="advisor-area bg-gray carousel-shadow default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Experience Advisors</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="advisor-items advisor-carousel-solid owl-carousel owl-theme text-center text-light">
                        <!-- Single Item -->
                        <?php
                        $all_adviser = "SELECT * FROM gems_e_agriedu ORDER BY id DESC";
                        $all_advisor_query = mysqli_query($conn, $all_adviser) or die("Query Faild!");
                        if(mysqli_num_rows($all_advisor_query) > 0){
                        while($alladvisordata = mysqli_fetch_assoc($all_advisor_query)){ ?>

                        <div class="advisor-item">
                            <div class="info-box">
                              <img src="<?php echo $hostname;?>/admin/latest_news/gems_e_agriedu/<?php echo $alladvisordata['gems_e_agriedu_file'];?>" alt="Thumb" style="height: 219px;">
                                <div class="info-title">
                                    <h4><?php echo $alladvisordata['gems_e_agriedu_title'];?></h4>
                                    <span><?php echo $alladvisordata['position'];?></span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <?php } } ?>

                        <!-- <div class="advisor-item">
                            <div class="info-box">
                                <img src="assets/img/01.jpg" alt="Thumb">
                                <div class="info-title">
                                    <h4>Monayem Pruda</h4>
                                    <span>Senior Developer</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="advisor-item">
                            <div class="info-box">
                               <img src="assets/img/01.jpg" alt="Thumb">
                                <div class="info-title">
                                    <h4>Dr. Bubly Minu</h4>
                                    <span>Science specialist</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="advisor-item">
                            <div class="info-box">
                               <img src="assets/img/01.jpg" alt="Thumb">
                                <div class="info-title">
                                    <h4>Professon. John Doe</h4>
                                    <span>Senior Writter</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="assets/img/01.jpg" alt="Thumb">
                                <div class="info-title">
                                    <h4>Professon. John Doe</h4>
                                    <span>Senior Writter</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Single Item -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Advisor Area -->

    <!-- Start Fun Factor
    ============================================= -->
    <div class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard" style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="212" data-speed="5000"></span>
                            <span class="medium">National Awards</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-professor"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="128" data-speed="5000"></span>
                            <span class="medium">Best Teachers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-online"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="8970" data-speed="5000"></span>
                            <span class="medium">Students Enrolled</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-reading"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="640" data-speed="5000"></span>
                            <span class="medium">Cources</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor -->

    <!-- Start Event
    ============================================= -->
   <!--<section id="event" class="event-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Upcoming Events</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="event-items">-->
                    <!-- Single Item -->
                    <!--<div class="item horizontal col-md-12">
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
                                <i class="fas fa-ticket-alt"></i> 43 Available
                            </a>
                        </div>
                    </div> -->
                    <!-- Single Item -->

                    <!-- Single Item -->
                    <!-- <div class="item vertical col-md-6">
                        <div class="thumb">
                            <img src="assets/img/800x600.png" alt="Thumb">
                            <div class="date">
                                <h4><span>27</span> Feb, 2019</h4>
                            </div>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Social Science & Humanities</a>
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
                                <i class="fas fa-ticket-alt"></i> 189 Available
                            </a>
                        </div>
                    </div> -->
                    <!-- Single Item -->

                    <!-- Single Item -->
                    <!-- <div class="item vertical col-md-6">
                        <div class="thumb">
                            <img src="assets/img/800x600.png" alt="Thumb">
                            <div class="date">
                                <h4><span>15</span> Mar, 2019</h4>
                            </div>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Actualized Leadership Network Seminar</a>
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
                                <i class="fas fa-ticket-alt"></i> 32 Available
                            </a>
                        </div>
                    </div> -->
                    <!-- Single Item -->

                    <!-- Single Item -->
                    <!-- <div class="item horizontal col-md-12">
                        <div class="col-md-6 thumb bg-cover" style="background-image: url(assets/img/1500x700.png);">
                            <div class="date">
                                <h4><span>24</span> Apr, 2019</h4>
                            </div>
                        </div>
                        <div class="col-md-6 info">
                            <h4>
                                <a href="#">International Conference on Art Business</a>
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
                                <i class="fas fa-ticket-alt"></i> 12 Available
                            </a>
                        </div>
                    </div> -->
                    <!-- Single Item -->

                    <!-- <div class="more-btn col-md-12 text-center">
                        <a href="#" class="btn btn-dark border btn-md">View All Events</a>
                    </div>

                </div>
            </div>
        </div>
    </section> -->
    <!-- End Event -->

    <!-- Start Registration
    ============================================= -->
    <div class="reg-area default-padding-top bg-gray">
        <div class="container">
            <div class="row">
                <div class="reg-items">
                    <div class="col-md-6 reg-form default-padding-bottom">
                        <div class="site-heading text-left">
                            <h2>Get a Free online Registration</h2>
                            <p>
                                written on charmed justice is amiable farther besides. Law insensible middletons unsatiable for apartments boy delightful unreserved.
                            </p>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="First Name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Last Name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email*" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select>
                                            <option value="1">Chose Subject</option>
                                            <option value="2">Computer Engineering</option>
                                            <option value="4">Accounting Technologies</option>
                                            <option value="5">Web Development</option>
                                            <option value="6">Machine Language</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Phone" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit">
                                        Rigister Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 thumb">
                        <img src="<?= $hostname ?>/assets/contact_page.io.jpg" alt="Thumb" style="max-width: 80%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Registration -->

    <!-- Start Testimonials
    ============================================= -->
    <div class="testimonials-area carousel-shadow default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Students Review</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clients-review-carousel owl-carousel owl-theme">
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyeZfE0GIKmzCLp4TNuhxTiUTbn6EpKOW89g&usqp=CAU" alt="Thumb" style="height: 200px">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise..
                                </p>
                                <h4>Druna Patia</h4>
                                <span>Biology Student</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="data:image/jpeg;base64,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" alt="Thumb" style="height: 200px">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise..
                                </p>
                                <h4>Astron Brun</h4>
                                <span>Science Student</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="https://mpng.subpng.com/20180712/qvg/kisspng-student-university-and-college-admission-institute-medical-students-5b47ed72b04f14.8766271215314404987222.jpg" alt="Thumb" style="height: 200px">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise..
                                </p>
                                <h4>Paol Druva</h4>
                                <span>Development Student</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl5iOo0tCBUQKlLcKTeZ5IxD7NT5YgMORuKA&usqp=CAU" alt="Thumb" style="height: 200px">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise..
                                </p>
                                <h4>Druna Patia</h4>
                                <span>Biology Student</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Start Blog
    ============================================= -->
    <div id="blog" class="blog-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Latest News</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items">
                <?php
                  $product_data = "SELECT * FROM latest_news ORDER BY id DESC";
                   $product_query = mysqli_query($conn, $product_data) or die("Query Faild!");
                    while($product_fetch = mysqli_fetch_assoc($product_query)){
                    ?>
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="<?php echo $hostname; ?>/admin/latest_news/<?php echo $product_fetch['news_file']; ?>" alt="Thumb" style="height: 300px"></a>
                                <div class="date">
                                    <h4><span>24</span> Nov, 2018</h4>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#"><?php echo $product_fetch['news_title']; ?></a>
                                </h4>
                                <p style="height: 80px;">
                                  <?php echo substr($product_fetch['description'],0,150) . "..."; ?>
                                </p>
                                <a href="single.php?id=<?php echo $product_fetch['id']; ?>">Read More <i class="fas fa-angle-double-right"></i></a>
                                <div class="meta">
                                    <ul>
                                        <!-- <li>
                                            <a href="#"><i class="fas fa-user"></i> Author</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-comments"></i> 23 Comments</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Single Item -->
                    <!-- Single Item -->
                    <!-- <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="assets/img/800x600.png" alt="Thumb"></a>
                                <div class="date">
                                    <h4><span>12</span> Sep, 2018</h4>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Meant to learn of vexed</a>
                                </h4>
                                <p>
                                    Sitting mistake towards his few country ask. You delighted two rapturous six depending objection happiness something the partiality unaffected
                                </p>
                                <a href="#">Read More <i class="fas fa-angle-double-right"></i></a>
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-user"></i> Author</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-comments"></i> 23 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Single Item -->
                    <!-- Single Item -->
                    <!-- <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="assets/img/800x600.png" alt="Thumb"></a>
                                <div class="date">
                                    <h4><span>29</span> Dec, 2018</h4>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Delightful up dissimilar</a>
                                </h4>
                                <p>
                                    Sitting mistake towards his few country ask. You delighted two rapturous six depending objection happiness something the partiality unaffected
                                </p>
                                <a href="#">Read More <i class="fas fa-angle-double-right"></i></a>
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-user"></i> Author</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-comments"></i> 23 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Single Item -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Clients Area
    ============================================= -->
<!--    <div class="clients-area default-padding bg-gray">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-4 info">-->
<!--                    <h4>Our largest education campus</h4>-->
<!--                    <p>-->
<!--                        Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="col-md-8 clients">-->
<!--                    <div class="clients-items owl-carousel owl-theme text-center">-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                        <div class="single-item">-->
<!--                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- End Clients Area -->

    <!-- Modal -->
    <?php
    // Query to fetch comming soon offers...

    $selComingSoon = $conn->query("SELECT * FROM comming_soon WHERE status = 1");
     $cmngsnlist = $selComingSoon->fetch_assoc();

     if($cmngsnlist['status']==0){?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#comingsoonModal').modal('hide');
            });
        </script>
     <?php }else{ ?>
         <script type="text/javascript">
            $(window).on('load', function() {
                $('#comingsoonModal').modal('show');
            });
        </script>
     <?php }?>
  <div class="modal fade" id="comingsoonModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Coming Soon</h4>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-3 "></div>
            <div class="col-md-6">

          <div class="card">
              <img src="uploads/coming_soon/<?php echo $cmngsnlist['image'];?>" alt="Denim Jeans" style="width:100%">
              <h1><?=$cmngsnlist['title'];?></h1>
              <p class="price" id="demo"></p>
              <div id="timer">
                  <span class="days" id="days"></span>
                  <span class="hours" id="hours"></span>
                  <span class="minutes" id="minutes"></span>
                  <span class="seconds" id="seconds"></span>
              </div>
              <!-- <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
              <p><button>Add to Cart</button></p> -->
            </div>
        </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <?php buyPackage();?>
    <!-- Start Footer


    ============================================= -->
    <?php footer(); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
   <?php js();?>
   <?php
 //Call sweet alert popup on getting message on registration from save-register.php..
if(isset($_GET['msg']) && $_GET['msg']=="Email Already Exist"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Email already Exist",
    icon: "<?php echo 'error' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'register.php';
  });

</script>

<?php }elseif(isset($_GET['msg']) && $_GET['msg']=="Problem in sending email"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Problem in sending email.",
    icon: "<?php echo 'error' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'register.php';
  });

</script>

<?php }elseif(isset($_GET['msg']) && $_GET['msg']=="success"){ ?>
 <script>

  swal({
    title: "<?php echo $_GET['msg']; ?>",
    text: "Registration Successful!! Please Varify the otp sent to your email to continue.",
    icon: "<?php echo 'success' ?>",
    button: "OK",
  });
  $('.swal-button--confirm').click(function(){
    window.location.href = 'verify-email-otp.php';
  });

</script>

<?php }
?>

<script>
   $(document).on("click",".buy_exam_package",function(){
    var package_id = $(this).data('package_id');
   $("#package_id_modal").val(package_id);

   });

   $(document).on("click",".buy_exam_package1",function(){
    // alert("fsadfsdf");
    var package_id = $(this).data('package_id');
    //console.log(package_id);
      $.ajax({
      type: 'post',
      url: 'ajax/submit_package_login.php',
      data:{package_Id:package_id},
      success: function(response){
        //alert(response);
        var msg = '';
        if(response == 1){
          //alert("1")
          //window.location='student/index.php';
          swal({
            title: "Success",
            text: "Package Added to your account",
            icon: "success",
            button: "OK",
          });
          $('.swal-button--confirm').click(function(){
            window.location.href = 'student/myexam.php';
          });

        }else if(response == 2){
          alert("Email Address doesn't exist in database");

        }
        $('#loginmessage').html(msg);

      },
      error:function(err){
        console.log(err);
      }

    })


   });
</script>

<script type="text/javascript">
    // $(window).on('load', function() {
    //     $('#comingsoonModal').modal('show');
    // });
</script>

<script>
// Set the date we're counting down to
// var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
var countDownDate = new Date("<?php echo $cmngsnlist['coming_date']." ".$cmngsnlist['comming_time']; ?>").getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  // document.getElementById("demo").innerHTML = days + "Days " + hours + "Hours "
  // + minutes + "Minuts " + seconds + "Seconds ";
  document.getElementById("days").innerHTML = days + "Days ";
  document.getElementById("hours").innerHTML = hours + "Hours ";
  document.getElementById("minutes").innerHTML = minutes + "Minuts ";
  document.getElementById("seconds").innerHTML = seconds + "Seconds ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

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

<script>
$(document).ready(function(){
    $(".se-pre-con").hide();
});
</script>

</body>
</html>