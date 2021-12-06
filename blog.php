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
        .blog-items .main-content.single {
        background: white;
        padding: 20px 50px;
        font-size: 1.1em;
        border-radius: 5px;
        }

        .blog-items .main-content.single .post-title{
            font-family: "Candal", serif;
            color: #5c5b5b;
            margin: 5px;
        }

    .blog-items .main-content.single .post-title {
    text-align: center;
    margin-bottom: 40px;
}

.blog-items .main-content.single .post-title {
    text-align: center;
    margin-bottom: 40px;
}


        .blog-items .sidebar {
            width: 30%;
            float: left;
        }

        .blog-items .sidebar .section.search {
            margin-top: 0px;
        }

        .blog-items .sidebar .section {
    background: white;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.blog-items .sidebar .section.topics ul {
    margin: 0px;
    padding: 0px;
    list-style: none;
    border-top: 1px solid #e0e0e0;
}

.blog-items .sidebar .section.topics ul li a {
    display: block;
    padding: 15px 0px 15px 0px;
    border-bottom: 1px solid #e0e0e0;
    transition: all 0.3s;
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
    <!-- Start Header -->
    <?php  header2(); ?>  
    <!-- End Header --> 
   <!-- Login Register form section-->
    <?php login_register_form(); ?>
    

    <!-- Start Breadcrumb 
    ============================================= -->
    <!-- <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/2440x1578.png);"> -->
        <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/blog_banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog standard full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-8">
                        <!-- Single Item -->
                        <?php 

                        $limit=8;
                        if (isset($_GET['page'])){
                            $page=$_GET['page'];
                        }
                        else
                        { 
                          $page=1;
                        }

                        $start_from = ($page-1) * $limit; 
                            //Fetch blog data..
                        if (isset($_GET['b_cat']) && $_GET['b_cat']!="") {
                              $b_cat = $_GET['b_cat'];
                              $sql = "SELECT * FROM blog WHERE blog_cat_id = '$b_cat' AND status = 1 order by post_date desc LIMIT $start_from,$limit";
                            }else{
                                $sql = "SELECT * FROM blog WHERE status = 1 order by post_date asc LIMIT $start_from,$limit";
                                
                            }

                        $res = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res) > 0){
                                while($blogList = mysqli_fetch_assoc($res)){ ?>
                             <div class="single-item">
                            <div class="item">
                                <div class="thumb">
                                    <a href="#">
                                        <!-- <img src="assets/img/1500x700.png" alt="Thumb"> -->
                                        <img src="uploads/blogs-img/<?=$blogList['image'];?>" alt="Thumb">
                                    </a>
                                    <div class="date">
                                        <!-- <h4><span>24</span> Nov, 2018</h4> -->
                                        <?php
                                        //Our YYYY-MM-DD date string.
                                        $date = $blogList['post_date'];

                                        //Convert the date string into a unix timestamp.
                                        $unixTimestamp = strtotime($date);

                                         ?>
                                        <h4><span><?=date("j",$unixTimestamp);?></span><?=date("M Y",$unixTimestamp);?></h4>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>
                                        <a href="#"><?=$blogList['title'];?></a>
                                    </h3>
                                    <p>
                                       <?php echo html_entity_decode($blogList['short_desc']);?>
                                    </p>
                                    <a href="blog-detail.php?id=<?php echo $blogList['id']; ?>">Read More <i class="fas fa-angle-double-right"></i></a>
                                    <!-- <a  href="single-blog.php?id=<?php echo $blogList['id']; ?>">Read More</a> -->
                                    <div class="meta">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area">
                                <nav aria-label="navigation">                    

                                    <ul class="pagination">
                                    <?php 
                                      $pagination = $conn->query("SELECT * FROM blog where status = '1'");
                                      $total_rows = $pagination->num_rows;
                                      //Number of pages required
                                      $total_pages = ceil($total_rows/$limit);

                                      if($page == 1){ ?> 
                                        <li class="disabled">
                                            <a>Previous</a>
                                        </li>
                                      <?php }else{ ?>
                                        <li>                                        
                                            <a href="blog.php?page=<?php echo ($page-1);?>">Previous</a>
                                        </li>
                                      <?php }

                                      for($i=1; $i <= $total_pages; $i++){ ?>
                                        <li><a href="blog.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
                                      <?php }

                                      if($total_pages == $page){?>
                                        <li class="disabled"><a>Next</a></li>
                                      <?php }else{ ?> 
                                        <li><a href="blog.php?page=<?=($page+1); ?>">Next</a></li>
                                      <?php }
                                    ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <!-- </div> -->
                    <!-- End Blog Content -->
                   <?php  }else{ ?>
                            <!-- Start 404 
                            ============================================= -->
                            <div class="error-page-area default-padding">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2 text-center content">
                                            <h1>404</h1>
                                            <h2>Sorry Page Was Not Found!</h2>
                                            <p>
                                                The page you are looking is not available or has been removed. Try going to Home Page by using the button below.
                                            </p>
                                            <a class="btn btn-dark effect btn-md" href="index.php">Back To Home</a>
                                            <a class="btn btn-dark border btn-md" href="contact.php">Contact Us</a>
                                            <!-- <ul>
                                                <li class="facebook">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li class="twitter">
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li class="linkedin">
                                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                </li>
                                                <li class="pinterest">
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End 404 -->

                        
                    <?php }?>
                   </div>

                    <div class="col-md-4 sidebar">                      
                        
                            <div class="section topics">
                                <h2 class="section-title">Categories</h2>
                                <ul>
                                <?php 
                                     $fetch_blog_catergories = $conn->query("SELECT * FROM blog_category WHERE status = '1'");
                                     while($blog_category = $fetch_blog_catergories->fetch_assoc()){ ?>
                                                              
                                    <li><a href="blog.php?b_cat=<?=$blog_category['id'];?>"><?=$blog_category['title'];?></a></li>
                                    
                                <?php }?>          
                                </ul>
                            </div>

                            
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

     <!-- Start Footer 
    ============================================= -->
    <?php footer(); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <?php js();?>
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
</body>
</html>