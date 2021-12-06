<?php
error_reporting(1); 
require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/footer.php';
require_once 'functions.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location:blog.php');
}

//Fetch Blog Data from blog table.......
 $fetch_blogs_data = $conn->query("SELECT * FROM blog WHERE id = '$id' AND status = '1'");
 $blog_details = $fetch_blogs_data->fetch_assoc();

 //Fetch data realted to blog category to show wherever it need to be displayed.....
 $fetch_blog_category_data = $conn->query("SELECT * FROM blog_category WHERE id= '".$blog_details['blog_category_id']."' AND status = '1'");
 $blog_category_details = $fetch_blog_category_data->fetch_assoc();

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
                                  <h1 class="post-title"><?=$blog_details['title'];?></h1>

                                  <div class="post-content">
                                    <?php echo html_entity_decode($blog_details['long_desc']); ?>                                    
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

</body>
</html>