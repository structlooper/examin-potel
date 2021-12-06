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
    <!-- <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/2440x1578.png);">
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
    </div> -->
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog standard full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-8">
                        <!-- Single Item -->
                            <!-- Main Content Wrapper -->
                              <div class="main-content-wrapper">
                                <div class="main-content single">
                                  <h1 class="post-title">Blog Title</h1>

                                  <div class="post-content">
                                    <?php //echo html_entity_decode($post['body']); ?>
                                    <p>Many times I have come across instances where some people scorn the practice of setting New Year Resolutions.</p>
                                    <p>The very word resolution is an indication of some form of internal conflict springing from an ineffectual self-governance in a person. It means the individual is waging a fight against something undesirable in their life; or is making a conscious decision to pursue certain ideals that before were absent in their life.</p>
                                    <p>Aren’t you supposed to be pursuing these ideals every day of your life? Isn’t it supposed to be the default state of your life? Why would you wait for a new year before you make a resolution to better your life?</p>
                                    <p>Such people also avoid new year resolutions or scorn the practice thereof because for them, experience has proven it to be ineffective.</p>
                                    <p>I don’t entirely agree with such people. I am not advocating the practice of new year resolutions either. But I’d sooner advise a person to set new year resolutions they will end up abandoning by the end of January than advise them to sleepwalk through their life the entire year.</p>
                                  </div>

                                </div>
                              </div>
                        <!-- Single Item -->                                      
                        
                    
                    </div>
                    <!-- End Blog Content -->
                    <div class="col-md-4 sidebar">                                      
                        

                            <!-- <div class="section search">
                                <h2 class="section-title">Search</h2>
                                <form action="index.php" method="post">
                                    <input type="text" name="search-term" class="text-input" placeholder="Search...">
                                </form>
                            </div> -->

                             <!-- <div class="section popular">
                                  <h2 class="section-title">Popular</h2>

                                  <?php foreach ($posts as $p): ?>
                                    <div class="post clearfix">
                                      <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                                      <a href="" class="title">
                                        <h4><?php echo $p['title'] ?></h4>
                                      </a>
                                    </div>
                                  <?php endforeach; ?>
                                  

                                </div> -->


                            <div class="section topics">
                                <h2 class="section-title">Topics</h2>
                                <ul>                                   
                                    <li><a href="#">Life</a></li>
                                    <li><a href="#">Quotes</a></li> 
                                    <li><a href="#">Fiction</a></li>
                                    <li><a href="#">Biography</a></li>
                                    <li><a href="#">Motivation</a></li> 
                                    <li><a href="#">Inspiration</a></li> 
                                    <li><a href="#">Test</a></li>
                                                  
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

</body>
</html>