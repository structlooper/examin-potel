<?php 
ob_start();
//error_reporting(0);
require_once '../includes/config.php';
require_once 'includes/functions.php';
$web = web; //path of the root folder..

if(isset($_POST['add_blog'])){
    echo "sdfsdfsdf";
    $blog_cat_id = get_safe_value($conn,$_POST['blog_category']);
    $blog_title = get_safe_value($conn,$_POST['title']);

	$short_description = get_safe_value($conn,$_POST['short_description']);

    $long_description = get_safe_value($conn,$_POST['long_description']);

    $post_date = get_safe_value($conn,$_POST['post_date']);
    // echo "image name" .$image = get_safe_value($conn,$_POST['image']);
    // echo "</br>"; 


	$status = 1; 

    //File Processing
        $blog_img = $_FILES['image']['name'];
        if(empty($_FILES['image']['tmp_name']))
        {
            $image_name = "";
        }
        else
        {
            if(($_FILES['image']['type'] == "image/jpeg")
            ||($_FILES['image']['type'] == "image/jpg")
            ||($_FILES['image']['type'] == "image/gif")
            ||($_FILES['image']['type'] == "image/png"))
            {
                $blog_image = preg_replace('/\s+/','-',$blog_img);
                $image_name = time()."_".$blog_image;    

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/blogs-img/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.   
        //echo "INSERT INTO blog(blog_cat_id,title,short_desc,long_desc,image,post_date,status)VALUES('$blog_cat_id','$blog_title','$short_description','$long_description','$image_name','$post_date','$status')";

    $sql = "INSERT INTO blog(blog_cat_id,title,short_desc,long_desc,image,post_date,status)VALUES('$blog_cat_id','$blog_title','$short_description','$long_description','$image_name','$post_date','$status')";

	 if(mysqli_query($conn,$sql)){

		header("location:".$web."admin/blog.php?msg=success");
	}else{

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		//header("location".$web."/admin/blog.php?msg=error");
	}

}



if(isset($_POST['update_blog'])){
	echo $blog_id = $package_name = get_safe_value($conn,$_POST['blog_id']);
    echo $blog_cat_id = $package_name = get_safe_value($conn,$_POST['upd_blog_cat']);
	echo $blog_name = get_safe_value($conn,$_POST['update_blogName']);
	echo $short_desc = get_safe_value($conn,$_POST['update_shortdescription']);
	echo $long_desc = get_safe_value($conn,$_POST['update_longdescription']);
    echo $post_date = get_safe_value($conn,$_POST['update_post_date']);

	//$date_modified = date("Y-m-d H:i:s");

	//File Processing
        $blog_img = $_FILES['image']['name'];
        
        if(empty($_FILES['image']['tmp_name']))
        {
            //$package_image = "";
            $image_name = $_POST['hidden_image'];
            
        }
        else
        {
            if(($_FILES['image']['type'] == "image/jpeg")
            ||($_FILES['image']['type'] == "image/jpg")
            ||($_FILES['image']['type'] == "image/gif")
            ||($_FILES['image']['type'] == "image/png"))
            {
                $blog_img = preg_replace('/\s+/','-',$blog_img);
                $image_name = time()."_".$blog_img;
            

                move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/blogs-img/'.$image_name);
            }
            else{
                $msg = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Image must be in JPG, GIF or PNG Format.</div>";
            }
        }        
        //File Processing End.
        $sql = "UPDATE  blog SET blog_cat_id='$blog_cat_id',title='$blog_name',short_desc='$short_desc',long_desc='$long_desc',image='$image_name',post_date='$post_date'WHERE id='$blog_id'";

         if(mysqli_query($conn,$sql)){

        header("location:".$web."admin/blog.php?msg=updated");
    }else{

       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       header("location".$web."/admin/blog.php?msg=error");
    }

}

?>