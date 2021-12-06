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
                                    <img src="uploads/package-img/<?php echo $package['image'];?>" alt="Thumb" id="course-img">
                                </a>
                                <div class="price">Price: <?php echo $package['amount'];?> Rs.</div>
                            </div>
                            <div class="info">
                                <div class="author-info">                                    
                                    <div class="others">
                                        <a href="#"><?php echo $package['package_name'];?></a>      
                                    </div>
                                </div>

                                <ul class="package">
                                <?php 
                                // Query to fetch exams in this package...
                                $featured_exams = $package['featured_exams'];
                                $fetch_exams = $conn->query("SELECT * FROM exam WHERE id IN($featured_exams)");
                                 while($examslist = $fetch_exams->fetch_assoc()){ ?>
                                    <li><a href="#"><?=$examslist['exam_name'];?></a></li>    
                                 <?php } ?>                               
                                </ul>
                                <p class="description">
                                    <?php                                    
                                   echo substr($package['discription'],0,20)."...";     
                                    
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
                        <div class="advisor-item">
                            <div class="info-box">
                                <!--<img src="assets/img/800x600.png" alt="Thumb">-->
                              <img src="assets/img/01.jpg" alt="Thumb">
                                <div class="info-title">
                                    <h4>Professon. Nuri Paul</h4>
                                    <span>Chemistry specialist</span>
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
                        <!-- Single Item -->
                        <!-- Single Item -->
                        <div class="advisor-item">
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
                        <!-- Single Item -->
                        <!-- Single Item -->
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
                        <!-- Single Item -->
                        <!-- Single Item -->
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
                        <!-- Single Item -->
                        <!-- Single Item -->
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
                        <img src="assets/img/800x800.png" alt="Thumb">
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
                                <img src="assets/img/800x800.png" alt="Thumb">
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
                                <img src="assets/img/800x800.png" alt="Thumb">
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
                                <img src="assets/img/800x800.png" alt="Thumb">
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
                                <img src="assets/img/800x800.png" alt="Thumb">
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
                                <a href="#"><img src="<?php echo $hostname; ?>/admin/latest_news/<?php echo $product_fetch['news_file']; ?>" alt="Thumb"></a>
                                <div class="date">
                                    <h4><span>24</span> Nov, 2018</h4>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#"><?php echo $product_fetch['news_title']; ?></a>
                                </h4>
                                <p>
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
    <div class="clients-area default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-4 info">
                    <h4>Our largest education campus</h4>
                    <p>
                        Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.
                    </p>
                </div>
                <div class="col-md-8 clients">
                    <div class="clients-items owl-carousel owl-theme text-center">
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="assets/img/150x80.png" alt="Clients"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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